@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h2 class="mb-1">{{ $owner->name }} {{ $owner->surname }}</h2>
                <div class="text-muted">Owner ID: {{ $owner->id }}</div>
            </div>

            <div class="d-flex gap-2">
                <a href="{{ route('cars.create') }}" class="btn btn-outline-primary">
                    Add Car
                </a>

                <a href="{{ route('owners.edit', $owner) }}" class="btn btn-warning">
                    Edit
                </a>

                <a href="{{ route('owners.index') }}" class="btn btn-outline-dark">
                    Back
                </a>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header fw-semibold">
                Cars of this owner
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped mb-0 align-middle">
                    <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Reg #</th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Owner</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($owner->cars as $car)
                        <tr>
                            <td>{{ $car->id }}</td>
                            <td><strong>{{ $car->reg_number }}</strong></td>
                            <td>{{ $car->brand }}</td>
                            <td>{{ $car->model }}</td>
                            <td>{{ $car->owner?->name }} {{ $car->owner?->surname }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">
                                No cars
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-3">
            <form action="{{ route('owners.destroy', $owner) }}" method="POST">
                @csrf
                @method('DELETE')

                <button class="btn btn-danger"
                        onclick="return confirm('Delete this owner?')">
                    Delete owner
                </button>
            </form>
        </div>
    </div>
@endsection
