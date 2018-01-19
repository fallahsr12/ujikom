@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-12">
		<section class="content-header">
    		 <h1>
    		   Tambah Data Siswa Terlambat
    		 </h1>
      		<ol class="breadcrumb">
      		  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      		  <li class="fa fa-car">Siswa Terlambat</li><li class="active">Tambah Siswa Terlambat</li>
      		</ol>
    	</section><br><br>
    	<div class="panel panel-danger">
			<div class="panel-heading">Tambah Data Siswa Terlambat
		</div>

		<div class="panel-body">
		<form action="{{route('siswa_terlambat.store')}}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			
			<div class="form-group">
				<label class="control-lable">Nama</label>
				<input type="text" name="nama" class="form-control" required="">
			</div>

			<div class="form-group">
				<label class="control-lable">Kelas</label>
				<input type="text" name="kelas" class="form-control" required="">
			</div>

			<div class="form-group">
				<label class="control-lable">Jumlah terlambat</label>
				<input type="text" name="jumlah_terlambat" class="form-control" required="">
			</div><br>
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