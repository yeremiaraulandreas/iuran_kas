<!-- Create Modal -->
<div class="modal fade" id="modal-create-book" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create a Book</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-create-book" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" placeholder="Title of book">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="author" placeholder="Author for book">
                    </div>
                    <div class="form-group">
                        <select class="form-control select2" id="status" name="status_id">
                            <option value="" disabled selected>--Choose Status--</option>
                            <option id="publish" value="1">Publish</option>
                            <option id="pending" value="2">Pending</option>
                            <option id="draft" value="3">Draft</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="description" placeholder="Enter ..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-sm" id="btn-save-book">Save Book</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="modal-edit-book" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit a Book</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-edit-book" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" id="book_id">
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" placeholder="Title of book">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="author" placeholder="Author for book">
                    </div>
                    <div class="form-group">
                        <select class="form-control select2" id="status" name="status_id">
                            <option id="publish" value="1">Publish</option>
                            <option id="pending" value="2">Pending</option>
                            <option id="draft" value="3">Draft</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="description" placeholder="Enter ..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-sm" id="btn-update-book">Update Book</button>
            </div>
        </div>
    </div>
</div>
<!-- Create Modal Warga -->
<div class="modal fade" id="modal-create-warga" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Warga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-create-warga" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" class="form-control" name="nik" placeholder="Masukan NIK...">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nama" placeholder="Nama Anda...">
                    </div>
                  
                    <div class="form-group">
                        <select class="form-control select2" id="kelamin" name="kelamin">
                            <option value="" disabled selected>--Jenis Kelamin--</option>
                            <option id="Laki-laki" value="L">Laki-laki</option>
                            <option id="Perempuan" value="P">Perempuan</option>
                           
                        </select>
                    </div>
                     <div class="form-group">
                        <input type="text" class="form-control" name="no_rumah" placeholder="Nomor Rumah...">
                    </div>
                    <div class="form-group">
                        <select class="form-control select2" id="status_warga" name="status">
                            <option value="" disabled selected>--Pilih Status--</option>
                            <option id="aktif" value="1">Aktif</option>
                            <option id="tidak_aktif" value="2">Tidak Aktif</option>
                           
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="alamat" placeholder="Alamat Lengkap.."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                <button type="button" class="btn btn-primary btn-sm" id="btn-save-warga"><i class="fa fa-save"></i> Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="modal-edit-warga" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit data warga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-edit-warga" enctype="multipart/form-data">
                   <input type="hidden" class="form-control" id="warga_id">
                   <div class="form-group">
                        <input type="text" class="form-control" name="nik" placeholder="Masukan NIK...">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nama" placeholder="Nama Anda...">
                    </div>
                  
                    <div class="form-group">
                        <select class="form-control select2" id="kelamin" name="kelamin">
                            <option value="" disabled selected>--Jenis Kelamin--</option>
                            <option id="Laki-laki" value="L">Laki-laki</option>
                            <option id="Perempuan" value="P">Perempuan</option>
                           
                        </select>
                    </div>
                     <div class="form-group">
                        <input type="text" class="form-control" name="no_rumah" placeholder="Nomor Rumah...">
                    </div>
                    <div class="form-group">
                        <select class="form-control select2" id="status_warga" name="status">
                            <option value="" disabled selected>--Pilih Status--</option>
                            <option id="aktif" value="1">Aktif</option>
                            <option id="tidak_aktif" value="2">Tidak Aktif</option>
                           
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="alamat" placeholder="Alamat Lengkap.."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                <button type="button" class="btn btn-primary btn-sm" id="btn-update-warga"><i class="fas fa-pencil-alt"></i> Update</button>
            </div>
        </div>
    </div>
</div>


<!-- Edit Modal -->
<div class="modal fade" id="modal-edit-iuran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit data iuran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-edit-iuran" enctype="multipart/form-data">
                   <input type="hidden" class="form-control" id="id_iuran">
                   <div class="form-group">
                        <input type="text" class="form-control" name="nik" placeholder="Masukan NIK...">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nama" placeholder="Nama Anda...">
                    </div>
                  
                    <div class="form-group">
                        <select class="form-control select2" id="kelamin" name="kelamin">
                            <option value="" disabled selected>--Jenis Kelamin--</option>
                            <option id="Laki-laki" value="L">Laki-laki</option>
                            <option id="Perempuan" value="P">Perempuan</option>
                           
                        </select>
                    </div>
                     <div class="form-group">
                        <input type="text" class="form-control" name="no_rumah" placeholder="Nomor Rumah...">
                    </div>
                    <div class="form-group">
                        <select class="form-control select2" id="status_warga" name="status">
                            <option value="" disabled selected>--Pilih Status--</option>
                            <option id="aktif" value="1">Aktif</option>
                            <option id="tidak_aktif" value="2">Tidak Aktif</option>
                           
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="alamat" placeholder="Alamat Lengkap.."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
                <button type="button" class="btn btn-primary btn-sm" id="btn-update-iuran"><i class="fas fa-pencil-alt"></i> Update</button>
            </div>
        </div>
    </div>
</div>
