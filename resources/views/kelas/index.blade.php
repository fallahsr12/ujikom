@extends('layouts.master')
@section('content')<br><br>
<div class="container">
<div class="box">
            <div class="box-header" style="background: #26a65b">
              <h3 class="box-title" >Data Kelas</h3>
            </div><br>
            &nbsp&nbsp<a class="btn btn-primary" href="{{ route('kelas.create') }}">Tambah</a>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="data" class="table table-striped">
                <thead>
                <tr>
                 	<th>No</th>
					<th>Kelas</th>
					<th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php $no=1 @endphp
				@foreach($siswas as $data)
				<tr>
					<td>{{$no++}}</td>
					<td>{{$data->kelas}}</td>

					<td>
            <form action="{{route('kelas.destroy',$data->id)}}" method="post">
            <input type="hidden" name="_method" value="Delete">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <a data-toggle="tooltip" data-placement="top" title="Edit Data" class="btn btn-success" href="/admin/kelas/{{$data->id}}/edit"><i class="fa fa-edit"></i></a>
            
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