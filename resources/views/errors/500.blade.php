
@extends('layouts.app')

@section('content')

<div class="container mt-5 text-center">

    <h1>Internal Server Error</h1>

    <p>Sorry, something went wrong while processing your request. Please try again later.</p>

    <a href="{{ route('books.index') }}" class="btn btn-primary">
        Back to the list
    </a>

</div>

@endsection
