@extends('layouts.app')

@section('title', 'AISS 2025 | Annual Information Security Summit 2025 | DSCI')

@section('content')
<!-- Add Space Grotesk font -->
<link rel="stylesheet" href="{{ asset('css/lib/space-grotesk.css') }}">

<style>
  /* Global font styles */
  body {
    font-family: 'Space Grotesk', sans-serif;
  }

  h1,
  h2,
  h3,
  h4,
  h5,
  h6,
  .navbar,
  .site-menu,
  .mobile-menu,
  .event-bottom-panel,
  .btn,
  .dropbtn,
  .info-label,
  .info-value,
  .hashtag,
  .about-content,
  .speaker-info,
  .timeline-content,
  .view-all-btn {
    font-family: 'Space Grotesk', sans-serif;
  }

  /* Hero Section Styles */
  .hero-section {
    position: relative;
    height: 100vh;
    width: 100%;
    overflow: hidden;
    margin: 0;
    padding: 0;
    background: transparent;
  }

  .video-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
  }

  .video-background video {
    width: 100%;
    height: 100%;
    object-fit: cover;
    position: relative;
    z-index: 2;
  }

  /* Remove any background colors */
  .content-section {
    position: relative;
    z-index: 3;
  }

  /* Ensure navbar stays on top */
  .navbar {
    position: fixed;
    z-index: 1040;
  }

  /* Ensure mobile menu stays on top */
  .mobile-menu {
    position: fixed;
    z-index: 1050;
  }

  /* Event bottom panel should stay on top */
  .event-bottom-panel {
    position: fixed;
    z-index: 1030;
  }

  /* Key Highlights Statistics Styles */
  .stats-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 2rem;
    margin-top: 2rem;
  }

  .stat-item {
    text-align: left;
  }

  .stat-number {
    font-family: 'Space Grotesk', sans-serif;
    font-size: 3.5rem;
    font-weight: 700;
    color: #A56CFF;
    margin-bottom: 0.5rem;
    line-height: 1;
  }

  .plus {
    font-size: 2.5rem;
    vertical-align: super;
  }

  .stat-label {
    font-family: 'Space Grotesk', sans-serif;
    font-size: 1rem;
    color: #666;
    margin: 0;
    line-height: 1.4;
  }

  .highlight-subtitle {
    color: #666;
    font-size: 1.1rem;
    margin-bottom: 1.5rem;
  }

  @media (max-width: 768px) {
    .stats-grid {
      grid-template-columns: 1fr;
      gap: 1.5rem;
    }

    .stat-number {
      font-size: 3rem;
    }

    .plus {
      font-size: 2rem;
    }

    .stat-label {
      font-size: 0.9rem;
    }
  }

  /* Updated About Section Styles */
  .about-subtitle {
    color: #A56CFF;
    font-size: 14px;
    font-weight: 600;
    letter-spacing: 1px;
    margin-bottom: 20px;
  }

  .about-title {
    font-size: 48px;
    font-weight: 700;
    line-height: 1.2;
    margin-bottom: 30px;
    color: #05102D;
  }

  .about-title .highlight {
    color: #A56CFF;
  }

  .about-text {
    color: #666;
    line-height: 1.8;
    margin-bottom: 40px;
  }

  .about-buttons {
    display: flex;
    gap: 20px;
  }

  .btn-read-more {
    background-color: #cff300;
    color: #a56cff;
    padding: 12px 30px;
    border-radius: 30px;
    font-weight: 500;
    transition: all 0.3s ease;
  }

  .btn-read-more:hover {
    background-color: #cff300;
    color: #a56cff;
    transform: translateY(-2px);
  }

  .btn-report {
    background-color: #cff300;
    color: #A56CFF;
    padding: 12px 30px;
    border-radius: 30px;
    font-weight: 500;
    border: 1px solid #A56CFF;
    transition: all 0.3s ease;
  }

  .btn-report:hover {
    background-color: #A56CFF;
    color: white;
    transform: translateY(-2px);
  }

  .about-image-grid {
    padding: 15px;
  }

  .image-wrapper {
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
  }

  .main-image {
    height: 618px;
  }

  .secondary-image {
    width: 100%;
    height: 478px;
  }

  .image-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
  }

  .image-wrapper:hover img {
    transform: scale(1.05);
  }

  @media (max-width: 991px) {
    .about-title {
      font-size: 36px;
    }

    .about-content {
      margin-bottom: 40px;
    }

    .main-image {
      height: 250px;
    }

    .secondary-image {
      height: 180px;
    }
  }

  @media (max-width: 767px) {
    .about-title {
      font-size: 32px;
    }

    .about-buttons {
      flex-direction: column;
    }

    .btn-read-more,
    .btn-report {
      width: 100%;
      text-align: center;
    }

    .main-image,
    .secondary-image {
      height: 200px;
    }
  }

  /* Speakers Section Styles */
  .speakers-slider {
    padding: 20px 0;
    margin: 0 -15px;
    opacity: 0;
    transition: opacity 0.3s ease;
  }

  .speakers-slider.slick-initialized {
    opacity: 1;
  }

  .slick-slide {
    padding: 0 15px;
  }

  .slick-dots {
    bottom: -30px;
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

  .slick-prev:before,
  .slick-next:before {
    font-size: 20px;
  }

  .slick-prev:hover,
  .slick-next:hover {
    background: #05102d;
  }

  @media (max-width: 991px) {
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

  /* Updated Callout Section Styles */
  .callout-section {
    padding: 60px 0;
    position: relative;
    overflow: hidden;
  }

  .callout-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to right, #a56cff 50%, #cff300 50%);
  }

  .callout-content {
    position: relative;
    z-index: 2;
  }

  .left-content {
    background: #fff;
    border-radius: 20px 0 0 20px;
    padding: 20px 20px 0 40px;
    box-shadow: -10px 10px 30px rgba(24, 24, 24, 67%);
  }

  .right-content {
    background: #cff300;
    border-radius: 0 20px 20px 0;
    padding: 40px;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
  }

  /* Circuit overlay for right content */
  .right-content::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M10 10h80v80h-80z' fill='none' stroke='rgba(0,0,0,0.1)' stroke-width='1'/%3E%3Cpath d='M30 30h40v40h-40z' fill='none' stroke='rgba(0,0,0,0.1)' stroke-width='1'/%3E%3Cpath d='M10 50h30M60 50h30M50 10v30M50 60v30' stroke='rgba(0,0,0,0.1)' stroke-width='1'/%3E%3C/svg%3E");
    opacity: 0.2;
  }

  .callout-header {
    margin-bottom: 30px;
  }

  .dsci-logo {
    height: 15vh;
    margin-bottom: 10px;
  }

  .nasscom-text {
    font-size: 14px;
    color: #666;
    margin: 0;
  }

  .callout-main {
    text-align: left;
    margin-bottom: 30px;
  }

  .callout-title {
    font-size: 42px;
    font-weight: 700;
    color: #05102D;
    margin-bottom: 20px;
    line-height: 1.2;
  }

  .event-branding {
    margin-bottom: 30px;
  }

  .event-name {
    font-size: 48px;
    font-weight: 800;
    color: #A56CFF;
    display: flex;
    align-items: center;
    gap: 15px;
  }

  .event-separator {
    display: inline-block;
    width: 30px;
    height: 4px;
    background-color: #A56CFF;
    margin: 0 10px;
  }

  .callout-message {
    margin-bottom: 0;
  }

  .callout-message p {
    font-size: 24px;
    color: #05102D;
    margin-bottom: 20px;
    line-height: 1.4;
  }

  .nominate-btn {
    display: inline-block;
    background-color: #000;
    color: #fff;
    padding: 12px 30px;
    border-radius: 30px;
    font-weight: 500;
    text-decoration: none;
    transition: all 0.3s ease;
  }

  .nominate-btn:hover {
    background-color: #A56CFF;
    color: #fff;
    transform: translateY(-2px);
  }

  .event-details {
    display: flex;
    flex-direction: column;
    gap: 20px;
    text-align: right;
  }

  .detail-item {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 15px;
  }

  .detail-item i {
    color: #05102D;
    font-size: 24px;
  }

  .detail-item span {
    font-size: 20px;
    color: #05102D;
    font-weight: 600;
  }

  @media (max-width: 991px) {
    .callout-section::before {
      background: #f8f9fa;
    }

    .left-content,
    .right-content {
      border-radius: 20px;
      margin-bottom: 20px;
    }

    .right-content {
      background: #cff300;
    }

    .callout-title {
      font-size: 36px;
    }

    .event-name {
      font-size: 40px;
    }

    .callout-message p {
      font-size: 20px;
    }

    .event-details {
      text-align: center;
    }

    .detail-item {
      justify-content: center;
    }
  }

  @media (max-width: 768px) {
    .callout-section {
      padding: 40px 0;
    }

    .left-content,
    .right-content {
      padding: 30px;
    }

    .event-name {
      font-size: 32px;
    }

    .detail-item span {
      font-size: 18px;
    }
  }

  /* Add these styles in the CSS section */
  .message-with-image {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 30px;
  }

  .message-content {
    flex: 1;
  }

  .floating-image {
    position: relative;
    animation: float 3s ease-in-out infinite;
    flex-shrink: 0;
    margin-right: -20px;
  }

  .floating-speaker-img {
    width: 100%;
    max-width: 320px;
    height: auto;
    display: block;
  }

  @keyframes float {
    0% {
      transform: translateY(0px);
    }

    50% {
      transform: translateY(-15px);
    }

    100% {
      transform: translateY(0px);
    }
  }

  @media (max-width: 991px) {
    .message-with-image {
      flex-direction: column;
      gap: 20px;
    }

    .floating-image {
      margin-right: 0;
      margin-top: 20px;
    }

    .floating-speaker-img {
      max-width: 280px;
      margin: 0 auto;
    }
  }

  /* City Skyline Section Styles */
  .city-skyline-section {
    position: relative;
    width: 100%;
    height: 80vh;
    background-color: #ffffff;
    overflow: hidden;
  }

  .city-content {
    position: relative;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .event-date-top {
    position: absolute;
    top: 15%;
    left: 10%;
    font-size: 24px;
    font-weight: 600;
    color: #A56CFF;
    z-index: 3;
    opacity: 0;
    animation: fadeInDate 1s ease-out forwards;
    animation-delay: 0.5s;
  }

  .city-text-wrapper {
    position: absolute;
    width: 100%;
    z-index: 2;
    text-align: center;
    bottom: 45%;
    /* Position for the text to appear over the image but above the main buildings */
  }

  .city-name {
    font-size: 250px;
    font-weight: 800;
    color: #ffffff;
    text-transform: uppercase;
    letter-spacing: 8px;
    -webkit-text-stroke: 3px #A56CFF;
    opacity: 0;
    transform: translateY(100%);
    animation: sunriseText 7s ease-in-out infinite;
    text-shadow: 0 0 20px rgba(165, 108, 255, 0.3);
    line-height: 0.8;
  }

  .city-image-container {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
    padding-top: 15%;
    /* Create space at the top for the text to appear over */
  }

  .city-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: bottom center;
  }

  @keyframes sunriseText {
    0% {
      opacity: 0;
      transform: translateY(100%);
    }

    15% {
      opacity: 0.5;
      transform: translateY(50%);
    }

    30% {
      opacity: 1;
      transform: translateY(0);
    }

    70% {
      opacity: 1;
      transform: translateY(0);
    }

    85% {
      opacity: 0.5;
      transform: translateY(50%);
    }

    100% {
      opacity: 0;
      transform: translateY(100%);
    }
  }

  @keyframes fadeInDate {
    0% {
      opacity: 0;
      transform: translateY(-20px);
    }

    100% {
      opacity: 1;
      transform: translateY(0);
    }
  }

  @media (max-width: 1200px) {
    .city-name {
      font-size: 200px;
      -webkit-text-stroke: 2.5px #A56CFF;
    }

    .event-date-top {
      font-size: 20px;
    }

    .city-image-container {
      padding-top: 20%;
    }
  }

  @media (max-width: 991px) {
    .city-skyline-section {
      height: 60vh;
    }

    .city-name {
      font-size: 140px;
      -webkit-text-stroke: 2px #A56CFF;
    }

    .event-date-top {
      font-size: 18px;
      top: 20%;
    }

    .city-text-wrapper {
      bottom: 40%;
    }

    .city-image-container {
      padding-top: 25%;
    }
  }

  @media (max-width: 767px) {
    .city-skyline-section {
      height: 50vh;
    }

    .city-name {
      font-size: 90px;
      -webkit-text-stroke: 1.5px #A56CFF;
      letter-spacing: 4px;
    }

    .event-date-top {
      font-size: 16px;
      left: 5%;
    }

    .city-text-wrapper {
      bottom: 35%;
    }

    .city-image-container {
      padding-top: 30%;
    }
  }

  /* Focus Section Styles */
  .focus-section {
    padding: 100px 0;
    position: relative;
    background: linear-gradient(135deg, #05102D 0%, #1A2151 100%);
    overflow: hidden;
  }

  .section-subtitle {
    color: #A56CFF;
    font-size: 14px;
    font-weight: 600;
    letter-spacing: 1px;
    margin-bottom: 20px;
    text-transform: uppercase;
  }

  .section-title {
    font-size: 42px;
    font-weight: 700;
    color: #ffffff;
    margin-bottom: 50px;
  }

  /* Dotted Background Animation */
  .dotted-bg-animation {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
    opacity: 0.15;
  }

  .dot-container {
    position: absolute;
    width: 100%;
    height: 100%;
    background-image: radial-gradient(circle, #A56CFF 1px, transparent 1px);
    background-size: 30px 30px;
    animation: moveBackground 20s linear infinite;
  }

  @keyframes moveBackground {
    0% {
      background-position: 0 0;
    }

    100% {
      background-position: 100px 100px;
    }
  }

  /* Focus Cards Carousel */
  .focus-carousel-container {
    padding: 20px 0 60px;
    overflow: hidden;
    width: 100%;
    max-width: 1035px;
    /* Accommodates 2 cards with gap (495px * 2 + 45px) */
    margin: 0 auto;
    position: relative;
  }

  .focus-carousel {
    display: flex;
    position: relative;
    transition: transform 0.5s ease-in-out;
    gap: 45px;
    will-change: transform;
  }

  .focus-card {
    flex: 0 0 495px;
    height: 298.5px;
    border-radius: 30px;
    padding: 45px 75px;
    border: 2px solid #76FF03;
    background: #ffffff;
    backdrop-filter: blur(2px);
    transition: all 0.5s ease-in-out;
    transform: scale(0.95);
    opacity: 0.7;
  }

  .focus-card.active {
    transform: scale(1);
    opacity: 1;
  }

  .focus-card-inner {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }

  .carousel-nav {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 30px;
    margin-top: 40px;
  }

  .carousel-prev,
  .carousel-next {
    width: 46px;
    height: 46px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 10;
  }

  .carousel-prev {
    left: -60px;
  }

  .carousel-next {
    right: -60px;
  }

  .carousel-prev:disabled,
  .carousel-next:disabled {
    opacity: 0.5;
    cursor: not-allowed;
  }

  .carousel-prev:not(:disabled):hover,
  .carousel-next:not(:disabled):hover {
    background: #A56CFF;
    transform: translateY(-50%) scale(1.1);
  }

  .carousel-dots {
    display: flex;
    justify-content: center;
    gap: 8px;
    margin-top: 30px;
  }

  .carousel-dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.3);
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    padding: 0;
  }

  .carousel-dot.active {
    background: #ffffff;
    transform: scale(1.2);
  }

  .carousel-dot:hover {
    background: rgba(165, 108, 255, 0.5);
  }

  @media (max-width: 1680px) {
    .focus-carousel-container {
      max-width: 845px;
      /* Accommodates 2 cards with gap (400px * 2 + 45px) */
    }

    .focus-card {
      flex: 0 0 400px;
      height: 242px;
      padding: 35px 60px;
    }
  }

  @media (max-width: 1366px) {
    .focus-carousel-container {
      max-width: 685px;
      /* Accommodates 2 cards with gap (320px * 2 + 45px) */
    }

    .focus-card {
      flex: 0 0 320px;
      height: 193px;
      padding: 25px 45px;
    }
  }

  .focus-icon {
    width: 70px;
    min-width: 70px;
    height: 70px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #A56CFF;
    border-radius: 14px;
    padding: 15px;
    margin-top: 5px;
  }

  .focus-icon img {
    width: 100%;
    height: auto;
    filter: brightness(0) invert(1);
  }

  .focus-content {
    flex: 1;
  }

  .focus-title {
    font-size: 28px;
    font-weight: 700;
    color: #A56CFF;
    margin-bottom: 15px;
    text-align: left;
  }

  .focus-description {
    color: #A56CFF;
    font-size: 16px;
    line-height: 1.6;
    text-align: left;
  }

  /* Carousel Navigation */
  .carousel-nav {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 30px;
    margin-top: 40px;
  }

  .carousel-dots {
    display: flex;
    gap: 8px;
  }

  .carousel-dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.3);
    cursor: pointer;
    transition: all 0.3s ease;
  }

  .carousel-dot.active {
    background: #A56CFF;
    transform: scale(1.2);
  }

  .carousel-prev,
  .carousel-next {
    width: 46px;
    height: 46px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 10;
  }

  .carousel-prev {
    left: -60px;
  }

  .carousel-next {
    right: -60px;
  }

  .carousel-prev:disabled,
  .carousel-next:disabled {
    opacity: 0.5;
    cursor: not-allowed;
  }

  .carousel-prev:not(:disabled):hover,
  .carousel-next:not(:disabled):hover {
    background: #A56CFF;
    transform: translateY(-50%) scale(1.1);
  }

  .carousel-dots {
    display: flex;
    justify-content: center;
    gap: 8px;
    margin-top: 30px;
  }

  .carousel-dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.3);
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    padding: 0;
  }

  .carousel-dot.active {
    background: #ffffff;
    transform: scale(1.2);
  }

  .carousel-dot:hover {
    background: rgba(165, 108, 255, 0.5);
  }

  @media (max-width: 991px) {
    .focus-section {
      padding: 80px 0;
    }

    .section-title {
      font-size: 36px;
    }

    .focus-card-inner {
      min-height: 200px;
      padding: 25px;
      gap: 20px;
    }

    .focus-title {
      font-size: 24px;
    }

    .focus-icon {
      width: 60px;
      min-width: 60px;
      height: 60px;
    }
  }

  @media (max-width: 767px) {
    .focus-section {
      padding: 60px 0;
    }

    .section-title {
      font-size: 32px;
    }

    .focus-card-inner {
      flex-direction: column;
      min-height: auto;
      padding: 25px;
      gap: 15px;
    }

    .focus-icon {
      width: 60px;
      min-width: 60px;
      height: 60px;
      margin: 0 0 10px 0;
    }

    .focus-title {
      font-size: 22px;
      margin-bottom: 10px;
    }

    .focus-description {
      font-size: 14px;
    }
  }

  /* Add fallback styles in case video fails to load */
  .hero-section.video-fallback {
    background: linear-gradient(135deg, #05102D 0%, #1A2151 100%);
  }

  /* Ensure video covers the entire section */
  .video-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
  }

  .video-background video {
    position: absolute;
    top: 50%;
    left: 50%;
    min-width: 100%;
    min-height: 100%;
    width: auto;
    height: auto;
    transform: translateX(-50%) translateY(-50%);
    object-fit: cover;
  }

  /* Updated Tickets Section Styles */
  .tickets-section {
    padding: 100px 0;
    background: #ffffff;
  }

  .section-headers {
    text-align: left;
  }

  .section-subtitle {
    color: #A56CFF;
    font-size: 14px;
    font-weight: 600;
    letter-spacing: 1px;
    margin-bottom: 20px;
    text-transform: uppercase;
  }

  .section-title {
    font-size: 42px;
    font-weight: 700;
    color: #05102D;
    margin-bottom: 50px;
  }

  .tickets-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    margin-top: 50px;
  }

  .ticket-card {
    position: relative;
    width: 100%;
    height: 450px;
    /* Fixed height for the container */
    padding: 0;
    margin-bottom: 40px;
  }

  .ticket-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url("{!! asset('images/ticket_bg.png') !!}") no-repeat center center;
    background-size: cover;
    z-index: 1;
    border-radius: 25px;
  }

  .ticket-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 80%;
    background: rgba(255, 255, 255, 0.95);
    border-radius: 20px;
    padding: 30px;
    z-index: 2;
    border: 2px solid #e0e0e0;
    transition: all 0.3s ease;
  }

  .ticket-card.featured .ticket-content {
    border-color: #A56CFF;
  }

  .ticket-card:hover .ticket-content {
    transform: translate(-50%, -52%);
  }

  .ticket-header {
    text-align: center;
    margin-bottom: 20px;
  }

  .ticket-type {
    font-size: 20px;
    font-weight: 700;
    color: #05102D;
    margin-bottom: 10px;
  }

  .ticket-price {
    display: flex;
    align-items: baseline;
    justify-content: center;
    gap: 5px;
  }

  .currency {
    font-size: 20px;
    font-weight: 600;
    color: #A56CFF;
  }

  .amount {
    font-size: 36px;
    font-weight: 800;
    color: #A56CFF;
    line-height: 1;
  }

  .duration {
    font-size: 14px;
    color: #666;
  }

  .ticket-features {
    list-style: none;
    padding: 0;
    margin: 0 0 20px 0;
  }

  .ticket-features li {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 10px;
    color: #05102D;
    font-size: 14px;
  }

  .ticket-features li i {
    color: #A56CFF;
    font-size: 12px;
  }

  .btn-get-pass {
    display: inline-block;
    background: #A56CFF;
    color: #ffffff;
    padding: 10px 30px;
    border-radius: 25px;
    font-weight: 500;
    text-decoration: none;
    transition: all 0.3s ease;
    position: absolute;
    bottom: -15px;
    left: 50%;
    transform: translateX(-50%);
    font-size: 14px;
    z-index: 3;
  }

  .btn-get-pass:hover {
    background: #8A4FFF;
    color: #ffffff;
    transform: translateX(-50%) translateY(-2px);
  }

  @media (max-width: 1200px) {
    .tickets-grid {
      gap: 20px;
    }

    .ticket-card {
      height: 400px;
    }

    .ticket-content {
      width: 85%;
      padding: 25px;
    }
  }

  @media (max-width: 991px) {
    .tickets-grid {
      grid-template-columns: repeat(2, 1fr);
    }

    .ticket-card {
      height: 380px;
    }
  }

  @media (max-width: 767px) {
    .tickets-section {
      padding: 60px 0;
    }

    .tickets-grid {
      grid-template-columns: 1fr;
    }

    .ticket-card {
      height: 350px;
    }

    .ticket-content {
      width: 90%;
      padding: 20px;
    }

    .amount {
      font-size: 32px;
    }

    .section-title {
      font-size: 32px;
    }
  }

  /* Speakers Section Styles */
  .speakers-slider {
    padding: 20px 0;
    margin: 0 -15px;
    opacity: 0;
    transition: opacity 0.3s ease;
  }

  .speakers-slider.slick-initialized {
    opacity: 1;
  }

  .speaker-item {
    padding: 0 11.5px;
    /* Half of the gap (23px) */
  }

  .speaker-image {
    width: 230px;
    height: 367px;
    overflow: hidden;
    border-radius: 10px;
    margin-bottom: 15px;
  }

  .speaker-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
  }

  .search-input {
    width: 100%;
    padding: 12px 20px;
    border: 1px solid #e0e0e0;
    border-radius: 25px;
    background-color: #f5f5f5;
    color: #333;
    font-size: 16px;
    transition: all 0.3s ease;
  }

  .search-input:focus {
    outline: none;
    border-color: #01B380;
    box-shadow: 0 0 0 2px rgba(1, 179, 128, 0.1);
  }

  .search-input::placeholder {
    color: #999;
  }

  @media (max-width: 991px) {
    .speaker-image {
      width: 200px;
      height: 320px;
    }
  }

  @media (max-width: 767px) {
    .speaker-image {
      width: 180px;
      height: 288px;
    }
  }

  .btn-primary {
    background-color: #01B380;
    border-color: #01B380;
    padding: 12px 30px;
    font-weight: 600;
    transition: all 0.3s ease;
  }

  .btn-primary:hover {
    background-color: #019e70;
    border-color: #019e70;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(1, 179, 128, 0.3);
  }

  .btn-lg {
    font-size: 16px;
  }

  .btn i {
    transition: transform 0.3s ease;
  }

  .btn:hover i {
    transform: translateX(5px);
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
    <div class="video-background">
      <video autoplay muted loop playsinline id="hero-video">
        <source src="{{ asset('videos/header.mp4') }}" type="video/mp4">
        Your browser does not support the video tag or the video file is not found.
      </video>
    </div>
  </section>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const video = document.getElementById('hero-video');

      // Error handling for video
      video.addEventListener('error', function(e) {
          console.error('Error loading video:', e);
          // Add a CSS class to maintain the section's appearance even if video fails to load
          document.querySelector('.hero-section').classList.add('video-fallback');
      });
  });
  </script>

  <style>
    /* Add fallback styles in case video fails to load */
    .hero-section.video-fallback {
      background: linear-gradient(135deg, #05102D 0%, #1A2151 100%);
    }

    /* Ensure video covers the entire section */
    .video-background {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      overflow: hidden;
    }

    .video-background video {
      position: absolute;
      top: 50%;
      left: 50%;
      min-width: 100%;
      min-height: 100%;
      width: auto;
      height: auto;
      transform: translateX(-50%) translateY(-50%);
      object-fit: cover;
    }
  </style>

  {{--
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
  </div> --}}

  <!-- About Section -->
  <section class="content-section bg-white" id="about">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="about-content">
            <h6 class="about-subtitle">ABOUT US</h6>
            <h2 class="about-title">
              Financial <span class="highlight">Security</span><br>
              Conclave 2024
            </h2>
            <div class="about-text">
              <p>The Sixth Edition Of BFSI FINSEC Conclave Is Going To Be Examining Key Developments, Trends Which Have
                Transpired In Last One Year, Especially The Ones Having Potentially Significant Bearing On The Future
                Security & Privacy Roadmap Of The BFSI Sector. It Would Endeavour To Accomplish This By Calling Upon The
                Expertise, Experience And Foresight Of Leaders, Practitioners, Policy Makers, Researchers, Developers,
                And Innovators. While The Nefarious Elements Continue To Upgrade Their Arsenal To Infiltrate The
                Networks Of Organizations, The Organizations Are Also Trying To Equip Themselves With State-Of-The-Art
                Security Measures.</p>
            </div>
            <div class="about-buttons">
              <a href="#" class="btn btn-read-more">Read More</a>
              <a href="#" class="btn btn-report">FINSEC 24 Report</a>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="about-image-grid">
            <div class="row g-4">
              <div class="col-12">
                <div class="image-wrapper main-image">
                  <img src="{{ asset('images/Rectangle-42016.png') }}" alt="Financial Security Conference"
                    class="img-fluid">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-8">
          <div class="about-image-grid">
            <div class="row g-4">
              <div class="col-12">
                <div class="image-wrapper secondary-image">
                  <img src="{{ asset('images/Rectangle-42015.png') }}" alt="Financial Security Conference"
                    class="img-fluid">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="about-content">
            <h2 class="about-title">
              Key Highlights
            </h2>
            <div class="about-text">
              <p class="highlight-subtitle">Cumulative Data Of FINSEC Over The Last 5 Years.</p>
            </div>
            <div class="stats-grid">
              <div class="stat-item">
                <h3 class="stat-number">1200<span class="plus">+</span></h3>
                <p class="stat-label">PARTICIPANTS FROM<br>BFSI & FINTECH</p>
              </div>
              <div class="stat-item">
                <h3 class="stat-number">100<span class="plus">+</span></h3>
                <p class="stat-label">SPONSORS/PARTNERS</p>
              </div>
              <div class="stat-item">
                <h3 class="stat-number">2100<span class="plus">+</span></h3>
                <p class="stat-label">COMPANIES</p>
              </div>
              <div class="stat-item">
                <h3 class="stat-number">650<span class="plus">+</span></h3>
                <p class="stat-label">SPEAKERS</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Callout Section -->
  <section class="callout-section">
    <div class="container">
      <div class="row g-0">
        <div class="col-lg-8">
          <div class="callout-content left-content">
            <div class="callout-header">
              <img src="{{ asset('images/DSCI-Logo-Color-Transparent.png') }}" alt="DSCI Logo" class="dsci-logo">
            </div>
            <div class="callout-main">
              <h2 class="callout-title">It's a Call-out for<br>Speakers at</h2>
              <div class="event-branding">
                <h1 class="event-name">FINSEC<span class="event-separator"></span>CONCLAVE 2025</h1>
              </div>
              <div class="callout-message">
                <div class="message-with-image">
                  <div class="message-content">
                    <p>Got something to share?<br>Submissions are now open.</p>
                    <a href="#" class="nominate-btn">Nominate Yourself Now</a>
                  </div>
                  <div class="floating-image">
                    <img src="{{ asset('images/call-out-speakers.png') }}" alt="Call out for speakers"
                      class="floating-speaker-img">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="callout-content right-content">
            <div class="event-details">
              <div class="detail-item">
                <i class="fas fa-calendar"></i>
                <span>4th - 5th June 2025</span>
              </div>
              <div class="detail-item">
                <i class="fas fa-map-marker-alt"></i>
                <span>Mumbai</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- City Skyline Section -->
  <section class="city-skyline-section">
    <div class="city-content">
      <div class="event-date-top">4th - 5th June 2025</div>
      <div class="city-text-wrapper">
        <h2 class="city-name">Mumbai</h2>
      </div>
      <div class="city-image-container">
        <img src="{{ asset('images/city.png') }}" alt="Mumbai Skyline" class="city-image">
      </div>
    </div>
  </section>

  <!-- Broad Focus Section -->
  <section class="content-section focus-section" id="broadFocus">
    <div class="dotted-bg-animation">
      <div class="dot-container"></div>
    </div>
    <div class="container">
      <div class="text-center text-white mb-5">
        <h6 class="section-subtitle">WHAT WE COVER</h6>
        <h1 class="section-title">Broad Focus Areas</h1>
      </div>
      <div class="focus-carousel-container">
        <div class="focus-carousel">
          <!-- First card active by default -->
          <div class="focus-card active">
            <div class="focus-card-inner">
              <div class="focus-icon">
                <img src="{{ asset('images/broad-focus/Asset 1.svg') }}" alt="Transaction Security Icon">
              </div>
              <div class="focus-content">
                <h3 class="focus-title">Transaction Security</h3>
                <p class="focus-description">Enhancing the security of financial transactions through advanced
                  encryption, multi-factor authentication, and real-time monitoring systems.</p>
              </div>
            </div>
          </div>

          <!-- Rest of the cards -->
          <div class="focus-card">
            <div class="focus-card-inner">
              <div class="focus-icon">
                <img src="{{ asset('images/broad-focus/Asset 1.svg') }}" alt="Payment Innovations Icon">
              </div>
              <div class="focus-content">
                <h3 class="focus-title">Payment Innovations</h3>
                <p class="focus-description">Exploring cutting-edge payment technologies, digital currencies, and secure
                  transaction methods that transform the financial landscape.</p>
              </div>
            </div>
          </div>
          <div class="focus-card">
            <div class="focus-card-inner">
              <div class="focus-icon">
                <img src="{{ asset('images/broad-focus/Asset 1.svg') }}" alt="Payment Innovations Icon">
              </div>
              <div class="focus-content">
                <h3 class="focus-title">Payment Innovations</h3>
                <p class="focus-description">Exploring cutting-edge payment technologies, digital currencies, and secure
                  transaction methods that transform the financial landscape.</p>
              </div>
            </div>
          </div>
          <div class="focus-card">
            <div class="focus-card-inner">
              <div class="focus-icon">
                <img src="{{ asset('images/broad-focus/Asset 1.svg') }}" alt="Payment Innovations Icon">
              </div>
              <div class="focus-content">
                <h3 class="focus-title">Payment Innovations</h3>
                <p class="focus-description">Exploring cutting-edge payment technologies, digital currencies, and secure
                  transaction methods that transform the financial landscape.</p>
              </div>
            </div>
          </div>
          <div class="focus-card">
            <div class="focus-card-inner">
              <div class="focus-icon">
                <img src="{{ asset('images/broad-focus/Asset 1.svg') }}" alt="Payment Innovations Icon">
              </div>
              <div class="focus-content">
                <h3 class="focus-title">Payment Innovations</h3>
                <p class="focus-description">Exploring cutting-edge payment technologies, digital currencies, and secure
                  transaction methods that transform the financial landscape.</p>
              </div>
            </div>
          </div>

        </div>
        <div class="carousel-nav">
          <button class="carousel-prev" aria-label="Previous slide">
            <i class="fas fa-chevron-left"></i>
          </button>
          <div class="carousel-dots"></div>
          <button class="carousel-next" aria-label="Next slide">
            <i class="fas fa-chevron-right"></i>
          </button>
        </div>
      </div>
    </div>
  </section>

  <!-- Tickets Section -->
  <section class="tickets-section">
    <div class="container">
      <div class="section-headers mb-5">
        <h6 class="section-subtitle">TICKETS</h6>
        <h2 class="section-title">Secure your Access to FINSEC</h2>
      </div>
      <div class="tickets-grid">
        <!-- First Row -->
        <div class="ticket-card">
          <div class="ticket-content">
            <div class="ticket-header">
              <h3 class="ticket-type">Early Bird</h3>
              <div class="ticket-price">
                <span class="currency">₹</span>
                <span class="amount">12,000</span>
                <span class="duration">/person</span>
              </div>
            </div>
            <div class="ticket-body">
              <ul class="ticket-features">
                <li><i class="fas fa-check"></i> Access to all sessions</li>
                <li><i class="fas fa-check"></i> Conference materials</li>
                <li><i class="fas fa-check"></i> Lunch and refreshments</li>
                <li><i class="fas fa-check"></i> Networking opportunities</li>
                <li><i class="fas fa-check"></i> Certificate of participation</li>
              </ul>
            </div>
            <a href="#" class="btn-get-pass">Get Pass</a>
          </div>
        </div>

        <div class="ticket-card featured">
          <div class="ticket-content">
            <div class="ticket-header">
              <h3 class="ticket-type">Standard</h3>
              <div class="ticket-price">
                <span class="currency">₹</span>
                <span class="amount">15,000</span>
                <span class="duration">/person</span>
              </div>
            </div>
            <div class="ticket-body">
              <ul class="ticket-features">
                <li><i class="fas fa-check"></i> All Early Bird features</li>
                <li><i class="fas fa-check"></i> Priority seating</li>
                <li><i class="fas fa-check"></i> Workshop access</li>
                <li><i class="fas fa-check"></i> Event recordings</li>
                <li><i class="fas fa-check"></i> Exclusive Q&A sessions</li>
              </ul>
            </div>
            <a href="#" class="btn-get-pass">Get Pass</a>
          </div>
        </div>

        <div class="ticket-card">
          <div class="ticket-content">
            <div class="ticket-header">
              <h3 class="ticket-type">Premium</h3>
              <div class="ticket-price">
                <span class="currency">₹</span>
                <span class="amount">20,000</span>
                <span class="duration">/person</span>
              </div>
            </div>
            <div class="ticket-body">
              <ul class="ticket-features">
                <li><i class="fas fa-check"></i> All Standard features</li>
                <li><i class="fas fa-check"></i> VIP networking dinner</li>
                <li><i class="fas fa-check"></i> One-on-one mentoring</li>
                <li><i class="fas fa-check"></i> Premium swag bag</li>
                <li><i class="fas fa-check"></i> Lifetime community access</li>
              </ul>
            </div>
            <a href="#" class="btn-get-pass">Get Pass</a>
          </div>
        </div>

        <!-- Second Row -->
        <div class="ticket-card">
          <div class="ticket-content">
            <div class="ticket-header">
              <h3 class="ticket-type">Group Pass</h3>
              <div class="ticket-price">
                <span class="currency">₹</span>
                <span class="amount">40,000</span>
                <span class="duration">/group</span>
              </div>
            </div>
            <div class="ticket-body">
              <ul class="ticket-features">
                <li><i class="fas fa-check"></i> Access for 3 people</li>
                <li><i class="fas fa-check"></i> All Standard features</li>
                <li><i class="fas fa-check"></i> Group seating</li>
                <li><i class="fas fa-check"></i> Special group rates</li>
                <li><i class="fas fa-check"></i> Group networking session</li>
              </ul>
            </div>
            <a href="#" class="btn-get-pass">Get Pass</a>
          </div>
        </div>

        <div class="ticket-card">
          <div class="ticket-content">
            <div class="ticket-header">
              <h3 class="ticket-type">Virtual Pass</h3>
              <div class="ticket-price">
                <span class="currency">₹</span>
                <span class="amount">8,000</span>
                <span class="duration">/person</span>
              </div>
            </div>
            <div class="ticket-body">
              <ul class="ticket-features">
                <li><i class="fas fa-check"></i> Online access to sessions</li>
                <li><i class="fas fa-check"></i> Digital materials</li>
                <li><i class="fas fa-check"></i> Virtual networking</li>
                <li><i class="fas fa-check"></i> Session recordings</li>
                <li><i class="fas fa-check"></i> Online Q&A access</li>
              </ul>
            </div>
            <a href="#" class="btn-get-pass">Get Pass</a>
          </div>
        </div>

        <div class="ticket-card">
          <div class="ticket-content">
            <div class="ticket-header">
              <h3 class="ticket-type">Student Pass</h3>
              <div class="ticket-price">
                <span class="currency">₹</span>
                <span class="amount">5,000</span>
                <span class="duration">/person</span>
              </div>
            </div>
            <div class="ticket-body">
              <ul class="ticket-features">
                <li><i class="fas fa-check"></i> Valid student ID required</li>
                <li><i class="fas fa-check"></i> Access to all sessions</li>
                <li><i class="fas fa-check"></i> Digital materials</li>
                <li><i class="fas fa-check"></i> Student networking</li>
                <li><i class="fas fa-check"></i> Career guidance session</li>
              </ul>
            </div>
            <a href="#" class="btn-get-pass">Get Pass</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Speakers Section -->
  <section class="content-section bg-white" id="speakers">
    <div class="container" style="margin-top:50px;">
      <div class="row justify-content-center text-center mb-5">
        <div class="col-12 col-lg-6">
          <div class="section-title">
            <h2 class="text-dark">Event Speakers</h2>
          </div>
        </div>
        <div class="col-12 col-lg-6">
          <form class="filter">
            <input type="text" id="slidename" placeholder="Search by name" class="search-input" />
          </form>
        </div>
      </div>
      <div class="speakers-slider">
        @foreach($speakers as $speaker)
        <div class="speaker-item">
          <div class="speaker-image">
            <img src="{{ $speaker->image_url }}" alt="{{ $speaker->name }}" class="speaker-img">
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
        <a href="#" class="btn btn-primary btn-lg rounded-pill">
          View All Speakers
          <i class="fas fa-arrow-right ms-2"></i>
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

  /* Hero Section Styles */
  .hero-section {
    position: relative;
    height: 100vh;
    width: 100%;
    overflow: hidden;
    margin: 0;
    padding: 0;
  }

  .video-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
  }

  .video-background video {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  /* Remove any background colors and overlays */
  .overlay {
    display: none;
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

  /* Updated About Section Styles */
  .about-subtitle {
    color: #A56CFF;
    font-size: 14px;
    font-weight: 600;
    letter-spacing: 1px;
    margin-bottom: 20px;
  }

  .about-title {
    font-size: 48px;
    font-weight: 700;
    line-height: 1.2;
    margin-bottom: 30px;
    color: #05102D;
  }

  .about-title .highlight {
    color: #A56CFF;
  }

  .about-text {
    color: #666;
    line-height: 1.8;
    margin-bottom: 40px;
  }

  .about-buttons {
    display: flex;
    gap: 20px;
  }

  .btn-read-more {
    background-color: #cff300;
    color: #a56cff;
    padding: 12px 30px;
    border-radius: 30px;
    font-weight: 500;
    transition: all 0.3s ease;
  }

  .btn-read-more:hover {
    background-color: #cff300;
    color: #a56cff;
    transform: translateY(-2px);
  }

  .btn-report {
    background-color: #cff300;
    color: #A56CFF;
    padding: 12px 30px;
    border-radius: 30px;
    font-weight: 500;
    border: 1px solid #A56CFF;
    transition: all 0.3s ease;
  }

  .btn-report:hover {
    background-color: #A56CFF;
    color: white;
    transform: translateY(-2px);
  }

  .about-image-grid {
    padding: 15px;
  }

  .image-wrapper {
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
  }

  .main-image {
    height: 618px;
  }

  .secondary-image {
    width: 100%;
    height: 478px;
  }

  .image-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
  }

  .image-wrapper:hover img {
    transform: scale(1.05);
  }

  @media (max-width: 991px) {
    .about-title {
      font-size: 36px;
    }

    .about-content {
      margin-bottom: 40px;
    }

    .main-image {
      height: 250px;
    }

    .secondary-image {
      height: 180px;
    }
  }

  @media (max-width: 767px) {
    .about-title {
      font-size: 32px;
    }

    .about-buttons {
      flex-direction: column;
    }

    .btn-read-more,
    .btn-report {
      width: 100%;
      text-align: center;
    }

    .main-image,
    .secondary-image {
      height: 200px;
    }
  }

  /* Speakers Section Styles */
  .speakers-slider {
    padding: 20px 0;
    margin: 0 -15px;
    opacity: 0;
    transition: opacity 0.3s ease;
  }

  .speakers-slider.slick-initialized {
    opacity: 1;
  }

  .slick-slide {
    padding: 0 15px;
  }

  .slick-dots {
    bottom: -30px;
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

  .slick-prev:before,
  .slick-next:before {
    font-size: 20px;
  }

  .slick-prev:hover,
  .slick-next:hover {
    background: #05102d;
  }

  @media (max-width: 991px) {
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

  /* Updated Callout Section Styles */
  .callout-section {
    padding: 60px 0;
    position: relative;
    overflow: hidden;
  }

  .callout-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to right, #a56cff 50%, #cff300 50%);
  }

  .callout-content {
    position: relative;
    z-index: 2;
  }

  .left-content {
    background: #fff;
    border-radius: 20px 0 0 20px;
    padding: 20px 20px 0 40px;
    box-shadow: -10px 10px 30px rgba(24, 24, 24, 67%);
  }

  .right-content {
    background: #cff300;
    border-radius: 0 20px 20px 0;
    padding: 40px;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
  }

  /* Circuit overlay for right content */
  .right-content::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M10 10h80v80h-80z' fill='none' stroke='rgba(0,0,0,0.1)' stroke-width='1'/%3E%3Cpath d='M30 30h40v40h-40z' fill='none' stroke='rgba(0,0,0,0.1)' stroke-width='1'/%3E%3Cpath d='M10 50h30M60 50h30M50 10v30M50 60v30' stroke='rgba(0,0,0,0.1)' stroke-width='1'/%3E%3C/svg%3E");
    opacity: 0.2;
  }

  .callout-header {
    margin-bottom: 30px;
  }

  .dsci-logo {
    height: 15vh;
    margin-bottom: 10px;
  }

  .nasscom-text {
    font-size: 14px;
    color: #666;
    margin: 0;
  }

  .callout-main {
    text-align: left;
    margin-bottom: 30px;
  }

  .callout-title {
    font-size: 42px;
    font-weight: 700;
    color: #05102D;
    margin-bottom: 20px;
    line-height: 1.2;
  }

  .event-branding {
    margin-bottom: 30px;
  }

  .event-name {
    font-size: 48px;
    font-weight: 800;
    color: #A56CFF;
    display: flex;
    align-items: center;
    gap: 15px;
  }

  .event-separator {
    display: inline-block;
    width: 30px;
    height: 4px;
    background-color: #A56CFF;
    margin: 0 10px;
  }

  .callout-message {
    margin-bottom: 0;
  }

  .callout-message p {
    font-size: 24px;
    color: #05102D;
    margin-bottom: 20px;
    line-height: 1.4;
  }

  .nominate-btn {
    display: inline-block;
    background-color: #000;
    color: #fff;
    padding: 12px 30px;
    border-radius: 30px;
    font-weight: 500;
    text-decoration: none;
    transition: all 0.3s ease;
  }

  .nominate-btn:hover {
    background-color: #A56CFF;
    color: #fff;
    transform: translateY(-2px);
  }

  .event-details {
    display: flex;
    flex-direction: column;
    gap: 20px;
    text-align: right;
  }

  .detail-item {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 15px;
  }

  .detail-item i {
    color: #05102D;
    font-size: 24px;
  }

  .detail-item span {
    font-size: 20px;
    color: #05102D;
    font-weight: 600;
  }

  @media (max-width: 991px) {
    .callout-section::before {
      background: #f8f9fa;
    }

    .left-content,
    .right-content {
      border-radius: 20px;
      margin-bottom: 20px;
    }

    .right-content {
      background: #cff300;
    }

    .callout-title {
      font-size: 36px;
    }

    .event-name {
      font-size: 40px;
    }

    .callout-message p {
      font-size: 20px;
    }

    .event-details {
      text-align: center;
    }

    .detail-item {
      justify-content: center;
    }
  }

  @media (max-width: 768px) {
    .callout-section {
      padding: 40px 0;
    }

    .left-content,
    .right-content {
      padding: 30px;
    }

    .event-name {
      font-size: 32px;
    }

    .detail-item span {
      font-size: 18px;
    }
  }

  /* Add these styles in the CSS section */
  .message-with-image {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 30px;
  }

  .message-content {
    flex: 1;
  }

  .floating-image {
    position: relative;
    animation: float 3s ease-in-out infinite;
    flex-shrink: 0;
    margin-right: -20px;
  }

  .floating-speaker-img {
    width: 100%;
    max-width: 320px;
    height: auto;
    display: block;
  }

  @keyframes float {
    0% {
      transform: translateY(0px);
    }

    50% {
      transform: translateY(-15px);
    }

    100% {
      transform: translateY(0px);
    }
  }

  @media (max-width: 991px) {
    .message-with-image {
      flex-direction: column;
      gap: 20px;
    }

    .floating-image {
      margin-right: 0;
      margin-top: 20px;
    }

    .floating-speaker-img {
      max-width: 280px;
      margin: 0 auto;
    }
  }

  /* City Skyline Section Styles */
  .city-skyline-section {
    position: relative;
    width: 100%;
    height: 80vh;
    background-color: #ffffff;
    overflow: hidden;
  }

  .city-content {
    position: relative;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .event-date-top {
    position: absolute;
    top: 15%;
    left: 10%;
    font-size: 24px;
    font-weight: 600;
    color: #A56CFF;
    z-index: 3;
    opacity: 0;
    animation: fadeInDate 1s ease-out forwards;
    animation-delay: 0.5s;
  }

  .city-text-wrapper {
    position: absolute;
    width: 100%;
    z-index: 2;
    text-align: center;
    bottom: 45%;
    /* Position for the text to appear over the image but above the main buildings */
  }

  .city-name {
    font-size: 250px;
    font-weight: 800;
    color: #ffffff;
    text-transform: uppercase;
    letter-spacing: 8px;
    -webkit-text-stroke: 3px #A56CFF;
    opacity: 0;
    transform: translateY(100%);
    animation: sunriseText 7s ease-in-out infinite;
    text-shadow: 0 0 20px rgba(165, 108, 255, 0.3);
    line-height: 0.8;
  }

  .city-image-container {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
    padding-top: 15%;
    /* Create space at the top for the text to appear over */
  }

  .city-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: bottom center;
  }

  @keyframes sunriseText {
    0% {
      opacity: 0;
      transform: translateY(100%);
    }

    15% {
      opacity: 0.5;
      transform: translateY(50%);
    }

    30% {
      opacity: 1;
      transform: translateY(0);
    }

    70% {
      opacity: 1;
      transform: translateY(0);
    }

    85% {
      opacity: 0.5;
      transform: translateY(50%);
    }

    100% {
      opacity: 0;
      transform: translateY(100%);
    }
  }

  @keyframes fadeInDate {
    0% {
      opacity: 0;
      transform: translateY(-20px);
    }

    100% {
      opacity: 1;
      transform: translateY(0);
    }
  }

  @media (max-width: 1200px) {
    .city-name {
      font-size: 200px;
      -webkit-text-stroke: 2.5px #A56CFF;
    }

    .event-date-top {
      font-size: 20px;
    }

    .city-image-container {
      padding-top: 20%;
    }
  }

  @media (max-width: 991px) {
    .city-skyline-section {
      height: 60vh;
    }

    .city-name {
      font-size: 140px;
      -webkit-text-stroke: 2px #A56CFF;
    }

    .event-date-top {
      font-size: 18px;
      top: 20%;
    }

    .city-text-wrapper {
      bottom: 40%;
    }

    .city-image-container {
      padding-top: 25%;
    }
  }

  @media (max-width: 767px) {
    .city-skyline-section {
      height: 50vh;
    }

    .city-name {
      font-size: 90px;
      -webkit-text-stroke: 1.5px #A56CFF;
      letter-spacing: 4px;
    }

    .event-date-top {
      font-size: 16px;
      left: 5%;
    }

    .city-text-wrapper {
      bottom: 35%;
    }

    .city-image-container {
      padding-top: 30%;
    }
  }

  /* Focus Section Styles */
  .focus-section {
    padding: 100px 0;
    position: relative;
    background: linear-gradient(135deg, #05102D 0%, #1A2151 100%);
    overflow: hidden;
  }

  .section-subtitle {
    color: #A56CFF;
    font-size: 14px;
    font-weight: 600;
    letter-spacing: 1px;
    margin-bottom: 20px;
    text-transform: uppercase;
  }

  .section-title {
    font-size: 42px;
    font-weight: 700;
    color: #ffffff;
    margin-bottom: 50px;
  }

  /* Dotted Background Animation */
  .dotted-bg-animation {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
    opacity: 0.15;
  }

  .dot-container {
    position: absolute;
    width: 100%;
    height: 100%;
    background-image: radial-gradient(circle, #A56CFF 1px, transparent 1px);
    background-size: 30px 30px;
    animation: moveBackground 20s linear infinite;
  }

  @keyframes moveBackground {
    0% {
      background-position: 0 0;
    }

    100% {
      background-position: 100px 100px;
    }
  }

  /* Focus Cards Carousel */
  .focus-carousel-container {
    padding: 20px 0 60px;
    overflow: hidden;
    width: 100%;
    max-width: 1035px;
    /* Accommodates 2 cards with gap (495px * 2 + 45px) */
    margin: 0 auto;
    position: relative;
  }

  .focus-carousel {
    display: flex;
    position: relative;
    transition: transform 0.5s ease-in-out;
    gap: 45px;
    will-change: transform;
  }

  .focus-card {
    flex: 0 0 495px;
    height: 298.5px;
    border-radius: 30px;
    padding: 45px 75px;
    border: 2px solid #76FF03;
    background: #ffffff;
    backdrop-filter: blur(2px);
    transition: all 0.5s ease-in-out;
    transform: scale(0.95);
    opacity: 0.7;
  }

  .focus-card.active {
    transform: scale(1);
    opacity: 1;
  }

  .focus-card-inner {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }

  .carousel-nav {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 30px;
    margin-top: 40px;
  }

  .carousel-prev,
  .carousel-next {
    width: 46px;
    height: 46px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 10;
  }

  .carousel-prev {
    left: -60px;
  }

  .carousel-next {
    right: -60px;
  }

  .carousel-prev:disabled,
  .carousel-next:disabled {
    opacity: 0.5;
    cursor: not-allowed;
  }

  .carousel-prev:not(:disabled):hover,
  .carousel-next:not(:disabled):hover {
    background: #A56CFF;
    transform: translateY(-50%) scale(1.1);
  }

  .carousel-dots {
    display: flex;
    justify-content: center;
    gap: 8px;
    margin-top: 30px;
  }

  .carousel-dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.3);
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    padding: 0;
  }

  .carousel-dot.active {
    background: #ffffff;
    transform: scale(1.2);
  }

  .carousel-dot:hover {
    background: rgba(165, 108, 255, 0.5);
  }

  @media (max-width: 1680px) {
    .focus-carousel-container {
      max-width: 845px;
      /* Accommodates 2 cards with gap (400px * 2 + 45px) */
    }

    .focus-card {
      flex: 0 0 400px;
      height: 242px;
      padding: 35px 60px;
    }
  }

  @media (max-width: 1366px) {
    .focus-carousel-container {
      max-width: 685px;
      /* Accommodates 2 cards with gap (320px * 2 + 45px) */
    }

    .focus-card {
      flex: 0 0 320px;
      height: 193px;
      padding: 25px 45px;
    }
  }

  .focus-icon {
    width: 70px;
    min-width: 70px;
    height: 70px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #A56CFF;
    border-radius: 14px;
    padding: 15px;
    margin-top: 5px;
  }

  .focus-icon img {
    width: 100%;
    height: auto;
    filter: brightness(0) invert(1);
  }

  .focus-content {
    flex: 1;
  }

  .focus-title {
    font-size: 28px;
    font-weight: 700;
    color: #A56CFF;
    margin-bottom: 15px;
    text-align: left;
  }

  .focus-description {
    color: #A56CFF;
    font-size: 16px;
    line-height: 1.6;
    text-align: left;
  }

  /* Carousel Navigation */
  .carousel-nav {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 30px;
    margin-top: 40px;
  }

  .carousel-dots {
    display: flex;
    gap: 8px;
  }

  .carousel-dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.3);
    cursor: pointer;
    transition: all 0.3s ease;
  }

  .carousel-dot.active {
    background: #A56CFF;
    transform: scale(1.2);
  }

  .carousel-prev,
  .carousel-next {
    width: 46px;
    height: 46px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 10;
  }

  .carousel-prev {
    left: -60px;
  }

  .carousel-next {
    right: -60px;
  }

  .carousel-prev:disabled,
  .carousel-next:disabled {
    opacity: 0.5;
    cursor: not-allowed;
  }

  .carousel-prev:not(:disabled):hover,
  .carousel-next:not(:disabled):hover {
    background: #A56CFF;
    transform: translateY(-50%) scale(1.1);
  }

  .carousel-dots {
    display: flex;
    justify-content: center;
    gap: 8px;
    margin-top: 30px;
  }

  .carousel-dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.3);
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    padding: 0;
  }

  .carousel-dot.active {
    background: #ffffff;
    transform: scale(1.2);
  }

  .carousel-dot:hover {
    background: rgba(165, 108, 255, 0.5);
  }

  @media (max-width: 991px) {
    .focus-section {
      padding: 80px 0;
    }

    .section-title {
      font-size: 36px;
    }

    .focus-card-inner {
      min-height: 200px;
      padding: 25px;
      gap: 20px;
    }

    .focus-title {
      font-size: 24px;
    }

    .focus-icon {
      width: 60px;
      min-width: 60px;
      height: 60px;
    }
  }

  @media (max-width: 767px) {
    .focus-section {
      padding: 60px 0;
    }

    .section-title {
      font-size: 32px;
    }

    .focus-card-inner {
      flex-direction: column;
      min-height: auto;
      padding: 25px;
      gap: 15px;
    }

    .focus-icon {
      width: 60px;
      min-width: 60px;
      height: 60px;
      margin: 0 0 10px 0;
    }

    .focus-title {
      font-size: 22px;
      margin-bottom: 10px;
    }

    .focus-description {
      font-size: 14px;
    }
  }

  /* Add fallback styles in case video fails to load */
  .hero-section.video-fallback {
    background: linear-gradient(135deg, #05102D 0%, #1A2151 100%);
  }

  /* Ensure video covers the entire section */
  .video-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
  }

  .video-background video {
    position: absolute;
    top: 50%;
    left: 50%;
    min-width: 100%;
    min-height: 100%;
    width: auto;
    height: auto;
    transform: translateX(-50%) translateY(-50%);
    object-fit: cover;
  }
