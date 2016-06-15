@extends('layout.master')
@section('content')
<div ng-app="talking-activities">
	<div ng-controller="LoginController">
		<div ng-show="error">
			@{{ error }}
		</div>
		<form ng-submit="authenticate()">
			<legend>Login</legend>
			<div class="form-group">
				<label for="">Correo Electrónico</label>
				<input type="text" name="login.mail" ng-model="login.email" class="form-control" placeholder="Input field">

				<label for="">Contraseña</label>
				<input type="text" name="login.password" ng-model="login.password" class="form-control" id="login.password" placeholder="Input field">
			</div>

			<button type="submit" name="login.sumbit" class="btn btn-primary" id="login.submit">Entrar</button>
		</form>
		@{{ login }}
	</div>
</div>

<script src="//code.angularjs.org/1.4.7/angular.min.js"></script>
<script src="/app.js"></script>
@endsection