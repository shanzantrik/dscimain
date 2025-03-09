@extends('layouts.app')

@section('title', 'Speakers | AISS 2025 | Annual Information Security Summit 2025 | DSCI')

<!-- Navbar -->
@include('partials.navbar')

@section('content')
<div class="page-banner">
  <div class="container">
    <h1>Our Speakers</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Speakers</li>
      </ol>
    </nav>
  </div>
</div>

<section class="speakers-section content-section">
  <div class="container">
    <div class="section-intro text-center mb-5">
      <h2 class="section-title">Meet Our Experts</h2>
      <p class="section-description">Connect with the leading minds in cybersecurity and privacy at AISS 2025. Our
        speakers represent diverse backgrounds, expertise, and perspectives in the cybersecurity ecosystem.</p>
    </div>

    <div class="speaker-categories mb-5">
      <ul class="nav nav-pills justify-content-center" id="speaker-tabs" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="all-tab" data-bs-toggle="pill" data-bs-target="#all" type="button"
            role="tab" aria-controls="all" aria-selected="true">All</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="keynote-tab" data-bs-toggle="pill" data-bs-target="#keynote" type="button"
            role="tab" aria-controls="keynote" aria-selected="false">Keynote Speakers</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="panelists-tab" data-bs-toggle="pill" data-bs-target="#panelists" type="button"
            role="tab" aria-controls="panelists" aria-selected="false">Panelists</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="moderators-tab" data-bs-toggle="pill" data-bs-target="#moderators" type="button"
            role="tab" aria-controls="moderators" aria-selected="false">Moderators</button>
        </li>
      </ul>
    </div>

    <div class="tab-content" id="speaker-tabContent">
      <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
        <div class="row">
          <!-- Speaker Card 1 -->
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="speaker-card">
              <div class="speaker-image">
                <img src="{{ asset('images/speakers/speaker1.jpg') }}" alt="John Doe" class="img-fluid">
                <div class="speaker-social">
                  <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                  <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                </div>
              </div>
              <div class="speaker-info">
                <h3>John Doe</h3>
                <p class="speaker-position">Chief Information Security Officer</p>
                <p class="speaker-company">Tech Innovations Inc.</p>
              </div>
            </div>
          </div>

          <!-- Speaker Card 2 -->
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="speaker-card">
              <div class="speaker-image">
                <img src="{{ asset('images/speakers/speaker2.jpg') }}" alt="Jane Smith" class="img-fluid">
                <div class="speaker-social">
                  <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                  <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                </div>
              </div>
              <div class="speaker-info">
                <h3>Jane Smith</h3>
                <p class="speaker-position">Director of Cybersecurity</p>
                <p class="speaker-company">Global Security Solutions</p>
              </div>
            </div>
          </div>

          <!-- Speaker Card 3 -->
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="speaker-card">
              <div class="speaker-image">
                <img src="{{ asset('images/speakers/speaker3.jpg') }}" alt="Robert Johnson" class="img-fluid">
                <div class="speaker-social">
                  <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                  <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                </div>
              </div>
              <div class="speaker-info">
                <h3>Robert Johnson</h3>
                <p class="speaker-position">Security Researcher</p>
                <p class="speaker-company">CyberDef Labs</p>
              </div>
            </div>
          </div>

          <!-- Speaker Card 4 -->
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="speaker-card">
              <div class="speaker-image">
                <img src="{{ asset('images/speakers/speaker4.jpg') }}" alt="Emily Wilson" class="img-fluid">
                <div class="speaker-social">
                  <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                  <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                </div>
              </div>
              <div class="speaker-info">
                <h3>Emily Wilson</h3>
                <p class="speaker-position">VP, Information Security</p>
                <p class="speaker-company">FinTech Secure</p>
              </div>
            </div>
          </div>

          <!-- Speaker Card 5 -->
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="speaker-card">
              <div class="speaker-image">
                <img src="{{ asset('images/speakers/speaker5.jpg') }}" alt="Michael Chen" class="img-fluid">
                <div class="speaker-social">
                  <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                  <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                </div>
              </div>
              <div class="speaker-info">
                <h3>Michael Chen</h3>
                <p class="speaker-position">Cloud Security Architect</p>
                <p class="speaker-company">CloudGuard Technologies</p>
              </div>
            </div>
          </div>

          <!-- Speaker Card 6 -->
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="speaker-card">
              <div class="speaker-image">
                <img src="{{ asset('images/speakers/speaker6.jpg') }}" alt="Sarah Williams" class="img-fluid">
                <div class="speaker-social">
                  <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                  <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                </div>
              </div>
              <div class="speaker-info">
                <h3>Sarah Williams</h3>
                <p class="speaker-position">Principal Consultant</p>
                <p class="speaker-company">Cyber Resilience Partners</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="tab-pane fade" id="keynote" role="tabpanel" aria-labelledby="keynote-tab">
        <div class="row">
          <!-- Keynote Speakers would be listed here -->
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="speaker-card">
              <div class="speaker-image">
                <img src="{{ asset('images/speakers/speaker1.jpg') }}" alt="John Doe" class="img-fluid">
                <div class="speaker-social">
                  <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                  <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                </div>
              </div>
              <div class="speaker-info">
                <h3>John Doe</h3>
                <p class="speaker-position">Chief Information Security Officer</p>
                <p class="speaker-company">Tech Innovations Inc.</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-4">
            <div class="speaker-card">
              <div class="speaker-image">
                <img src="{{ asset('images/speakers/speaker2.jpg') }}" alt="Jane Smith" class="img-fluid">
                <div class="speaker-social">
                  <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                  <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                </div>
              </div>
              <div class="speaker-info">
                <h3>Jane Smith</h3>
                <p class="speaker-position">Director of Cybersecurity</p>
                <p class="speaker-company">Global Security Solutions</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="tab-pane fade" id="panelists" role="tabpanel" aria-labelledby="panelists-tab">
        <div class="row">
          <!-- Panelists would be listed here -->
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="speaker-card">
              <div class="speaker-image">
                <img src="{{ asset('images/speakers/speaker3.jpg') }}" alt="Robert Johnson" class="img-fluid">
                <div class="speaker-social">
                  <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                  <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                </div>
              </div>
              <div class="speaker-info">
                <h3>Robert Johnson</h3>
                <p class="speaker-position">Security Researcher</p>
                <p class="speaker-company">CyberDef Labs</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-4">
            <div class="speaker-card">
              <div class="speaker-image">
                <img src="{{ asset('images/speakers/speaker4.jpg') }}" alt="Emily Wilson" class="img-fluid">
                <div class="speaker-social">
                  <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                  <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                </div>
              </div>
              <div class="speaker-info">
                <h3>Emily Wilson</h3>
                <p class="speaker-position">VP, Information Security</p>
                <p class="speaker-company">FinTech Secure</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="tab-pane fade" id="moderators" role="tabpanel" aria-labelledby="moderators-tab">
        <div class="row">
          <!-- Moderators would be listed here -->
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="speaker-card">
              <div class="speaker-image">
                <img src="{{ asset('images/speakers/speaker5.jpg') }}" alt="Michael Chen" class="img-fluid">
                <div class="speaker-social">
                  <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                  <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                </div>
              </div>
              <div class="speaker-info">
                <h3>Michael Chen</h3>
                <p class="speaker-position">Cloud Security Architect</p>
                <p class="speaker-company">CloudGuard Technologies</p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-4">
            <div class="speaker-card">
              <div class="speaker-image">
                <img src="{{ asset('images/speakers/speaker6.jpg') }}" alt="Sarah Williams" class="img-fluid">
                <div class="speaker-social">
                  <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                  <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                </div>
              </div>
              <div class="speaker-info">
                <h3>Sarah Williams</h3>
                <p class="speaker-position">Principal Consultant</p>
                <p class="speaker-company">Cyber Resilience Partners</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="become-speaker-section content-section">
  <div class="container">
    <div class="become-speaker-card">
      <div class="row align-items-center">
        <div class="col-lg-8 mb-4 mb-lg-0">
          <h2>Become a Speaker at AISS 2025</h2>
          <p>Share your expertise and insights with the cybersecurity community. We're looking for thought leaders,
            experts, and practitioners to present on various topics related to information security.</p>
          <ul class="speaker-benefits">
            <li><i class="fas fa-check-circle"></i> Showcase your expertise to a global audience</li>
            <li><i class="fas fa-check-circle"></i> Network with industry leaders and peers</li>
            <li><i class="fas fa-check-circle"></i> Contribute to advancing cybersecurity knowledge</li>
            <li><i class="fas fa-check-circle"></i> Gain recognition in the cybersecurity community</li>
          </ul>
        </div>
        <div class="col-lg-4">
          <a href="#" class="btn btn-primary btn-lg rounded-pill">Apply to Speak</a>
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
    margin-bottom: 20px;
  }

  .section-description {
    color: #c5c5c5;
    max-width: 800px;
    margin: 0 auto;
  }

  .speaker-categories {
    margin-bottom: 40px;
  }

  .nav-pills {
    gap: 10px;
  }

  .nav-pills .nav-link {
    background-color: transparent;
    color: #fff;
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 50px;
    padding: 8px 20px;
    transition: all 0.3s ease;
  }

  .nav-pills .nav-link:hover {
    background-color: rgba(255, 255, 255, 0.1);
  }

  .nav-pills .nav-link.active {
    background-color: #01B380;
    color: #fff;
    border-color: #01B380;
  }

  .speaker-card {
    background-color: rgba(255, 255, 255, 0.05);
    border-radius: 10px;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    height: 100%;
  }

  .speaker-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
  }

  .speaker-image {
    position: relative;
    overflow: hidden;
  }

  .speaker-image img {
    width: 100%;
    height: 300px;
    object-fit: cover;
    transition: transform 0.3s ease;
  }

  .speaker-card:hover .speaker-image img {
    transform: scale(1.05);
  }

  .speaker-social {
    position: absolute;
    top: 0;
    right: 0;
    background-color: rgba(1, 179, 128, 0.9);
    padding: 10px;
    border-radius: 0 0 0 10px;
    display: flex;
    gap: 10px;
  }

  .speaker-social a {
    color: #fff;
    font-size: 16px;
    transition: transform 0.3s ease;
  }

  .speaker-social a:hover {
    transform: scale(1.2);
  }

  .speaker-info {
    padding: 20px;
    text-align: center;
  }

  .speaker-info h3 {
    color: #fff;
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 5px;
  }

  .speaker-position {
    color: #01B380;
    font-weight: 500;
    margin-bottom: 5px;
  }

  .speaker-company {
    color: #c5c5c5;
    font-size: 14px;
    margin-bottom: 0;
  }

  .become-speaker-section {
    background-color: rgba(1, 179, 128, 0.05);
  }

  .become-speaker-card {
    background-color: rgba(255, 255, 255, 0.05);
    border-radius: 15px;
    padding: 40px;
    border-left: 5px solid #01B380;
  }

  .become-speaker-card h2 {
    color: #fff;
    font-weight: 600;
    margin-bottom: 20px;
  }

  .become-speaker-card p {
    color: #c5c5c5;
    margin-bottom: 20px;
  }

  .speaker-benefits {
    list-style: none;
    padding: 0;
    margin: 0 0 20px;
  }

  .speaker-benefits li {
    color: #c5c5c5;
    margin-bottom: 10px;
    display: flex;
    align-items: center;
  }

  .speaker-benefits li i {
    color: #01B380;
    margin-right: 10px;
    font-size: 16px;
  }

  .btn-primary {
    background-color: #01B380;
    border-color: #01B380;
    padding: 12px 30px;
    font-weight: 600;
  }

  .btn-primary:hover {
    background-color: #019e70;
    border-color: #019e70;
  }

  @media (max-width: 767px) {
    .page-banner {
      padding: 100px 0 40px;
    }

    .page-banner h1 {
      font-size: 32px;
    }

    .become-speaker-card {
      padding: 30px 20px;
      text-align: center;
    }

    .speaker-benefits li {
      justify-content: center;
    }
  }
</style>
@endsection

@section('custom-js')
<script>
  $(document).ready(function() {
    // Initialize Bootstrap tabs
    var triggerTabList = [].slice.call(document.querySelectorAll('#speaker-tabs button'))
    triggerTabList.forEach(function (triggerEl) {
        var tabTrigger = new bootstrap.Tab(triggerEl)

        triggerEl.addEventListener('click', function (event) {
            event.preventDefault()
            tabTrigger.show()
        })
    })
});
</script>
@endsection
