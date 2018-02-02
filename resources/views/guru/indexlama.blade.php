@extends('layouts.master')
@section('content')
<div class="row">
	<div class="container">
		
		<div class="col-md-12"><br><br><br>
			<div class="panel panel-danger">
				<div class="panel-heading">
					<h2 class="panel-title">Data Guru</h2>
				</div>
				<div class="panel-body" style="background: white">
					<p><a class="btn btn-primary" href="{{ route('guru.create') }}">Tambah</a></p>
					{!! $html->table(['class'=>'table-striped']) !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
{!! $html->scripts() !!}
@endsection