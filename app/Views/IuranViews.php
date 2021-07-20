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
<!-- Create Modal Iuran -->
<div class="modal fade" id="modal-create-iuran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Iuran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-create-iuran" enctype="multipart/form-data">
                  <div class="form-row">
                   
                        <div class="form-group col-6">
                            <label for="nama">Nama</label>
                        <select class="form-control select2" id="namaWarga" name="warga_id">
                            <option value="">--Pilih Nama--</option>
                             <?php foreach($warga as $row):?>
                             <option value="<?= $row->id_warga;?>"><?= $row->nama;?></option>
                             <?php endforeach;?>
                           
                        </select>
                        </div>
                  
                 
                        <div class="form-group col-6">
                            <label for="">Tanggal</label>
                            <input type="date" id="tanggal" name="tanggal" class="form-control">
                        </div>
                    
                  </div>
                  <div class="row">
                                <?php $bln = date('m') ?>
                        <div class="form-group col-md-4">
                            <label for="">Bulan</label>
                            <select class="form-control" name="bulan">
                                <option value="">Pilih Bulan</option>
                                <option value="01" <?php if ($bln == 1) { echo 'selected'; }?>>Januari</option>
                                <option value="02" <?php if ($bln == 2) { echo 'selected'; }?>>Februari</option>
                                <option value="03" <?php if ($bln == 3) { echo 'selected'; }?>>Maret</option>
                                <option value="04" <?php if ($bln == 4) { echo 'selected'; }?>>April</option>
                                <option value="05" <?php if ($bln == 5) { echo 'selected'; }?>>Mei</option>
                                <option value="06" <?php if ($bln == 6) { echo 'selected'; }?>>Juni</option>
                                <option value="07" <?php if ($bln == 7) { echo 'selected'; }?>>Juli</option>
                                <option value="08" <?php if ($bln == 8) { echo 'selected'; }?>>Agustus</option>
                                <option value="09" <?php if ($bln == 9) { echo 'selected'; }?>>September</option>
                                <option value="10" <?php if ($bln == 10) { echo 'selected'; }?>>Oktober</option>
                                <option value="11" <?php if ($bln == 11) { echo 'selected'; }?>>November</option>
                                <option value="12" <?php if ($bln == 12) { echo 'selected'; }?>>Desember</option>
                            </select>
                        </div>
                   
                        <?php $thn = date('Y')?>
                        <div class="form-group col-md-4">
                            <label for="tahun">Tahun </label>
                            <select class="form-control" name="tahun">
                            <option value="">Pilih Tahun</option>
                               <?php for ($i = 2010; $i <= $thn; $i++) { ?>
                                <option value="<?=$i;?>" <?php if ($thn == $i) { echo 'selected'; }?>>
                                    <?=$i;?>
                                </option>
                                <?php }?>
                            </select>
                        </div>
                
                        <div class="form-group col-md-4">
                            <label for="jumlah">Jumlah</label>
                            <input type="text" id="jumlah" name="jumlah" class="form-control">
                        </div>
                 
                  
                  </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                <button type="button" class="btn btn-primary btn-sm" id="btn-save-iuran"><i class="fa fa-save"></i> Simpan</button>
            </div>
        </div>
    </div>
</div>
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
               "data": function(data) {
                    switch(data.bulan) {
                        case '1':
                        return `<span>Januari</span>`
                        break;
                        case '2':
                        return `<span>Februari</span>`
                        break;
                        case '3':
                        return `<span>Maret</span>`
                        break;
                        case '4':
                        return `<span>April</span>`
                        break;
                        case '5':
                        return `<span>Mei</span>`
                        break;
                        case '6':
                        return `<span>Juni</span>`
                        break;
                        case '7':
                        return `<span>Juli</span>`
                        break;
                        case '8':
                        return `<span>Agustus</span>`
                        break;
                        case '9':
                        return `<span>September</span>`
                        break;
                        case '10':
                        return `<span>Oktober</span>`
                        break;
                        case '11':
                        return `<span>November</span>`
                        break;
                        case '12':
                        return `<span>Desember</span>`
                        break;
                    }
                }
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