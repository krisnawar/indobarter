    <div class="content-wrapper">
      <section class="content-header">
        <h1>Daftar Banner Beranda</h1>
      </section>
      <section class="content">
        <?php
        if (flashdata('msg')) {
          echo flashdata('msg');
        }
        ?>
        <div class="row">
          <div class="col-xs-12">
            <div class="box box-primary">
              <div class="box-header">
                <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#tambah-banner"><i class="fa fa-plus"></i> Tambah Banner</button>
                <div class="modal fade" id="tambah-banner">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title" style="text-align: center;">Tambah Banner</h3>
                      </div>
                      <form method="post" action="<?= base_url('admin/banner/simpanbanner') ?>" enctype="multipart/form-data" role="form">
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-6 col-sm-12">
                              <div class="form-group">
                                <label for="judul_banner" style="font-size: 15px;">Judul Banner</label>
                                <input type="text" name="judul_banner" id="judul_banner" class="form-control" placeholder="Masukkan Judul Banner">
                              </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <div class="form-group">
                                <label for="foto" style="font-size: 15px;">Foto Banner</label>
                                <input type="file" accept="image/*" name="foto" id="foto" class="form-control" onchange="document.getElementById('hasil').src = window.URL.createObjectURL(this.files[0]); document.getElementById('hasil').style.display = 'block'" style="font-size: 13px;">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6 col-sm-12">
                              <div class="form-group">
                                <label for="deskripsi_banner" style="font-size: 15px;">Deskripsi Banner</label>
                                <textarea name="deskripsi_banner" id="deskripsi_banner" class="form-control" placeholder="Masukkan Deskripsi Banner" rows="8"></textarea>
                              </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <div class="form-group" style="margin-top: 10px;">
                                <img id="hasil" width="99%" height="130" style="display: none;">
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
                      <th width="35%">Judul Banner</th>
                      <th width="40%">Deskripsi Banner</th>
                      <th width="10%">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($banner as $b) {
                    ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td style="text-align: center;"><img src="<?= base_url($b->foto_banner) ?>" class="img-circle" style="height: 50px; width: 50px"></td>
                        <td><?= $b->judul_banner ?></td>
                        <td><?= substr($b->deskripsi_banner, 0, 130) ?>[....]</td>
                        <td style="text-align: center;">
                          <button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#edit-banner<?= $b->id_banner ?>"><i class="fa fa-edit"></i></button>
                          <button class="btn btn-xs btn-danger" onclick="hapus_banner('<?= substr(sha1($b->id_banner), 9, 5) ?>')"><i class="fa fa-trash"></i></button>
                        </td>
                        <div class="modal fade" id="edit-banner<?= $b->id_banner ?>">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title" style="text-align: center;">Edit Banner</h3>
                              </div>
                              <form method="post" action="<?= base_url('admin/banner/updatebanner/' . substr(sha1($b->id_banner), 9, 5)) ?>" enctype="multipart/form-data" role="form">
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                      <div class="form-group">
                                        <label for="judul_banner" style="font-size: 15px;">Judul Banner</label>
                                        <input type="text" name="judul_banner" id="judul_banner" class="form-control" placeholder="Masukkan Judul Banner" value="<?= $b->judul_banner ?>">
                                      </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                      <div class="form-group">
                                        <label for="foto" style="font-size: 15px;">Foto Banner</label>
                                        <input type="file" accept="image/*" name="foto" id="foto" class="form-control" onchange="document.getElementById('hasil_edit<?= $b->id_banner ?>').src = window.URL.createObjectURL(this.files[0]);" style="font-size: 13px;">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                      <div class="form-group">
                                        <label for="deskripsi_banner" style="font-size: 15px;">Deskripsi Banner</label>
                                        <textarea name="deskripsi_banner" id="deskripsi_banner" class="form-control" placeholder="Masukkan Deskripsi Banner" rows="8"><?= $b->deskripsi_banner ?></textarea>
                                      </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                      <div class="form-group" style="margin-top: 10px;">
                                        <img src="<?= base_url($b->foto_banner) ?>" id="hasil_edit<?= $b->id_banner ?>" width="99%" height="130">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                                  <input type="submit" name="update" class="btn btn-primary" value="Perbarui">
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