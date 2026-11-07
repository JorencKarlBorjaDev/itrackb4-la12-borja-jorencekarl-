
@extends('layouts.app')

@section('content')

<div class="container mt-5 text-center">

    <h1>Page not found</h1>

    <p>The page you are looking for does not exist or may have been moved.</p>

    <a href="{{ route('books.index') }}" class="btn btn-primary">
        Back to the list
    </a>

</div>

@endsection
