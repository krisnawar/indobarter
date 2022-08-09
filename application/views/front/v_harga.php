  <main id="main">
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2 class="my-auto">Daftar Harga</h2>
        </div>
      </div>
    </section>
    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container" data-aos="fade-up">
        <?php
        foreach ($produk as $p) {
        ?>
          <div class="section-title">
            <h2><?= $p->nama_produk; ?></strong></h2>
          </div>
          <?php
          $this->db->select('id_paket, nama_paket, deskripsi, harga_paket, terlaris, nama_produk');
          $this->db->from('tb_paket');
          $this->db->join('tb_produk', 'tb_paket.id_produk = tb_produk.id_produk');
          $this->db->where('tb_paket.id_produk = ' . $p->id_produk);
          $harga = $this->db->get()->result();
          ?>
          <div class="row">
            <?php
            foreach ($harga as $h) {
            ?>
              <div class="col-lg-3 col-md-6 mt-4 mt-lg-0 mx-auto" style="margin-bottom: 20px;">
                <div class="box">
                  <?php
                  if ($h->terlaris == 1) {
                    echo '<span class="advanced">Terlaris</span>';
                  }
                  if ($perusahaan->whatsapp_perusahaan != null || $perusahaan->whatsapp_perusahaan != '') {
                    $link_pesan = 'https://wa.me/' . $perusahaan->whatsapp_perusahaan . '?text=Hai Admin ' . $perusahaan->nama_perusahaan . ', Apakah ' . $h->nama_paket . ' - ' . $p->nama_produk . ' tersedia?';
                  } else {
                    $link_pesan = '#';
                  }
                  ?>
                  <h3><?= $h->nama_paket ?></h3>
                  <h4 style="font-size: 28px;"><sup>Rp </sup><?= number_format($h->harga_paket, 0, '', '.') ?></h4>
                  <p style="font-size: 14px;"><?= $h->deskripsi; ?></p>
                  <div class="btn-wrap">
                    <a href="<?= $link_pesan ?>" target="_blank" class="btn-buy">Pesan Sekarang</a>
                  </div>
                </div>
              </div>
            <?php
            }
            ?>
          </div>
        <?php
        }
        ?>
      </div>
    </section>
  </main>