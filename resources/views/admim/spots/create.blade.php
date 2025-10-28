@extends('admim.layouts.app')

@section('content')
<h1>{{ isset($spot) ? 'Edit Spot' : 'Add New Spot' }}</h1>

<form action="{{ isset($spot) ? route('spots.update', $spot->id) : route('spots.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($spot)) @method('PUT') @endif

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ $spot->name ?? old('name') }}" required>
    </div>

    <div class="mb-3">
        <label>Address</label>
        <input type="text" name="address" class="form-control" value="{{ $spot->address ?? old('address') }}" required>
    </div>

    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control">{{ $spot->description ?? old('description') }}</textarea>
    </div>

    <div class="mb-3">
        <label>Images (multiple allowed)</label>
        <input type="file" name="images[]" class="form-control" multiple>
        @if(isset($spot) && $spot->images)
            <div class="mt-2">
                @foreach($spot->images as $img)
                    <img src="{{ asset('storage/'.$img) }}" width="80" class="me-2 mb-2"/>
                @endforeach
            </div>
        @endif
    </div>

    <div class="mb-3">
        <label>Map Link</label>
        <input type="url" name="map_link" class="form-control" value="{{ $spot->map_link ?? old('map_link') }}">
    </div>

    <div class="mb-3">
        <label>Open Time</label>
        <input type="time" name="open_time" class="form-control" value="{{ $spot->open_time ?? old('open_time') }}" required>
    </div>

    <div class="mb-3">
        <label>Close Time</label>
        <input type="time" name="close_time" class="form-control" value="{{ $spot->close_time ?? old('close_time') }}" required>
    </div>

    <div class="mb-3">
        <label>Contact Numbers</label>
        <input type="text" name="contact_numbers[]" class="form-control mb-1" placeholder="Number 1" value="{{ $spot->contact_numbers[0] ?? '' }}">
        <input type="text" name="contact_numbers[]" class="form-control mb-1" placeholder="Number 2" value="{{ $spot->contact_numbers[1] ?? '' }}">
    </div>

    <div class="mb-3">
        <label>Ticket Price (JOD)</label>
        <input type="number" step="0.01" name="ticket_price" class="form-control" value="{{ $spot->ticket_price ?? old('ticket_price') }}" required>
    </div>

    <button class="btn btn-success">{{ isset($spot) ? 'Update' : 'Create' }}</button>
</form>
@endsection
