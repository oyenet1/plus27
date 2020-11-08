@extends('layouts.profile')
@section('title', Auth::user()->name ?? 'Admin')
@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">BOOKs</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Book</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                    <a href="{{ route('book.index') }}" class="btn btn-sm btn-outline-neutral"> <i class="fa fa-arrow-circle-left"
                                aria-hidden="true"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        {{-- books --}}
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <form action="{{ route('book.update', $book->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <fieldset class="m-2 p-2">
                        <legend class="pl-2 text-primary">Edit &nbsp;<span class="text-dark">({{ $book->name }}) </span></legend>
                            <div class="form-group">
                                <label for="name" class="m-0 p-0">Book Name <span class="text-danger w-100 small">*</span> </label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Book Name" name="name"
                                        value="{{ old('name') ?? $book->name }}">
                                    @error('name')
                                        <small class="text-danger w-100 small"> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>
                            {{-- author --}}
                            <label for="email" class="m-0 p-0">Author<span class="text-danger w-100 small">*</span>
                            </label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" placeholder="Author" name="author"
                                    value="{{ old('author') ?? $book->price }}">
                                @error('author')
                                    <small class="text-danger w-100 small"> {{ $message }} </small>
                                @enderror
                            </div>
                            {{-- sales --}}
                            <label for="sales" class="m-0 p-0">Number of Sales<span class="text-danger w-100 small">*</span> </label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        No:
                                    </span>
                                </div>
                                <input type="number" class="form-control" placeholder="Number of sales" name="sales"
                                    value="{{ old('sales') ?? $book->sales }}">
                                @error('sales')
                                    <small class="text-danger w-100 small"> {{ $message }} </small>
                                @enderror
                            </div>

                            {{-- book cover --}}
                            <label for="cover" class="m-0 p-0">Book cover<span class="text-danger w-100 small">*</span> </label>
                            <div class="form-group custom-file mb-3">
                                <input type="file" class="form-control custom-file-input" name="cover"
                                    value="{{ old('cover') ?? $book->cover }}"><label class="custom-file-label" for="customFile">Choose
                                    Book cover</label>
                                @error('cover')
                                    <small class="text-danger w-100 small"> {{ $message }} </small>
                                @enderror
                            </div>

                            {{-- company price --}}
                            <label for="price" class="m-0 p-0">Price<span class="text-danger w-100 small">*</span> </label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        &#8358
                                    </span>
                                </div>
                                <input type="number" class="form-control" step=".01" placeholder="Book price " name="price"
                                    value="{{ old('price') ?? $book->price }}">
                                @error('price')
                                    <small class="text-danger w-100 small"> {{ $message }} </small>
                                @enderror
                            </div>
                        </fieldset>

                        <button type="submit" class="btn btn-outline-primary m-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('session.footer')
    @endsection
