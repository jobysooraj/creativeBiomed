@extends('admin.layouts.app')
@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        @include('admin.layouts.partials.top', ['pageTitle' => 'Settings'])
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title">Settings</h4>
                    </div>
                    @if($SettingsCount== 0)
                    <div class="d-flex justify-content-end m-2">
                        <a href="{{route('settings.create')}}" class="btn btn-primary">Add AboutUs</a>
                    </div>
                    @endif
                    <div class="card-body">
                        <table id="datatables-settings" class="table table-striped dt-responsive nowrap w-100" data-url="{{ route('settings.index') }}">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Logo</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Whatsapp</th>
                                    <th>Instagram</th>
                                    <th>Facebook</th>
                                    <th>location</th>
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
<script src="{{ asset('js/settings.js') }}"></script>

@endpush
