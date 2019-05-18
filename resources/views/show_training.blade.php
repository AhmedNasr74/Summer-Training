@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 myfont training-data float-left">
            <img src="{{$training->img}}" class="img-responsive rounded">
            <h1 class="text-left text-success">{{$training->title}} Training</h1>
            <h6 class="text-secondary">
                    Presented By : {{$training->company}}
                </h6>
                <span style="font-size:10px" class="text-secondary">Posted at: {{$training->created_at}}</span>
                @if (auth()->user())
                    @if (auth()->user()->permession == 2)
                        @if ($am_i_joined == true)
                        <a href="{{url('student/training/leave/')}}/{{$training->id}}" class="btn btn-block btn-outline-danger"><i class="fas fa-sign-out-alt"></i>  Leave Training</a>
                        @else
                        <a href="{{url('student/training/enroll')}}/{{$training->id}}" class="btn btn-block btn-outline-success"><i class="fas fa-sign-in-alt"></i> Enroll</a>
                        @endif
                    @elseif(Auth::user()->permession == 0)
                    <a href="{{url('/training/students')}}/{{$training->id}}" class="btn btn-block btn-outline-success"><i class="fas fa-info"></i>  View Training Students</a>
                    @elseif($training->added_by == Auth::user()->id )
                    <a href="{{url('/training/students')}}/{{$training->id}}" class="btn btn-block btn-outline-success"><i class="fas fa-info"></i>  View Training Students</a>
                    @endif
                @else
                    <a href="{{url('student/training/enroll')}}/{{$training->id}}" class="btn btn-block btn-outline-success"><i class="fas fa-sign-in-alt"></i> Enroll</a>
                @endif
        </div>
        <div class="col-md-8">
            <div class="col-md-12">
                    <h2 class="text-left text-primary">Requirments</h2>
                    <ul>
                    @foreach ($requirments as $requirment)
                            <li class="myfont text-dark">{{$requirment->requirment}}</li>
                    @endforeach
                    </ul>
            </div>
            <div class="col-md-12">
                <h3 class="text-left text-teal">Description</h3>
                <p>
                       {{ $training->description}}
                </p>
            </div>
            <div class="col-md-12">
                    <h4 class="text-left text-danger">Address</h4>
                    <p class="text-dark">
                           {{ $training->address}}
                    </p>
                </div>
        </div>
    </div>
</div>
@endsection