@extends('layouts.main')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">States</h1>
    <a href="{{ route('states.create') }}" class="btn btn-success float-right">Create State</a>
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
        <form method="GET" action="{{ route('states.index') }}">
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
                    <th scope="col">Country code</th>
                    <th scope="col">State name</th>
                    <th scope="col">Manage</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($states as $state)
                    <tr>
                        <th scope="row">{{ $state->id }}</th>
                        <td>{{ $state->country->country_code }}</td>
                        <td>{{ $state->name }}</td>
                        <td>
                            <a class="btn btn-warning btn-sm" href="{{ route('states.edit', $state->id) }}">Edit</a>

                            <form method="POST" action="{{ route('states.destroy', $state->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" href="{{ route('states.destroy', $state->id) }}">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
