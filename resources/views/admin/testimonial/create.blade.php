@extends('admin.layouts.app')
@section('title', 'Testimonials')

@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        @include('admin.layouts.partials.top', ['pageTitle' => 'Testimonials'])
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title">Create Testimonial</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif

                                <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data"> @csrf

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" id="name" name="name" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="designation" class="form-label">Designation</label>
                                        <input type="text" id="designation" name="designation" class="form-control" placeholder="Designation" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="message" class="form-label">Message</label>
                                        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>

                                        <select class="form-select mb-3" name="status">
                                            <option value="0" selected>Pending</option>
                                            <option value="approved">Approved</option>
                                            <option value="rejected">Rejected</option>>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Category Image</label>
                                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                    </div>


                                    <button type="submit" class="btn btn-primary">Submit Testimonial</button>
                                </form>
                            </div> <!-- end col -->

                        </div>
                        <!-- end row-->
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div><!-- end col -->
        </div><!-- end row -->




    </div> <!-- container -->

</div> <!-- content -->
@endsection
@push('scripts')

@endpush
