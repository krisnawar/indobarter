  <?php $url_bootstrap = base_url('assets/front/') ?>
  <?php
  if ($banner == true) {
  ?>
    <section id="hero">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
          <?php
          $no = 0;
          $active = '';
          foreach ($banner as $b) {
            if ($no == 0) {
              $active = 'active';
            } else {
              $active = '';
            }
          ?>
            <div class="carousel-item <?= $active ?>" style="background-image: url(<?= base_url($b->foto_banner) ?>);">
              <div class="carousel-container">
                <div class="carousel-content animate__animated animate__fadeInUp">
                  <h2><?= $b->judul_banner ?></h2>
                  <p class="text-justify"><?= $b->deskripsi_banner ?></p>
                </div>
              </div>
            </div>
          <?php
            $no++;
          }
          ?>
        </div>
        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
      </div>
    </section>
  <?php
  } else {
  ?>
    <main id="main" style="margin-top: 80px;">
    <?php
  }
    ?>
    <main id="main">
      <section id="about-us" class="about-us">
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2>Tentang Kami</strong></h2>
          </div>
          <div class="row content">
            <div class="col-lg-6" data-aos="fade-right">
              <img src="<?= $perusahaan->foto_tentang ?>" width="250px" style="display: block; margin: auto;">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 text-justify" data-aos="fade-left">
              <?= $perusahaan->tentang_perusahaan ?>
            </div>
          </div>
        </div>
      </section>
      <section id="team" class="team section-bg">
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2>Produk Kami</strong></h2>
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
      <section id="faq" class="faq section-bg">
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2>FREQUENTLY ASKED QUESTIONS</strong></h2>
          </div>
          <div class="faq-list">
            <ul>
              <?php
              $delay = 0;
              foreach ($faq as $faq) {
              ?>
                <li data-aos="fade-up" data-aos-delay="<?= $delay ?>">
                  <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-<?= $faq->id_faq ?>" class="collapsed"><?= $faq->pertanyaan; ?> <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="faq-list-<?= $faq->id_faq ?>" class="collapse" data-parent=".faq-list">
                    <p><?= $faq->jawaban; ?></p>
                  </div>
                </li>
              <?php
                $delay = $delay + 100;
              }
              ?>
            </ul>
          </div>
        </div>
      </section>
    </main>