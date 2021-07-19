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
                        <select class="form-control select2" id="namaWarga" name="nama">
                            <option value="">--Pilih Nama--</option>
                           
                           
                        </select>
                        </div>
                  
                 
                        <div class="form-group col-6">
                            <label for="">Tanggal</label>
                            <input type="date" id="tanggal" name="tanggal" class="form-control">
                        </div>
                    
                  </div>
                  <div class="row">
                  
                        <div class="form-group col-md-4">
                            <label for="">Bulan</label>
                            <select class="form-control" name="bulan">
                                <option value="">Pilih Bulan</option>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                   
                        <?php $years = range(1900, strftime("%Y", time())); ?>
                        <div class="form-group col-md-4">
                            <label for="tahun">Tahun </label>
                            <select class="form-control" name="tahun">
                            <option>Select Year</option>
                                <?php foreach($years as $year) : ?>
                                    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                <?php endforeach; ?>
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
