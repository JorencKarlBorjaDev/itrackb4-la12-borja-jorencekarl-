
@extends('layouts.app')

@section('title', 'Books')

@section('content')

    <div class="card border-0 shadow-sm rounded-3">

        <div class="card-body p-4">

            <h2 class="h5 text-muted text-uppercase fw-semibold mb-1">Books List</h2>

            <h2 class="text-secondary small mb-4">Prepared by: Jorence Karl Borja</h2>

            <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">+ Add Book</a>

            <p class="mb-3">
                <strong class="me-2 text-dark">Genre:</strong>

                @foreach ($genres as $genreOption)
                    <a href="{{ route('books.index', ['genre_id' => $genreOption->id, 'year' => $year]) }}"
                       class="btn btn-sm btn-outline-primary rounded-pill me-1">
                        {{ $genreOption->name }}
                    </a>
                @endforeach
            </p>

            <p class="mb-3">
                <strong class="me-2 text-dark">Year:</strong>

                <a href="{{ route('books.index', ['genre_id' => $genreId, 'year' => 1861]) }}" class="btn btn-sm btn-outline-secondary rounded-pill me-1">1861</a>
                <a href="{{ route('books.index', ['genre_id' => $genreId, 'year' => 1939]) }}" class="btn btn-sm btn-outline-secondary rounded-pill me-1">1939</a>
                <a href="{{ route('books.index', ['genre_id' => $genreId, 'year' => 2012]) }}" class="btn btn-sm btn-outline-secondary rounded-pill me-1">2012</a>
                <a href="{{ route('books.index', ['genre_id' => $genreId, 'year' => 1812]) }}" class="btn btn-sm btn-outline-secondary rounded-pill me-1">1812</a>
                <a href="{{ route('books.index', ['genre_id' => $genreId, 'year' => 1941]) }}" class="btn btn-sm btn-outline-secondary rounded-pill me-1">1941</a>
                <a href="{{ route('books.index', ['genre_id' => $genreId, 'year' => 1869]) }}" class="btn btn-sm btn-outline-secondary rounded-pill">1869</a>
            </p>

            <p class="mb-4">
                <a href="{{ route('books.index') }}" class="btn btn-sm btn-link text-danger text-decoration-none p-0">
                    Clear filters
                </a>
            </p>

            <p class="bg-light p-3 rounded-3 border mb-4">
                <strong class="text-dark me-2">Showing:</strong>

                @if ($genreId)
                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle">Genre = {{ $genres->firstWhere('id', $genreId)?->name ?? 'None' }}</span>
                @else
                    <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle">Genre = None</span>
                @endif

                ,

                @if ($year)
                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle">Year = {{ $year }}</span>
                @else
                    <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle">Year = None</span>
                @endif
            </p>

            <div class="table-responsive">
                <table class="table table-hover align-middle">

                    <thead class="table-light">
                        <tr>
                            <th scope="col" class="py-3">#</th>
                            <th scope="col" class="py-3">Title</th>
                            <th scope="col" class="py-3">Author</th>
                            <th scope="col" class="py-3">Year</th>
                            <th scope="col" class="py-3">Genre</th>
                            <th scope="col" class="py-3">Availability</th>
                            <th scope="col" class="py-3">Actions</th>
                            

                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($books as $book)

                            <tr>

                                <td class="fw-semibold text-muted">
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    <a href="{{ route('books.show', ['book' => $book->id]) }}" class="text-decoration-none fw-medium link-primary">
                                        {{ $book->title }}
                                    </a>
                                </td>

                                <td class="text-secondary">
                                    {{ $book->author }}
                                </td>

                                <td class="text-secondary">
                                    {{ $book->year }}
                                </td>

                                <td>
                                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3 py-2">
                                        {{ $book->genre?->name ?? 'N/A' }}
                                    </span>
                                </td>

                                <td>
                                    @if ($book->is_available)
                                        <span class="badge bg-success">Available</span>
                                    @else
                                        <span class="badge bg-danger">Not Available</span>
                                    @endif
                                </td>

                                <td>
                                    <div class="d-flex gap-1">

                                          <a href="{{ route('books.edit', $book->id) }}"
                                               class="btn btn-warning btn-sm">
                                            Edit
                                         </a>


                                    <form action="{{ route('books.destroy', $book->id) }}" method="POST"
                                        onsubmit="return confirm('Delete this record?')">

                                    @csrf
                                    @method('DELETE')

                                         <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="7" class="text-center py-5 text-muted">
                                    No books are currently available.
                                </td>
                            </tr>

                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>

    </div>

    

@endsection
