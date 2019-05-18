@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row center">
        @if (count($trainings)>0)
            @foreach ($trainings as $item)
            <div class="card col-md-3 trainings">
                <img src="{{$item->img}}" class="card-img-top" alt="{{$item->title}}">
                <div class="card-body">
                <h5 class="card-title">{{$item->title}}</h5>
                <p class="card-text">{{$item->description}}</p>
                <a href="/training/details/{{$item->id}}" class="btn btn-primary"><i class="fas fa-info"></i> More Details</a>
                </div>
            </div>
         @endforeach
        @else
        <h1 class="text-danger">There is no Trainings</h1>
        @endif
    </div>
</div>
@endsection
