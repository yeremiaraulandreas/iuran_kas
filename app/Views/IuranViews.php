<?= $this->extend('partials/main') ?>

<?= $this->section('content') ?>
    <?= $this->include('parts/modals')?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> Data iuran </h3>
                    <div class="float-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-block btn-primary" id="create-iuran" data-toggle="modal" data-target="#modal-create-iuran"><i class="fa fa-plus"></i> Tambah iuran</button>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table id="data-table-iuran" class="table table-striped dataTable">
                                        <thead>
                                            <tr role="row">
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Tanggal</th>
                                                <th>Bulan</th>
                                                <th>Tahun</th>
                                                <th>Jumlah</th>
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

    var dataTableiuran = $('#data-table-iuran').DataTable({
        autoWidth: false,
        serverSide : true,
        processing: true,
        order: [[1, 'asc']],
        columnDefs: [{
            orderable: false,
            targets: [0,6]
        }],

        ajax : {
            url: "<?= route_to('datatable2') ?>",
            method : 'POST'
        },

        columns: [
            {
                "data": null
            },
            {
                "data": "nama"
            },
            {
                "data": "tanggal"
            },
            {
                "data": "bulan"
            },
            {
                "data": "tahun"
            },
            {
                "data": "jumlah"
            },
           
            {
                "data": function(data) {
                    return `<td class="text-right py-0 align-middle">
                            <div class="btn-group btn-group-sm">
                                <button class="btn btn-primary btn-edit" data-id="${data.id}"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-danger btn-delete" data-id="${data.id}"><i class="fas fa-trash"></i></button>
                            </div>
                            </td>`
                }
            }
        ]
    });

    dataTableiuran.on('draw.dt', function() {
        var PageInfo = $('#data-table-iuran').DataTable().page.info();
        dataTableiuran.column(0, {
            page: 'current'
        }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1 + PageInfo.start;
        });
    });

    $(document).on('click', '#btn-save-iuran', function () {
        $('.text-danger').remove();
        $('.is-invalid').removeClass('is-invalid');
        var createForm = $('#form-create-iuran');
        
        $.ajax({
            url: '<?= route_to('resource') ?>',
            method: 'POST',
            data: createForm.serialize()
        }).done((data, textStatus) => {
            Toast.fire({
                icon: 'success',
                title: textStatus
            })
            dataTableiuran.ajax.reload();
            $("#form-create-iuran").trigger("reset");
            $("#modal-create-iuran").modal('hide');

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

     $(document).ready(function(){
 
            $('#namaWarga').change(function(){ 
                var id=$(this).val();
                $.ajax({
                    url : "<?= route_to('getwarga') ?>",
                    method : "POST",
                    data : {id: id_warga},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                         
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].id_warga+'>'+data[i].nama+'</option>';
                        }
                      
 
                    }
                });
                return false;
            }); 
             
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
                    url: `<?= route_to('iuran/resource') ?>/${$(this).attr('data-id')}`,
                    method: 'DELETE',
                }).done((data, textStatus) => {
                    Toast.fire({
                        icon: 'success',
                        title: textStatus,
                    });
                    dataTableiuran.ajax.reload();
                }).fail((error) => {
                    Toast.fire({
                        icon: 'error',
                        title: error.responseJSON.messages.error,
                    });
                })
            }
        })
    });

    $('#modal-create-iuran').on('hidden.bs.modal', function() {
        $(this).find('#form-create-iuran')[0].reset();
        $('.text-danger').remove();
        $('.is-invalid').removeClass('is-invalid');
    });

    $('#modal-edit-iuran').on('hidden.bs.modal', function() {
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