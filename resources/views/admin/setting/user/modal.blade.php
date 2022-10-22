<div class="modal fade" id="modal-form" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content rounded">
            <div class="modal-header pb-0 border-0 justify-content-end">
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                <form id="modal_form_form" class="form" action="{{ route('user.store') }}" method="post" >
                    {{ csrf_field() }} {{ method_field('POST') }}
                    <div class="mb-13 text-center">
                        <h1 class="mb-3">Add {{$tittle ?? ''}}</h1>
                    </div>
                    <div class="d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Nama</span>
                        </label>
                        <input type="text" class="form-control form-control-solid" placeholder="" name="name" />
                    </div>
                    <div class="row g-9 mb-8">
                        <div class="col-md-6 fv-row">
                            <label class="required fs-6 fw-bold mb-2">Email</label>
                            <input type="email" class="form-control form-control-solid" placeholder="" name="email" />
                        </div>
                        <div class="col-md-6 fv-row">
                            <label class="required fs-6 fw-bold mb-2">Password</label>
                            <input type="password" class="form-control form-control-solid" placeholder="" name="password" />
                        </div>
                    </div>
                    <div class="d-flex flex-column mb-15 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Role</span>
                        </label>
                        <div class="col-lg-8 fv-row">
                            <select name="current_team_id" data-control="select2" data-placeholder="Pilih Role..." class="form-select form-select-solid form-select-lg fw-bold">
                                <option value="">Select a Roles...</option>
                                @foreach ($datateam as $team)
                                    <option value="{{$team->id}}">{{$team->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal"> Close </button>
                        <button type="submit" id="modal_form_submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


