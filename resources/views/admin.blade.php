@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h3>Welcome, {{ auth()->user()->name }} 👋</h3>
            <p class="text-muted">You are logged in as <strong>Admin</strong>.</p>
        </div>
    </div>
</div>
@endsection
