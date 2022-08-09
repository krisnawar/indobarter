    <div class="content-wrapper">
      <section class="content-header">
        <h1>Katalog Produk</h1>
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
                <a href="<?= base_url('admin/produk/tambahproduk') ?>"><button type="button" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Produk</button></a>
              </div>
              <div class="box-body">
                <table id="tabel-1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th width="5%">No</th>
                      <th width="10%">Foto</th>
                      <th width="35%">Nama Produk</th>
                      <th width="40%">Deskripsi Singkat</th>
                      <th width="10%">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($produk as $p) {
                    ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td style="text-align: center;"><img src="<?= base_url($p->foto_produk) ?>" class="img-circle" style="height: 50px; width: 50px"></td>
                        <td><?= $p->nama_produk ?></td>
                        <td>
                          <?php
                          if (strlen($p->deskripsi_produk) > 130) {
                            echo substr($p->deskripsi_produk, 0, 130) . '[....]';
                          } else {
                            echo substr($p->deskripsi_produk, 0, 130);
                          }
                          ?>
                        </td>
                        <td style="text-align: center;">
                          <a href="<?= base_url('admin/produk/editproduk/' . substr(sha1($p->id_produk), 9, 5)) ?>">
                            <button class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></button>
                          </a>
                          <button class="btn btn-xs btn-danger" onclick="hapus_produk('<?= substr(sha1($p->id_produk), 9, 5) ?>')"><i class="fa fa-trash"></i></button>
                        </td>
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