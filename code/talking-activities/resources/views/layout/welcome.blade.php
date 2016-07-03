@extends('layout.master')
@section('content')
<div ng-app="talking-activities">
    <div ng-controller="LoginController">
        <div>
            Welcome
        </div>
        <div ng-show="welcomeMessage != false">
            Bienvenido a My Vaughan. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent augue justo, tincidunt at nisi id, malesuada scelerisque ligula. Nam in ultricies risus, non laoreet lectus. Donec ut mauris porta, maximus nulla eget, commodo nibh. In pharetra nulla in varius malesuada. Donec vulputate scelerisque elit, sit amet sollicitudin lacus venenatis sit amet. Mauris pellentesque risus nec mollis maximus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis placerat erat sit amet tortor laoreet commodo. In id fermentum nunc.
        </div>
    </div>
</div>
@endsection
