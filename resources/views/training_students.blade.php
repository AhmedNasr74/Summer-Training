@extends('layouts.app')
<style>
    
</style>
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
               
        </div>
        <div class="col-md-8">
            <div class="col-md-12">
                    <h2 class="float-left">Students</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-dark">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">E-mail</th>
                            </tr>
                            </thead>
                            <tbody>
                                    @foreach ($students as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            
        </div>
    </div>
</div>
@endsection