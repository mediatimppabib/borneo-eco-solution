<section id="about" class="section about-block">
  <div class="container about-grid">
    {{-- Left column: heading + paragraph + CTA --}}
    <div class="about-text reveal">
      <span class="kicker">About Us</span>
      <h2>Transforming Waste into Value — Pengelolaan Minyak Jelantah Profesional</h2>
      <p class="lead">
        Borneo Eco Solution menyediakan solusi pengelolaan minyak jelantah yang aman, terdokumentasi, dan sesuai audit Non-B3.
        Kami bekerja sama dengan kantin, hotel, dan fasilitas produksi makanan untuk memastikan limbah dimanfaatkan dengan bertanggung jawab.
      </p>

      <ul class="about-benefits">
        <li><strong>Pencatatan Mingguan:</strong> Volume terukur, bukti pengambilan, dan laporan rutin untuk audit.</li>
        <li><strong>Drum 200L Berlabel:</strong> Menghindari tumpahan dan potensi pencemaran.</li>
        <li><strong>Jemput & Ganti:</strong> Proses cepat tanpa mengganggu operasional dapur Anda.</li>
      </ul>

      <div class="about-ctas">
        <a class="btn btn-primary" href="#contact">Ajukan Jemputan</a>
        <a class="btn btn-outline" href="#partnership">Jalin Kemitraan</a>
      </div>
    </div>

    {{-- Middle column: image --}}
    <div class="about-media reveal">
      <img src="{{ asset('assets/images/about-team-800.jpg') }}" alt="Tim Borneo Eco Solution" loading="lazy">
    </div>

    {{-- Right column: accordion (mission, vision, values) --}}
    <aside class="about-accordion reveal" aria-label="Company details">
      <div class="accordion-card">
        <button class="acc-toggle" aria-expanded="true">
          <div class="acc-title">
            <span>Our Mission</span>
            <svg class="acc-icon" width="18" height="18" viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M7 10l5 5 5-5z"/></svg>
          </div>
        </button>
        <div class="acc-panel" style="display:block;">
          <p>Memberikan solusi pengumpulan, penampungan, dan penyaluran minyak jelantah yang aman, transparan, dan terdokumentasi untuk membantu mitra memenuhi kewajiban lingkungan.</p>
        </div>
      </div>

      <div class="accordion-card">
        <button class="acc-toggle" aria-expanded="false">
          <div class="acc-title">
            <span>Our Vision</span>
            <svg class="acc-icon" width="18" height="18" viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M7 10l5 5 5-5z"/></svg>
          </div>
        </button>
        <div class="acc-panel">
          <p>Menjadi mitra terpercaya pengelolaan minyak jelantah di Kalimantan dan mempromosikan praktik pengelolaan limbah yang berkelanjutan.</p>
        </div>
      </div>

      <div class="accordion-card">
        <button class="acc-toggle" aria-expanded="false">
          <div class="acc-title">
            <span>Our Values</span>
            <svg class="acc-icon" width="18" height="18" viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M7 10l5 5 5-5z"/></svg>
          </div>
        </button>
        <div class="acc-panel">
          <ul class="values-list">
            <li>Keamanan Lingkungan</li>
            <li>Transparansi & Dokumentasi</li>
            <li>Kepatuhan Regulasi</li>
            <li>Pelayanan Profesional</li>
          </ul>
        </div>
      </div>
    </aside>
  </div>
</section>
