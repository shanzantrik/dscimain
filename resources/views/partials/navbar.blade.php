<nav class="navbar brand-navbar" id="navbar">
  <div class="container-fluid px-3">
    <div class="logo" style="display: flex; align-items: center;">
      <a href="#home_banner">
        <img src="{{ asset('images/dsci-logo-white.webp') }}" alt="DSCI" loading="lazy">
      </a>
    </div>
    <div class="site-menu">
      <ul>
        <li><a href="{{ route('about') }}">About</a></li>
        <li><a href="#broadFocus">Broad Focus</a></li>
        <li><a href="{{ route('speakers') }}">Speakers</a></li>
        <li><a href="#eventSchedule">Schedule</a></li>
        <li><a href="#sponsors">Sponsors</a></li>
        <li><a href="https://www.dsci.in/content/dsci-excellence-awards-2025" target="_blank">Excellence Awards</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </div>
    <div class="hamburger-menu">
      <button class="menu">
        <svg width="45" height="45" viewBox="0 0 100 100">
          <path class="line line1"
            d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
          <path class="line line2" d="M 20,50 H 80" />
          <path class="line line3"
            d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
        </svg>
      </button>
    </div>

    <div class="navbar-button d-flex align-items-center">
      <div class="dropdown me-3">
        <button class="dropbtn">Room Reservation</button>
        <div class="dropdown-content">
          <a style="color: #fff;"
            href="https://all.accor.com/lien_externe.svlt?goto=rech_resa&code_langue=en&preferredCode=BGCI&destination=7560&adultNumber=1&childrenNumber=0&dayIn=02&monthIn=12&yearIn=2025&nightNb=5"
            target="_blank">Novotel</a>
          <hr style="color:#fff;">
          <a style="color: #fff;"
            href="https://all.accor.com/lien_externe.svlt?goto=rech_resa&code_langue=en&preferredCode=BGCI&destination=7559&adultNumber=1&childrenNumber=0&dayIn=02&monthIn=12&yearIn=2025&nightNb=4"
            target="_blank">Pullman</a>
        </div>
      </div>
      <a href="#registration" class="book-seat-btn">Book Your Seat</a>
    </div>
  </div>
</nav>

<style>
  /* Navbar Styles */
  .navbar {
    padding: 15px 0;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1030;
    transition: all 0.3s ease;
    background-color: transparent;
  }

  .navbar.brand-navbar {
    background-color: rgba(165, 108, 255, 0.95) !important;
  }

  .navbar.scrolled {
    background-color: rgba(165, 108, 255, 0.11) !important;
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
  }

  /* Menu Item Styles */
  .site-menu {
    display: flex;
    align-items: right;
  }

  .site-menu ul {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
  }

  .site-menu ul li {
    margin: 0 15px;
  }

  .site-menu ul li a {
    font-size: 15px;
    font-weight: 500;
    color: #fff;
    text-decoration: none;
    transition: all 0.3s ease;
  }

  .site-menu ul li a:hover {
    color: #cff209;
  }

  /* Dropdown Button Styles */
  .dropbtn {
    color: white;
    background-color: transparent;
    border-radius: 30px;
    padding: 10px 15px;
    font-size: 15px;
    font-weight: 500;
    border: 1px solid #fff;
    cursor: pointer;
    outline: none;
    transition: all 0.3s ease;
  }

  .dropdown {
    position: relative;
    display: inline-block;
  }

  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #05102d;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
    border-radius: 5px;
  }

  .dropdown-content a {
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    font-size: 15px;
  }

  .dropdown:hover .dropdown-content {
    display: block;
  }

  .dropdown:hover .dropbtn {
    color: #cff209;
    border-color: #cff209;
  }


  /* Mobile Menu Button */
  .hamburger-menu {
    display: none;
  }

  @media (max-width: 991px) {
    .site-menu {
      display: none;
    }

    .hamburger-menu {
      display: block;
    }

    .navbar-button {
      display: none !important;
    }
  }
</style>
