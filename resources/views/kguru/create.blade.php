@extends('layouts.master')
@section('content')
<div class="row">
	<div class="col-md-12">
		<section class="content-header">
    		 <h1>
    		   Tambah Data Kehadiran Guru
    		 </h1>
      		<ol class="breadcrumb">
      		  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      		  <li class="fa fa-car">Kehadiran Guru</li><li class="active">Tambah Kehadiran Guru</li>
      		</ol>
    	</section><br><br>
    	<div class="panel panel-danger">
			<div class="panel-heading">Tambah Data Kehadiran Guru
		</div>

		<div class="panel-body">
		<form action="{{route('kguru.store')}}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}

			<div class="form-group">
							<label class="control-lable">Nama Guru</label>
							<select class="form-control" name="id_guru">
								@foreach($guru as $data)
								<option value="{{$data->id}}">{{$data->nama_guru}}</option>
								@endforeach
							</select>
			</div>

			<div class="form-group">
				<label class="control-lable">Keterangan</label>
				<select class="form-control" name="keterangan">
								<option value="Sakit">Sakit</option>
								<option value="Izin">Izin</option>
								<option value="Alpa">Alpa</option>
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