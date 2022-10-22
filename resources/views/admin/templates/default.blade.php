<!DOCTYPE html>
<html lang="en">
    @include('admin.templates.partials.head')

	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed">
		<div class="d-flex flex-column flex-root">
			<div class="page d-flex flex-row flex-column-fluid">
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                    @include('admin.templates.partials.header')
					<div class="d-flex flex-column-fluid">
                        @include('admin.templates.partials.sidebar')
						<div class="d-flex flex-column flex-column-fluid container-fluid">
                            @include('admin.templates.partials.breadcrumb')
                            @include('admin.templates.partials.head-alert')

                                @yield('content')

                            @include('admin.templates.partials.footer')
						</div>
					</div>
				</div>
			</div>
		</div>

        @include('admin.templates.partials.script')
        @include('admin.templates.partials.alert')

	</body>
</html>

