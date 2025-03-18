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
                        <h4 class="header-title">Testimonials</h4>

                    </div>
                    <div class="d-flex justify-content-end m-2">
                        <a href="{{route('testimonials.create')}}" class="btn btn-primary">Add Testimonial</a>
                    </div>
                    <div class="card-body">
                        <table id="datatables-testimonial" class="table table-striped dt-responsive nowrap w-100" data-url="{{ route('testimonials.index') }}">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Designation</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                            </tbody>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div> <!-- end row-->



    </div> <!-- container -->

</div> <!-- content -->
@endsection
@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('js/testimonial.js') }}"></script>

@endpush
