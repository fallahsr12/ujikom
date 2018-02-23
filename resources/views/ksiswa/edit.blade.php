@extends('layouts.master')
@section('content')
<div class="container">
	<div class="col-md-12">
		<section class="content-header">
    		 <h1>
    		   Edit Data Kehadiran Siswa
    		 </h1>
      		<ol class="breadcrumb">
      		  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      		  <li class="fa fa-car">Kehadiran Siswa</li><li class="active">Edit Kehadiran Siswa</li>
      		</ol>
    	</section><br><br>
    	<div class="panel panel-danger">
			<div class="panel-heading">Tambah Data Kehadiran Siswa
		</div>

		<div class="panel-body">
		<form action="{{route('ksiswa.update',$siswas->id)}}" method="post" enctype="multipart/form-data">
			<input type="hidden" name="_method" value="PUT">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			{{csrf_field()}}
			
			<div class="form-group">
				<label class="control-lable">Nama</label>
				<input type="text" name="nama" class="form-control" required="" value="{{$siswas->nama}}">
			</div>

			<div class="form-group">
				<label class="control-lable">Kelas</label>
				<input type="text" name="kelas" class="form-control" required="" value="{{$siswas->kelas}}">
			</div>

			<div class="form-group">
				<label class="control-lable">Keterangan</label>
				<input type="text" name="keterangan" class="form-control" required="" value="{{$siswas->keterangan}}">
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
@endsection