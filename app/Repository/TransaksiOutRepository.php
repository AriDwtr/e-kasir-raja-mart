<?php

namespace App\Repository;

use App\Models\BarangModel;
use App\Models\SettingSiteModel;
use App\Models\TransaksiOutModel;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

class TransaksiOutRepository
{

    protected $transaksi;
    protected $barang;
    protected $site;

    public function __construct(TransaksiOutModel $transaksi, BarangModel $barang, SettingSiteModel $site)
    {
        $this->transaksi = $transaksi;
        $this->barang = $barang;
        $this->site = $site;
    }

    public function getTransaksiOut()
    {
        $data = $this->transaksi->join('t_user', 't_user.id', '=', 't_transaksi_out.user')
            ->join('t_barang', 't_barang.kd_brg', '=', 't_transaksi_out.kd_brg')
            ->select('t_transaksi_out.*', 't_user.nm_user', 't_barang.nm_brg')
            ->latest('t_transaksi_out.created_at')
            ->get();

        return $data;
    }


    public function post(array $post)
    {
        $kdbrg = $post['kd_brg'];
        $jmlbrg = $post['jml_brg'];
        $tbayar = $post['tbayar'];
        $user = Auth::user()->id;
        $data = [];
        foreach ($kdbrg as $index => $barang) {
            $setHrgJual = $this->barang->where('kd_brg', $barang)->first();
            $data[] = [
                'kd_brg' => $barang,
                'jml_brg' => $jmlbrg[$index],
                'hrg_brg_jual' => $setHrgJual->hrg_brg_jual * $jmlbrg[$index],
                'user' => $user,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
            $this->barang->where('kd_brg', $barang)->update(
                [
                    'stok' => DB::raw("stok - $jmlbrg[$index]"),
                ]
            );
        }


        $result = $this->transaksi::insert($data);

        if($result){
            $this->printThermal($data, $tbayar);
        }

        return $result;
    }

    public function printThermal($data, $tbayar)
    {
        $site = $this->site->find(1);
        // Replace 'your-printer-device' with the path to your thermal printer device.
        $connector = new WindowsPrintConnector($site['nama_site']);
        $printer = new Printer($connector);
        $printer->setJustification(Printer::JUSTIFY_CENTER);
        $printer->setTextSize(2, 2);
        // Print your data.
        $printer->text("Nota Belanja\n");
        $printer->text("{$site['nama_site']}\n");
        $printer->text("===================\n");
        $printer->text("ket Barang     Qty   Hrg\n");
        $printer->text("-----------------------\n");
        foreach ($data as $item) {
            $barang = $this->barang->where('kd_brg', $item['kd_brg'])->first();
            $printer->text("{$barang['nm_brg']}     ");
            $printer->text("{$item['jml_brg']}  ");
            $printer->text("{$item['hrg_brg_jual']}\n");
            // $total += $item['hrg_brg_jual'];
        }
        $printer->text("-------------------\n");
        $printer->text("Total              Rp. {$tbayar}\n\n");
        $printer->text("TERIMA KASIH\n");
        $printer->text("");
        $printer->cut();
        $printer->close();


        return $printer;
    }
}
