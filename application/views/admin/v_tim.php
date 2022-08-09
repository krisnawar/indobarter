    <div class="content-wrapper">
      <section class="content-header">
        <h1>Data Anggota Tim</h1>
      </section>
      <section class="content">
        <?php
        if (flashdata('msg')) {
          echo flashdata('msg');
        }
        ?>
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#tambah-tim"><i class="fa fa-plus"></i> Tambah Anggota</button>
                <div class="modal fade" id="tambah-tim">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title" style="text-align: center;">Tambah Anggota</h3>
                      </div>
                      <form method="post" action="<?= base_url('admin/tim/simpantim') ?>" enctype="multipart/form-data" role="form">
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-6 col-sm-12">
                              <div class="form-group">
                                <label for="nama" style="font-size: 15px;">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama">
                              </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <div class="form-group">
                                <label for="posisi" style="font-size: 15px;">Posisi/Jabatan</label>
                                <input type="text" name="posisi" id="posisi" class="form-control" placeholder="Masukkan Posisi/Jabatan">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12 col-sm-12">
                              <div class="form-group">
                                <label for="foto" style="font-size: 15px;">Foto</label>
                                <input type="file" name="foto" id="foto" style="font-size: 13px;">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                          <input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-body">
                <table id="tabel-1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th width="5%">No</th>
                      <th width="10%">Foto</th>
                      <th width="35%">Nama</th>
                      <th width="40%">Posisi</th>
                      <th width="10%">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($tim as $t) {
                    ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td style="text-align: center;"><img src="<?= base_url($t->foto) ?>" class="img-circle" style="max-height: 50px;"></td>
                        <td><?= $t->nama ?></td>
                        <td><?= $t->posisi ?></td>
                        <td style="text-align: center;">
                          <button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#edit-tim<?= $t->id_tim ?>"><i class="fa fa-edit"></i></button>
                          <button class="btn btn-xs btn-danger" onclick="hapus_tim('<?= substr(sha1($t->id_tim), 9, 5) ?>')"><i class="fa fa-trash"></i></button>
                        </td>
                        <div class="modal fade" id="edit-tim<?= $t->id_tim ?>">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title" style="text-align: center;">Edit Anggota</h3>
                              </div>
                              <form method="post" action="<?= base_url('admin/tim/updatetim/' . substr(sha1($t->id_tim), 9, 5)) ?>" enctype="multipart/form-data" role="form">
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                      <div class="form-group">
                                        <label for="nama" style="font-size: 15px;">Nama</label>
                                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama" value="<?= $t->nama; ?>">
                                      </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                      <div class="form-group">
                                        <label for="posisi" style="font-size: 15px;">Posisi/Jabatan</label>
                                        <input type="text" name="posisi" id="posisi" class="form-control" placeholder="Masukkan Posisi/Jabatan" value="<?= $t->posisi; ?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                      <div class="form-group">
                                        <label for="foto" style="font-size: 15px;">Foto</label>
                                        <input type="file" name="foto" id="foto" style="font-size: 13px;">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                                  <input type="submit" name="perbarui" class="btn btn-primary" value="Perbarui">
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>