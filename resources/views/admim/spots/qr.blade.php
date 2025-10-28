@extends('admim.layouts.app')

@section('content')
<h1>Payment QR for {{ $spot->name }}</h1>
<div>{!! $qr !!}</div>
<p>Payment Code: <strong>{{ $spot->payment_code }}</strong></p>
@endsection
