<a href="{{ route('user.edit', $model) }}" class="btn btn-sm btn-clean btn-icon" title="Edit details">
    <i class="la la-edit"></i>
</a>

@if ($model->id != 1)
    <button href="{{ route('user.destroy', $model) }}" class="btn btn-sm btn-clean btn-icon" id="delete" title="Delete">
        <i class="la la-trash"></i>
    </button>
@endif


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

