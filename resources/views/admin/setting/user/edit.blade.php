@extends('admin.templates.default')

@section('content')

    <div class="content flex-column-fluid" id="kt_content">
        <div class="card mb-5 mb-xl-10">
            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                <div class="card-title m-0">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">{{$title}}</span>
                        <span class="text-muted mt-1 fw-bold fs-7">{{$subtitle ?? ''}}</span>
                    </h3>
                </div>
            </div>
            <div id="kt_account_settings_profile_details" class="collapse show">
                <form id="modal_form_form"  class="form" action="{{ route('user.update', $user) }}" method="post"enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="card-body border-top p-9">
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Nama</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-6 fv-row">
                                        <input type="text" name="name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{ $user->name }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Email</label>
                            <div class="col-lg-8 fv-row">
                                <input type="email" name="email" class="form-control form-control-lg form-control-solid" value="{{ $user->email }}" />
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label fw-bold fs-6">
                                <span class="required">Role</span>
                            </label>
                            <div class="col-lg-8 fv-row">
                                <select name="current_team_id" aria-label="" data-control="select2" data-placeholder="Pilih Role..." class="form-select form-select-solid form-select-lg fw-bold">
                                    @foreach ($datateam as $team)
                                        @if ($team->id == $user->current_team_id)
                                            <option selected value="{{$team->id}}">{{$team->name}}</option>
                                        @else
                                            <option value="{{$team->id}}">{{$team->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label fw-bold fs-6">
                                <span class="required">Status</span>
                            </label>
                            <div class="col-lg-8 fv-row">
                                <select name="active" data-control="select2" data-placeholder="Pilih Status..." class="form-select form-select-solid form-select-lg fw-bold">
                                    @if ($user->active == 1)
                                        <option selected value="1">Active</option>
                                        <option value="2">Inactive</option>
                                    @else
                                        <option value="1">Active</option>
                                        <option selected value="2">Inactive</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label fw-bold fs-6">Photo Profile</label>
                            <div class="col-lg-8 text-center">
                                @if ( $user->profile_photo_path == null )
                                    <img class="mw-100 mh-300px card-rounded-bottom" alt="" src="{{ asset('assets/media/avatars/default.svg') }}"/>
                                @else
                                    <img class="mw-100 mh-300px card-rounded-bottom" alt="" src="{{ asset($user->profile_photo_path) }}"/>
                                @endif
                                <input type="file" name="profile_photo_path" class="form-control form-control-lg form-control-solid mt-3" value="{{ $user->profile_photo_path }}" />
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <a class="btn btn-light btn-active-light-primary me-2" href="{{route('user.index')}}">Discard</a>
                        <button type="submit" id="modal_form_submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card mb-5 mb-xl-10">
            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_modal_form_password" aria-expanded="true" aria-controls="kt_account_modal_form_password">
                <div class="card-title m-0">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">Reset Password</span>
                        <span class="text-muted mt-1 fw-bold fs-7">Resert password user</span>
                    </h3>
                </div>
            </div>
            <div id="kt_account_modal_form_password" class="collapse show">
                <form id="modal_form_password"  class="form" action="{{ route('user.reset', $user) }}" method="post">
                    @csrf
                    @method("PUT")
                    <div class="card-body border-top p-9">
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">New Password</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-6 fv-row">
                                        <input type="password" name="password" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="submit" id="modal_form_submit2" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        var element = document.getElementById('menu-setting');
            element.classList.add('show');
        var element2 = document.getElementById('menu-setting-user');
            element2.classList.add('active');
    </script>
    <script>
        const form = document.getElementById('modal_form_form');
        var validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    'name': {
                        validators: {
                            notEmpty: {
                                message: 'Silahkan isi nama!'
                            }
                        }
                    },
                    'email': {
                        validators: {
                            notEmpty: {
                                message: 'Silahkan isi dengan format email!'
                            }
                        }
                    },
                    'current_team_id': {
                        validators: {
                            notEmpty: {
                                message: 'Silahkan Pilih Role!'
                            }
                        }
                    },
                },

                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        );

        // Submit button handler
        const submitButton = document.getElementById('modal_form_submit');
        submitButton.addEventListener('click', function (e) {
            e.preventDefault();
            if (validator) {
                validator.validate().then(function (status) {
                    console.log('validated!');
                    if (status == 'Valid') {
                        submitButton.setAttribute('data-kt-indicator', 'on');
                        submitButton.disabled = true;
                        form.submit();
                    }
                });
            }
        });
    </script>

    <script>
        const form2 = document.getElementById('modal_form_password');
        var validator2 = FormValidation.formValidation(
            form2,
            {
                fields: {
                    'password': {
                        validators: {
                            notEmpty: {
                                message: 'Silahkan isi password!'
                            }
                        }
                    },
                },

                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        );

        // Submit button handler
        const submitButton2 = document.getElementById('modal_form_submit2');
        submitButton2.addEventListener('click', function (e) {
            e.preventDefault();
            if (validator2) {
                validator2.validate().then(function (status) {
                    console.log('validated2!');
                    if (status == 'Valid') {
                        submitButton2.setAttribute('data-kt-indicator', 'on');
                        submitButton2.disabled = true;
                        form2.submit();
                    }
                });
            }
        });
    </script>

@endpush
