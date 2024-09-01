

<footer>
  <div class="npc__container--fluid">
    <div class="npc__footer-content-wrapper">
      <div class="npc__footer-main-content">
        <!-- one  -->
        <div class="npc__footer-main-content-left">
          <div class="npc__footer-contact-info">
            <!-- footer logo -->
            <div class="footer__logo">
              <div class="footer__logo-img">
                <img src="{{ getSiteSetting('logo_image') }}" alt="" />
              </div>
            </div>

            <div class="footer__get-in-touch">
              <p class="flex items-center gap-2">
                <span>
                  <i class="fa-solid fa-phone"></i>
                </span>
                <span>{{ getSiteSetting('social_phone') }}</span>
              </p>
              <p class="flex items-center gap-2">
                <span>
                  <i class="fa-solid fa-location-dot"></i>
                </span>
                <span>{{ getSiteSetting('location') }}</span>
              </p>
              <p class="flex items-center gap-2">
                <span>
                  <i class="fa-solid fa-envelope"></i>
                </span>
                <span>{{ getSiteSetting('email') }}</span>
              </p>
            </div>
          </div>

          <div class="npc__footer-quick-links">
            <h3>Quick Links</h3>
            <div class="npc__footer-quick-links-container flex flex-col">
              <a
                href="https://nepalpharmacycouncil.org.np/kyp/public/"
                target="_blank"
                rel="noopener noreferrer"
                class="npc__footer-quick-link"
                >Know Your Pharmacis (KYP)</a
              >
              <a
              href="https://onlinenameregistration.nepalpharmacycouncil.org.np/old_records/search_professional"
              target="_blank"
              rel="noopener noreferrer"
              class="npc__footer-quick-link"
              >Search Professionals</a
            >
            <a
              href="https://onlinenameregistration.nepalpharmacycouncil.org.np/admitcards"
              target="_blank"
              rel="noopener noreferrer"
              class="npc__footer-quick-link"
              >Admit Card</a
            ><a
              href="https://onlinenameregistration.nepalpharmacycouncil.org.np/result"
              target="_blank"
              rel="noopener noreferrer"
              class="npc__footer-quick-link"
              >Result</a
            >
            </div>
          </div>
        </div>

        <!-- two  -->
        <div class="npc__footer-main-content-right">
          <div class="npc__footer-links">
            <h3>Links</h3>
            <div class="npc__footer-links-container flex flex-col">
              <a href="/" class="npc__footer-link">home</a
              ><a href="/contact" class="npc__footer-link">contact</a
              ><a href="/about" class="npc__footer-link">about</a>
            </div>
          </div>

          <div class="npc__footer-connect flex flex-col gap-10">
            <div class="npc__footer-connect-container">
              <h3>Connect With Us</h3>
              <div class="npc__footer-socials-container flex flex-col">
                <a href="{{ getSiteSetting("social_fb") }}" class="npc__footer-social flex gap-2">
                  <span>
                    <i class="fa-brands fa-square-facebook"></i>
                  </span>
                  <span>facebook</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="copyright-separator"></div>
      <div class="footer__copyright-content">
        <h2 class="npc__copyright">
          {{ getSiteSetting("copy_right") }}
        </h2>
      </div>
    </div>
  </div>
</footer>
