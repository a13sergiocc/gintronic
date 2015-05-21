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
			<?php foreach ($userContracts as $contract): ?>
				<li>
					<p>{{$contract->name}} los {{$contract->schedule}}</p>
					<form method="POST" action="/contract/{{$contract->id}}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
						<input type="hidden" name="_method" value="DELETE"/>
						<button>Actualizar Datos</button>
					</form>
				</li>
			<?php endforeach; ?>
		</ul>

		<h4>Historial de pagos</h4>
		<ul>
			<?php foreach ($userPayments as $payment): ?>
				<li>
					<p>{{$payment->fee}} el {{$payment->created_at}}</p>
				</li>
			<?php endforeach; ?>
		</ul>

		<h4>Total de servicios con usuarios matriculados</h4>
		<ul>
			<?php foreach ($servicesWithContracts as $service): ?>
				<li>{{$service->name}}, con un precio de {{$service->fee}} <br/>Descripción:  {{$service->description}}</li>
			<?php endforeach; ?>
		</ul>

		<h4>Total de servicios disponibles</h4>
		<ul>
			<?php foreach ($availableServices as $service): ?>
				<li>
					{{$service->name}}, con un precio de {{$service->fee}} <br/>Descripción:  {{$service->description}} <br/>Horario:  {{$service->schedule}}
					<form class="" action="" method="post">
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
