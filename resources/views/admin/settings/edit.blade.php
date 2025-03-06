@extends('admin.layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        @include('admin.layouts.partials.top', ['pageTitle' => 'Edit Settings'])

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title">Edit Settings</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif
                                <form action="{{ route('settings.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{ $setting->name }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="company_address" class="form-label">Company Address</label>
                                        <input type="text" id="company_address" name="company_address" class="form-control" value="{{ $setting->company_address }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" id="email" name="email" class="form-control" value="{{ $setting->email }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" id="phone" name="phone" class="form-control" value="{{ $setting->phone }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="location" class="form-label">Location</label>
                                        <input type="text" id="location" name="location" class="form-control" value="{{ $setting->location }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="logo_image" class="form-label">Logo Image</label>
                                        <input type="file" class="form-control" id="logo_image" name="logo_image" accept="image/*">
                                        @if($setting->logo_image)
                                            <img src="{{ asset('storage/' . $setting->logo_image) }}" alt="Logo" class="img-thumbnail mt-2" width="100">
                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        <label for="instagram_id" class="form-label">Instagram ID</label>
                                        <input type="text" id="instagram_id" name="instagram_id" class="form-control" value="{{ $setting->instagram_id }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="facebook_id" class="form-label">Facebook ID</label>
                                        <input type="text" id="facebook_id" name="facebook_id" class="form-control" value="{{ $setting->facebook_id }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="whatsapp_id" class="form-label">WhatsApp ID</label>
                                        <input type="text" id="whatsapp_id" name="whatsapp_id" class="form-control" value="{{ $setting->whatsapp_id }}">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update Settings</button>
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
