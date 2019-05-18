@extends('layouts.app')
<style>
    
</style>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
                <h2 class="text-left text-dark">Name : {{auth()->user()->name}}</h2>
                <h4 class="text-left text-success">E-Mail : {{auth()->user()->email}}</h4>
                <p style="font-size:14px" class="text-left text-secondary">Role : Supervaisor</p>
                <p style="font-size:10px" class="text-left text-secondary">Account Created : {{auth()->user()->created_at}}</p>
                <form method="POST" action="{{url('admin/password/update')}}">
                    @csrf
                        <div class="form-group">
                          <label for="exampleInputPassword1">Password</label>
                          <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Your New Password">
                        </div>
                        <button type="submit" class="btn btn-success">Update Your Password</button>
                    </form>
    </div>
<hr>
    <div class="col-md-12">
        <div class="col-md-12 col-sm-12">
            <h2 class="float-left">Supervaisors</h2>
            <a class="btn btn-success float-right" href="/admin/supervisor/add">Add Supervaisor</a>
            <div class="table-responsive">
                <table class="table table-striped table-dark">
                        <thead>
                          <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Company</th>
                            <th>Date</th>
                          </tr>
                        </thead>
                        <tbody>
                                @foreach ($trainings as $item)
                          <tr>
                            <td>
                            <a class="text-white" style="text-decoration: none" href="/training/details/{{$item->id}}">
                                {{$item->title}}
                            </a></td>
                            <td>{{$item->company}}</td>
                            <td>
                                    {{$item->created_at}}
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      {{$trainings->links()}}
                    </div>
        </div>
    </div>
</div>
</div>
@endsection