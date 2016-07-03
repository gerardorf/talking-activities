@extends('layout.master')
@section('content')
<div ng-app="talking-activities" class="container">

	<div ng-controller="LoginController" class="col-md-offset-4 col-md-5">
		<div ng-show="error" class="alert alert-danger">
			@{{ labels['login.password.error'] }}
		</div>
		<form ng-submit="authenticate()" class="form-signin">
			<h2 class="form-signin-heading">@{{ labels['login.title.label']  }}</h2>
			<label for="login.mail">@{{ labels['login.mail.label']  }}</label>
			<input type="text" id="login.mail" ng-model="login.email" class="form-control" placeholder="@{{ labels['login.mail.label'] }}" required autofocus>
			<label for="login.password">@{{ labels['login.password.label']  }}</label>
			<input type="text" id="login.password" ng-model="login.password" class="form-control" placeholder="@{{ labels['login.password.label'] }}" required>

			<button type="submit" id="login.submit" class="btn btn-lg btn-primary btn-block">@{{ labels['login.submit.label']  }} <i class="fa fa-sign-in"></i></button>
		</form>
	</div>
</div>

<script src="//code.angularjs.org/1.4.7/angular.min.js" ></script>
<script src="//code.angularjs.org/1.4.7/angular-cookies.min.js"></script>
<script src="/app.js"></script>
@endsection