</style>
@endsection

@section('custom-js')
<script>
  // Tab functionality for schedule
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

  // Focus Area Carousel Functionality
  function initFocusCarousel() {
    const carousel = document.querySelector('.focus-carousel');
    const cards = Array.from(document.querySelectorAll('.focus-card'));
    const dotsContainer = document.querySelector('.carousel-dots');
    const prevButton = document.querySelector('.carousel-prev');
    const nextButton = document.querySelector('.carousel-next');

    if (!carousel || cards.length === 0) return;

    let currentIndex = 0;
    const visibleCards = 2; // Changed to show 2 cards
    const totalSlides = Math.max(0, cards.length - visibleCards + 1);

    // Clear existing dots
    if (dotsContainer) {
        dotsContainer.innerHTML = '';

        // Create dots based on number of possible positions
        for (let i = 0; i < totalSlides; i++) {
            const dot = document.createElement('button');
            dot.classList.add('carousel-dot');
            dot.setAttribute('aria-label', `Go to slide ${i + 1}`);
            dot.addEventListener('click', () => goToSlide(i));
            dotsContainer.appendChild(dot);
        }
    }

    function updateCarousel() {
        const cardWidth = cards[0].offsetWidth;
        const gap = 45;
        const offset = -currentIndex * (cardWidth + gap);

        carousel.style.transform = `translateX(${offset}px)`;

        // Update active states for cards
        cards.forEach((card, i) => {
            if (i >= currentIndex && i < currentIndex + visibleCards) {
                card.classList.add('active');
                card.style.opacity = '1';
                card.style.transform = 'scale(1)';
            } else {
                card.classList.remove('active');
                card.style.opacity = '0.7';
                card.style.transform = 'scale(0.95)';
            }
        });

        // Update dots
        if (dotsContainer) {
            const dots = dotsContainer.querySelectorAll('.carousel-dot');
            dots.forEach((dot, i) => {
                dot.classList.toggle('active', i === currentIndex);
            });
        }

        // Update button states
        if (prevButton) prevButton.disabled = currentIndex === 0;
        if (nextButton) nextButton.disabled = currentIndex === totalSlides - 1;
    }

    function goToSlide(index) {
        currentIndex = Math.max(0, Math.min(index, totalSlides - 1));
        updateCarousel();
    }

    // Event listeners for navigation
    if (prevButton) {
        prevButton.addEventListener('click', () => {
            if (currentIndex > 0) {
                goToSlide(currentIndex - 1);
            }
        });
    }

    if (nextButton) {
        nextButton.addEventListener('click', () => {
            if (currentIndex < totalSlides - 1) {
                goToSlide(currentIndex + 1);
            }
        });
    }

    // Initialize carousel
    updateCarousel();

    // Auto-play functionality
    let autoplayInterval;

    function startAutoplay() {
        stopAutoplay(); // Clear any existing interval
        autoplayInterval = setInterval(() => {
            if (currentIndex < totalSlides - 1) {
                goToSlide(currentIndex + 1);
            } else {
                goToSlide(0); // Reset to start
            }
        }, 5000);
    }

    function stopAutoplay() {
        if (autoplayInterval) {
            clearInterval(autoplayInterval);
            autoplayInterval = null;
        }
    }

    // Add hover listeners to pause/resume autoplay
    carousel.addEventListener('mouseenter', stopAutoplay);
    carousel.addEventListener('mouseleave', startAutoplay);

    // Start autoplay
    startAutoplay();

    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowLeft' && currentIndex > 0) {
            goToSlide(currentIndex - 1);
        }
        if (e.key === 'ArrowRight' && currentIndex < totalSlides - 1) {
            goToSlide(currentIndex + 1);
        }
    });
}

// Initialize carousel when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    initFocusCarousel();
});

  document.addEventListener('DOMContentLoaded', function() {
    // Initialize Focus Area Carousel
    initFocusCarousel();

    // Initialize Speakers Slider
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

    // Open the first schedule tab by default
    var firstTab = document.querySelector('.tablink');
    if (firstTab) {
        firstTab.click();
    }

    // Navbar scroll effect
    const navbar = document.getElementById('navbar');
    const heroSection = document.querySelector('.hero-section');

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
    if (heroSection) {
        window.addEventListener('scroll', function() {
            const scrollPosition = window.scrollY;
            const parallaxEffect = scrollPosition * 0.5;
            heroSection.style.backgroundPosition = `center ${parallaxEffect}px`;
        });
    }
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
