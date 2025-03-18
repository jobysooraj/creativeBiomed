@extends('admin.layouts.app')
@section('title', 'About Us')

@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        @include('admin.layouts.partials.top', ['pageTitle' => 'About Us'])
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title">About Us</h4>

                    </div>
                    @if($countAboutUs== 0)
                    <div class="d-flex justify-content-end m-2">
                        <a href="{{route('aboutuses.create')}}" class="btn btn-primary">Add AboutUs</a>
                    </div>
                    @endif
                    <div class="card-body">
                        <table id="datatables-aboutus" class="table table-striped dt-responsive nowrap w-100" data-url="{{ route('aboutuses.index') }}">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Title</th>
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
<script src="{{ asset('js/aboutus.js') }}"></script>

@endpush
