@foreach ($dataBarang as $barang)
    <table class="table" name="detailBarang">
        <tr>
            <th>Kode Barang</th>
            <td>:</td>
            <td>{{ $barang->kode_produk }}</td>
        </tr>
        <tr>
            <th>Nama Barang</th>
            <td>:</td>
            <td>{{ $barang->nama_produk}}</td>
        </tr>
        <tr>
            <th>Harga Barang</th>
            <td>:</td>
            <td>{{ $barang->harga}}</td>
        </tr>
        <tr>
            <th>Satuan Barang</th>
            <td>:</td>
            <td>{{ $barang->satuan}}</td>
        </tr>
        <tr>
            <th>Gambar Barang </th>
            <td>:</td>
            <td>
                <img style="width: 40%;" src="{{ url('/images/'.$barang->gambar_produk) }}">
            </td>
        </tr>
        <tr>
            <th>Keterangan Barang </th>
            <td>:</td>
            <td>{{ $barang->keterangan}}</td>
        </tr>
    </table>
@endforeach
