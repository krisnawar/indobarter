    <div class="content-wrapper">
      <section class="content-header">
        <h1>Tambah Katalog Produk</h1>
      </section>
      <section class="content">
        <div class="row">
          <form method="post" action="<?= base_url('admin/produk/simpanproduk') ?>" enctype="multipart/form-data">
            <div class="col-md-8">
              <div class="box box-primary">
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="nama_produk">Nama Produk</label>
                        <input type="text" name="nama_produk" id="nama_produk" class="form-control" placeholder="Masukkan Nama Produk">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="text-editor">Deskripsi Produk</label>
                        <textarea name="deskripsi_produk" id="text-editor" class="form-control" placeholder="Masukkan Deskripsi Produk Perusahaan Anda"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Aksi</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-4">
                          <input type="submit" name="submit" class="btn btn-block btn-primary" value="Simpan">
                        </div>
                        <div class="col-md-4">
                          <button type="reset" class="btn btn-block btn-warning">Reset</button>
                        </div>
                        <div class="col-md-4">
                          <a href="<?= base_url('admin/produk') ?>">
                            <button type="button" class="btn btn-block btn-danger">Kembali</button>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Gambar</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12">
                      <input type="file" accept="image/*" name="foto_produk" id="foto_produk" class="form-control" onchange="document.getElementById('hasil_gambar').src = window.URL.createObjectURL(this.files[0]); document.getElementById('hasil_gambar').style.display = 'block'">
                    </div>
                  </div>
                  <div class="row" style="margin-top: 10px;">
                    <div class="col-md-12">
                      <img id="hasil_gambar" width="100%" height="200" style="display: none;">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </section>
    </div>