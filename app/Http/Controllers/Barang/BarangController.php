<?php

namespace App\Http\Controllers\Barang;

use App\Http\Controllers\Controller;
use App\Models\BarangModel;
use App\Repository\BarangRepository;
use App\Repository\KategoriRepository;
use COM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Dompdf\Dompdf;

use Picqer\Barcode\BarcodeGenerator;
use Picqer\Barcode\BarcodeGeneratorPNG;

class BarangController extends Controller
{
    protected $request;
    private $barangRepo;
    private $kateRepo;

    public function __construct(Request $request, BarangRepository $barangRepo, KategoriRepository $kateRepo)
    {
        $this->request = $request;
        $this->barangRepo = $barangRepo;
        $this->kateRepo = $kateRepo;
    }

    public function listBarang()
    {
        return view('barang.barang');
    }

    public function getBarang()
    {
        $data = $this->barangRepo->all();

        return response()->json($data);
    }

    public function getBarangKasir($kode_barang)
    {
        $barang = $this->barangRepo->getBarang($kode_barang);

        return [
            'nama_barang' => $barang->nm_brg,
            'harga_barang' => $barang->hrg_brg_jual,
        ];
    }

    public function formBarang($type, $id = null)
    {
        if ($type == 'add') {
            $data = [];
            $data['header'] = 'FORM BARANG MASUK';
            $data['type'] = 'add';
            $data['id'] = null;
            $data['detail']['ktg_brg'] = null;
            return view('barang.frmbarang', compact('data'));
        }
        $data = [];
        $data['header'] = 'FORM VIEW BARANG';
        $data['type'] = 'view';
        $data['id'] = $id;
        $data['detail'] = $this->barangRepo->getBarang($data['id']);
        $data['kategori'] = $this->kateRepo->getKatBarang();
        // dd($data);
        return view('barang.frmbarang', compact('data'));
    }

    public function postBarang()
    {
        $data = $this->request->all();
        $validator = Validator::make($data, [
            'kd_brg' => 'required',
            'nm_brg' => 'required',
            'stok' => 'required',
            'hrg_brg_beli' => 'required',
            'hrg_brg_jual' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        if ($data['type'] === 'add') {
            $cekDataBarang = $this->barangRepo->getBarang($data['kd_brg']);
            if ($cekDataBarang) {
                return response()->json(['errors' => ['message' => 'Kode Barang Telah Di Gunakan'], 'status' => 'validasi'], 422);
            }
            $this->barangRepo->add($data);
            return response()->json(['success' => ['message' => 'Barang Berhasil Di Simpan'], 'status' => 'add'], 200);
        } else if ($data['type'] === 'view') {
            $this->barangRepo->update($data);
            return response()->json(['success' => ['message' => 'Barang Berhasil Di Simpan'], 'status' => 'update'], 200);
        }
    }

    public function deleteBarang($kd_brg)
    {
        $this->barangRepo->delete($kd_brg);
        return response()->json(['message' => 'Berhasil Menghapus Barang']);
    }

    public function printBarang($id)
    {
        $kd_brg = explode(",", $id);
        // dd($kd_brg);
        $fileName = "Cetak Barcode - " . date("Ymd_His") . '.pdf';
        $dompdf = new Dompdf();
        $html = '<html><body>';
        $html .= '<style>';
        $html .= 'table { width:auto; }'; // Menentukan lebar tabel
        $html .= 'td { padding: 10px; display: inline-block; }'; // Mengatur padding dan tata letak ke inline-block
        $html .= 'tr.border_bottom td {
                    border: 1px solid black;
                }';
        $html .= '</style>';
        $html .= '<table style="text-align: left;">';

        foreach ($kd_brg as $data) {
            $query = BarangModel::where('kd_brg', $data)->select('nm_brg')->first();
            $html .= '<tr class="border_bottom">';
            $html .= '<td align="center">';
            $html .= '<p>' . strtoupper($query->nm_brg) . '</p>';
            $html .= '<p><img src="data:image/png;base64,' . base64_encode($this->GenerateBarcode($data)) . '" alt="Barcode"></p>';
            $html .= '<p>' . $data . '</p>';
            $html .= '</td>';
            $html .= '</tr>';
        }

        $html .= '</table>';
        $html .= '</body></html>';
        $dompdf->loadHtml($html);
        $dompdf->render();
        $dompdf->stream($fileName);
    }

    function GenerateBarcode($id)
    {
        $barcodeGenerator = new BarcodeGeneratorPNG();
        $barcode = $barcodeGenerator->getBarcode($id, $barcodeGenerator::TYPE_CODE_128);

        return $barcode;
    }
}
