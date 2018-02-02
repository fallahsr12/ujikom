@extends('layouts.master')
@section('content')<br><br>
<div class="container">
<div class="box">
            <div class="box-header" style="background: #9932cc">
              <h3 class="box-title" >Kehadiran Siswa</h3>
            </div><br>
            &nbsp&nbsp<a class="btn btn-primary" href="{{ route('ksiswa.create') }}">Tambah</a>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="data" class="table table-striped">
                <thead>
                <tr>
                 	<th>No</th>
					<th>Nama Siswa</th>
          <th>Kelas</th>
					<th>Keterangan</th>
					<th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php $no=1 @endphp
				@foreach($siswas as $data)
				<tr>
					<td>{{$no++}}</td>
					<td>{{$data->nama}}</td>
          <td>{{$data->kelas}}</td>
					<td>{{$data->keterangan}}</td>

					<td>
            <form action="{{route('ksiswa.destroy',$data->id)}}" method="post">
            <input type="hidden" name="_method" value="Delete">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <a data-toggle="tooltip" data-placement="top" title="Edit Data" class="btn btn-success" href="/ksiswa/{{$data->id}}/edit"><i class="fa fa-edit"></i></a>
            <a data-toggle="tooltip" data-placement="top" title="Detail Guru" class="btn btn-warning" href="{{url('/ksiswa/'.$data->id)}}/detail"><i class="fa fa-info"></i></a>
            <button data-toggle="tooltip" data-placement="top" title="Hapus Data" type="submit" class="btn btn-danger" onclick="return confirm('Anda Yakin Akan Menghapus ?')"><i class="fa fa-trash"></i></button>
            {{csrf_field()}}
          </form>
          </td>
				</tr>
				@endforeach
                </tbody>

              </table>
            </div>
            <!-- /.box-body -->
          </div>
</div>


@endsection
@section('scripts')
<script type="text/javascript">
	$('#data').DataTable(); 
</script>
@endsection