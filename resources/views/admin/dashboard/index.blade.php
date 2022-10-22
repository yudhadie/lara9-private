@extends('admin.templates.default')

@section('content')

    <div class="content flex-column-fluid" id="kt_content">

        <div class="row">
            <div class="col-lg-5 mb-5 mb-lg-10">
                <div class="card h-150px bgi-no-repeat bgi-size-cover h-150px mb-5 mb-lg-10" style="background-image:url({{asset('assets/media/bg-dashboard.jpg')}})">
                    <div class="card-body p-6">
                        <div class="text-black text-hover-primary fw-bolder fs-2">
                            Selamat Datang, <br>
                            {{Auth::user()->name}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@push('scripts')

    <script>
        var element = document.getElementById('menu_dashboard');
            element.classList.add('active');
    </script>

@endpush
