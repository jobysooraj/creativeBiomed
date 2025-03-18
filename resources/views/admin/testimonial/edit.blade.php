@extends('admin.layouts.app')
@section('title', 'Testimonials')

@section('content')
<div class="content">
    <div class="container-fluid">

        @include('admin.layouts.partials.top', ['pageTitle' => 'Edit Testimonial'])

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title">Edit Testimonial</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif

                                <form action="{{ route('testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{ $testimonial->name }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" id="email" name="email" class="form-control" value="{{ $testimonial->email }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="designation" class="form-label">Designation</label>
                                        <input type="designation" id="designation" name="designation" value="{{ $testimonial->designation }}" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="message" class="form-label">Message</label>
                                        <textarea class="form-control" id="message" name="message" rows="5" required>{{ $testimonial->message }}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select mb-3" name="status">
                                            <option value="pending" {{ $testimonial->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="approved" {{ $testimonial->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                            <option value="rejected" {{ $testimonial->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="image" class="form-label"> Image</label>
                                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                        @if($testimonial->image)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $testimonial->image) }}" alt="Image" width="150">
                                        </div>
                                        @endif
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update Testimonial</button>
                                    <a href="{{ route('testimonials.index') }}" class="btn btn-secondary">Cancel</a>
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

@endpush
