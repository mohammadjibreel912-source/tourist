@extends('admim.index')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">All Spots</h4>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="mb-4">
        <a href="{{ route('spots.create') }}" class="btn btn-primary">
            <i class="bx bx-plus"></i> Add New Spot
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Ticket Price</th>
                            <th>Payment QR</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($spots as $spot)
                        <tr>
                            <td>{{ $spot->name }}</td>
                            <td>{{ $spot->address }}</td>
                            <td>{{ $spot->ticket_price }} JOD</td>
                            <td>
                                <a href="{{ route('spots.showQr', $spot->id) }}" target="_blank" class="btn btn-sm btn-info">
                                    <i class="bx bx-qrcode"></i> Show QR
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('spots.edit', $spot->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bx bx-edit"></i> Edit
                                </a>
                                <form action="{{ route('spots.destroy', $spot->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                        <i class="bx bx-trash"></i> Delete
                                    </button>
                                </form>
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
