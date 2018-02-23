@extends('layouts.master')
@section('content')
<div class="row">
	<div class="col-md-12">
		<section class="content-header">
    		 <h1>
    		   Edit Data siswa
    		 </h1>
      		<ol class="breadcrumb">
      		  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      		  <li class="fa fa-car">siswa</li><li class="active">Edit Siswa</li>
      		</ol>
    	</section><br><br>
    	<div class="panel panel-danger">
			<div class="panel-heading">Tambah Data siswa
		</div>

		<div class="panel-body">
		<form action="{{route('siswa.update',$siswas->id)}}" method="post" enctype="multipart/form-data">
			<input type="hidden" name="_method" value="PUT">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			{{csrf_field()}}
			
			<div class="form-group">
				<label class="control-lable">Nama</label>
				<input type="text" name="nama_siswa" class="form-control" required="" value="{{$siswas->nama_siswa}}">
			</div>

			<div class="form-group">
				<label class="control-lable">Kelas</label>
				<select class="form-control" name="id_kelas">
					@foreach($kelas as $data)
					<option value="{{$data->id}}">{{$data->kelas}}</option>
					@endforeach
				</select>
			</div>

			

			<br>
			<div class="pull-right">
			<div class="form-group">
				<button type="submit" class="btn btn-success">Simpan</button>
				<button type="reset" class="btn btn-danger">Reset</button>
			</div>
			</div>
		</form>
	</div>
	</div>
</div>
</div>
@endsection