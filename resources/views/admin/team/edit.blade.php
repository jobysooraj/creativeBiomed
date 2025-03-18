@extends('admin.layouts.app')
@section('title', 'Team')

@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        @include('admin.layouts.partials.top', ['pageTitle' => 'Edit Team Member'])
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title">Edit Team Member</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif

                                <!-- Form to edit an existing team member -->
                                <form action="{{ route('teams.update', $teamMember->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT') <!-- Method spoofing for PUT request -->

                                    <!-- Name input -->
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $teamMember->name) }}" required>
                                        @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Designation input -->
                                    <div class="mb-3">
                                        <label for="designation" class="form-label">Designation</label>
                                        <input type="text" id="designation" name="designation" class="form-control @error('designation') is-invalid @enderror" value="{{ old('designation', $teamMember->designation) }}" required>
                                        @error('designation')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Bio textarea (optional) -->
                                    <div class="mb-3">
                                        <label for="bio" class="form-label">Bio</label>
                                        <textarea class="form-control @error('bio') is-invalid @enderror" id="bio" name="bio">{{ old('bio', $teamMember->bio) }}</textarea>
                                        @error('bio')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Email input -->
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $teamMember->email) }}" required>
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Phone input (optional) -->
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $teamMember->phone) }}">
                                        @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Image input (optional) -->
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                                        @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Display current image if available -->
                                    @if($teamMember->image)
                                    <div class="mb-3">
                                        <label for="current_image" class="form-label">Current Image</label>
                                        <br>
                                        <img src="{{ asset('storage/'.$teamMember->image) }}" alt="Team Member Image" width="150" height="150">
                                    </div>
                                    @endif

                                    <!-- Submit button -->
                                    <button type="submit" class="btn btn-primary">Update</button>
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
<!-- Add any additional JavaScript for form validation or UI improvements -->
@endpush
