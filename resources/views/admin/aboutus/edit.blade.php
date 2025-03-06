@extends('admin.layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">

        @include('admin.layouts.partials.top', ['pageTitle' => 'Edit About Us'])

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title">Edit About Us</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif

                                <form action="{{ route('aboutuses.update', $aboutus->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <!-- Title Field -->
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $aboutus->title) }}" required>
                                    </div>

                                    <!-- Description Field -->
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="summernote" id="description" name="description" rows="5" required>{{ old('description', $aboutus->description) }}</textarea>
                                    </div>

                                    <!-- Image Upload Field -->
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                        @if($aboutus->image)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $aboutus->image) }}" alt="Current Image" class="img-thumbnail" width="100">
                                        </div>
                                        @endif
                                    </div>

                                    <!-- Submit and Cancel Buttons -->
                                    <button type="submit" class="btn btn-primary">Update About Us</button>
                                    <a href="{{ route('aboutuses.index') }}" class="btn btn-secondary">Cancel</a>
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

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 200, // You can adjust the height
            tabsize: 2
            , toolbar: [
                ['style', ['bold', 'italic', 'underline']]
                , ['font', ['strikethrough', 'superscript', 'subscript']]
                , ['para', ['ul', 'ol', 'paragraph']]
                , ['insert', ['link']]
                , ['view', ['fullscreen', 'codeview']]
            , ]
        });
    });

</script>
@endpush
