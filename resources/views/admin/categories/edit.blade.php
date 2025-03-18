@extends('admin.layouts.app')
@section('title', 'Service Category')
@section('content')
<div class="content">
    <div class="container-fluid">

        @include('admin.layouts.partials.top', ['pageTitle' => 'Edit Service Category'])

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title">Edit Service Category</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif

                                <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Category Name</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{ $category->name }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea id="description" name="description" class="form-control" rows="3">{{ $category->description }}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="image" class="form-label">Category Image</label>
                                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                        @if($category->image)
                                            <div class="mt-2">
                                                <img src="{{ asset('storage/' . $category->image) }}" alt="Category Image" width="150">
                                            </div>
                                        @endif
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update Category</button>
                                    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
