@extends('layouts.master')
@section('content')
<div class="container">
	<div class="col-md-12">
		<section class="content-header">
    		 <h1>
    		   Tambah Data Siswa
    		 </h1>
      		<ol class="breadcrumb">
      		  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      		  <li class="fa fa-car">Siswa</li><li class="active">Tambah Siswa</li>
      		</ol>
    	</section><br><br>
    	<div class="panel panel-danger">
			<div class="panel-heading">Tambah Data Siswa
		</div>

		<div class="panel-body">
		<form action="{{route('siswa.store')}}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}

			<div class="form-group">
				<label class="control-lable">Nama</label>
				<input type="text" name="nama_siswa" class="form-control" required="">
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