@extends('layouts.app')
<style>
    
</style>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
                <h2 class="text-left text-dark">Name : {{auth()->user()->name}}</h2>
                <h4 class="text-left text-success">E-Mail : {{auth()->user()->email}}</h4>
                <p style="font-size:14px" class="text-left text-secondary">Role : Student</p>
                <p style="font-size:10px" class="text-left text-secondary">Account Created : {{auth()->user()->created_at}}</p>
                <form method="POST" action="{{url('student/password/update')}}">
                    @csrf
                        <div class="form-group">
                          <label for="exampleInputPassword1">Password</label>
                          <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Your New Password">
                        </div>
                        <button type="submit" class="btn btn-success">Update Your Password</button>
                      </form>
            </div>
        <div class="col-md-4">
                @if ($training)
                <div class="card trainings">
                        <img src="{{$training->img}}" class="card-img-top" alt="{{$training->title}}">
                        <div class="card-body">
                        <h5 class="card-title">{{$training->title}}</h5>
                        <p class="card-text">{{$training->description}}</p>
                        <p style="font-size:10px" class="text-right text-secondary">Enrolled at: {{$enrolled_at}}</p>
                        <a href="/training/details/{{$training->id}}" class="btn btn-primary"><i class="fas fa-info"></i> More Details</a>
                        <a href="{{url('student/training/leave/')}}/{{$training->id}}" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Leave Training</a>
                        </div>
                    </div>
                @else
                <h4 class="text-danger">You Are Not Enrolled Any Training Yet,<a href="/">Enroll Now</a></h4>
                @endif
        </div>
    </div>
</div>
@endsection