<!DOCTYPE html>
<html lang="en">
    @include('admin.templates.partials.head')

	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed">
		<div class="d-flex flex-column flex-root">
			<div class="d-flex flex-column flex-column-fluid">
				<div class="d-flex flex-column flex-column-fluid text-center p-10 py-lg-15">
					<a href="#" class="mb-10 pt-lg-10">
						<img alt="Logo" src="{{asset('assets/media/logos/logo-min.png')}}" class="h-40px mb-5" />
					</a>
					<div class="pt-lg-10 mb-10">
						<h1 class="fw-bolder fs-2qx text-gray-800 mb-10">
                            @yield('title')
                        </h1>
						<div class="fw-bold fs-3 text-muted mb-15">
                            @yield('message')
                        </div>
						<div class="pt-8 text-center"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <a href="{{ route('logout') }}" class="btn btn-lg btn-dark fw-bolder">
                                Sign Out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
					</div>
					<div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px" style="background-image: url({{asset('assets/media/illustrations/maintenance.png')}}"></div>
				</div>
			</div>
		</div>

        @include('admin.templates.partials.script')

	</body>
</html>
