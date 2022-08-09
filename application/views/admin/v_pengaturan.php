    <div class="content-wrapper">
      <section class="content-header">
        <h1>Pengaturan</h1>
      </section>
      <section class="content">
        <?php
        if (flashdata('msg')) {
          echo flashdata('msg');
        }
        ?>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">Data Perusahaan</a></li>
                <li><a href="#tab_2" data-toggle="tab">Tentang Perusahaan</a></li>
                <li><a href="#tab_3" data-toggle="tab">Logo Perusahaan</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                  <form method="post" action="<?= base_url('admin/pengaturan/updatedataperusahaan') ?>" role="form">
                    <div class="box-body">
                      <div class="row">
                        <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                            <label for="nama_perusahaan">Nama Perusahaan</label>
                            <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control" placeholder="Masukkan Nama Perusahaan" value="<?= $perusahaan->nama_perusahaan ?>">
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                            <label for="website_perusahaan">Website Perusahaan</label>
                            <input type="text" name="website_perusahaan" id="website_perusahaan" class="form-control" placeholder="Masukkan Website Perusahaan" value="<?= $perusahaan->website_perusahaan ?>">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                            <label for="alamat_perusahaan">Alamat Perusahaan</label>
                            <textarea name="alamat_perusahaan" id="alamat_perusahaan" class="form-control" placeholder="Masukkan Alamat Perusahaan" rows="5"><?= $perusahaan->alamat_perusahaan ?></textarea>
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                            <label for="maps_perusahaan">Maps</label>
                            <textarea name="maps_perusahaan" id="maps_perusahaan" class="form-control" placeholder="Masukkan iframe Google Maps" rows="5"><?= $perusahaan->maps_perusahaan ?></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                            <label for="email_perusahaan">Email Perusahaan</label>
                            <input type="email" name="email_perusahaan" id="email_perusahaan" class="form-control" placeholder="Masukkan Email Perusahaan" value="<?= $perusahaan->email_perusahaan ?>">
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                            <label for="email_perusahaan_cadangan">Email Perusahaan Alternatif</label>
                            <input type="email" name="email_perusahaan_alternatif" id="email_perusahaan_alternatif" class="form-control" placeholder="Masukkan Email Perusahaan Alternatif" value="<?= $perusahaan->email_alternatif ?>">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                            <label for="nomor_telepon">Nomor Telepon Perusahaan</label>
                            <input type="text" name="nomor_telepon" id="nomor_telepon" class="form-control" placeholder="Masukkan Nomor Telepon Perusahaan" value="<?= $perusahaan->no_telp ?>">
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                            <label for="nomor_hp">Nomor HP Perusahaan</label>
                            <input type="text" name="nomor_hp" id="nomor_hp" class="form-control" placeholder="Masukkan Nomor HP Perusahaan" value="<?= $perusahaan->no_hp ?>">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                            <label for="facebook_perusahaan">Facebook Perusahaan</label> <small>(Contoh: http://facebook.com/link_perusahaan)</small>
                            <input type="text" name="facebook_perusahaan" id="facebook_perusahaan" class="form-control" placeholder="Masukkan Facebook Perusahaan" value="<?= $perusahaan->facebook_perusahaan ?>">
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                            <label for="twitter_perusahaan">Twitter Perusahaan</label> <small>(Contoh: https://twitter.com/username_perusahaan)</small>
                            <input type="text" name="twitter_perusahaan" id="twitter_perusahaan" class="form-control" placeholder="Masukkan Twitter Perusahaan" value="<?= $perusahaan->twitter_perusahaan ?>">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                            <label for="instagram_perusahaan">Instagram Perusahaan</label> <small>(Contoh: https://www.instagram.com/username_perusahaan)</small>
                            <input type="text" name="instagram_perusahaan" id="instagram_perusahaan" class="form-control" placeholder="Masukkan Instagram Perusahaan" value="<?= $perusahaan->instagram_perusahaan ?>">
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                            <label for="whatsapp_perusahaan">Whatsapp Perusahaan</label> <small>(Contoh: 6281234567890)</small>
                            <input type="text" name="whatsapp_perusahaan" id="whatsapp_perusahaan" class="form-control" placeholder="Masukkan Whatsapp Perusahaan" value="<?= $perusahaan->whatsapp_perusahaan ?>">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="box-footer">
                      <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                    </div>
                  </form>
                </div>
                <div class="tab-pane" id="tab_2">
                  <div class="row" style="margin-left: 1px; width: 99%">
                    <form method="post" action="<?= base_url('admin/pengaturan/updatetentangperusahaan') ?>" enctype="multipart/form-data">
                      <div class="col-md-8">
                        <div class="box-body">
                          <textarea name="tentang_perusahaan" id="text-editor" class="form-control" placeholder="Masukkan Deskripsi Tentang Perusahaan Anda"><?= $perusahaan->tentang_perusahaan ?></textarea>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="box-body">
                          <h4 class="box-title">Gambar</h4>
                        </div>
                        <div class="box-body">
                          <div class="row">
                            <div class="col-md-12">
                              <input type="file" accept="image/*" name="foto_tentang" id="foto_tentang" class="form-control" onchange="document.getElementById('hasil_gambar').src = window.URL.createObjectURL(this.files[0]); document.getElementById('hasil_gambar').style.display = 'block'">
                            </div>
                          </div>
                          <div class="row" style="margin-top: 10px;">
                            <div class="col-md-12">
                              <img id="hasil_gambar" width="100%" height="200" style="display: none;">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="box-footer">
                        <input type="submit" name="submit_tentang" class="btn btn-primary" value="Submit">
                      </div>
                    </form>
                  </div>
                </div>
                <div class="tab-pane" id="tab_3">
                  <form method="post" action="<?= base_url('admin/pengaturan/updatelogo') ?>" enctype="multipart/form-data">
                    <div class="box-body">
                      <div class="row">
                        <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                            <label for="logo_perusahaan">Logo Perusahaan</label>
                            <input type="file" accept="image/*" name="logo_perusahaan" id="logo_perusahaan" class="form-control" onchange="document.getElementById('hasil_logo').src = window.URL.createObjectURL(this.files[0]);"><br>
                            <img src="<?= base_url($perusahaan->logo_perusahaan) ?>" id="hasil_logo" width="400px" height="173px">
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                          <div class="form-group">
                            <label for="logo_website">Logo Website</label> <small>(Rekomendasi ukuran "<i>square</i>". Contoh: 100x100, 200x200, 500x500)</small>
                            <input type="file" accept="image/*" name="logo_website" id="logo_website" class="form-control" onchange="document.getElementById('hasil_logo_website').src = window.URL.createObjectURL(this.files[0]);"><br>
                            <img src="<?= base_url($perusahaan->icon_website) ?>" id="hasil_logo_website" width="173px" height="173px">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="box-footer">
                      <input type="submit" name="submit_logo" class="btn btn-primary" value="Submit">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>