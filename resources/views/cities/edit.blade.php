@extends('layouts.main')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-3">
    <h1 class="h3 mb-0 text-gray-800">Update City</h1>
    <a href="{{ route('cities.index') }}" class="btn btn-success float-right">Cities List</a>
</div>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Update City') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('cities.update', $city->id) }}">
                    @csrf
                    @method('PUT')
                    {{-- state_id --}}
                    <div class="form-group row">
                        <label for="state_id" class="col-md-4 col-form-label text-md-right">{{ __('State name') }}</label>

                        <div class="col-md-6">
                            <select name="state_id" class="form-control">
                                <option>Select State Name</option>
                                @foreach ($states as $state)
                                    <option value="{{ $state->id }}" {{ $state->id == $city->state_id ? 'selected' : '' }}>{{ $state->name }}</option>
                                @endforeach
                            </select>
                            @error('country_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    {{-- name --}}
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('City Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $city->name) }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    {{-- Submit Button --}}
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="mt-3">
            <form method="POST" action="{{ route('cities.destroy', $city->id) }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" href="{{ route('cities.destroy', $city->id) }}">Delete {{ $city->name }}</button>
            </form>
        </div>
    </div>
</div>
@endsection
