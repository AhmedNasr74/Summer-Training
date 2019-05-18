@extends('layouts.app')
@section('content')
<div class="container text-center">
    <div class="row center">
        <div class="col-md-12">
                <h1 class="text-danger">{{$message}}</h1>
        </div>
        <div class="col-md-12">
                <a style="display: block" href="/">Home</a>
        </div>
    </div>
</div>
@endsection