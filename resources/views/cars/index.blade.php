@extends('layouts.app')
@section('title', 'Cars')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Cars</h1>
        <a class="btn btn-primary" href="{{ route('cars.create') }}">Add Car</a>
    </div>

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-striped mb-0 align-middle">
                <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Reg #</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Owner</th>
                    <th class="text-end">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($cars as $car)
                    <tr>
                        <td>{{ $car->id }}</td>
                        <td class="fw-semibold">{{ $car->reg_number }}</td>
                        <td>{{ $car->brand }}</td>
                        <td>{{ $car->model }}</td>
                        <td>
                            @if($car->owner)
                                <a href="{{ route('owners.show', $car->owner) }}" class="text-decoration-none">
                                    {{ $car->owner->name }} {{ $car->owner->surname }}
                                </a>
                            @else
                                —
                            @endif
                        </td>
                        <td class="text-end">
                            <a class="btn btn-sm btn-warning" href="{{ route('cars.edit', $car) }}">Edit</a>
                            <form action="{{ route('cars.destroy', $car) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this car?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center py-4">No cars</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $cars->links() }}
    </div>
@endsection
