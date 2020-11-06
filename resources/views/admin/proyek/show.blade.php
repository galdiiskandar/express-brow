@foreach ($dataProyek as $proyek)
    <table class="table" name="detailProyek">
        <tr>
            <th>Kode Proyek</th>
            <td>:</td>
            <td>{{ $proyek->kode_proyek }}</td>
        </tr>
        <tr>
            <th>Nama Proyek</th>
            <td>:</td>
            <td>{{ $proyek->nama_proyek}}</td>
        </tr>
        <tr>
            <th>Deskripsi Proyek</th>
            <td>:</td>
            <td>{{ $proyek->deskripsi_proyek}}</td>
        </tr>
        <tr>
            <th>Status Proyek</th>
            <td>:</td>
            <td>{{ $proyek->status_proyek}}</td>
        </tr>
        <tr>
            <th>Gambar proyek </th>
            <td>:</td>
            <td>
                <img style="width: 40%;" src="{{ url('/images/'.$proyek->gambar_proyek) }}">
            </td>
        </tr>
    </table>
@endforeach
