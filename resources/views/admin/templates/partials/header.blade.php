<div id="kt_header" class="header">
    <div class="container-fluid d-flex flex-stack">
        <div class="d-flex align-items-center me-5">
            <div class="d-lg-none btn btn-icon btn-active-color-white w-30px h-30px ms-n2 me-3" id="kt_aside_toggle">
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
                        <path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
                    </svg>
                </span>
            </div>
            <img alt="Logo" src="{{ asset('assets/media/logos/logo-white.png') }}" class="h-45px " />
        </div>
        <div class="d-flex align-items-center flex-shrink-0">
            <div class="d-flex align-items-center ms-1" id="kt_header_user_menu_toggle">
                <div class="btn btn-flex align-items-center bg-hover-white bg-hover-opacity-10 py-2 px-2 px-md-3" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                    <div class="d-none d-md-flex flex-column align-items-end justify-content-center me-2 me-md-4">
                        <span class="text-muted fs-8 fw-bold lh-1 mb-1">{{ Auth::user()->name }}</span>
                        <span class="text-white fs-8 fw-bolder lh-1">{{ Auth::user()->currentTeam->name }}</span>
                    </div>
                    <div class="symbol symbol-30px symbol-md-40px">
                        @if (Auth::user()->profile_photo_path == null)
                            <img alt="Logo" src="{{ asset( 'assets/media/avatars/default.svg' ) }}" />
                        @else
                            <img alt="Logo" src="{{ asset( Auth::user()->profile_photo_path ) }}" />
                        @endif
                    </div>
                </div>
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
                    <div class="menu-item px-3">
                        <div class="menu-content d-flex align-items-center px-3">
                            <div class="symbol symbol-50px me-5">
                                @if (Auth::user()->profile_photo_path == null)
                                    <img alt="Logo" src="{{ asset( 'assets/media/avatars/default.svg' ) }}" />
                                @else
                                    <img alt="Logo" src="{{ asset( Auth::user()->profile_photo_path ) }}" />
                                @endif
                            </div>
                            <div class="d-flex flex-column">
                                <div class="fw-bolder d-flex align-items-center fs-5">{{ Auth::user()->name }}
                                <span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">{{ Auth::user()->currentTeam->name }}</span></div>
                                <a href="#" class="fw-bold text-muted text-hover-primary fs-7">{{ Auth::user()->email }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="separator my-2"></div>

                    <div class="menu-item px-5 my-1">
                        <a href="{{route('profile')}}" class="menu-link px-5">Account Settings</a>
                    </div>
                    <div class="menu-item px-5"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <a href="{{ route('logout') }}" class="menu-link px-5">
                            Sign Out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
