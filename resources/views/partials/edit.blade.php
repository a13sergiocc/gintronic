@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-">
			<h2>Configuración de usuario {{$user->name}}</h2>
		</div>
	</div>
	<div class="row">
		@foreach($errors->all() as $error)
			<p>{{$error}}</p>
		@endforeach

		<form method="POST" action="/api/user/{{$user->id}}">
			<p>
				<label for="name">Nombre Usuario: </label>
				<input type="text" name="name" value="{{$user->name}}"/>
			</p>
			<p>
				<label for="surname">Apellidos: </label>
				<input type="text" name="surname" value="{{$user->surname}}"/>
			</p>
			<p>
				<label for="birthday">Fecha de nacimiento: </label>
				<input type="date" name="birthday" value="{{$user->birthday}}"/>
			</p>
			<p>
				<label for="email">Email:</label>
				<input type="email" name="email" value="{{$user->email}}"/>
			</p>
			<p>
				<label for="address">Dirección: </label>
				<input type="text" name="address" value="{{$user->address}}"/>
			</p>
			<p>
				<label for="telephone">Teléfono: </label>
				<input type="text" name="telephone" value="{{$user->telephone}}"/>
			</p>
			<p>
				<label for="password">Contraseña:</label>
				<input type="password" name="password" value=""/>
			</p>

			<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
			<input type="hidden" name="_method" value="PUT"/>

			<button>Actualizar Datos</button>
		</form>

		<h2>Borrado de perfil</h2>
		{!! Form::open(array('url'=>'/api/user/'.$user->id,'method'=>'DELETE')) !!}
			{!! Form::submit('Borrar mi Perfil') !!}
		{!! Form::close() !!}

		@stop
	</div>
</div>
@endsection
