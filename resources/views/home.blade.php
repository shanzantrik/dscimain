@extends('layouts.app')

@section('title', 'AISS 2025 | Annual Information Security Summit 2025 | DSCI')

@section('content')
<!-- Override navbar styles for transparency -->
<style>
  .navbar.transparent-navbar {
    background-color: transparent !important;
  }

  .navbar.scrolled {
    background-color: #05102d !important;
  }
</style>

<!-- Preloader -->
@include('partials.preloader')

<!-- Mobile Menu -->
<aside class="mobile-menu">
  <svg viewBox="0 0 600 1080" preserveAspectRatio="none" version="1.1">
    <path d="M540,1080H0V0h540c0,179.85,0,359.7,0,539.54C540,719.7,540,899.85,540,1080z"></path>
  </svg>

  <div class="inner">
    <div class="site-menu">
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#broadFocus">Broad Focus</a></li>
        <li><a href="#speakers">Speakers</a></li>
        <li><a href="#eventSchedule">Schedule</a></li>
        <li><a href="#sponsors">Sponsors</a></li>
        <li><a href="https://www.dsci.in/content/dsci-excellence-awards-2025" target="_blank">Excellence Awards</a></li>
        <li><a href="#contact">Contact</a></li>
        <div class="dropdownmob">
          <button class="dropbtnmob">Room Reservation</button>
          <div class="dropdownmob-content" id="myDropdownmob">
            <a style="color: #fff;"
              href="https://all.accor.com/lien_externe.svlt?goto=rech_resa&code_langue=en&preferredCode=BGCI&destination=7560&adultNumber=1&childrenNumber=0&dayIn=02&monthIn=12&yearIn=2025&nightNb=5"
              target="_blank">Novotel</a>
            <a style="color: #fff;"
              href="https://all.accor.com/lien_externe.svlt?goto=rech_resa&code_langue=en&preferredCode=BGCI&destination=7559&adultNumber=1&childrenNumber=0&dayIn=02&monthIn=12&yearIn=2025&nightNb=4"
              target="_blank">Pullman</a>
          </div>
        </div>
        <li class="register-btn"><a href="#registration">Book Your Seat</a></li>
      </ul>
    </div>
  </div>
</aside>

<!-- Navbar -->
@include('partials.navbar')

