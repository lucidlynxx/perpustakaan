    {{-- Care about people's approval and you will be their prisoner. --}}
    <a class="btn btn-danger btn-sm" wire:click="$emit('triggerDelete', {{ $peminjamanId }})">Hapus</a>

@push('peminjamanAlert')
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        @this.on('triggerDelete', peminjamanId => {
            Swal.fire({
                title: 'Anda Yakin?',
                text: 'Data peminjaman akan dihapus',
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#aaa',
                confirmButtonText: 'Ya Hapus!'
            }).then((result) => {
         //if user clicks on delete
                if (result.value) {
             // calling destroy method to delete
                    @this.call('destroy', peminjamanId)
             // success response
                    Swal.fire({
                        title: 'Hapus Data Sukses!',
                        text: 'Data peminjaman telah dihapus', 
                        icon: 'success',
                        showConfirmButton: true,
                        timer: 2500
                    });
                } else {
                    Swal.fire({
                        title: 'Hapus Data dibatalkan!',
                        text: 'Data peminjaman tidak dihapus',
                        icon: 'error',
                        timer: 2500
                    });
                }
            });
        });
    })
</script>
@endpush    
