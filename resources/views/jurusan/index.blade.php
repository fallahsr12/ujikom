@extends('layouts.master')
@section('content')<br><br>
<div class="container">
<div class="box">
            <div class="box-header" style="background: #9932cc">
              <h3 class="box-title" >Data Jurusan</h3>
            </div><br>
            &nbsp&nbsp<a class="btn btn-primary" href="{{ route('jurusan.create') }}">Tambah</a>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="data" class="table table-striped">
                <thead>
                <tr>
                 	<th>No</th>
					<th>Nama Jurusan</th>
					<th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php $no=1 @endphp
				@foreach($siswas as $data)
				<tr>
					<td>{{$no++}}</td>
					<td>{{$data->jurusan}}</td>

					<td>
            <form action="{{route('jurusan.destroy',$data->id)}}" method="post">
            <input type="hidden" name="_method" value="Delete">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <a data-toggle="tooltip" data-placement="top" title="Edit Data" class="btn btn-success" href="/jurusan/{{$data->id}}/edit"><i class="fa fa-edit"></i></a>
            <a data-toggle="tooltip" data-placement="top" title="Detail Jurusan" class="btn btn-warning" href="{{url('/jurusan/'.$data->id)}}/detail"><i class="fa fa-info"></i></a>
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