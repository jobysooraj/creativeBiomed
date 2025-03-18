@extends('admin.layouts.app')
@section('title', 'Service Category')
@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        @include('admin.layouts.partials.top', ['pageTitle' => 'Category'])
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title">Category</h4>
                    </div>

                    <div class="d-flex justify-content-end m-2">
                        <a href="{{route('categories.create')}}" class="btn btn-primary">Add Category</a>
                    </div>

                    <div class="card-body">
                        <table id="datatables-categories" class="table table-striped dt-responsive nowrap w-100" data-url="{{ route('categories.index') }}">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Description</th>
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
<script src="{{ asset('js/category.js') }}"></script>

@endpush
