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
					<form method="POST" action="home/pay-service/{{$contract->pivot->service_id}}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
						<button>Pagar</button>
					</form>
					<form class="" action="home/quit-service/{{$contract->pivot->service_id}}" method="post">
						<input type="hidden" name="_method" value="delete">
						<button>Darse de alta</button>
					</form>
				</li>
			<?php endforeach; ?>
		</ul>

		<h4>Historial de pagos</h4>
		<ul>
			<?php foreach ($userPayments as $payment): ?>
				<li>
					<p>{{$payment->name}}: {{$payment->fee}} el {{$payment->created_at}}</p>
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
					<form class="" action="home/join-service/{{$service->id}}" method="post">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						<button>Darse de alta</button>
					</form>
				</li>
			<?php endforeach; ?>
		</ul>
</div>

</div>
@endsection
