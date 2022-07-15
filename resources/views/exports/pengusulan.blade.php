<table>
   <thead>
   <tr>
       <th>id</th>
       <th>nama</th>
       <th>status_usulan</th>
       <th>jenis_layanan_nama</th>
       <th>tgl_usulan</th>
       <th>instansi_nama</th>
       <th>tipe_usulan</th>
       <th>id_validator</th>
       <th>nama_validator</th>
   </tr>
   </thead>
   <tbody>
   @foreach($pengusulans as $row)
       <tr>
           <td>{{ $row->id }}</td>
           <td>{{ $row->nama }}</td>
           <td>{{ $row->status_usulan }}</td>
           <td>{{ $row->jenis_layanan_nama }}</td>
           <td>{{ $row->tgl_usulan }}</td>
           <td>{{ $row->instansi_nama }}</td>
           <td>{{ $row->tipe_usulan }}</td>
           <td>{{ $row->user_id }}</td>
           <td>{{ $row->user->name }}</td>
       </tr>
   @endforeach
   </tbody>
</table>
