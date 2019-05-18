@extends('layouts.app')
<style>
    
</style>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
                <h2 class="text-left text-dark">Name : {{auth()->user()->name}}</h2>
                <h4 class="text-left text-success">E-Mail : {{auth()->user()->email}}</h4>
                <p style="font-size:14px" class="text-left text-secondary">Role : Admin</p>
                <p style="font-size:10px" class="text-left text-secondary">Account Created : {{auth()->user()->created_at}}</p>
                <form method="POST" action="{{url('admin/password/update')}}">
                    @csrf
                        <div class="form-group">
                          <label for="exampleInputPassword1">Password</label>
                          <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Your New Password">
                        </div>
                        <button type="submit" class="btn btn-success"><i class="fas fa-edit"></i> Update Your Password</button>
                    </form>
    </div>
<hr>
    <div class="col-md-12">
        <div class="col-md-12 col-sm-12">
            <h2 class="float-left">Supervaisors</h2>
            <a class="btn btn-success float-right" href="/admin/supervisor/add"><i class="fas fa-plus"></i> Add Supervaisor</a>
            <div class="table-responsive">
                <table class="table table-striped table-dark">
                        <thead>
                          <tr>
                            <th scope="col">Name</th>
                            <th scope="col">E-mail</th>
                            <th>Controll</th>
                          </tr>
                        </thead>
                        <tbody>
                                @foreach ($sample_supervaisors as $item)
                          <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>
                                    <a href="{{url('admin/supervaisor/delete/')}}/{{$item->id}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      {{$sample_supervaisors->links()}}
                    </div>
            <hr>
            <h2 class="float-left">Students</h2>
            <div class="table-responsive">
                <table class="table table-striped table-dark">
                        <thead>
                          <tr>
                            <th scope="col">Name</th>
                            <th scope="col">E-mail</th>
                            <th>Controll</th>
                          </tr>
                        </thead>
                        <tbody>
                                @foreach ($sample_students as $item)
                          <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>
                                    <a href="{{url('admin/student/delete/')}}/{{$item->id}}" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      {{$sample_students->links()}}
                </div>
        </div>
    </div>
</div>
</div>
@endsection