<!DOCTYPE html>
<html ng-app="talkingActivities">
<head>
    <meta charset="utf-8">
    <title>Talking Activity</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
</head>
<body>
    <div ng-view></div>

<script type="text/javascript" src="{{ asset('bower_components/angular/angular.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('bower_components/angular-route/angular-route.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('bower_components/angular-cookies/angular-cookies.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/login.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/welcome.js') }}"></script>
</body>
</html>