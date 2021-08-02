@extends('layouts.main')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Departments</h1>
    <a href="{{ route('departments.create') }}" class="btn btn-success float-right">Create Department</a>
</div>
<div class="row">
    <div class="col-md-12">

        <div>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <form method="GET" action="{{ route('departments.index') }}">
            <div class="form-row align-items-center">
              <div class="col-auto">
                <label class="sr-only" for="inlineFormInput">Name</label>
                <input type="search" name="search" class="form-control mb-2" id="inlineFormInput" placeholder="Search here..">
              </div>
              <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-2">Submit</button>
              </div>
            </div>
          </form>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Department name</th>
                    <th scope="col">Manage</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departments as $department)
                    <tr>
                        <th scope="row">{{ $department->id }}</th>
                        <td>{{ $department->name }}</td>
                        <td>
                            <a class="btn btn-warning btn-sm" href="{{ route('departments.edit', $department->id) }}">Edit</a>

                            <form method="POST" action="{{ route('departments.destroy', $department->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" href="{{ route('users.destroy', $department->id) }}">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
