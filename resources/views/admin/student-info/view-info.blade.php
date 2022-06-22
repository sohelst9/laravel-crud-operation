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
            <li class="breadcrumb-item"><a href="{{ route('add.info') }}">Add StudentInfo</a></li>
            <li class="breadcrumb-item active"><a href="">View StudentInfo</a></li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3>All StudentInfo</h3>
            </div>
            <div class="card-body">
                <table id="category" class="table table-bordered table-striped verticle-middle table-responsive-sm">
                    <thead class="thead-primary">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Roll</th>
                            <th>Clg name</th>
                            <th>F_Name</th>
                            <th>M_Name</th>
                            <th>Number</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_student as $key=>$student)

                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->roll }}</td>
                            <td>{{ substr($student->clg_name,0, 15).'...' }}</td>
                            <td>{{ $student->father_name }}</td>
                            <td>{{ $student->mother_name }}</td>
                            <td>{{ $student->phn_number }}</td>
                            <td><img width="70px" height="70px" src="{{ asset('uploads/student/'.$student->image) }}" alt=""></td>
                            <td>
                               @if ($student->status == 1)
                               <a href="{{ route('status.change',$student->id) }}" class="btn btn-primary" href="">Active</a>
                               @else
                               <a href="{{ route('status.change',$student->id) }}" class="btn btn-danger" href="">Deactive</a>
                               @endif
                            </td>
                            <td>
                                <a href="{{ route('edit.info',$student->id) }}">
                                    <i class="fa fa-pencil color-muted"></i>
                                </a>

                                <a href="{{ route('delete.info',$student->id) }}">
                                    <i class="fa fa-close color-danger ml-4"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer-script')
    <script>
        $(document).ready( function () {
        $('#category').DataTable();
        } );
    </script>
@endsection
