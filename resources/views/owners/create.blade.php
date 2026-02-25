@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Add Owner</h2>

        <form action="{{ route('owners.store') }}" method="POST" class="card card-body">
            @csrf

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text"
                       name="name"
                       value="{{ old('name') }}"
                       class="form-control @error('name') is-invalid @enderror">

                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Surname</label>
                <input type="text"
                       name="surname"
                       value="{{ old('surname') }}"
                       class="form-control @error('surname') is-invalid @enderror">

                @error('surname')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-success">Save</button>
            <a href="{{ route('owners.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection
