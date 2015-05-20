@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-">
			<h2>Hola, {{$user->name}}!</h2>
			<p>Registrado el {{$user->created_at}}</p>
		</div>
	</div>
	<div class="row">
		<h4>Servicios contratados</h4>
		<ul>
			<?php foreach ($currentContracts as $service): ?>
				<li>{{$service->name}}</li>
			<?php endforeach; ?>
		</ul>

		<h4>Total de servicios con usuarios matriculados</h4>
		<ul>
			<?php foreach ($contracts as $service): ?>
				<li>{{$service->name}}, con un precio de {{$service->fee}} <br/>Descripción:  {{$service->description}}</li>
			<?php endforeach; ?>
		</ul>

		<h4>Total de servicios disponibles</h4>
		<ul>
			<?php foreach ($services as $service): ?>
				<li>{{$service->name}}, con un precio de {{$service->fee}} <br/>Descripción:  {{$service->description}} <br/>Horario:  {{$service->schedule}}</li>
			<?php endforeach; ?>
		</ul>

</div>

</div>
@endsection
