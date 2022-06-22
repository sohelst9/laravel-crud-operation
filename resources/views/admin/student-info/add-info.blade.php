@extends('layouts.master')

@section('content')
<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Hi, welcome Sohel Rana!</h4>
            <p class="mb-0">Laravel Curd Admin Panel</p>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}   ">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="">Add Student Info</a></li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3>Add Student Information</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('/student-info/insert') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="">name</label>
                            <input type="text" name="name" class="form-control">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="">Student Roll</label>
                            <input type="text" name="roll" class="form-control">
                            @error('roll')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="">Collage Name</label>
                            <textarea type="text" name="clg_name" class="form-control"></textarea>
                            @error('clg_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="">Father Name</label>
                            <input type="text" name="father_name" class="form-control">
                            @error('father_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="">Mother Name</label>
                            <input type="text" name="mother_name" class="form-control">
                            @error('mother_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="">Phone Number</label>
                            <input type="text" name="phn_number" class="form-control">
                            @error('phn_number')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Choose file</label>
                            <input type="file" name="image" class="form-control">
                            @error('image')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="com-md-12 mb-3 ml-2">
                            <button type="submit" class="btn btn-secondary">Add Student Info</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
