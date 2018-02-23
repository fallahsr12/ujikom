@extends('layouts.master')
@section('content')
<div class="container">
	<div class="col-md-11">
		<section class="content-header">
    		 <h1>
    		   Tambah Data Guru
    		 </h1>
      		<ol class="breadcrumb">
      		  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      		  <li class="fa fa-car">Guru</li><li class="active">Tambah Guru</li>
      		</ol>
    	</section><br><br>
    	<div class="panel panel-danger">
			<div class="panel-heading">Tambah Data Guru
		</div>

		<div class="panel-body">
		<form action="{{route('guru.store')}}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}

			<div class="form-group">
				<label class="control-lable">NIK</label>
				<input type="text" name="nik" class="form-control" required="">
			</div>

			<div class="form-group">
				<label class="control-lable">Nama</label>
				<input type="text" name="nama_guru" class="form-control" required="">
			</div>

			<div class="form-group">
				<label class="control-lable">Mata Pelajaran</label>
				<select class="form-control" name="id_mapel">
					@foreach($mapel as $data)
					<option value="{{$data->id}}">{{$data->mapel}}</option>
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