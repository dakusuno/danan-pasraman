<table class="table" style="border:1px solid #ddd">
    <thead>
        <tr>
            <th>ID</th>
            <th>NIK Bapak</th>
            <th>Nama Bapak</th>
            <th>Pekerjaan Bapak</th>
            <th>No HP Bapak</th>
            <th>NIK Ibu</th>
            <th>Nama Ibu</th>
            <th>Pekerjaan Ibu</th>
            <th>No HP Ibu</th>
            <th>Alamat</th>
            <th>Kabupaten</th>
            <th>Provinsi</th>
            <th>Tingkat</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sisya as $s)
        <tr>
            <td>{{$s->ID}}</td>
            <td>{{$s->nik_bapak}}</td>
            <td>{{$s->nama_bapak}}</td>
            <td>{{$s->pekerjaan_bapak}}</td>
            <td>{{$s->nohp_bapak}}</td>
            <td>{{$s->nik_ibu}}</td>
            <td>{{$s->nama_ibu}}</td>
            <td>{{$s->pekerjaan_ibu}}</td>
            <td>{{$s->nohp_ibu}}</td>
            <td>{{$s->alamat}}</td>
            <td>{{$s->kabupaten}}</td>
            <td>{{$s->provinsi}}</td>
            <td>{{$s->tingkat}}</td>
            <td>{{$s->status}}</td>
            
        </tr>
        @endforeach
    </tbody>
</table>