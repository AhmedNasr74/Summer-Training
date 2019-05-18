@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Add New Supervisor</h1>
                <form method="POST" action="{{url($pos_url)}}">
                    @csrf
                    <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Title</label>

                            <div class="col-md-6">
                                <input placeholder="Training Title" id="title" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="title" value="{{ old('name') }}" required autofocus>

                               
                            </div>
                        </div>
                        <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Company</label>
    
                                <div class="col-md-6">
                                    <input placeholder="Training Company" id="company" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="company" value="{{ old('name') }}" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Address</label>
                                    <div class="col-md-6">
                                        <input placeholder="Training Address" id="address" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="address" value="{{ old('name') }}" required autofocus>
                                    </div>
                                </div>
                        <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Description</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="description" id="" cols="30" rows="3" placeholder="Training Description"></textarea>
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Requirments</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="requirments" id="" cols="30" rows="5" placeholder="Separate between each Requirment by a dash -"></textarea>
                                </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Add
                                </button>
                            </div>
                        </div>
    </div>
</div>
</div>
@endsection