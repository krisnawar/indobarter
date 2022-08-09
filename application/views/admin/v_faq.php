    <div class="content-wrapper">
      <section class="content-header">
        <h1>Frequently Asked Questions</h1>
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
                <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#tambah-faq"><i class="fa fa-plus"></i> Tambah FAQ</button>
                <div class="modal fade" id="tambah-faq">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title" style="text-align: center;">Tambah FAQ</h3>
                      </div>
                      <form method="post" action="<?= base_url('admin/FAQ/simpanfaq') ?>" role="form">
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-12 col-sm-12">
                              <div class="form-group">
                                <label for="pertanyaan" style="font-size: 15px;">Pertanyaan</label>
                                <input type="text" name="pertanyaan" id="pertanyaan" class="form-control" placeholder="Masukkan Pertanyaan">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12 col-sm-12">
                              <div class="form-group">
                                <label for="jawaban" style="font-size: 15px;">Jawaban</label>
                                <textarea name="jawaban" class="form-control"></textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                          <input type="submit" name="submit" class="btn btn-primary" value="Submit">
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
                      <th width="40%">Pertanyaan</th>
                      <th width="45%">Jawaban</th>
                      <th width="10%">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($faq as $f) {
                    ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $f->pertanyaan ?></td>
                        <td><?= $f->jawaban ?></td>
                        <td style="text-align: center;">
                          <button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#edit-faq<?= $f->id_faq ?>">
                            <i class="fa fa-edit"></i>
                          </button>
                          <button class="btn btn-xs btn-danger" onclick="hapus_faq('<?= substr(sha1($f->id_faq), 9, 5) ?>')">
                            <i class="fa fa-trash"></i>
                          </button>
                        </td>
                      </tr>
                      <div class="modal fade" id="edit-faq<?= $f->id_faq ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h3 class="modal-title" style="text-align: center;">Edit FAQ</h3>
                            </div>
                            <form method="post" action="<?= base_url('admin/FAQ/updatefaq/' . substr(sha1($f->id_faq), 9, 5)) ?>" role="form">
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                      <label for="pertanyaan" style="font-size: 15px;">Pertanyaan</label>
                                      <input type="text" name="pertanyaan" id="pertanyaan" class="form-control" placeholder="Masukkan Pertanyaan" value="<?= $f->pertanyaan ?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                      <label for="jawaban" style="font-size: 15px;">Jawaban</label>
                                      <textarea name="jawaban" class="form-control"><?= $f->jawaban; ?></textarea>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                                <input type="submit" name="submit" class="btn btn-primary" value="Submit">
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