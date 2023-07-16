<form id="post-brg-update" autocomplete="off">
    <input type="hidden" name="action" id="action" value="update">
    <div class="grid gap-4 md:grid-cols-4">
        <div class="md:mb-2 p-1 col-span-3">
            <label for="kd_brg" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Kode
                Barang</label>
            <input type="text" name="kd_brg" id="kd_brg" value="" oninput="formatNumber(this)"
                class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Masukan Kode Barang">
            <p id="kd_brg_error" class="error-message mt-2 text-sm text-red-600 dark:text-red-500 font-medium"></p>
        </div>
        <div class="mb-2 p-1" id="btn-group-update">
            <button id="btnSearch-produk" type="button"
                class="md:mt-8 inline-flex items-center py-2 pr-3 pl-2 mr-2 bg-blue-500 hover:bg-blue-900 text-white text-sm font-semibold rounded-lg">
                <svg aria-hidden="true" class="w-4 h-4 mr-1 fill-current" fill="currentColor" viewBox="0 0 23 23"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10.5 3.75a6.75 6.75 0 100 13.5 6.75 6.75 0 000-13.5zM2.25 10.5a8.25 8.25 0 1114.59 5.28l4.69 4.69a.75.75 0 11-1.06 1.06l-4.69-4.69A8.25 8.25 0 012.25 10.5z"
                        clip-rule="evenodd" />
                </svg>
                Cari Barang</button>
            <button id="btnCancel-produk" type="button"
                class="md:mt-8 inline-flex items-center py-2 pr-3 pl-2 mr-2 bg-red-500 hover:bg-blue-900 text-white text-sm font-semibold rounded-lg">
                <svg aria-hidden="true" class="w-4 h-4 mr-1 fill-current" fill="currentColor" viewBox="0 0 23 23"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z"
                        clip-rule="evenodd" />
                </svg>
                Batal</button>
        </div>
    </div>
    <div class="mb-2 p-1">
        <label for="nm_brg" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Nama
            Barang</label>
        <input type="text" name="nm_brg" id="nm_brg" value=""
            class="form-control bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Masukan Nama Barang" readonly>
        <p id="nm_brg_error" class="error-message mt-2 text-sm text-red-600 dark:text-red-500 font-medium"></p>
    </div>
    <div class="grid gap-3 md:grid-cols-3">
        <div class="mb-1 p-1">
            <label for="ktg_brg" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Kategori
                Barang</label>
            <select id="ktg_brg" name="ktg_brg"
                class="form-control bg-gray-300 border border-gray-300 text-gray-900 text-sm font-bold rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                readonly>
                <option readonly selected>Pilih Kategori Produk</option>
                @foreach ($KateBrg as $kategori)
                    <option value="{{ $kategori->id }}">{{ Str::upper($kategori->jenis_kategori) }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-1 p-1">
            <label for="stok_in" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Stok
                Barang Masuk</label>
            <input type="text" name="stok_in" id="stok_in" value="" oninput="formatNumber(this)"
                class="form-control bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Masukan Stok Barang" readonly>
            <p id="stok_in_error" class="error-message mt-2 text-sm text-red-600 dark:text-red-500 font-medium">
            </p>

        </div>
        <div class="mb-1 p-1">
            <label for="stok" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Tanggal Expired
                Produk</label>
            <input type="date" name="expired_brg" id="expired_brg" value=""
                class="form-control bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="" readonly>
        </div>
    </div>
    <div class="grid gap-2 mb-3 md:grid-cols-2">
        <div class="mb-1 p-1">
            <label for="hrg_brg_beli" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Harga
                Barang Beli</label>
            <input type="text" name="hrg_brg_beli" id="hrg_brg_beli" value="" onfocusout="formatCurrency(this)"
                class="form-control bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Masukan Harga Barang Beli" readonly>
            <p id="hrg_brg_beli_error" class="error-message mt-2 text-sm text-red-600 dark:text-red-500 font-medium">
            </p>
        </div>
        <div class="mb-1 p-1">
            <label for="hrg_brg_jual" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Harga
                Barang Jual</label>
            <input type="text" name="hrg_brg_jual" id="hrg_brg_jual" value="" onfocusout="formatCurrency(this)"
                class="form-control bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Masukan Harga Barang Jual" readonly>
            <p id="hrg_brg_jual_error" class="error-message mt-2 text-sm text-red-600 dark:text-red-500 font-medium">
            </p>
        </div>
    </div>
    <div class="mb-2">
        <button id="btnSubmit-update" type="button"
            class="inline-flex items-center py-2 pr-3 pl-2 mr-2 bg-green-500 hover:bg-blue-900 text-white text-sm font-semibold rounded-lg">
            <svg aria-hidden="true" class="w-4 h-4 mr-1 fill-current" fill="currentColor" viewBox="0 0 23 23"
                xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.97.97a.75.75 0 011.06 0l3 3a.75.75 0 01-1.06 1.06l-1.72-1.72v3.44h-1.5V3.31L8.03 5.03a.75.75 0 01-1.06-1.06l3-3zM9.75 6.75v6a.75.75 0 001.5 0v-6h3a3 3 0 013 3v7.5a3 3 0 01-3 3h-7.5a3 3 0 01-3-3v-7.5a3 3 0 013-3h3z" />
                    <path d="M7.151 21.75a2.999 2.999 0 002.599 1.5h7.5a3 3 0 003-3v-7.5c0-1.11-.603-2.08-1.5-2.599v7.099a4.5 4.5 0 01-4.5 4.5H7.151z" />
            </svg>
            Simpan Transaksi Masuk</button>
    </div>
</form>
