<section id="contact" class="section contact-card-section">
  <div class="container">
    <!-- Card wrapper -->
    <div class="contact-card contact-card--panel">
      <!-- LEFT: info -->
      <div class="contact-left contact-left--panel">
        <h3>Get in touch</h3>
        <p class="muted">Kami siap membantu pengelolaan minyak jelantah di fasilitas Anda. Isi formulir atau hubungi langsung melalui opsi di bawah.</p>

        <div class="contact-info-list">
          <div class="contact-item">
            <div class="contact-icon">
              <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
            </div>
            <div class="contact-info">
              <div class="ci-label">Head Office</div>
              <div class="ci-value">Banjarmasin, Kalimantan Selatan</div>
            </div>
          </div>

          <div class="contact-item">
            <div class="contact-icon">
              <i class="fas fa-envelope" aria-hidden="true"></i>
            </div>
            <div class="contact-info">
              <div class="ci-label">Email Us</div>
              <div class="ci-value">
                <a href="mailto:borneoecosolution@gmail.com">borneoecosolution@gmail.com</a>
              </div>
            </div>
          </div>

          <div class="contact-item">
            <div class="contact-icon">
              <i class="fas fa-phone" aria-hidden="true"></i>
            </div>
            <div class="contact-info">
              <div class="ci-label">Call Us</div>
              <div class="ci-value">
                <a href="https://wa.me/6287886272647?text=Halo%20Borneo%20Eco%20Solution%2C%20saya%20ingin%20informasi%20layanan" target="_blank" rel="noopener">+62 878-8627-2647</a>
              </div>
            </div>
          </div>
        </div>

        <div class="contact-note muted">Follow our social media</div>
        <div class="contact-socials">
          <a href="#" aria-label="facebook" class="social-btn"><i class="fab fa-facebook-f"></i></a>
          <a href="#" aria-label="instagram" class="social-btn"><i class="fab fa-instagram"></i></a>
          <a href="#" aria-label="youtube" class="social-btn"><i class="fab fa-youtube"></i></a>
        </div>
      </div>

      <!-- RIGHT: form -->
      <div class="contact-right contact-right--panel">
        <div id="contact-form-wrap" class="card contact-form-card">
          <h3 class="form-title">Send us a message</h3>

          <form id="contact-form" method="POST" action="{{ route('contact.send') }}" novalidate>
            @csrf

            <div class="form-grid">
              <div class="form-row">
                <label for="cf-name">Name</label>
                <input type="text" name="name" id="cf-name" required placeholder="Nama lengkap" />
              </div>

              <div class="form-row">
                <label for="cf-email">Email</label>
                <input type="email" name="email" id="cf-email" required placeholder="email@contoh.com" />
              </div>

              <div class="form-row full">
                <label for="cf-company">Company (optional)</label>
                <input type="text" name="company" id="cf-company" placeholder="Nama perusahaan" />
              </div>

              <div class="form-row full">
                <label for="cf-message">Message</label>
                <textarea name="message" id="cf-message" rows="6" required placeholder="Tulis kebutuhan / pesan Anda..."></textarea>
              </div>
            </div>

            <div class="form-row actions">
              <button id="cf-submit" class="btn btn-primary btn-block" type="submit">Send</button>
              <div id="cf-status" class="cf-status" aria-live="polite"></div>
            </div>
          </form>
        </div>
      </div>
    </div> <!-- .contact-card -->
  </div>
</section>

<!-- Font Awesome CDN (pastikan hanya sekali di halaman) -->
<script src="https://kit.fontawesome.com/a2e0e9ef3a.js" crossorigin="anonymous"></script>
