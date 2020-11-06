@foreach ($dataPromo as $promo)
    <table class="table" name="detailPromo">
        <tr>
            <th>Kode Promo</th>
            <td>:</td>
            <td>{{ $promo->kode_promo }}</td>
        </tr>
        <tr>
            <th>Nama Promo</th>
            <td>:</td>
            <td>{{ $promo->nama}}</td>
        </tr>
        <tr>
            <th>Deskripsi</th>
            <td>:</td>
            <td>{{ $promo->deskripsi}}</td>
        </tr>
        <tr>
            <th>Gambar Promo </th>
            <td>:</td>
            <td>
                <img style="width: 40%;" src="{{ url('/images/'.$promo->foto_promo) }}">
            </td>
        </tr>
    </table>
@endforeach
