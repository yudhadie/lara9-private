@extends('admin.templates.default')

@section('content')

    <div class="content flex-column-fluid mb-3">
        <div class="card">
            <div class="card mb-5 mb-xl-8">
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">{{$title}}</span>
                        <span class="text-muted mt-1 fw-bold fs-7">{{$subtitle ?? ''}}</span>
                    </h3>
                </div>
                <div class="card-body py-3">
                    <form id="modal_form_form" class="form" action="{{route('image.update')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }} {{ method_field('put') }}
                        <div class="row text-center">
                            <div class="col-lg-6 d-flex flex-column fv-row mb-8">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span>Public</span>
                                </label>
                                @if ( $image->public == null )
                                    <img class="mw-100 mh-300px card-rounded-bottom" style="object-fit: cover" alt="no-image" src="{{ asset('assets/media/no-image.jpg') }}"/>
                                    <input type="file" name="public" class="form-control form-control-lg form-control-solid mt-3" value="{{ $image->public }}" />
                                @else
                                    <img class="mw-100 mh-300px card-rounded-bottom" style="object-fit: cover" alt="image" src="{{ asset($image->public) }}"/>
                                    <button href="{{ route('image.deletepub') }}" id="delete" class="btn btn-danger my-2">Delete</button>
                                @endif
                            </div>
                            <div class="col-lg-6 d-flex flex-column fv-row mb-8">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span>Private</span>
                                </label>
                                @if ( $image->private == null )
                                    <img class="mw-100 mh-300px card-rounded-bottom" style="object-fit: cover" alt="no-image" src="{{ asset('assets/media/no-image.jpg') }}"/>
                                    <input type="file" name="private" class="form-control form-control-lg form-control-solid mt-3" value="{{ $image->private }}" />
                                @else
                                    <img class="mw-100 mh-300px card-rounded-bottom" alt="image" src="{{ asset($image->private) }}"/>
                                    <button href="{{ route('image.deletepri') }}" id="delete" class="btn btn-danger my-2">Delete</button>
                                @endif
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="modal_form_submit" class="btn btn-primary">
                                <span class="indicator-label">Submit</span>
                                <span class="indicator-progress">
                                    Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <form action="" method="post" id="deleteForm">
        @csrf
        @method("put")
        <input type="submit" value="Hapus" class="btn btn-danger" style="display: none">
    </form>

@endsection

@push('scripts')

    <script>
        var element = document.getElementById('menu_dashboard');
            element.classList.add('active');
    </script>

    <script>
        $('button#delete').on('click',function(e){
            e.preventDefault();
            var href = $(this).attr('href');
            Swal.fire({
                title: 'Apakah kamu yakin hapus data ini?',
                text: "Data yang sudah di hapus tidak bisa di Kembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus saja!'
                }).then((result) => {
                    if (result.value) {
                        document.getElementById('deleteForm').action = href;
                        document.getElementById('deleteForm').submit();
                        Swal.fire(
                        'Terhapus!!',
                        'Data kamu berhasil di hapus',
                        'success'
                    )
                }
            })
        })
    </script>

@endpush
