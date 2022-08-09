<div class="content-wrapper">
  <section class="content-header">
    <h1>Pengaturan Akun</h1>
  </section>
  <section class="content">
    <?php
    if (flashdata('msg')) {
      echo flashdata('msg');
    }
    ?>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="box">
          <div class="box-header">
            <form method="post" action="<?= base_url('admin/pengaturan/updateakun') ?>" role="form">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                      <label for="user_name">Nama Akun</label>
                      <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Masukkan Nama Akun" value="<?= $data->user_name ?>">
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                      <label for="user_username">Username Akun</label>
                      <input type="text" name="user_username" id="user_username" class="form-control" placeholder="Masukkan Website Perusahaan" value="<?= $data->user_username ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                      <label for="password_baru">Password Baru</label><small> (isi jika ingin ganti password)</small>
                      <input type="password" name="password_baru" id="password_baru" class="form-control" placeholder="Masukkan Email Perusahaan">
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                      <label for="password_lama">Password Lama</label><small> (isi jika ingin ganti password)</small>
                      <input type="password" name="password_lama" id="password_lama" class="form-control" placeholder="Masukkan Email Perusahaan">
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <input type="submit" name="submit" class="btn btn-primary" value="Submit">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>