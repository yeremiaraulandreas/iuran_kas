<?= $this->extend('partials/main') ?>

<?= $this->section('content') ?>
    <?= $this->include('parts/modals')?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> Data Warga </h3>
                    <div class="float-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-block btn-primary" id="create-warga" data-toggle="modal" data-target="#modal-create-warga"><i class="fa fa-plus"></i> Tambah warga</button>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table id="data-table-warga" class="table table-striped dataTable">
                                        <thead>
                                            <tr role="row">
                                                <th>No</th>
                                                <th>NIK</th>
                                                <th>Nama Warga</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Alamat</th>
                                                <th>No Rumah</th>'
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- /.col -->
    </div>
<!-- /.row -->
<?= $this->endSection() ?>


<?= $this->section('extra-js') ?>
<script>
$(document).ready(function () {

    $.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf_token_name"]').attr('content')
	    }
	});

    var dataTablewarga = $('#data-table-warga').DataTable({
        autoWidth: false,
        serverSide : true,
        processing: true,
        order: [[1, 'asc']],
        columnDefs: [{
            orderable: false,
            targets: [0,7]
        }],

        ajax : {
            url: "<?= route_to('datatable1') ?>",
            method : 'POST'
        },

        columns: [
            {
                "data": null
            },
            {
                "data": "nik"
            },
            {
                "data": "nama"
            },
            {
               "data": function(data) {
                    switch(data.kelamin) {
                        case 'L':
                        return `<span class="right badge badge-primary">Laki-laki</span>`
                        break;
                        case 'P':
                        return `<span class="right badge badge-danger">Perempuan</span>`
                        break;
                      
                    }
                }
            },
            {
                "data": "alamat"
            },
             {
                "data": "no_rumah"
            },
            {
               "data": function(data) {
                    switch(data.status) {
                        case '1':
                        return `<span class="right badge badge-success">Aktif</span>`
                        break;
                        case '2':
                        return `<span class="right badge badge-warning">Tidak Aktif</span>`
                        break;
                     
                    }
                }
            },
            {
                "data": function(data) {
                    return `<td class="text-right py-0 align-middle">
                            <div class="btn-group btn-group-sm">
                                <button class="btn btn-primary btn-edit" data-id="${data.id_warga}"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-danger btn-delete" data-id="${data.id_warga}"><i class="fas fa-trash"></i></button>
                            </div>
                            </td>`
                }
            }
        ]
    });

    dataTablewarga.on('draw.dt', function() {
        var PageInfo = $('#data-table-warga').DataTable().page.info();
        dataTablewarga.column(0, {
            page: 'current'
        }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1 + PageInfo.start;
        });
    });

    $(document).on('click', '#btn-save-warga', function () {
        $('.text-danger').remove();
        $('.is-invalid').removeClass('is-invalid');
        var createForm = $('#form-create-warga');
        
        $.ajax({
            url: '<?= route_to('resource') ?>',
            method: 'POST',
            data: createForm.serialize()
        }).done((data, textStatus) => {
            Toast.fire({
                icon: 'success',
                title: textStatus
            })
            dataTablewarga.ajax.reload();
            $("#form-create-warga").trigger("reset");
            $("#modal-create-warga").modal('hide');

        }).fail((xhr, status, error) => {
            if (xhr.responseJSON.message) {
                Toast.fire({
                    icon: 'error',
                    title: xhr.responseJSON.message,
                });
            }

            $.each(xhr.responseJSON.messages, (elem, messages) => {
                createForm.find('select[name="' + elem + '"]').after('<p class="text-danger">' + messages + '</p>');
                createForm.find('input[name="' + elem + '"]').addClass('is-invalid').after('<p class="text-danger">' + messages + '</p>');
                createForm.find('textarea[name="' + elem + '"]').addClass('is-invalid').after('<p class="text-danger">' + messages + '</p>');
            });
        })
    })

    $(document).on('click', '.btn-edit', function (e) {
        e.preventDefault();
        $.ajax({
            url: `<?= route_to('warga/resource') ?>/${$(this).attr('data-id')}/edit`,
            method: 'GET',
            
        }).done((response) => {
            var editForm = $('#form-edit-warga');
            editForm.find('input[name="nik"]').val(response.data.nik);
            editForm.find('input[name="nama"]').val(response.data.nama);
            editForm.find('select[name="kelamin"]').val(response.data.kelamin);
            editForm.find('input[name="no_rumah"]').val(response.data.no_rumah);
            editForm.find('textarea[name="alamat"]').val(response.data.alamat);
            editForm.find('select[name="status"]').val(response.data.status);
            $("#warga_id").val(response.data.id_warga);
            $("#modal-edit-warga").modal('show');
        }).fail((error) => {
            Toast.fire({
                icon: 'error',
                title: error.responseJSON.messages.error,
            });
        })
    });

    $(document).on('click', '#btn-update-warga', function (e) {
        e.preventDefault();
        $('.text-danger').remove();
        var editForm = $('#form-edit-warga');

        $.ajax({
            url: `<?= route_to('warga/resource') ?>/${$('#warga_id').val()}`,
            method: 'PUT',
            data: editForm.serialize()
            
        }).done((data, textStatus) => {
            Toast.fire({
                icon: 'success',
                title: textStatus
            })
            dataTablewarga.ajax.reload();
            $("#form-edit-warga").trigger("reset");
            $("#modal-edit-warga").modal('hide');

        }).fail((xhr, status, error) => {
            $.each(xhr.responseJSON.messages, (elem, messages) => {
                editForm.find('select[name="' + elem + '"]').after('<p class="text-danger">' + messages + '</p>');
                editForm.find('input[name="' + elem + '"]').addClass('is-invalid').after('<p class="text-danger">' + messages + '</p>');
                editForm.find('textarea[name="' + elem + '"]').addClass('is-invalid').after('<p class="text-danger">' + messages + '</p>');
            });
        })
    });

    $(document).on('click', '.btn-delete', function (e) {
        Swal.fire({
            title: 'Apa Anda Yakin?',
            text: "Anda akan menghapus data ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Jangan!'
        })
        .then((result) => {
            if (result.value) {
                $.ajax({
                    url: `<?= route_to('warga/resource') ?>/${$(this).attr('data-id')}`,
                    method: 'DELETE',
                }).done((data, textStatus) => {
                    Toast.fire({
                        icon: 'success',
                        title: textStatus,
                    });
                    dataTablewarga.ajax.reload();
                }).fail((error) => {
                    Toast.fire({
                        icon: 'error',
                        title: error.responseJSON.messages.error,
                    });
                })
            }
        })
    });

    $('#modal-create-warga').on('hidden.bs.modal', function() {
        $(this).find('#form-create-warga')[0].reset();
        $('.text-danger').remove();
        $('.is-invalid').removeClass('is-invalid');
    });

    $('#modal-edit-warga').on('hidden.bs.modal', function() {
        $(this).find('#form-edit-permission')[0].reset();
        $('.text-danger').remove();
        $('.is-invalid').removeClass('is-invalid');
    });

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        onOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
});
</script>
<?= $this->endSection() ?>