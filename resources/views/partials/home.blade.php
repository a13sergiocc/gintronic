@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-">
			<h2>Hola, {{$user->name}}!</h2>
			<p>Registrado el {{$user->created_at}}</p>
		</div>
	</div>

	<div class="row placeholders">
		<h2>Servicios disponibles</h2>
		<?php foreach ($availableServices as $service): ?>
			<div class="col-xs-6 col-sm-3 placeholder">
				<h4>{{$service->name}}</h4>
				<span class="text-muted">{{$service->description}}</span>
				<br/>
				<span class="text-muted"> {{$service->fee}}€ | {{$service->schedule}}</span>
				<form class="" action="home/join-service/{{$service->id}}" method="post">
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					<button>Darse de alta</button>
				</form>
			</div>
		<?php endforeach; ?>
	</div>

	<?php if (count($userContracts)>0): ?>
		<div class="row">
			<h4>Servicios contratados</h4>
			<table class="table table-condensed table-hover">
				<thead>
					<tr>
						<th>
							Nombre
						</th>
						<th>
							Descripción
						</th>
						<th>
							Horario
						</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($userContracts as $contract): ?>
						<tr>
							<td>{{$contract->name}}</td>
							<td>{{$contract->description}}</td>
							<td>{{$contract->schedule}}</td>
							<td>
								<form method="POST" action="home/pay-service/{{$contract->pivot->service_id}}">
									<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
									<button>Pagar</button>
								</form>
							</td>
							<td>
								<form class="" action="home/quit-service/{{$contract->pivot->service_id}}" method="post">
									<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
									<input type="hidden" name="_method" value="delete">
									<button>Darse de baja</button>
								</form>
							</td>
					<?php endforeach; ?>
				</tbody>
			</table>
	<?php endif; ?>

	<h4>Historial de pagos</h4>
	<ul>
		<?php foreach ($userPayments as $payment): ?>
			<li>
				<p>{{$payment->name}}: {{$payment->fee}}€ el {{$payment->created_at}}</p>
			</li>
		<?php endforeach; ?>
	</ul>

	<h4>Total de servicios con usuarios matriculados</h4>
	<ul>
		<?php foreach ($servicesWithContracts as $service): ?>
			<li>{{$service->name}}, con un precio de {{$service->fee}} <br/>Descripción:  {{$service->description}}</li>
		<?php endforeach; ?>
	</ul>

</div>
@endsection
