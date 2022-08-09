  <main id="main">
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2 class="my-auto">Produk Kami</h2>
        </div>
      </div>
    </section>
    <section id="team" class="team section-bg">
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <h2>Produk Kami</h2>
        </div>
        <div class="container">
          <div class="row">
            <?php
            foreach ($produk as $p) {
            ?>
              <div class="col-lg-4 align-items-stretch">
                <div class="member" data-aos="fade-up">
                  <div class="member-img">
                    <img src="<?= base_url($p->foto_produk) ?>" class="img-fluid" alt="">
                  </div>
                  <div class="member-info">
                    <h4><?= $p->nama_produk ?></h4>
                    <div class="text-center">
                      <a href="<?= base_url('produk/' . $p->slug_produk) ?>" class="btn-baca">Detail Produk</a>
                    </div>
                  </div>
                </div>
              </div>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
    </section>
  </main>