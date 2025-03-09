@extends('layouts.app')

@section('title', 'About AISS 2025 | Annual Information Security Summit 2025 | DSCI')

<!-- Navbar -->
@include('partials.navbar')

@section('content')

<div class="page-banner">
  <div class="container">
    <h1>About AISS 2025</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">About</li>
      </ol>
    </nav>
  </div>
</div>

<section class="about-section content-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mb-5 mb-lg-0">
        <h2 class="section-title">Annual Information Security Summit</h2>
        <p class="lead">The Annual Information Security Summit (AISS) is DSCI's flagship event, where industry,
          government, academia, and think tanks congregate to discuss, debate and deliberate issues pertaining to cyber
          security and privacy.</p>

        <p>AISS 2025 is truly an industry-led Cyber Security conference which considers the breadth as well as the depth
          of the Cyber Security ecosystem of the country and beyond.</p>

        <p>Over the years, AISS has evolved to become a significant platform where industry leaders meet, deliberate,
          and showcase the best practices, innovation happening in the space. AISS brings you a journey of technology,
          policy, innovation, and growth. The summit brings forth important discussions, a snapshot of cutting-edge
          digital security initiatives, and thought leadership on everything happening in the cyber domain.</p>

        <h3 class="mt-5">Why Attend AISS 2025?</h3>
        <div class="row mt-4">
          <div class="col-md-6 mb-4">
            <div class="feature-card">
              <div class="feature-icon">
                <i class="fas fa-users"></i>
              </div>
              <h4>Networking Opportunities</h4>
              <p>Connect with industry leaders, security professionals, and peers from around the globe.</p>
            </div>
          </div>
          <div class="col-md-6 mb-4">
            <div class="feature-card">
              <div class="feature-icon">
                <i class="fas fa-lightbulb"></i>
              </div>
              <h4>Thought Leadership</h4>
              <p>Gain insights from experts on the latest trends, challenges, and solutions in cybersecurity.</p>
            </div>
          </div>
          <div class="col-md-6 mb-4">
            <div class="feature-card">
              <div class="feature-icon">
                <i class="fas fa-laptop-code"></i>
              </div>
              <h4>Cutting-Edge Technologies</h4>
              <p>Discover the latest innovations and technologies in the cybersecurity landscape.</p>
            </div>
          </div>
          <div class="col-md-6 mb-4">
            <div class="feature-card">
              <div class="feature-icon">
                <i class="fas fa-handshake"></i>
              </div>
              <h4>Business Opportunities</h4>
              <p>Explore collaboration and partnership opportunities with industry leaders and startups.</p>
            </div>
          </div>
        </div>

        <h3 class="mt-4">Theme for AISS 2025</h3>
        <p>The theme for AISS 2025 focuses on "Securing the Digital Future: Innovation, Resilience, and Collaboration."
          As we navigate an increasingly complex digital landscape, the summit aims to address the evolving challenges
          and opportunities in cybersecurity, emphasizing the importance of innovative solutions, resilient systems, and
          collaborative approaches to protect our digital infrastructure.</p>

        <div class="theme-highlights mt-4">
          <div class="theme-highlight-item">
            <h5><i class="fas fa-check-circle"></i> Innovation in Cybersecurity</h5>
            <p>Exploring cutting-edge technologies and approaches to address emerging threats</p>
          </div>
          <div class="theme-highlight-item">
            <h5><i class="fas fa-check-circle"></i> Building Cyber Resilience</h5>
            <p>Strategies for developing robust security postures that can withstand evolving attacks</p>
          </div>
          <div class="theme-highlight-item">
            <h5><i class="fas fa-check-circle"></i> Collaborative Security</h5>
            <p>Fostering partnerships between public and private sectors to enhance cybersecurity</p>
          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="about-sidebar">
          <div class="sidebar-card mb-4">
            <h4>Event Details</h4>
            <ul class="event-details-list">
              <li>
                <i class="far fa-calendar-alt"></i>
                <div>
                  <strong>Date</strong>
                  <span>December 2025</span>
                </div>
              </li>
              <li>
                <i class="fas fa-map-marker-alt"></i>
                <div>
                  <strong>Location</strong>
                  <span>New Delhi, India</span>
                </div>
              </li>
              <li>
                <i class="fas fa-users"></i>
                <div>
                  <strong>Attendees</strong>
                  <span>2500+ Professionals</span>
                </div>
              </li>
              <li>
                <i class="fas fa-microphone-alt"></i>
                <div>
                  <strong>Speakers</strong>
                  <span>100+ Industry Experts</span>
                </div>
              </li>
            </ul>
          </div>

          <div class="sidebar-card previous-events mb-4">
            <h4>Previous Editions</h4>
            <ul class="previous-events-list">
              <li>
                <a href="https://www.dsci.in/event/aiss-2024" target="_blank">
                  <span class="edition">AISS 2024</span>
                  <span class="location">New Delhi</span>
                </a>
              </li>
              <li>
                <a href="https://www.dsci.in/event/aiss-2023" target="_blank">
                  <span class="edition">AISS 2023</span>
                  <span class="location">New Delhi</span>
                </a>
              </li>
              <li>
                <a href="https://www.dsci.in/event/aiss-2022" target="_blank">
                  <span class="edition">AISS 2022</span>
                  <span class="location">New Delhi</span>
                </a>
              </li>
              <li>
                <a href="https://www.dsci.in/event/aiss-2021" target="_blank">
                  <span class="edition">AISS 2021</span>
                  <span class="location">Virtual</span>
                </a>
              </li>
            </ul>
          </div>

          <div class="cta-card">
            <h4>Join Us at AISS 2025</h4>
            <p>Be part of India's premier cybersecurity conference. Register today to secure your spot!</p>
            <a href="#registration" class="btn btn-primary btn-block rounded-pill">Book Your Seat</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="organizer-section content-section">
  <div class="container">
    <h2 class="section-title text-center mb-5">About the Organizer</h2>
    <div class="row align-items-center">
      <div class="col-lg-6 mb-4 mb-lg-0">
        <img src="{{ asset('images/dsci-about.jpg') }}" alt="DSCI" class="img-fluid rounded shadow">
      </div>
      <div class="col-lg-6">
        <h3>Data Security Council of India (DSCI)</h3>
        <p>DSCI is a premier industry body on data protection in India, setup by NASSCOM®, committed to making the
          cyberspace safe, secure and trusted by establishing best practices, standards and initiatives in cyber
          security and privacy.</p>

        <p>DSCI brings together governments and their agencies, industry sectors including IT-BPM, BFSI, Telecom,
          industry associations, data protection authorities and think tanks for policy advocacy, thought leadership,
          capacity building and outreach activities.</p>

        <div class="mt-4">
          <a href="https://www.dsci.in" target="_blank" class="btn btn-outline-light rounded-pill">Visit DSCI
            Website</a>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('custom-css')
