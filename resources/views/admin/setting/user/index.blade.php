@extends('admin.templates.default')

@section('content')

    <div class="content flex-column-fluid" id="kt_content">
        <div class="card">
            <div class="card mb-5 mb-xl-8">
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">{{$title}}</span>
                        <span class="text-muted mt-1 fw-bold fs-7">{{$subtitle ?? ''}}</span>
                    </h3>
                    <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Click to add a user">
                        <a href="#" class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal" data-bs-target="#modal-form">
                        <span class="svg-icon svg-icon-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                                <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black" />
                            </svg>
                        </span>
                        New {{$title ?? ''}}</a>
                    </div>
                </div>
                <div class="card-body py-3">
                    <div class="table-responsive">
                        <table id="kt_datatable" class="table align-middle table-striped gy-5 gs-7 border rounded">
                            <thead>
                                <tr class="fw-bolder text-muted">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.setting.user.modal')

    <form action="" method="post" id="deleteForm">
        @csrf
        @method("DELETE")
        <input type="submit" value="Hapus" class="btn btn-danger" style="display: none">
    </form>

@endsection

@section('styles')

@endsection

@push('scripts')

    <script>
        var element = document.getElementById('menu-setting');
            element.classList.add('show');
        var element2 = document.getElementById('menu-setting-user');
            element2.classList.add('active');
    </script>

    <script>
        "use strict";
        var KTDatatablesBasicBasic = function() {

        var initTable1 = function() {
            var table = $('#kt_datatable');
            table.DataTable({
                searchDelay: 500,
                processing: true,
                serverSide: true,
                ajax: '{{ route('data.user') }}',
                columns: [
                    {data:'DT_RowIndex', orderable: false, searchable: false},
                    {data:'name'},
                    {data:'email'},
                    {data:'role'},
                    {data:'status'},
                    {data:'action', responsivePriority: -1},
                ],
                columnDefs: [
                    {
                        targets: 0,
                        className: 'dt-center',
                        width: '30px',
                    },
                    {
                        targets: [3,4,5],
                        className: "dt-center",
                    },
                ],
                dom:
                "<'row'" +
                "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
                "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
                ">" +
                "<'table-responsive'tr>" +
                "<'row'" +
                "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                ">",
            });

        };

        return {
            //main function to initiate the module
            init: function() {
                initTable1();
            }
        };
        }();

        jQuery(document).ready(function() {
        KTDatatablesBasicBasic.init();
        });
    </script>
    <script>
        // Define form element
        const form = document.getElementById('modal_form_form');
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
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
                    'password': {
                        validators: {
                            notEmpty: {
                                message: 'Silahkan isi password!'
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

@endpush
