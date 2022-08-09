    <div class="content-wrapper">
      <section class="content-header">
        <h1>Daftar Testimoni</h1>
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
                <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#tambah-testimoni"><i class="fa fa-plus"></i> Tambah Testimoni</button>
                <div class="modal fade" id="tambah-testimoni">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title" style="text-align: center;">Tambah Testimoni</h3>
                      </div>
                      <form method="post" action="<?= base_url('admin/testimoni/simpantestimoni') ?>" enctype="multipart/form-data" role="form">
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-6 col-sm-12">
                              <div class="form-group">
                                <label for="nama_testimoni" style="font-size: 15px;">Nama Testimoni</label>
                                <input type="text" name="nama_testimoni" id="nama_testimoni" class="form-control" placeholder="Masukkan Nama Testimoni">
                              </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <div class="form-group">
                                <label for="asal_testimoni" style="font-size: 15px;">Asal Daerah</label>
                                <input type="text" name="asal_testimoni" id="asal_testimoni" class="form-control" placeholder="Masukkan Asal Daerah">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6 col-sm-12">
                              <div class="form-group">
                                <label for="deskripsi_testimoni" style="font-size: 15px;">Testimoni</label>
                                <textarea name="deskripsi_testimoni" id="deskripsi_testimoni" class="form-control" placeholder="Masukkan Testimoni Pelanggan" rows="8"></textarea>
                              </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <div class="form-group">
                                <label for="foto" style="font-size: 15px;">Foto</label>
                                <input type="file" accept="image/*" name="foto" id="foto" class="form-control" onchange="document.getElementById('hasil').src = window.URL.createObjectURL(this.files[0]); document.getElementById('hasil').style.display = 'block'" style="font-size: 13px;"><br>
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
                      <th width="35%">Nama</th>
                      <th width="40%">Testimoni</th>
                      <th width="10%">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($testimoni as $t) {
                    ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td style="text-align: center;"><img src="<?= base_url($t->foto_testimoni) ?>" class="img-circle" style="height: 50px; width: 50px"></td>
                        <td><?= $t->nama_testimoni ?></td>
                        <td><?= $t->deskripsi_testimoni ?></td>
                        <td style="text-align: center;">
                          <button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#edit-testimoni<?= $t->id_testimoni ?>"><i class="fa fa-edit"></i></button>
                          <button class="btn btn-xs btn-danger" onclick="hapus_testimoni('<?= substr(sha1($t->id_testimoni), 9, 5) ?>')"><i class="fa fa-trash"></i></button>
                        </td>
                        <div class="modal fade" id="edit-testimoni<?= $t->id_testimoni ?>">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title" style="text-align: center;">Edit Testimoni</h3>
                              </div>
                              <form method="post" action="<?= base_url('admin/testimoni/updatetestimoni/' . substr(sha1($t->id_testimoni), 9, 5)) ?>" enctype="multipart/form-data" role="form">
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                      <div class="form-group">
                                        <label for="nama_testimoni" style="font-size: 15px;">Nama Testimoni</label>
                                        <input type="text" name="nama_testimoni" id="nama_testimoni" class="form-control" placeholder="Masukkan Nama Testimoni" value="<?= $t->nama_testimoni ?>">
                                      </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                      <div class="form-group">
                                        <label for="asal_testimoni" style="font-size: 15px;">Asal Daerah</label>
                                        <input type="text" name="asal_testimoni" id="asal_testimoni" class="form-control" placeholder="Masukkan Asal Daerah" value="<?= $t->asal_testimoni ?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                      <div class="form-group">
                                        <label for="deskripsi_testimoni" style="font-size: 15px;">Testimoni</label>
                                        <textarea name="deskripsi_testimoni" id="deskripsi_testimoni" class="form-control" placeholder="Masukkan Testimoni Pelanggan" rows="8"><?= $t->deskripsi_testimoni ?></textarea>
                                      </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                      <div class="form-group">
                                        <label for="foto" style="font-size: 15px;">Foto</label>
                                        <input type="file" accept="image/*" name="foto" id="foto_edit" class="form-control" onchange="document.getElementById('hasil_edit<?= $t->id_testimoni ?>').src = window.URL.createObjectURL(this.files[0]); document.getElementById('hasil_edit').style.display = 'block'" style="font-size: 13px;"><br>
                                        <img src="<?= base_url($t->foto_testimoni) ?>" id="hasil_edit<?= $t->id_testimoni ?>" width="99%" height="130">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                                  <input type="submit" name="simpan" class="btn btn-primary" value="Perbarui">
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