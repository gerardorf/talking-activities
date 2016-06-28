@extends('layout.master')
@section('content')
<div ng-app="talking-activities">
	<div ng-controller="LoginController">
		<div ng-show="error">
			@{{ labels['login.password.error'] }}
		</div>
		<form ng-submit="authenticate()">
			<legend>@{{ labels['login.title.label']  }}</legend>
			<div class="form-group">
				<label for="">@{{ labels['login.mail.label']  }}</label>
				<input type="text" name="login.mail" ng-model="login.email" class="form-control" placeholder="Input field">

				<label for="">@{{ labels['login.password.label']  }}</label>
				<input type="text" name="login.password" ng-model="login.password" class="form-control" id="login.password" placeholder="Input field">
			</div>

			<button type="submit" name="login.sumbit" class="btn btn-primary" id="login.submit">@{{ labels['login.submit.label']  }}</button>
		</form>
		@{{ login }}
	</div>
</div>

<script src="//code.angularjs.org/1.4.7/angular.min.js"></script>
<script src="/app.js"></script>
@endsection