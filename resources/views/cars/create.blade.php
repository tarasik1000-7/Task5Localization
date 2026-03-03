@extends('layouts.app')
@section('title', 'Add Car')

@section('content')
    <h1 class="h3 mb-3">Add Car</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <form method="POST" action="{{ route('cars.store') }}" class="row g-3">
                @csrf

                <div class="col-md-4">
                    <label class="form-label">Reg number</label>
                    <input class="form-control" name="reg_number" value="{{ old('reg_number') }}">
                    @error('reg_number') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label">Brand</label>
                    <input class="form-control" name="brand" value="{{ old('brand') }}">
                    @error('brand') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label">Model</label>
                    <input class="form-control" name="model" value="{{ old('model') }}">
                    @error('model') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Owner</label>
                    <select class="form-select" name="owner_id">
                        <option value="">-- select owner --</option>
                        @foreach($owners as $owner)
                            <option value="{{ $owner->id }}" @selected(old('owner_id') == $owner->id)>
                                {{ $owner->name }} {{ $owner->surname }}
                            </option>
                        @endforeach
                    </select>
                    @error('owner_id') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="col-12 d-flex gap-2">
                    <button class="btn btn-primary">Save</button>
                    <a class="btn btn-outline-secondary" href="{{ route('cars.index') }}">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
