<!-- Preloader -->
<div class="preloader">
  <div class="inner">
    <div class="coin-loader">
      <div class="coin coin-1">
        <div class="side front">
          <div class="shine"></div>
        </div>
        <div class="side back">
          <div class="shine"></div>
        </div>
        <div class="edge">
          <div class="edge-bit"></div>
          <div class="edge-bit"></div>
          <div class="edge-bit"></div>
          <div class="edge-bit"></div>
          <div class="edge-bit"></div>
          <div class="edge-bit"></div>
          <div class="edge-bit"></div>
          <div class="edge-bit"></div>
          <div class="edge-bit"></div>
          <div class="edge-bit"></div>
          <div class="edge-bit"></div>
          <div class="edge-bit"></div>
          <div class="edge-bit"></div>
          <div class="edge-bit"></div>
          <div class="edge-bit"></div>
          <div class="edge-bit"></div>
        </div>
      </div>
      <div class="coin coin-2">
        <div class="side front">
          <div class="shine"></div>
        </div>
        <div class="side back">
          <div class="shine"></div>
        </div>
        <div class="edge">
          <div class="edge-bit"></div>
          <div class="edge-bit"></div>
          <div class="edge-bit"></div>
          <div class="edge-bit"></div>
          <div class="edge-bit"></div>
          <div class="edge-bit"></div>
          <div class="edge-bit"></div>
          <div class="edge-bit"></div>
          <div class="edge-bit"></div>
          <div class="edge-bit"></div>
          <div class="edge-bit"></div>
          <div class="edge-bit"></div>
          <div class="edge-bit"></div>
          <div class="edge-bit"></div>
          <div class="edge-bit"></div>
          <div class="edge-bit"></div>
        </div>
      </div>
    </div>
    <div class="percentage" id="percentage">0</div>
    <div class="loading-text">Loading<span class="dots">...</span></div>
  </div>
  <div class="loader-progress" id="loader-progress"></div>
</div>

<style>
  .preloader {
    width: 100%;
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    position: fixed;
    z-index: 99999;
    background: #05102d;
    background: linear-gradient(135deg, #05102d 0%, #0a1f4d 100%);
    transition: all 0.5s ease;
  }

  .preloader .inner {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }

  /* Coin Loader */
  .coin-loader {
    width: 150px;
    height: 200px;
    perspective: 600px;
    margin-bottom: 20px;
    position: relative;
  }

  .coin {
    width: 100%;
    height: 75%;
    position: absolute;
    transform-style: preserve-3d;
  }

  .coin-1 {
    top: 0;
    animation: dropAndRotate 2s linear infinite;
    z-index: 2;
  }

  .coin-2 {
    bottom: 0;
    transform: rotateX(70deg);
    z-index: 1;
  }

  .side {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    position: absolute;
    overflow: hidden;
    backface-visibility: hidden;
  }

  .front {
    background: linear-gradient(45deg, #01B380 0%, #00d4a3 100%);
    transform: rotateY(0deg);
  }

  .back {
    background: linear-gradient(45deg, #01B380 0%, #00d4a3 100%);
    transform: rotateY(180deg);
  }

  .shine {
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.1);
    position: absolute;
    transform: translateX(-50%);
    animation: shine 3s ease-in-out infinite;
  }

  .edge {
    width: 5px;
    height: 100%;
    position: absolute;
    left: 50%;
    transform: translateX(-50%) rotateY(90deg);
  }

  .edge-bit {
    width: 100%;
    height: 6.25%;
    background: #01B380;
    position: absolute;
  }

  @keyframes dropAndRotate {
    0% {
      transform: translateY(-50px) rotateY(0deg);
    }

    25% {
      transform: translateY(50px) rotateY(90deg);
    }

    50% {
      transform: translateY(-50px) rotateY(180deg);
    }

    75% {
      transform: translateY(50px) rotateY(270deg);
    }

    100% {
      transform: translateY(-50px) rotateY(360deg);
    }
  }

  @keyframes shine {

    0%,
    100% {
      transform: translateX(-100%);
    }

    50% {
      transform: translateX(100%);
    }
  }

  /* Percentage and Loading Text */
  .percentage {
    font-size: 48px;
    font-weight: 700;
    color: #ffffff;
    margin: 20px 0 10px;
    font-family: 'Poppins', sans-serif;
  }

  .loading-text {
    color: #ffffff;
    font-size: 18px;
    font-weight: 500;
    letter-spacing: 2px;
    text-transform: uppercase;
    font-family: 'Poppins', sans-serif;
  }

  .dots {
    display: inline-block;
    animation: dots 1.5s infinite;
  }

  @keyframes dots {

    0%,
    20% {
      content: '.';
    }

    40% {
      content: '..';
    }

    60% {
      content: '...';
    }

    80%,
    100% {
      content: '';
    }
  }

  /* Progress Bar */
  .loader-progress {
    width: 200px;
    height: 3px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 3px;
    margin-top: 20px;
    overflow: hidden;
    position: relative;
  }

  .loader-progress::after {
    content: '';
    position: absolute;
    left: -50%;
    width: 50%;
    height: 100%;
    background: linear-gradient(90deg, transparent, #01B380, transparent);
    animation: progress 1s ease-in-out infinite;
  }

  @keyframes progress {
    0% {
      left: -50%;
    }

    100% {
      left: 150%;
    }
  }

  /* Edge bits positioning */
  .edge-bit:nth-child(1) {
    top: 0%;
  }

  .edge-bit:nth-child(2) {
    top: 6.25%;
  }

  .edge-bit:nth-child(3) {
    top: 12.5%;
  }

  .edge-bit:nth-child(4) {
    top: 18.75%;
  }

  .edge-bit:nth-child(5) {
    top: 25%;
  }

  .edge-bit:nth-child(6) {
    top: 31.25%;
  }

  .edge-bit:nth-child(7) {
    top: 37.5%;
  }

  .edge-bit:nth-child(8) {
    top: 43.75%;
  }

  .edge-bit:nth-child(9) {
    top: 50%;
  }

  .edge-bit:nth-child(10) {
    top: 56.25%;
  }

  .edge-bit:nth-child(11) {
    top: 62.5%;
  }

  .edge-bit:nth-child(12) {
    top: 68.75%;
  }

  .edge-bit:nth-child(13) {
    top: 75%;
  }

  .edge-bit:nth-child(14) {
    top: 81.25%;
  }

  .edge-bit:nth-child(15) {
    top: 87.5%;
  }

  .edge-bit:nth-child(16) {
    top: 93.75%;
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const percentage = document.getElementById('percentage');
    const progress = document.getElementById('loader-progress');
    let count = 0;

    // Make sure progress bar is visible
    progress.style.display = 'block';
    progress.style.visibility = 'visible';
    progress.style.opacity = '1';

    const interval = setInterval(() => {
      count++;
      percentage.textContent = count;

      // Update progress bar width
      progress.style.width = count + '%';

      if (count >= 100) {
        clearInterval(interval);
        setTimeout(() => {
          document.querySelector('.preloader').style.opacity = '0';
          setTimeout(() => {
            document.querySelector('.preloader').style.display = 'none';
          }, 500);
        }, 500);
      }
    }, 20);
  });
</script>
