@extends('admin.layouts.app')
@section('title', 'Portfolio')
@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        @include('admin.layouts.partials.top', ['pageTitle' => 'Edit Portfolio'])
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title">Edit Portfolio</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('portfolios.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" id="title" value="{{ $portfolio->title }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="category_id" class="form-label">Category</label>
                                <select id="category_id" name="category_id" class="form-control" required>
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $portfolio->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" class="form-control" id="description" rows="4">{{ $portfolio->description }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" name="image" class="form-control" id="image">
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' .  $portfolio->image) }}" alt="Current Image" width="150">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Portfolio</button>
                            <a href="{{ route('portfolios.index') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div> <!-- end card body -->
                </div> <!-- end card -->
            </div><!-- end col -->
        </div> <!-- end row -->

    </div> <!-- container -->

</div> <!-- content -->
@endsection
