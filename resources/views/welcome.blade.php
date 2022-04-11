@extends('layouts.app')

@section('content')

<!-- Flash Messages -->
@if (session('msg'))
<div class="alert alert-success" role="alert">
    <p>{{ session('msg') }}</p>
</div>
@endif

<div>
    <h2>Biblioteca Let's</h2>
</div>

@endsection