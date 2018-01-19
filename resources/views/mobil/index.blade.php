@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
	<div class="col-md-12">
		<ul class="breadcrumb">
			<li class="active">Mobil</li>
		</ul>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2 class="panel-title">Mobil</h2>
			</div>
			
			<div class="panel-body">
			<p><a class="btn btn-success" href="{{ route('mobil.create') }}">Tambah</a></p>

		</div>
	</div>
	</div>
</div>
</div>
@endsection