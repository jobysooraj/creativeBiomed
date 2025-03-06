<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0"> @foreach ($breadcrumbs as $breadcrumb)

                    <li class="breadcrumb-item"><a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['name'] }}</a></li>
                    {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Testimonials</a></li>
                    <li class="breadcrumb-item active">List</li> --}}
                    @endforeach
                </ol>
            </div>
            <h4 class="page-title"> {{ $pageTitle ?? 'Dashboard' }}</h4>
        </div>
    </div>
</div>
