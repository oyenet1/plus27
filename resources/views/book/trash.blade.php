@extends('layouts.profile')
@section('title', Auth::user()->name ?? 'Admin')
@section('content')

    @if (session('success'))
        <div class="toast alert-top alert-success">
            <div class="toast-body">
                <strong> <i class="fa fa-check-circle" aria-hidden="true"></i> </strong> {{ session('success') }}
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
            </div>
        </div>
    @endif
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">TRASHED BOOKs</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Trashed Book</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{ route('book.index') }}" class="btn btn-sm btn-dark"> <i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        {{-- books --}}
        <!-- Dark table -->
        <div class="row">
            <div class="col">
                <div class="card bg-default shadow">
                    <div class="card-header bg-transparent border-0">
                        <h3 class="text-white mb-0">Achieved Book</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-dark table-flush">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col" class="sort" data-sort="name">Book Cover and title</th>
                                    <th scope="col" class="sort" data-sort="status">Author</th>
                                    <th scope="col">Price</th>
                                    <th scope="col" class="sort" data-sort="completion">No of Sales</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @forelse ($books as $book)
                                    <tr>
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                <a href="#" class="avatar rounded-circle mr-3">
                                                    <img alt="{{ $book->name }}"
                                                        src="{{ asset('image/book/' . $book->cover) }}">
                                                </a>
                                                <div class="media-body">
                                                    <span class="name mb-0 text-sm text-capitalize">{{ $book->name }}</span>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="budget">
                                            {{ $book->author }}
                                        </td>
                                        <td>
                                            <span class="badge badge-dot mr-4">
                                                <i class="bg-success"></i>
                                                <span class="status">&#8358 {{ $book->price }}</span>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge badge-dot mr-4">
                                                <i class="bg-success"></i>
                                                <span class="status">{{ $book->sales }}</span>
                                            </span>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown d-none">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>
                                            <h3 class="text-danger">No Achieved book for now</h3>
                                        </td>
                                    </tr>

                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @include('session.footer')
    </div>
@endsection
