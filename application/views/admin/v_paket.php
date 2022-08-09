    <div class="content-wrapper">
      <section class="content-header">
        <h1>Daftar Harga Paket</h1>
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
                <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#tambah-paket"><i class="fa fa-plus"></i> Tambah Harga Paket</button>
                <div class="modal fade" id="tambah-paket">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title" style="text-align: center;">Tambah Harga Paket</h3>
                      </div>
                      <form method="post" action="<?= base_url('admin/paket/simpanpaket') ?>" role="form">
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-6 col-sm-12">
                              <div class="form-group">
                                <label for="nama_paket" style="font-size: 15px;">Nama Paket</label>
                                <input type="text" name="nama_paket" id="nama_paket" class="form-control" placeholder="Masukkan Nama Paket">
                              </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <div class="form-group">
                                <label for="produk" style="font-size: 15px;">Produk</label>
                                <select name="produk" class="form-control select2" style="width: 100%;">
                                  <?php
                                  foreach ($produk as $p) {
                                  ?>
                                    <option value="<?= $p->id_produk; ?>"><?= $p->nama_produk; ?></option>
                                  <?php
                                  }
                                  ?>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6 col-sm-12">
                              <div class="form-group">
                                <label for="harga_paket" style="font-size: 15px;">Harga Paket</label>
                                <input type="text" name="harga_paket" id="harga" class="form-control" placeholder="Masukkan Harga Paket">
                              </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <div class="form-group">
                                <label for="terlaris" style="font-size: 15px;">Terlaris</label>
                                <div class="radio">
                                  <label>
                                    <input type="radio" name="terlaris" id="terlaris" value="1"> Ya
                                  </label>&nbsp;&nbsp;&nbsp;
                                  <label>
                                    <input type="radio" name="terlaris" id="terlaris" value="0"> Tidak
                                  </label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12 col-sm-12">
                              <div class="form-group">
                                <label for="deskripsi" style="font-size: 15px">Deskripsi Paket</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control" placeholder="Masukkan deskripsi paket"></textarea>
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
                      <th width="20%">Nama Paket</th>
                      <th width="15%">Produk</th>
                      <th width="34%">Deskripsi Paket</th>
                      <th width="11%">Harga Paket</th>
                      <th width="5%">Terlaris</th>
                      <th width="10%">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($paket as $p) {
                    ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $p->nama_paket ?></td>
                        <td><?= $p->nama_produk ?></td>
                        <td><?= $p->deskripsi ?></td>
                        <td style="text-align: right;">Rp <?= number_format($p->harga_paket, 0, '', '.') ?></td>
                        <td>
                          <?php
                          if ($p->terlaris == 1) {
                            echo 'Ya';
                          } else {
                            echo 'Tidak';
                          }
                          ?>
                        </td>
                        <td style="text-align: center;">
                          <button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#edit-paket<?= $p->id_paket ?>">
                            <i class="fa fa-edit"></i>
                          </button>
                          <button class="btn btn-xs btn-danger" onclick="hapus_paket('<?= substr(sha1($p->id_paket), 9, 5) ?>')">
                            <i class="fa fa-trash"></i>
                          </button>
                        </td>
                      </tr>
                      <div class="modal fade" id="edit-paket<?= $p->id_paket ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h3 class="modal-title" style="text-align: center;">Edit Harga Paket</h3>
                            </div>
                            <form method="post" action="<?= base_url('admin/paket/updatepaket/' . substr(sha1($p->id_paket), 9, 5)) ?>" role="form">
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                      <label for="nama_paket" style="font-size: 15px;">Nama Paket</label>
                                      <input type="text" name="nama_paket" id="nama_paket" class="form-control" placeholder="Masukkan Nama Paket" value="<?= $p->nama_paket; ?>">
                                    </div>
                                  </div>
                                  <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                      <label for="produk" style="font-size: 15px;">Produk</label>
                                      <select name="produk" class="form-control select2" style="width: 100%;">
                                        <?php
                                        foreach ($produk as $pp) {
                                          if ($p->id_produk == $pp->id_produk) {
                                        ?>
                                            <option value="<?= $pp->id_produk; ?>" selected><?= $pp->nama_produk; ?></option>
                                          <?php
                                          } else {
                                          ?>
                                            <option value="<?= $pp->id_produk; ?>"><?= $pp->nama_produk; ?></option>
                                        <?php
                                          }
                                        }
                                        ?>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                      <label for="harga_paket" style="font-size: 15px;">Harga Paket</label>
                                      <input type="text" name="harga_paket" id="harga_edit" class="form-control" placeholder="Masukkan Harga Paket" value="Rp <?= number_format($p->harga_paket, 0, '', '.') ?>">
                                    </div>
                                  </div>
                                  <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                      <label for="terlaris" style="font-size: 15px;">Terlaris</label>
                                      <div class="radio">
                                        <label>
                                          <?php
                                          if ($p->terlaris == 0) {
                                            echo '<input type="radio" name="terlaris" id="terlaris" value="1"> Ya';
                                          } elseif ($p->terlaris == 1) {
                                            echo '<input type="radio" name="terlaris" id="terlaris" value="1" checked> Ya';
                                          }
                                          ?>
                                        </label>&nbsp;&nbsp;&nbsp;
                                        <label>
                                          <?php
                                          if ($p->terlaris == 0) {
                                            echo '<input type="radio" name="terlaris" id="terlaris" value="0" checked> Tidak';
                                          } elseif ($p->terlaris == 1) {
                                            echo '<input type="radio" name="terlaris" id="terlaris" value="0"> Tidak';
                                          }
                                          ?>
                                        </label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                      <label for="deskripsi" style="font-size: 15px">Deskripsi Paket</label>
                                      <textarea name="deskripsi" id="deskripsi" class="form-control" placeholder="Masukkan deskripsi paket"><?= $p->deskripsi; ?></textarea>
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