<div class="smooth-scroll">
  <!-- Hero Section -->
  <section class="hero-section">
    <div class="container">
      <div class="row align-items-center">
        <!-- Left side content -->
        <div class="col-lg-6 hero-content">
          <h1 class="hero-title">{{ $eventData['title'] }}</h1>
          <p class="hero-description">The premier cybersecurity event bringing together industry leaders, policymakers,
            and technology experts to address emerging threats and innovative solutions.</p>
          <div class="hero-cta">
            <a href="#registration" class="btn btn-primary btn-lg">Register Now</a>
            <a href="#eventSchedule" class="btn btn-outline-light btn-lg ms-3">View Schedule</a>
          </div>
        </div>
        <!-- Right side animation -->
        <div class="col-lg-6 hero-animation">
          <div class="animation-container">
            <!-- Three.js globe container -->
            <div id="globe-container" class="globe-container"></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Fixed bottom panel for event info -->
  <div class="event-bottom-panel">
    <div class="container-fluid px-3">
      <div class="row">
        <div class="col-md-4 panel-item">
          <span class="info-label">
            <x-heroicon-o-calendar class="info-icon" /> Date
          </span>
          <span class="info-value">{{ $eventData['date'] }}</span>
        </div>
        <div class="col-md-4 panel-item">
          <span class="info-label">
            <x-heroicon-o-map-pin class="info-icon" /> Venue
          </span>
          <span class="info-value">{{ $eventData['venue'] }}</span>
        </div>
        <div class="col-md-4 panel-item">
          <span class="info-label">
            <x-heroicon-o-hashtag class="info-icon" /> Follow Us
          </span>
          <div class="hashtags">
            @foreach($eventData['hashtags'] as $hashtag)
            <span class="hashtag">
              <x-heroicon-o-hand-thumb-up class="hashtag-icon" />
              {{ $hashtag }}
            </span>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- About Section -->
  <section class="content-section bg-white" id="about">
    <div class="container">
      <div class="row align-items-center">
        <!-- Image Grid -->
        <div class="col-lg-6">
          <div class="about-image-grid">
            <!-- First row: 1 large + 2 small -->
            <div class="grid-row">
              <div class="grid-item featured">
                <div class="image-wrapper">
                  <img src="{{ asset('images/4005.jpg') }}" alt="AISS Conference" class="img-fluid">
                </div>
              </div>
              <div class="grid-column">
                <div class="grid-item">
                  <div class="image-wrapper">
                    <img src="{{ asset('images/400250.png') }}" alt="AISS Event" class="img-fluid">
                  </div>
                </div>
                <div class="grid-item">
                  <div class="image-wrapper">
                    <img src="{{ asset('images/2.png') }}" alt="Conference Highlights" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
            <!-- Second row: 2 small -->

          </div>
        </div>
        <!-- Content -->
        <div class="col-lg-6">
          <div class="about-content">
            <h6 class="text-primary text-uppercase mb-2">ABOUT</h6>
            <h2 class="mb-4 text-dark">Nasscom-DSCI Annual Information Security Summit 2024</h2>
            <h5 class="text-muted mb-4">04, 05 & 06 December, 2024 | 19th Edition</h5>
            <div class="about-text">
              <p class="text-dark">AISS, an industry-led conference, is characterized by presence of a diverse set of
                stakeholders, themes, sub themes, topics and sub-topics, multiple tracks, varied session formats and
                plethora of activities and experiences that make up for a rich three-day engagement and learning for the
                delegates. This edition shall entail deliberations organized around the broad areas of Security
                Technology Leadership, Security & Privacy Governance, Data, Digitization & Data Sharing, Future of Cyber
                Crimes, Response & Resiliency, Cloud native landscape, AI Paradigm shifts, professionalization of
                Ransomware, among others.</p>
              <p class="mt-4 text-dark">The nineteenth edition of the Annual Information Security Summit (AISS) is
                slated for December 4, 5 & 6, 2024. The journey charted by the Summit over the past eighteen years has
                been marked by increasingly compelling, relevant, and futuristic content that gets shaped by multiple
                factors and contexts and has endeavoured to cover the entire spectrum of Cyber Security & Data
                Protection.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Broad Focus Section -->
  <section class="content-section broadfocuslist position-relative" id="broadFocus">
    <div class="">
      <div class="text-center text-white">
        <h2 style="margin-bottom:50px; margin-top:50px;">Broad Focus Areas</h2>
      </div>
      <div class="">
        <div class="row text-center">
          <!-- Sample focus area cards -->
          <div class="col-md-3 mb-4">
            <div class="card card1 h-100 shadow">
              <div class="card-body">
                <img src="{{ asset('images/broad-focus/Asset 1.svg') }}" alt="">
                <h5 class="card-title">Response & Resiliency</h5>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card card2 h-100 shadow">
              <div class="card-body">
                <img src="{{ asset('images/broad-focus/Security & Privacy.svg') }}" alt="">
                <h5 class="card-title">Security & Privacy Governance</h5>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card card3 h-100 shadow">
              <div class="card-body">
                <img src="{{ asset('images/broad-focus/Asset 3.svg') }}" alt="">
                <h5 class="card-title">Crypto Agility</h5>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card card4 h-100 shadow">
              <div class="card-body">
                <img src="{{ asset('images/broad-focus/Asset 6.svg') }}" alt="">
                <h5 class="card-title">Security Research and Innovation</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Speakers Section -->
  <section class="content-section bg-white" id="speakers">
    <div class="container" style="margin-top:50px;">
      <div class="row justify-content-center">
        <div class="col-12 col-lg-6">
          <div class="section-title text-left">
            <h2 class="text-dark">Event Speakers</h2>
          </div>
        </div>
        <div class="col-sm-12 col-lg-6">
          <form class="filter">
            <input type="text" id="slidename" placeholder="Search by name" />
          </form>
        </div>
      </div>
      <div class="speakers-slider">
        @foreach($speakers as $speaker)
        <div class="speaker-item">
          <div class="speaker-image">
            <img src="{{ $speaker->image_url }}" alt="{{ $speaker->name }}" class="rounded-circle">
          </div>
          <div class="speaker-info">
            <h4 class="text-dark">{{ $speaker->name }}</h4>
            <p class="designation">{{ $speaker->designation }}</p>
            @if($speaker->company)
            <p class="company text-secondary">{{ $speaker->company }}</p>
            @endif
          </div>
        </div>
        @endforeach
      </div>
      <div class="text-center mt-4">
        <a href="#" class="view-all-btn">
          View All Speakers
          <svg class="icon" viewBox="0 0 24 24" fill="currentColor">
            <path fill-rule="evenodd"
              d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm4.28 10.28a.75.75 0 000-1.06l-3-3a.75.75 0 10-1.06 1.06l1.72 1.72H8.25a.75.75 0 000 1.5h5.69l-1.72 1.72a.75.75 0 101.06 1.06l3-3z"
              clip-rule="evenodd"></path>
          </svg>
        </a>
      </div>
    </div>
  </section>

  <!-- Event Schedule Section -->
  <section class="content-section" id="eventSchedule">
    <div class="container position-relative">
      <div class="row align-items-start">
        <div class="col-12 mb-4">
          <div class="text-center text-white">
            <h3>EVENT SCHEDULE</h3>
            <h2><span>Sessions that are Planned</span></h2>
          </div>
        </div>
        <!-- Schedule tabs and content -->
        <div class="tabMainArea">
          @foreach($eventDays as $day)
          <div class="tablink {{ $loop->first ? 'active' : '' }}"
            onclick="openPage('day{{ $day->id }}', this, '{{ $day->color_code }}')">
            @if($day->subtitle)
            <p>{{ $day->subtitle }}</p>
            @endif
            <h1>{{ $day->title }}</h1>
            <p>{{ $day->date->format('l - d F') }}</p>
            <i class="fa fa-angle-down"></i>
          </div>
          @endforeach
        </div>

        <!-- Tab content -->
        @foreach($eventDays as $day)
        <div id="day{{ $day->id }}" class="tabcontent {{ $loop->first ? 'show' : '' }}">
          <div class="schedule-timeline">
            @foreach($day->agendas as $agenda)
            <div class="timeline-item">
              <div class="timeline-time">
                {{ $agenda->start_time->format('h:i A') }} - {{ $agenda->end_time->format('h:i A') }}
              </div>
              <div class="timeline-content">
                <h3>{{ $agenda->title }}</h3>
                @if($agenda->description)
                <p>{!! $agenda->description !!}</p>
                @endif
                @if($agenda->venue || $agenda->track)
                <div class="event-meta">
                  @if($agenda->venue)
                  <span class="venue">
                    <i class="fas fa-map-marker-alt"></i> {{ $agenda->venue }}
                  </span>
                  @endif
                  @if($agenda->track)
                  <span class="track">
                    <i class="fas fa-stream"></i> {{ $agenda->track }}
                  </span>
                  @endif
                </div>
                @endif
                @if($agenda->speakers->count() > 0)
                <div class="speakers-list">
                  @foreach($agenda->speakers as $speaker)
                  <div class="speaker-item">
                    <img src="{{ $speaker->image_url }}" alt="{{ $speaker->name }}" class="speaker-avatar">
                    <div class="speaker-info">
                      <h4>{{ $speaker->name }}</h4>
                      @if($speaker->pivot->role)
                      <span class="role">{{ $speaker->pivot->role }}</span>
                      @endif
                      {{-- <p>{{ $speaker->designation }}</p> --}}
                    </div>
                  </div>
                  @endforeach
                </div>
                @endif
              </div>
            </div>
            @endforeach
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Registration Section -->
  <section id="registration" class="content-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="text-center">
            <h2>Register Now</h2>
            <p class="lead">Secure your spot at AISS 2025</p>
          </div>
          <!-- Registration form will go here -->
        </div>
      </div>
    </div>
  </section>

  <!-- Sponsors Section -->
  <section class="content-section" id="sponsors">
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-12">
          <div data-scroll data-scroll-speed="0.5">
            <div class="section-title text-center">
              <h6 style="text-transform: uppercase;">THOSE WHO MAKE AISS 2025 POSSIBLE</h6>
              <h2>Sponsors, Partners & Exhibitors</h2>
            </div>
          </div>
        </div>
        <!-- Sponsors content will go here -->
      </div>
    </div>
  </section>

  <!-- Footer -->
  @include('partials.footer')
