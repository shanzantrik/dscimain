<footer class="footer">
  <div class="footer-bar">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-lg-2 col-md-3 col-sm-6">
          <div class="logo">
            <a href="http://www.dsci.in" target="_blank">
              <img src="{{ asset('images/dsci-logo-white.webp') }}" alt="DSCI" width="100">
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6">
          <div class="phone-box d-flex">
            <figure>
              <img src="{{ asset('images/footer/telephone.png') }}" alt="Phone">
            </figure>
            <div class="phone-detail">
              <span>AISS Sponsorship</span>
              <a href="tel:+918882549999">+91 88825 49999</a>
            </div>
          </div>
        </div>
        <div class="col-lg-7 col-md-6">
          <div class="sponsorship-details">
            <div class="d-flex align-items-center">
              <div class="text-white">
                <img class="me-2" src="{{ asset('images/footer/email.png') }}" alt="Email" width="24">
              </div>
              <div>
                <p>For Sponsorship Enquiry:
                  <a href="mailto:sponsorships@dsci.in">sponsorships@dsci.in</a>
                </p>
              </div>
            </div>
            <div class="d-flex align-items-center">
              <div class="text-white">
                <img class="me-2" src="{{ asset('images/footer/email.png') }}" alt="Email" width="24">
              </div>
              <div>
                <p>For Media & Press Enquiry:
                  <a href="mailto:media@dsci.in">media@dsci.in</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-4">
        <div class="footer-widget">
          <div class="widget-title">Data Protection Organisation</div>
          <p>
            Data Security Council of India (DSCI) is a not-for-profit, industry body on data protection in India,
            setup by NASSCOM®, committed to making cyberspace safe, secure and trusted by establishing best
            practices, standards and initiatives in cyber security and privacy.
          </p>
        </div>
      </div>
      <div class="col-12 col-lg-2 col-md-6">
        <div class="footer-widget">
          <div class="widget-title">AISS Resources</div>
          <p><a href="https://www.dsci.in/content/aiss-2024">AISS 2024</a></p>
          <p><a href="https://www.dsci.in/content/aiss-2023">AISS 2023</a></p>
          <p><a href="https://www.dsci.in/content/aiss-2022">AISS 2022</a></p>
          <p><a href="https://www.dsci.in/content/aiss-2021">AISS 2021</a></p>
        </div>
      </div>
      <div class="col-12 col-lg-3 col-md-6">
        <div class="footer-widget">
          <div class="widget-title">Subscribe to Updates</div>
          <div class="newsletter-box">
            <form>
              <input type="email" placeholder="Email Address" required>
              <input type="submit" value="SUBSCRIBE">
            </form>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-3">
        <div class="footer-widget">
          <div class="widget-title">Social Media</div>
          <div class="social-section">
            <h6>FOLLOW US</h6>
          </div>
          <ul class="social-media">
            <li>
              <a href="https://www.facebook.com/DSCI.Connect" target="_blank">
                <i class="fab fa-facebook-f"></i>
                <span>Facebook</span>
              </a>
            </li>
            <li>
              <a href="https://twitter.com/DSCI_Connect" target="_blank">
                <i class="fab fa-twitter"></i>
                <span>Twitter</span>
              </a>
            </li>
            <li>
              <a href="https://in.linkedin.com/company/data-security-council-of-india" target="_blank">
                <i class="fab fa-linkedin-in"></i>
                <span>Linkedin</span>
              </a>
            </li>
            <li>
              <a href="https://www.youtube.com/user/dsciconnect" target="_blank">
                <i class="fab fa-youtube"></i>
                <span>Youtube</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="bottom-bar">
    <div class="container">
      <span class="copyright">© 2025 Data Security Council of India</span>
      <span class="creation">
        Website By <a href="https://www.shantanugoswami.online/" target="_blank">SG</a>
      </span>
    </div>
  </div>
</footer>

<style>
  .footer {
    background-color: #03122b;
    color: #fff;
    padding: 60px 0 0;
  }

  .footer-logo p {
    color: #c5c5c5;
    font-size: 14px;
  }

  .footer-social a {
    color: #fff;
    font-size: 20px;
    transition: color 0.3s ease;
  }

  .footer-social a:hover {
    color: #01B380;
  }

  .footer-title {
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 20px;
    position: relative;
  }

  .footer-title:after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 0;
    width: 50px;
    height: 2px;
    background-color: #01B380;
  }

  .footer-links {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  .footer-links li {
    margin-bottom: 10px;
  }

  .footer-links a {
    color: #c5c5c5;
    text-decoration: none;
    transition: color 0.3s ease;
  }

  .footer-links a:hover {
    color: #01B380;
  }

  .contact-info p {
    color: #c5c5c5;
    margin-bottom: 15px;
    font-size: 14px;
  }

  .contact-info a {
    color: #c5c5c5;
    text-decoration: none;
    transition: color 0.3s ease;
  }

  .contact-info a:hover {
    color: #01B380;
  }

  .bottom-bar {
    padding: 20px 0;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    font-size: 14px;
  }

  .bottom-bar p {
    margin-bottom: 0;
    color: #c5c5c5;
  }

  .bottom-bar a {
    color: #c5c5c5;
    text-decoration: none;
    transition: color 0.3s ease;
  }

  .bottom-bar a:hover {
    color: #01B380;
  }

  @media (max-width: 767px) {
    .footer {
      padding: 40px 0 0;
    }

    .bottom-bar {
      text-align: center;
    }

    .col-md-6.text-md-end {
      text-align: center !important;
      margin-top: 10px;
    }
  }
</style>