<style>
  .page-banner {
    background-color: #050d23;
    background-image: linear-gradient(45deg, rgba(1, 179, 128, 0.1), rgba(5, 13, 35, 0.9)),
    url('{{ asset("images/banner-bg.jpg") }}');
    background-size: cover;
    background-position: center;
    padding: 120px 0 50px;
    text-align: center;
    margin-bottom: 0;
  }

  .page-banner h1 {
    color: #fff;
    font-size: 42px;
    font-weight: 700;
    margin-bottom: 15px;
  }

  .breadcrumb {
    background-color: transparent;
    justify-content: center;
    margin-bottom: 0;
  }

  .breadcrumb-item a {
    color: #01B380;
  }

  .breadcrumb-item.active {
    color: #fff;
  }

  .breadcrumb-item+.breadcrumb-item::before {
    color: rgba(255, 255, 255, 0.5);
  }

  .section-title {
    color: #fff;
    font-weight: 600;
    margin-bottom: 30px;
  }

  .lead {
    font-size: 18px;
    color: #01B380;
    font-weight: 500;
  }

  p {
    color: #c5c5c5;
    margin-bottom: 20px;
    line-height: 1.7;
  }

  h3 {
    color: #fff;
    font-weight: 600;
    font-size: 24px;
  }

  .feature-card {
    background-color: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    padding: 25px;
    height: 100%;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .feature-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
  }

  .feature-icon {
    font-size: 30px;
    color: #01B380;
    margin-bottom: 15px;
  }

  .feature-card h4 {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 10px;
    color: #fff;
  }

  .feature-card p {
    color: #c5c5c5;
    font-size: 14px;
    margin-bottom: 0;
  }

  .theme-highlights {
    margin-top: 30px;
  }

  .theme-highlight-item {
    margin-bottom: 20px;
  }

  .theme-highlight-item h5 {
    color: #fff;
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 10px;
  }

  .theme-highlight-item i {
    color: #01B380;
    margin-right: 10px;
  }

  .theme-highlight-item p {
    color: #c5c5c5;
    font-size: 14px;
    margin-left: 30px;
    margin-bottom: 0;
  }

  .about-sidebar {
    position: sticky;
    top: 100px;
  }

  .sidebar-card {
    background-color: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    padding: 25px;
    margin-bottom: 30px;
  }

  .sidebar-card h4 {
    color: #fff;
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 20px;
    position: relative;
    padding-bottom: 10px;
  }

  .sidebar-card h4:after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 50px;
    height: 2px;
    background-color: #01B380;
  }

  .event-details-list {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  .event-details-list li {
    display: flex;
    align-items: flex-start;
    margin-bottom: 20px;
  }

  .event-details-list li:last-child {
    margin-bottom: 0;
  }

  .event-details-list li i {
    color: #01B380;
    font-size: 20px;
    margin-right: 15px;
    width: 20px;
    text-align: center;
    margin-top: 3px;
  }

  .event-details-list li div {
    flex: 1;
  }

  .event-details-list li strong {
    display: block;
    color: #fff;
    font-weight: 600;
    margin-bottom: 3px;
  }

  .event-details-list li span {
    color: #c5c5c5;
    font-size: 14px;
  }

  .previous-events-list {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  .previous-events-list li {
    margin-bottom: 15px;
  }

  .previous-events-list li:last-child {
    margin-bottom: 0;
  }

  .previous-events-list li a {
    display: flex;
    justify-content: space-between;
    color: #c5c5c5;
    text-decoration: none;
    transition: color 0.3s ease;
    padding: 5px 0;
  }

  .previous-events-list li a:hover {
    color: #01B380;
  }

  .previous-events-list .edition {
    font-weight: 600;
    color: #fff;
  }

  .cta-card {
    background-color: #01B380;
    border-radius: 10px;
    padding: 30px;
    text-align: center;
  }

  .cta-card h4 {
    color: #fff;
    font-size: 22px;
    font-weight: 600;
    margin-bottom: 15px;
  }

  .cta-card p {
    color: rgba(255, 255, 255, 0.8);
    margin-bottom: 20px;
  }

  .cta-card .btn {
    background-color: #fff;
    color: #050d23;
    border: none;
    font-weight: 600;
    padding: 12px 30px;
  }

  .cta-card .btn:hover {
    background-color: #050d23;
    color: #fff;
  }

  .organizer-section {
    background-color: rgba(1, 179, 128, 0.05);
  }

  @media (max-width: 767px) {
    .page-banner {
      padding: 100px 0 40px;
    }

    .page-banner h1 {
      font-size: 32px;
    }

    .sidebar-card {
      margin-bottom: 20px;
    }

    .about-sidebar {
      margin-top: 40px;
    }
  }
</style>
@endsection