</div>

@section('custom-css')
<style>
  /* Mobile Menu Styles */
  .mobile-menu {
    background-color: #05102d;
  }

  /* Mobile logo size */
  .mobile-menu .logo img {
    width: 129px;
    height: auto;
  }

  .mobile-menu .site-menu ul li a {
    font-size: 15px;
    font-weight: 500;
    padding: 12px 0;
    display: block;
  }

  .mobile-menu .site-menu ul li a:hover {
    color: #01B380;
  }

  .dropbtnmob {
    color: white;
    background-color: transparent;
    padding: 12px 0;
    font-size: 15px;
    font-weight: 500;
    border: none;
    width: 100%;
    text-align: left;
    transition: all 0.3s ease;
  }

  .dropbtnmob:hover {
    color: #01B380;
  }

  .dropdownmob-content {
    background-color: rgba(1, 179, 128, 0.1);
  }

  .dropdownmob-content a {
    font-size: 15px;
    padding: 12px 15px;
  }

  .mobile-menu .register-btn a {
    display: inline-block;
    background-color: #01B380;
    color: white;
    font-size: 15px;
    font-weight: 500;
    padding: 10px 20px;
    border-radius: 30px;
    margin-top: 15px;
    transition: all 0.3s ease;
  }

  .mobile-menu .register-btn a:hover {
    background-color: #ffffff;
    color: #05102d;
    text-decoration: none;
  }

  /* Navbar Styles */
  .navbar {
    transition: background-color 0.3s ease;
    position: fixed;
    width: 100%;
    z-index: 1000;
  }

  .transparent-navbar {
    background-color: transparent !important;
    box-shadow: none;
  }

  .navbar.scrolled {
    background-color: #05102d !important;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  }

  /* Hero Section Styles */
  .hero-section {
    background-color: #05102d;
    background-image: linear-gradient(135deg, #05102d 0%, #0a1f4d 100%);
    color: #ffffff;
    padding: 180px 0 100px;
    position: relative;
    overflow: hidden;
    margin-top: -80px;
  }

  .hero-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2V6h4V4H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    opacity: 0.1;
  }

  .hero-content {
    padding-right: 30px;
    z-index: 1;
    position: relative;
  }

  .hero-title {
    font-size: 48px;
    font-weight: 700;
    margin-bottom: 25px;
    line-height: 1.2;
    color: #ffffff;
  }

  .hero-description {
    font-size: 18px;
    line-height: 1.6;
    margin-bottom: 30px;
    opacity: 0.9;
  }

  .hero-cta .btn-primary {
    background-color: #01B380;
    border-color: #01B380;
    font-weight: 600;
    padding: 12px 30px;
    border-radius: 30px;
    transition: all 0.3s ease;
  }

  .hero-cta .btn-primary:hover {
    background-color: #ffffff;
    border-color: #ffffff;
    color: #05102d;
  }

  .hero-cta .btn-outline-light {
    font-weight: 600;
    padding: 12px 30px;
    border-radius: 30px;
    transition: all 0.3s ease;
  }

  .hero-animation {
    position: relative;
    z-index: 1;
  }

  .animation-container {
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
  }

  /* Three.js Globe Container */
  .globe-container {
    width: 100%;
    height: 450px;
    position: relative;
    overflow: visible;
    transform-style: preserve-3d;
    perspective: 1000px;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .globe-container canvas {
    position: absolute;
    width: 100%;
    height: 100%;
  }

  /* Media queries for responsive design */
  @media (max-width: 1200px) {
    .globe-container {
      height: 400px;
    }
  }

  @media (max-width: 991px) {
    .globe-container {
      height: 350px;
    }
  }

  @media (max-width: 767px) {
    .globe-container {
      height: 300px;
    }
  }

  /* Event Bottom Panel Styles */
  .event-bottom-panel {
    position: fixed;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 90%;
    max-width: 1200px;
    background: rgba(1, 179, 128, 0.95);
    color: white;
    padding: 15px 0;
    z-index: 999;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
    box-shadow: 0 -5px 25px rgba(0, 0, 0, 0.15);
  }

  .panel-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 0 15px;
    text-align: center;
    position: relative;
  }

  .panel-item::after {
    content: '';
    position: absolute;
    right: 0;
    top: 20%;
    height: 60%;
    width: 1px;
    background: rgba(255, 255, 255, 0.3);
  }

  .panel-item:last-child::after {
    display: none;
  }

  .info-icon {
    width: 18px;
    height: 18px;
    margin-right: 5px;
    vertical-align: middle;
    display: inline-block;
  }

  .info-label {
    font-size: 14px;
    font-weight: 600;
    text-transform: uppercase;
    margin-bottom: 5px;
    letter-spacing: 1px;
    opacity: 0.9;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .info-value {
    font-size: 16px;
    font-weight: 700;
  }

  .hashtags {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 5px;
    margin-top: 5px;
  }

  .hashtag {
    font-size: 13px;
    font-weight: 600;
    background-color: rgba(255, 255, 255, 0.2);
    padding: 2px 10px;
    border-radius: 15px;
    transition: transform 0.3s ease, background-color 0.3s ease;
  }

  .hashtag:hover {
    background-color: rgba(255, 255, 255, 0.3);
    transform: translateY(-3px);
  }

  /* Media queries for responsive design */
  @media (max-width: 1200px) {
    .event-bottom-panel {
      width: 95%;
    }
  }

  @media (max-width: 991px) {
    .event-bottom-panel {
      width: 96%;
    }

    .panel-item {
      padding: 10px 0;
    }
  }

  @media (max-width: 767px) {
    .event-bottom-panel {
      width: 100%;
      border-top-left-radius: 12px;
      border-top-right-radius: 12px;
      padding: 12px 0;
    }

    .panel-item {
      padding: 5px 0;
    }

    .panel-item::after {
      display: none;
    }

    .info-icon {
      width: 16px;
      height: 16px;
      margin-right: 4px;
    }

    .info-label {
      font-size: 12px;
    }

    .info-value {
      font-size: 14px;
    }

    .hashtag {
      font-size: 12px;
      padding: 2px 8px;
    }

    body {
      margin-bottom: 130px;
    }
  }

  /* Add bottom margin to body for fixed panel */
  body {
    margin-bottom: 100px;
  }

  @media (max-width: 767px) {
    body {
      margin-bottom: 130px;
    }
  }

  /* About Section Styles */
  .bg-white {
    background-color: #ffffff;
    padding: 80px 0;
  }

  .about-image-grid {
    padding: 15px;
  }

  .grid-row {
    display: flex;
    gap: 15px;
    margin-bottom: 15px;
  }

  .grid-column {
    display: flex;
    flex-direction: column;
    gap: 15px;
    flex: 1;
  }

  .grid-item {
    overflow: hidden;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
  }

  .grid-item.featured {
    flex: 2;
  }

  .image-wrapper {
    position: relative;
    overflow: hidden;
    padding-bottom: 105%;
    /* 4:3 Aspect Ratio */
  }

  .grid-column .image-wrapper {
    padding-bottom: 100%;
    /* Square Aspect Ratio for small images */
  }

  .image-wrapper img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
  }

  .image-wrapper:hover img {
    transform: scale(1.1);
  }

  .about-content {
    padding: 30px;
  }

  .about-content h6 {
    color: #01B380;
    font-weight: 600;
    letter-spacing: 1px;
  }

  .about-content h2 {
    font-size: 32px;
    font-weight: 700;
    line-height: 1.3;
  }

  .about-text {
    line-height: 1.8;
  }

  @media (max-width: 991px) {
    .about-image-grid {
      margin-bottom: 30px;
    }

    .about-content {
      padding: 15px;
    }

    .about-content h2 {
      font-size: 28px;
    }
  }

  @media (max-width: 767px) {
    .grid-row {
      flex-direction: column;
    }

    .grid-column {
      flex-direction: row;
    }

    .grid-item.featured {
      flex: 1;
    }

    .image-wrapper {
      padding-bottom: 66.67%;
      /* 3:2 Aspect Ratio for mobile */
    }
  }

  /* Speakers Section Styles */
  .speakers-slider {
    padding: 20px 0;
    margin: 0 -15px;
  }

  .speaker-item {
    padding: 15px;
    text-align: center;
  }

  .speaker-image {
    width: 200px;
    height: 200px;
    margin: 0 auto 20px;
    position: relative;
    overflow: hidden;
  }

  .speaker-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
  }

  .speaker-image:hover img {
    transform: scale(1.1);
  }

  .speaker-info h4 {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 5px;
    color: #05102d;
  }

  .speaker-info .designation {
    font-size: 14px;
    color: #01B380;
    margin-bottom: 5px;
  }

  .speaker-info .company {
    font-size: 14px;
    color: #666;
  }

  .view-all-btn {
    display: inline-flex;
    align-items: center;
    padding: 12px 30px;
    background: #01B380;
    color: white;
    border-radius: 30px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
  }

  .view-all-btn:hover {
    background: #05102d;
    color: white;
    transform: translateY(-2px);
  }

  .view-all-btn .icon {
    width: 20px;
    height: 20px;
    margin-left: 8px;
  }

  /* Slick Slider Custom Styles */
  .slick-dots {
    bottom: 0px;
  }

  .slick-dots li button:before {
    font-size: 12px;
    color: #01B380;
    opacity: 0.3;
  }

  .slick-dots li.slick-active button:before {
    opacity: 1;
    color: #01B380;
  }

  .slick-prev,
  .slick-next {
    width: 40px;
    height: 40px;
    background: #01B380;
    border-radius: 50%;
    z-index: 1;
  }

  .slick-prev {
    left: -50px;
  }

  .slick-next {
    right: -50px;
  }

  .slick-prev:before,
  .slick-next:before {
    font-size: 20px;
  }

  .slick-prev:hover,
  .slick-next:hover {
    background: #05102d;
  }

  @media (max-width: 991px) {
    .speaker-image {
      width: 150px;
      height: 150px;
    }

    .slick-prev {
      left: -20px;
    }

    .slick-next {
      right: -20px;
    }
  }

  /* Event Schedule Styles */
  .schedule-timeline {
    padding: 30px 0;
  }

  .timeline-item {
    display: flex;
    margin-bottom: 30px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    overflow: hidden;
  }

  .timeline-time {
    padding: 20px;
    background: rgba(1, 179, 128, 0.1);
    color: #01B380;
    font-weight: 600;
    min-width: 200px;
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .timeline-content {
    padding: 20px;
    flex-grow: 1;
  }

  .timeline-content h3 {
    color: #ffffff;
    margin-bottom: 10px;
    font-size: 20px;
  }

  .timeline-content p {
    color: rgba(255, 255, 255, 0.7);
    margin-bottom: 15px;
  }

  .event-meta {
    display: flex;
    gap: 20px;
    margin-bottom: 15px;
  }

  .event-meta span {
    color: rgba(255, 255, 255, 0.9);
    font-size: 14px;
  }

  .event-meta i {
    color: #01B380;
    margin-right: 5px;
  }

  .speakers-list {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
  }

  .speaker-item {
    display: flex;
    align-items: center;
    gap: 10px;
    background: rgba(255, 255, 255, 0.05);
    padding: 10px;
    border-radius: 8px;
  }

  .speaker-avatar {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    object-fit: cover;
  }

  .speaker-info h4 {
    color: #ffffff;
    font-size: 16px;
    margin: 0;
  }

  .speaker-info .role {
    color: #01B380;
    font-size: 12px;
    display: block;
  }

  .speaker-info p {
    color: rgba(255, 255, 255, 0.7);
    font-size: 14px;
    margin: 0;
  }

  .tablink {
    cursor: pointer;
    padding: 20px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    margin-bottom: 10px;
    transition: all 0.3s ease;
  }

  .tablink.active {
    background: #01B380;
  }

  .tabcontent {
    display: none;
    padding: 30px 0;
  }

  .tabcontent.show {
    display: block;
  }

  @media (max-width: 768px) {
    .timeline-item {
      flex-direction: column;
    }

    .timeline-time {
      width: 100%;
      min-width: auto;
    }

    .speakers-list {
      gap: 10px;
    }

    .speaker-item {
      width: 100%;
    }
  }
</style>
@endsection

@section('custom-js')
<script>
  function openPage(dayId, element, color) {
    var tabcontent = document.getElementsByClassName("tabcontent");
    for (var i = 0; i < tabcontent.length; i++) {
        tabcontent[i].classList.remove("show");
    }

    var tablinks = document.getElementsByClassName("tablink");
    for (var i = 0; i < tablinks.length; i++) {
        tablinks[i].classList.remove("active");
        tablinks[i].style.backgroundColor = "";
    }

    document.getElementById(dayId).classList.add("show");
    element.classList.add("active");
    element.style.backgroundColor = color;
  }

  // Open the first tab by default
  document.addEventListener('DOMContentLoaded', function() {
    var firstTab = document.querySelector('.tablink');
    if (firstTab) {
        firstTab.click();
    }
  });

  // Mobile menu toggle for mobile dropdown functionality
  document.addEventListener('DOMContentLoaded', function() {
    // Navbar scroll effect
    const navbar = document.getElementById('navbar');

    const handleScroll = () => {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
            navbar.classList.remove('transparent-navbar');
        } else {
            navbar.classList.remove('scrolled');
            navbar.classList.add('transparent-navbar');
        }
    };

    // Run on page load
    handleScroll();

    // Add scroll event listener
    window.addEventListener('scroll', handleScroll);

    // Hamburger menu toggle
    const hamburger = document.querySelector('.hamburger-menu .menu');
    const mobileMenu = document.querySelector('.mobile-menu');

    if (hamburger) {
        hamburger.addEventListener('click', function() {
            mobileMenu.classList.toggle('active');
            if (mobileMenu.classList.contains('active')) {
                mobileMenu.querySelector('.inner').style.opacity = '1';
                mobileMenu.querySelector('.inner').style.transform = 'translateX(0)';
            } else {
                mobileMenu.querySelector('.inner').style.opacity = '0';
                mobileMenu.querySelector('.inner').style.transform = 'translateX(-50px)';
            }
        });
    }

    // Dropdown functionality for mobile menu
    var dropdownBtn = document.querySelector('.dropbtnmob');
    if (dropdownBtn) {
        dropdownBtn.addEventListener('mouseover', function() {
            document.getElementById("myDropdownmob").classList.add("showmob");
        });

        document.querySelector('.dropdownmob').addEventListener('mouseout', function(event) {
            if (!event.relatedTarget || !event.relatedTarget.closest('.dropdownmob')) {
                document.getElementById("myDropdownmob").classList.remove("showmob");
            }
        });
    }

    // Add parallax effect to hero section
    const heroSection = document.querySelector('.hero-section');
    if (heroSection) {
        window.addEventListener('scroll', function() {
            const scrollPosition = window.scrollY;
            const parallaxEffect = scrollPosition * 0.5;

            // Parallax background effect
            heroSection.style.backgroundPosition = `center ${parallaxEffect}px`;

            // Fade out elements when scrolling down
            const opacity = 1 - (scrollPosition / 500);
            const heroContent = document.querySelector('.hero-content');
            if (heroContent && opacity > 0) {
                heroContent.style.opacity = opacity;
            }
        });
    }

    // Add hover effect to CTA buttons
    const ctaButtons = document.querySelectorAll('.hero-cta .btn');
    ctaButtons.forEach(button => {
        button.addEventListener('mouseover', function() {
            this.classList.add('pulse');
        });
        button.addEventListener('mouseout', function() {
            this.classList.remove('pulse');
        });
    });
  });

  $(document).ready(function(){
    $('.speakers-slider').slick({
        dots: true,
        infinite: true,
        speed: 500,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });

    // Search functionality
    $('#slidename').on('keyup', function() {
        var value = $(this).val().toLowerCase();
        $('.speaker-item').filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
  });
</script>

<!-- Three.js Library - Local Version -->
<script src="{{ asset('js/lib/three.min.js') }}"></script>
<!-- Globe animation script -->
<script src="{{ asset('js/globe.js') }}"></script>

<style>
  @keyframes pulse {
    0% {
      transform: scale(1);
    }

    50% {
      transform: scale(1.05);
    }

    100% {
      transform: scale(1);
    }
  }

  .pulse {
    animation: pulse 0.5s ease-in-out;
  }
</style>
@endsection
@endsection
