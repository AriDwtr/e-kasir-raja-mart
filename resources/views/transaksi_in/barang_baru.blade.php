<form id="post-brg-baru" autocomplete="off">
    <input type="hidden" name="action" id="action" value="create">
    <div class="mb-2 p-1">
        <label for="kd_brg" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Kode
            Barang</label>
        <input type="text" name="kd_brg" id="kd_brg" value="" oninput="formatNumber(this)"
            class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Masukan Kode Barang">
        <p id="kd_brg_error" class="error-message mt-2 text-sm text-red-600 dark:text-red-500 font-medium"></p>
    </div>
    <div class="mb-2 p-1">
        <label for="nm_brg" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Nama
            Barang</label>
        <input type="text" name="nm_brg" id="nm_brg" value=""
            class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Masukan Nama Barang">
        <p id="nm_brg_error" class="error-message mt-2 text-sm text-red-600 dark:text-red-500 font-medium"></p>
    </div>
    <div class="grid gap-3 md:grid-cols-3">
        <div class="mb-1 p-1">
            <label for="ktg_brg" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Kategori
                Barang</label>
            <select id="ktg_brg" name="ktg_brg"
                class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm font-bold rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option disabled selected>Pilih Kategori Produk</option>
                @foreach ($KateBrg as $kategori )
                <option value="{{ $kategori->id }}">{{ Str::upper($kategori->jenis_kategori) }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-1 p-1">
            <label for="stok_in" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Stok
                Barang</label>
            <input type="text" name="stok_in" id="stok_in" value=""
                oninput="formatNumber(this)"
                class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Masukan Stok Barang">
            <p id="stok_in_error" class="error-message mt-2 text-sm text-red-600 dark:text-red-500 font-medium">
            </p>

        </div>
        <div class="mb-1 p-1">
            <label for="stok" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Tanggal Expired Produk</label>
            <input type="date" name="expired_brg" id="expired_brg" value=""
                class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="">
        </div>
    </div>
    <div class="grid gap-2 mb-3 md:grid-cols-2">
        <div class="mb-1 p-1">
            <label for="hrg_brg_beli" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Harga
                Barang Beli</label>
            <input type="text" name="hrg_brg_beli" id="hrg_brg_beli" value=""
                onfocusout="formatCurrency(this)"
                class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Masukan Harga Barang Beli">
            <p id="hrg_brg_beli_error" class="error-message mt-2 text-sm text-red-600 dark:text-red-500 font-medium">
            </p>
        </div>
        <div class="mb-1 p-1">
            <label for="hrg_brg_jual" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Harga
                Barang Jual</label>
            <input type="text" name="hrg_brg_jual" id="hrg_brg_jual" value=""
                onfocusout="formatCurrency(this)"
                class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Masukan Harga Barang Jual">
            <p id="hrg_brg_jual_error" class="error-message mt-2 text-sm text-red-600 dark:text-red-500 font-medium">
            </p>
        </div>
    </div>
    <div class="mb-2">
        <div class="inline-flex rounded-md shadow-sm" id="btn-group" role="group">
            <button type="button" id="btnSubmit-baru"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-400 border border-gray-200 rounded-l-lg hover:bg-green-100 hover:text-green-700 focus:z-10 focus:ring-2 focus:ring-green-700 focus:text-green-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                <svg aria-hidden="true" class="w-4 h-4 mr-2 fill-current" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z">
                    </path>
                </svg>
                Tambahkan Produk
            </button>
            <button type="reset" id="btnReset-baru"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-red-500 border-t border-b rounded-r-lg border-gray-200 hover:bg-red-100 hover:text-red-700 focus:z-10 focus:ring-2 focus:ring-red-700 focus:text-red-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                <svg aria-hidden="true" class="w-4 h-4 mr-2 fill-current" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z">
                    </path>
                </svg>
                Batal dan Reset Form
            </button>
        </div>
    </div>
</form>
