@extends('layouts.app')
@section('content')
	<div class="container">
		<center><h1>Data Supir</h1></center>
		<div class="panel panel-primary">
			<div class="panel-heading">Data Supir
		</div>
	
	<div class="panel-body">
		<table class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>Foto</th>
					<th>Nama</th>
					<th>Jenis Kelamin</th>
					<th>No Identitas</th>
					<th>No Hp</th>
					<th>Alamat</th>
					<th>Harga Sewa</th>
					<th colspan="3">Acion</th>
				</tr>
			</thead>
			<tbody>
			@php $a=1; @endphp
				@foreach($supir as $data)
				<tr>
					<td>{{$a++}}</td>
					<td>{{$data->foto}}</td>
					<td>{{$data->nama}}</td>
					<td>{{$data->jk}}</td>
					<td>{{$data->no_identitas}}</td>
					<td>{{$data->no_hp}}</td>
					<td>{{$data->alamat}}</td>
					<td>{{$data->harga_sewa}}</td>
					</td>
					<td>
						<a class="btn btn-warning" href="/supir/{{$data->id}}/edit">Edit</a>
					</td>
					<td>
						<a class="btn btn-primary" href="/supir/{{$data->id}}/">Show</a>
					</td>
					<td>
					<form action="{{route('supir.destroy',$data->id)}}" method="post">
						<input type="hidden" name="_method" value="Delete">
						<input type="hidden" name="_token">
						<input type="submit" value="Delete" class="btn btn-danger">
						{{csrf_field()}}
					</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	</div>
@endsection