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
			<?php foreach ($currentContracts as $contract): ?>
				<li>
					<form class="" action="home/quit-service" method="post">
						<p>{{$contract->name}} los {{$contract->schedule}}</p>
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="service_id" value="{{ $contract->id }}">
						<input type="submit" name="quit_service" value="Baja">
					</form>
				</li>
			<?php endforeach; ?>
		</ul>

		<h4>Total de servicios con usuarios matriculados</h4>
		<ul>
			<?php foreach ($contracts as $service): ?>
				<li>{{$contracts}}</li>
				<li>{{$service->name}}, con un precio de {{$service->fee}} <br/>Descripción:  {{$service->description}}</li>
			<?php endforeach; ?>
		</ul>

		<h4>Total de servicios disponibles</h4>
		<ul>
			<?php foreach ($services as $service): ?>
				<li>
					{{$service->name}}, con un precio de {{$service->fee}} <br/>Descripción:  {{$service->description}} <br/>Horario:  {{$service->schedule}}
					<form class="" action="home/join-service" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="service_id" value="{{ $service->id }}">
						<input type="submit" name="join_service" value="Alta">
					</form>
				</li>
			<?php endforeach; ?>
		</ul>
</div>

</div>
@endsection
