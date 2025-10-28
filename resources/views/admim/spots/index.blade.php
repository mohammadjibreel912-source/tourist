@extends('admim.index')

@section('content')
<h1>All Spots</h1>
<a href="{{ route('spots.create') }}" class="btn btn-primary mb-3">Add New Spot</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Ticket Price</th>
            <th>Payment QR</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($spots as $spot)
        <tr>
            <td>{{ $spot->name }}</td>
            <td>{{ $spot->address }}</td>
            <td>{{ $spot->ticket_price }} JOD</td>
            <td><a href="{{ route('spots.showQr', $spot->id) }}" target="_blank" class="btn btn-sm btn-info">Show QR</a></td>
            <td>
                <a href="{{ route('spots.edit', $spot->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('spots.destroy', $spot->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
