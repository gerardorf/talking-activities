<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Talking Activity</title>
	</head>
	<body>
		<div ng-app="talking-activities">
			<div ng-controller="LoginController">
				<div ng-show="error">
					@{{ error }}
				</div>
				<form ng-submit="authenticate()">
					<legend>Login</legend>
					<div class="form-group">
						<label for="">Correo Electrónico</label>
						<input type="text" ng-model="login.email" class="form-control" placeholder="Input field">

						<label for="">Contraseña</label>
						<input type="text" ng-model="login.password" class="form-control" id="login.password" placeholder="Input field">
					</div>

					<button type="submit" class="btn btn-primary" id="login.submit">Entrar</button>
				</form>
				@{{ login }}
			</div>
		</div>

		<script src="//code.angularjs.org/1.4.7/angular.min.js"></script>
		<script src="/app.js"></script>

	</body>
</html>