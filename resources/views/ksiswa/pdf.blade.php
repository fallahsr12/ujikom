<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Laporan Absensi</title>
        <body>
            <style type="text/css">
                .tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;width: 100%; }
                .tg td{font-family:Arial;font-size:12px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
                .tg th{font-family:Arial;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
                .tg .tg-3wr7{font-weight:bold;font-size:12px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
                .tg .tg-ti5e{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
                .tg .tg-rv4w{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;}
            </style>
 
            <div style="font-family:Arial; font-size:12px;">
                <center><h2>Data Absensi</h2></center>  
            </div>
            <br>
            <table class="tg">
              <tr>
                <th class="tg-3wr7">No</th>
                <th class="tg-3wr7">Tanggal Absen</th>
                <th class="tg-3wr7">Nama</th>
                <th class="tg-3wr7">Kelas</th>
                <th class="tg-3wr7">Ketertangan<br></th>
              </tr>
              @php $no=1 @endphp
              @foreach($siswas as $data)
				<tr>
					<td>{{$no++}}</td>
                    <td>{{$data->created_at->format('d M Y')}}</td>
					<td>{{$data->siswa->nama_siswa}}</td>
          			<td>{{$data->siswa->kelas->kelas}}</td>
					<td>{{$data->keterangan}}</td>

				</tr>
				@endforeach
            </table>
        </body>
    </head>
</html>