    <div class="content-wrapper">
      <section class="content-header">
        <h1>Data Perusahaan</h1>
      </section>
      <section class="content">
        <?php
        if (flashdata('msg')) {
          echo flashdata('msg');
        }
        ?>
        <div class="row">
          <div class="col-md-12">
            <div class="box box-primary">
              <form method="post" action="<?= base_url('admin/updatedataperusahaan') ?>" role="form">
                <div class="box-body">
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                      <label for="nama_perusahaan">Nama Perusahaan</label>
                      <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control" placeholder="Masukkan Nama Perusahaan" value="<?= $perusahaan->nama_perusahaan ?>">
                    </div>
                    <div class="form-group">
                      <label for="tentang_perusahaan">Tentang Perusahaan</label>
                      <textarea name="tentang_perusahaan" id="tentang_perusahaan" class="form-control" placeholder="Masukkan Tentang Perusahaan"><?= $perusahaan->tentang_perusahaan ?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="email_perusahaan">Email Perusahaan</label>
                      <input type="email" name="email_perusahaan" id="email_perusahaan" class="form-control" placeholder="Masukkan Email Perusahaan" value="<?= $perusahaan->email_perusahaan ?>">
                    </div>
                    <div class="form-group">
                      <label for="nomor_telepon">Nomor Telepon Perusahaan</label>
                      <input type="text" name="nomor_telepon" id="nomor_telepon" class="form-control" placeholder="Masukkan Nomor Telepon Perusahaan" value="<?= $perusahaan->no_telp ?>">
                    </div>
                    <div class="form-group">
                      <label for="facebook_perusahaan">Facebook Perusahaan</label> <small>(Contoh: http://facebook.com/link_perusahaan)</small>
                      <input type="text" name="facebook_perusahaan" id="facebook_perusahaan" class="form-control" placeholder="Masukkan Facebook Perusahaan" value="<?= $perusahaan->facebook_perusahaan ?>">
                    </div>
                    <div class="form-group">
                      <label for="instagram_perusahaan">Instagram Perusahaan</label> <small>(Contoh: https://www.instagram.com/username_perusahaan)</small>
                      <input type="text" name="instagram_perusahaan" id="instagram_perusahaan" class="form-control" placeholder="Masukkan Instagram Perusahaan" value="<?= $perusahaan->instagram_perusahaan ?>">
                    </div>
                    <div class="form-group">
                      <label for="maps_perusahaan">Maps</label>
                      <textarea name="maps_perusahaan" id="maps_perusahaan" class="form-control" placeholder="Masukkan iframe Google Maps" rows="8"><?= $perusahaan->maps_perusahaan ?></textarea>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                      <label for="website_perusahaan">Website Perusahaan</label>
                      <input type="text" name="website_perusahaan" id="website_perusahaan" class="form-control" placeholder="Masukkan Website Perusahaan" value="<?= $perusahaan->website_perusahaan ?>">
                    </div>
                    <div class="form-group">
                      <label for="alamat_perusahaan">Alamat Perusahaan</label>
                      <textarea name="alamat_perusahaan" id="alamat_perusahaan" class="form-control" placeholder="Masukkan Alamat Perusahaan"><?= $perusahaan->alamat_perusahaan ?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="email_perusahaan_cadangan">Email Perusahaan Alternatif</label>
                      <input type="email" name="email_perusahaan_alternatif" id="email_perusahaan_alternatif" class="form-control" placeholder="Masukkan Email Perusahaan Alternatif" value="<?= $perusahaan->email_alternatif ?>">
                    </div>
                    <div class="form-group">
                      <label for="nomor_hp">Nomor HP Perusahaan</label>
                      <input type="text" name="nomor_hp" id="nomor_hp" class="form-control" placeholder="Masukkan Nomor HP Perusahaan" value="<?= $perusahaan->no_hp ?>">
                    </div>
                    <div class="form-group">
                      <label for="twitter_perusahaan">Twitter Perusahaan</label> <small>(Contoh: https://twitter.com/username_perusahaan)</small>
                      <input type="text" name="twitter_perusahaan" id="twitter_perusahaan" class="form-control" placeholder="Masukkan Twitter Perusahaan" value="<?= $perusahaan->twitter_perusahaan ?>">
                    </div>
                    <div class="form-group">
                      <label for="whatsapp_perusahaan">Whatsapp Perusahaan</label> <small>(Contoh: 6281234567890)</small>
                      <input type="text" name="whatsapp_perusahaan" id="whatsapp_perusahaan" class="form-control" placeholder="Masukkan Whatsapp Perusahaan" value="<?= $perusahaan->whatsapp_perusahaan ?>">
                    </div>
                    <div class="form-group">
                      <style type="text/css" media="screen">
                        iframe {
                          width: 100%;
                          max-height: 200px;
                        }
                      </style>
                      <?= html_entity_decode($perusahaan->maps_perusahaan) ?>
                    </div>
                  </div>
                </div>
                <div class="box-footer" style="margin-left: 15px">
                  <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>