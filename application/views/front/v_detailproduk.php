  <main id="main">
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2 class="my-auto">Detail Produk</h2>
        </div>
      </div>
    </section>
    <section id="blog" class="blog">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 entries">
            <article class="entry entry-single" data-aos="fade-up">
              <div class="entry-img justify-content-center">
                <img src="<?= base_url($detail->foto_produk) ?>" alt="" class="img-fluid">
              </div>
              <h2 class="entry-title"><?= $detail->nama_produk ?></h2>
              <div class="entry-content">
                <?= $detail->deskripsi_produk ?>
              </div>
            </article>
          </div>
        </div>
      </div>
    </section>
    <section id="pricing" class="pricing section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Daftar Paket <?= $detail->nama_produk; ?></h2>
        </div>
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
                  $link_pesan = 'https://wa.me/' . $perusahaan->whatsapp_perusahaan . '?text=Hai Admin ' . $perusahaan->nama_perusahaan . ', Apakah ' . $h->nama_paket . ' - ' . $detail->nama_produk . ' tersedia?';
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
      </div>
    </section>
  </main>