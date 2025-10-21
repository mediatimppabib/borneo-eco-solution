<section id="hero" class="section hero-compact">
  {{-- Parallax background (absolute) --}}
  <div class="hero-bg" aria-hidden="true">
    <img
      src="{{ asset('assets/images/hero-oil-drum-1200.jpg') }}"
      srcset="{{ asset('assets/images/hero-oil-drum-600.jpg') }} 600w,
              {{ asset('assets/images/hero-oil-drum-1200.jpg') }} 1200w,
              {{ asset('assets/images/hero-oil-drum-2000.jpg') }} 2000w"
      sizes="(max-width: 768px) 100vw, 1200px"
      loading="lazy"
      alt="Tumpukan drum penampungan minyak jelantah"
      class="hero-bg-img"
    />
    <div class="hero-overlay"></div>
  </div>

  <div class="container hero-inner">
    <div class="hero-text">
      <p class="eyebrow">Borneo Eco Solution</p>
      <h1>
        <span class="headline-line-1">Mengelola Minyak Jelantah</span><br>
        <span class="headline-line-2"><span class="accent">dengan Aman</span>
      </h1>

      <p class="lead">
        Pencatatan volume mingguan • Drum 200L berlabel Non-B3 • Jemput & ganti drum tanpa ganggu operasional • Penyaluran ke pengepul resmi.
      </p>

      <div class="hero-ctas">
        <a class="btn btn-primary" href="#contact">Hubungi Kami</a>
        <a class="btn btn-outline" href="#services">Lihat Layanan</a>
      </div>

      <p class="hero-trust">Borneo Eco Solution</p>
    </div>

    <div class="hero-decor" aria-hidden="true">
      {{-- bisa diisi ilustrasi kecil atau kosong --}}
      <img src="{{ asset('assets/images/hero-side-illustration.png') }}" alt="" loading="lazy">
    </div>
  </div>
</section>
