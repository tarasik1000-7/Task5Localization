@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Edit Owner</h2>

        <form action="{{ route('owners.update', $owner) }}"
              method="POST"
              class="card card-body">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text"
                       name="name"
                       value="{{ old('name', $owner->name) }}"
                       class="form-control @error('name') is-invalid @enderror">

                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Surname</label>
                <input type="text"
                       name="surname"
                       value="{{ old('surname', $owner->surname) }}"
                       class="form-control @error('surname') is-invalid @enderror">

                @error('surname')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('owners.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection
