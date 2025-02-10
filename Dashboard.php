<?php include 'session_check.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <link rel="manifest" href="manifest.json">
  <!-- Set your theme color -->
  <meta name="theme-color" content="#51BBC4">
  <!-- iOS Status Bar setting using your custom hex (try this!) -->
  <meta name="apple-mobile-web-app-status-bar-style" content="#51BBC4">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Preload font for faster load -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css?family=Oswald:300&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
  <!-- Swiper CSS -->
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

  <style>
    :root {
      --primary-color: #51bbc4;
      --background-color: #ffffff;
    }

    /* Background image for interactive card section */
    .interactive-card-section {
      background-image: url("https://assets.softr-files.com/applications/9521e7b5-95ff-4a2d-9c75-3e27ff478449/assets/4e873979-7f33-4843-82e6-12e42cf5ce0b.jpeg");
      background-size: cover;
      background-position: center;
      padding: 50px 0;
    }

    /* General Reset */
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: "Oswald", sans-serif;
      background: var(--background-color);
      text-align: center;
    }

    /* Desktop Navigation */
    .logo-container,
    .mobile-logo-container {
      width: 100%;
      height: 100px;
      /* Fixed container height */
      display: flex;
      align-items: center;
      justify-content: space-between;
      background: rgba(255, 255, 255, 0.8);
      position: sticky;
      top: 0;
      z-index: 1000;
      padding: 0px 0px;
    }

    .logo {
      height: 100px;
      /* Match container height */
      width: auto;
      object-fit: contain;
    }

    .menu {
      display: flex;
      justify-content: center;
      align-items: center;
      flex: 1;
      gap: 10px;
      /* Space between menu items */
    }

    .menu .logo {
      margin: 0 0px;
      /* Add spacing around logo */
    }

    .menu a,
    .mobile-menu a {
      color: var(--primary-color);
      text-decoration: none;
      padding: 0px 20px;
      font-size: 22px;
      text-transform: uppercase;
      transition: background 0.3s ease;
    }

    .menu a:hover,
    .mobile-menu a:hover {
      background: var(--primary-color);
      color: #fff;
    }

    /* Mobile Navigation */
    .mobile-logo-container,
    .mobile-menu {
      display: none;
    }

    .mobile-menu-toggle {
      display: none;
      font-size: 30px;
      background: none;
      border: none;
      color: var(--primary-color);
      cursor: pointer;
      z-index: 999;
      position: absolute;
      top: 15px;
      right: 20px;
    }

    .mobile-menu {
      flex-direction: column;
      position: absolute;
      top: 100px;
      left: 0;
      right: 0;
      background: rgba(255, 255, 255, 0.9);
      border-top: 1px solid var(--primary-color);
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      max-height: 300px;
      overflow-y: auto;
      z-index: 1000;
      opacity: 0;
      transform: translateY(-20px);
      transition: opacity 0.3s, transform 0.3s;
    }

    .mobile-menu a {
      padding: 10px;
      font-size: 20px;
    }

    .mobile-menu.mobile-menu-open {
      display: flex;
      opacity: 1;
      transform: translateY(0);
    }

    /* Responsive Design */
    @media screen and (max-width: 768px) {
      .logo-container {
        display: none;
      }

      .mobile-logo-container {
        display: flex;
        justify-content: center;
      }

      .menu {
        display: none !important;
      }

      .mobile-menu-toggle {
        display: block;
      }
    }

    @media screen and (min-width: 769px) {

      .mobile-logo-container,
      .mobile-menu {
        display: none !important;
      }
    }

    /* Interactive card styles */
    .interactive-card {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      cursor: pointer;
      position: relative;
      overflow: hidden;
      height: 100%;
    }

    .interactive-card:hover {
      transform: translateY(-5px);
      
      transform: scale(1.02);
      box-shadow: 0px 0px 35px rgba(81, 187, 196, 0.7);
    }

    .interactive-card .card-img-top {
      transition: transform 0.3s ease, filter 0.3s ease;
      max-width: 408px;
      height: 305px;
      object-fit: cover;
    }

    .interactive-card:hover .card-img-top {
      transform: scale(1);
      filter: grayscale(90%);
    }

    .interactive-card .btn {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -270%);
      display: none;
      font-size: 1.5rem;
      padding: 10px 20px;
      background-color: rgba(81, 187, 196, 1);
      border: none;
      color: white;
      z-index: 2;
    }

    .interactive-card:hover .btn {
      display: block;
    }

    .interactive-card .card-body {
      position: relative;
      text-align: center;
      z-index: 1;
      padding-bottom: 0 !important;
      padding-top: 2px !important;
    }

    .interactive-card .card-title,
    .interactive-card .card-text {
      margin-bottom: 4px !important;
    }

    .interactive-card .card-title {
      color: var(--primary-color);
      font-size: 1.7em;
      font-weight: bold;
    }

    /* Remove borders from videos */
    video {
      border: 1px solid lightgrey !important;
    }

    /* Adjust title/header font colors */
    h1 {
      color: var(--primary-color);
      font-size: 3em;
      font-weight: bold;
      font-family: "Arial", sans-serif;
    }

    h2 {
      color: var(--primary-color);
      font-size: 2em;
      font-family: "Arial", sans-serif;
    }

    h3 {
      color: var(--primary-color);
      font-size: 1.25em;
      font-family: "Arial", sans-serif;
    }

    h4 {
      color: var(--primary-color);
      font-size: 0.8em;
      font-family: "Arial", sans-serif;
    }

    h5 {
      color: black;
      font-size: 1.35em;
      font-family: "Arial", sans-serif;
    }

    /* Text Section */
    .text-section {
      background-image: url("https://assets.softr-files.com/applications/9521e7b5-95ff-4a2d-9c75-3e27ff478449/assets/165f0107-97c4-4879-a2c3-c88661183451.jpeg");
      background-size: cover;
      background-position: center;
      padding: 20px 0;
      text-align: center;
      color: var(--primary-color);
    }

    .text-section h2 {
      color: var(--primary-color);
    }

    .text-section .text-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 20px;
      padding: 0 20px;
    }

    @media (max-width: 768px) {
      .text-section .text-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
      }
    }

    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #ffffff;
    }

    .testimonial-carousel {
      padding: 20px 0;
      background-color: var(--background-color);
    }

    .swiper {
      width: 100%;
      padding: 10px 0;
    }

    .spacer {
      height: 15px;
    }

    .testimonial-card {
      background-color: #f8f9fa;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      text-align: center;
      margin: 0 10px;
    }

    .testimonial-card p {
      font-size: 16px;
      color: #333;
      line-height: 1.6;
    }

    .testimonial-card h4 {
      font-size: 18px;
      color: var(--primary-color);
      margin: 10px 0 5px;
    }

    .testimonial-card small {
      font-size: 14px;
      color: #666;
    }

    .swiper-pagination {
      position: relative;
      margin-top: 20px;
    }

    .swiper-pagination-bullet {
      width: 10px;
      height: 10px;
      background-color: #ccc;
      opacity: 1;
    }

    .swiper-pagination-bullet-active {
      background-color: var(--primary-color);
    }

    /* Footer */
    footer {
      background-color: #333;
      color: #fff;
      padding: 20px 0;
    }

    footer .footer-content {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 20px;
      flex-direction: row;
    }

    footer img {
      height: 200px;
      margin-bottom: 0;
    }

    footer .footer-text {
      text-align: left;
    }

    footer p {
      margin: 5px 0;
    }

    footer a {
      color: var(--primary-color);
      text-decoration: none;
    }

    footer a:hover {
      text-decoration: underline;
    }

    /* Business Achievements Block */
    .achievement-container {
      background-image: url("https://assets.softr-files.com/applications/9521e7b5-95ff-4a2d-9c75-3e27ff478449/assets/165f0107-97c4-4879-a2c3-c88661183451.jpeg");
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      padding: 0px 0;
      margin: 0;
      min-height: 5vh;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-evenly;
      align-items: center;
      overflow: hidden;
      filter: none;
    }

    .achievement-container.lazy-loaded {
      background-image: url("https://assets.softr-files.com/applications/9521e7b5-95ff-4a2d-9c75-3e27ff478449/assets/165f0107-97c4-4879-a2c3-c88661183451.jpeg");
    }

    .achievement-item {
      display: flex;
      align-items: center;
      justify-content: center;
      background: rgba(0, 0, 0, 0.2);
      padding: 5px;
      margin: 10px;
      border-radius: 10px;
      box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.4);
      transition: transform 0.3s ease;
      flex: 1 1 calc(5% - 20px);
      max-width: calc(5% - 20px);
      box-sizing: border-box;
      text-align: center;
    }

    .achievement-item:hover {
      transform: translateY(-10px);
    }

    .achievement-icon {
      font-size: 2.5rem;
      margin-right: 10px;
      color: var(--primary-color);
    }

    .achievement-number {
      font-size: 1.5rem;
      font-weight: normal;
      margin: 0;
      color: white;
    }

    .achievement-label {
      font-size: 0.8rem;
      font-weight: bold;
      color: white;
    }

    @media screen and (max-width: 768px) {
      .achievement-item {
        flex: 1 1 calc(50% - 20px);
        max-width: calc(50% - 20px);
      }
    }

    @media screen and (max-width: 480px) {
      .achievement-item {
        flex: 1 1 calc(50% - 20px);
        max-width: calc(50% - 20px);
      }
    }

    /* services Block */
    .services-container {
      background-image: url("https://assets.softr-files.com/applications/9521e7b5-95ff-4a2d-9c75-3e27ff478449/assets/165f0107-97c4-4879-a2c3-c88661183451.jpeg");
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      padding: 0;
      margin: 0;
      min-height: 5vh;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-evenly;
      align-items: center;
      overflow: hidden;
      filter: none;
    }

    .services-container.lazy-loaded {
      background-image: url("https://assets.softr-files.com/applications/9521e7b5-95ff-4a2d-9c75-3e27ff478449/assets/165f0107-97c4-4879-a2c3-c88661183451.jpeg");
    }

    .services-item {
      display: flex;
      align-items: center;
      justify-content: center;
      background: rgba(0, 0, 0, 0.2);
      padding: 5px;
      margin: 10px;
      border-radius: 10px;
      box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.4);
      transition: transform 0.3s ease;
      flex: 1 1 calc(5% - 20px);
      max-width: calc(5% - 20px);
      box-sizing: border-box;
      text-align: center;
    }

    .services-item:hover {
      transform: translateY(-10px);
    }

    .services-icon {
      font-size: 2.5rem;
      margin-right: 10px;
      color: var(--primary-color);
    }

    .services-label {
      font-size: 1.5rem;
      font-weight: normal;
      color: white;
    }

    @media screen and (max-width: 768px) {
      .services-item {
        flex: 1 1 calc(50% - 20px);
        max-width: calc(50% - 20px);
      }
    }

    @media screen and (max-width: 480px) {
      .services-item {
        flex: 1 1 calc(50% - 20px);
        max-width: calc(50% - 20px);
      }
    }

    /* Full Width Image */
    .full-width-image {
      position: relative;
      width: 100%;
      height: 100vh;
      background-image: url("https://assets.softr-files.com/applications/9521e7b5-95ff-4a2d-9c75-3e27ff478449/assets/41ea411f-f18f-487a-b142-b62f7e85c477.png");
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      margin: 0;
      padding: 0;
      overflow: hidden;
    }

    /* --- PWA Install Banner Styles --- */
    #pwaInstallBanner {
      display: none;
      position: fixed;
      bottom: 0;
      left: 0;
      right: 0;
      background: #007bff;
      color: white;
      padding: 16px;
      text-align: center;
      z-index: 1000;
      font-family: Arial, sans-serif;
    }

    #pwaInstallBanner button {
      margin-left: 16px;
      background: #0056b3;
      border: none;
      padding: 8px 12px;
      color: white;
      cursor: pointer;
      border-radius: 4px;
    }

    #pwaInstallBanner button.dismiss {
      background: transparent;
      font-size: 16px;
    }

    /* Custom mobile styles for interactive cards */
    @media (max-width: 576px) {
      .interactive-card {
        max-width: 80%;
        /* Adjust overall card width */
        margin: 0px auto;
        /* Center and add spacing */
        padding: 0px;
      }

      .interactive-card .card-img-top {
        max-width: 408px;
        max-height: 250px;
        object-fit: fill;
      }

      .interactive-card .card-title {
        font-size: 1rem;
        /* Smaller title font */
      }

      .interactive-card .card-text {
        font-size: 0.9rem;
        /* Smaller text font */
      }

      .interactive-card .btn {
        position: absolute;
        top: 10%;
        /* Center vertically */
        left: 50%;
        /* Center horizontally */
        transform: translate(-50%, -190%);
        /* Perfect centering */
        display: none;
        font-size: 1.2rem;
        padding: 10px 20px;
        background-color: rgba(81, 187, 196, 1);
        border: none;
        color: white;
        z-index: 2;
      }
    }

    /* Adjust testimony section spacing */
    .spacer {
      height: 15px;
      /* Reduce from 30px if that's your current value */
    }

    h2.text-2xl {
      margin-bottom: 5px;
      /* Reduce bottom margin */
    }

    .testimonial-carousel {
      padding: 10px 0;
      /* Reduce from 50px if that's your current value */
    }

    .swiper {
      padding: 10px 0;
      /* Reduce from 20px if that's your current value */
    }
  </style>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      var menuToggle = document.querySelector(".mobile-menu-toggle");
      var menu = document.querySelector(".mobile-menu");
      var desktopMenu = document.querySelector(".menu");

      menuToggle.addEventListener("click", function () {
        menu.classList.toggle("mobile-menu-open");

        // Hide desktop menu when mobile menu is open
        if (menu.classList.contains("mobile-menu-open")) {
          desktopMenu.style.display = "none";
        } else {
          desktopMenu.style.display = "flex";
        }
      });
    });

    let deferredPrompt;
    const installBanner = document.getElementById("pwaInstallBanner");
    const installBtn = document.getElementById("pwaInstallBtn");
    const dismissBtn = document.getElementById("pwaDismissBtn");
    const pwaMessage = document.getElementById("pwaMessage");

    function isIos() {
      const userAgent = window.navigator.userAgent.toLowerCase();
      return /iphone|ipad|ipod/.test(userAgent);
    }

    function isInStandaloneMode() {
      return ("standalone" in window.navigator) && window.navigator.standalone;
    }

    window.addEventListener("beforeinstallprompt", (e) => {
      e.preventDefault();
      deferredPrompt = e;
      if (window.innerWidth < 768) {
        installBanner.style.display = "block";
        pwaMessage.textContent = "Install our app for a better mobile experience!";
        installBtn.style.display = "block";
      }
    });

    if (isIos() && !isInStandaloneMode()) {
      installBanner.style.display = "block";
      pwaMessage.textContent = "To install, tap the Share icon and then 'Add to Home Screen'";
      installBtn.style.display = "none";
    }

    installBtn.addEventListener("click", () => {
      if (deferredPrompt) {
        deferredPrompt.prompt();
        deferredPrompt.userChoice.then((choiceResult) => {
          console.log("User choice", choiceResult.outcome);
          installBanner.style.display = "none";
          deferredPrompt = null;
        });
      }
    });

    dismissBtn.addEventListener("click", () => {
      installBanner.style.display = "none";
    });

    if ("serviceWorker" in navigator) {
      window.addEventListener("load", function () {
        navigator.serviceWorker
          .register("/service-worker.js")
          .then(function (registration) {
            console.log(
              "ServiceWorker registration successful with scope: ",
              registration.scope
            );
          })
          .catch(function (error) {
            console.log("ServiceWorker registration failed: ", error);
          });
      });
    }
  </script>

  <title>Dashboard - HOWN Portal</title>
</head>

<body>
  <!-- Desktop Logo & Menu (Hidden on Mobile) -->
  <div class="logo-container">
    <div class="menu">
      <a href="/Dashboard.php">Home</a>
      <a href="/Submit_Lead.php">Submit Lead</a>
      <a href="/HOWNready.php">HOWNready</a>
      <img
        src="https://assets.softr-files.com/applications/9521e7b5-95ff-4a2d-9c75-3e27ff478449/assets/afc3b303-2b1b-4eee-b571-bd8261e721c8.png"
        alt="Logo" class="logo" loading="lazy" />
      <a href="/Summary.php">Summary</a>
      <a href="/HOWNlife.php">HOWNlife</a>
      <a href="/contact-us">Contact Us</a>
    </div>
  </div>

  <div class="mobile-logo-container">
    <img
      src="https://assets.softr-files.com/applications/9521e7b5-95ff-4a2d-9c75-3e27ff478449/assets/afc3b303-2b1b-4eee-b571-bd8261e721c8.png"
      alt="Logo" class="logo" loading="lazy" />
    <button class="mobile-menu-toggle" aria-label="Toggle Menu">&#9776;</button>
    <div class="mobile-menu">
      <a href="/HOWNready.php">HOWNready</a>
      <a href="/Submit_Lead.php">Submit Lead</a>
      <a href="/Summary.php">Summary</a>
      <a href="/HOWNlife.php">HOWNlife</a>
      <a href="/contact-us">Contact Us</a>
    </div>
  </div>

  <!-- Interactive Card Section -->
  <div class="interactive-card-section">
    <div class="container text-center">
      <div class="row g-4 justify-content-center">
        <div class="col-md-6 d-flex justify-content-center">
          <div class="card interactive-card">
            <img
              src="https://assets.softr-files.com/applications/9521e7b5-95ff-4a2d-9c75-3e27ff478449/assets/797172da-e37f-4a77-8ee1-3ca4db7435d5.png"
              class="card-img-top" alt="HOWNready" />
            <div class="card-body">
              <h5 class="card-title">HOWNready</h5>
              <p class="card-text">Get your clients HOWNready.</p>
              <a href="#" class="btn btn-primary">HOWNready</a>
            </div>
          </div>
        </div>
        <div class="col-md-6 d-flex justify-content-center">
          <div class="card interactive-card">
            <img
              src="https://assets.softr-files.com/applications/9521e7b5-95ff-4a2d-9c75-3e27ff478449/assets/guy-with-phone-account-285d62.svg"
              class="card-img-top" alt="Submit a Lead" />
            <div class="card-body">
              <h5 class="card-title">Submit a Lead</h5>
              <p class="card-text">Submit new leads quick & simple.</p>
              <a href="#" class="btn btn-primary">Submit</a>
            </div>
          </div>
        </div>
      </div>
      <div class="row g-4 justify-content-center mt-3">
        <div class="col-md-6 d-flex justify-content-center">
          <div class="card interactive-card">
            <img
              src="https://assets.softr-files.com/applications/9521e7b5-95ff-4a2d-9c75-3e27ff478449/assets/guy-with-charts-285d62.svg"
              class="card-img-top" alt="Deal Summary" />
            <div class="card-body">
              <h5 class="card-title">Client Summary</h5>
              <p class="card-text">View the status of client deals.</p>
              <a href="#" class="btn btn-primary">Summary</a>
            </div>
          </div>
        </div>
        <div class="col-md-6 d-flex justify-content-center">
          <div class="card interactive-card">
            <img
              src="https://assets.softr-files.com/applications/9521e7b5-95ff-4a2d-9c75-3e27ff478449/assets/girl-exploring-map-285d62.svg"
              class="card-img-top" alt="HOWNlife" />
            <div class="card-body">
              <h5 class="card-title">HOWNlife</h5>
              <p class="card-text">Explore the HOWNlife platform.</p>
              <a href="#" class="btn btn-primary">HOWNlife</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Business Achievements Block -->
  <div class="achievement-container">
    <div class="achievement-item">
      <i class="fa-solid fa-calendar achievement-icon"></i>
      <div>
        <div class="achievement-number">2017</div>
        <div class="achievement-label">Since</div>
      </div>
    </div>
    <div class="achievement-item">
      <i class="fa-solid fa-users achievement-icon"></i>
      <div>
        <div class="achievement-number">250+</div>
        <div class="achievement-label">Clients</div>
      </div>
    </div>
    <div class="achievement-item">
      <i class="fa-solid fa-chart-line achievement-icon"></i>
      <div>
        <div class="achievement-number">$270m+</div>
        <div class="achievement-label">Client Volume</div>
      </div>
    </div>
    <div class="achievement-item">
      <i class="fa-solid fa-handshake achievement-icon"></i>
      <div>
        <div class="achievement-number">35+</div>
        <div class="achievement-label">Partners</div>
      </div>
    </div>
  </div>

  <!-- HOWN Financial Introduction -->
  <div class="container mt-5 text-center">
    <h1>HOWN Introduction</h1>
    <h5>
      Market leading technology providing our partners unparalleled transparency.
    </h5>
    <h3 style="margin-top: 40px">HOWN Financial Overview</h3>
    <div style="max-width: 100%; overflow: hidden; display: flex; justify-content: center;">
      <video style="width: 100%; max-width: 600px; height: auto" controls>
        <source
          src="https://assets.softr-files.com/applications/9521e7b5-95ff-4a2d-9c75-3e27ff478449/assets/4e784757-0e29-4a65-b575-93f485de4f1f.mp4"
          type="video/mp4" />
        Your browser does not support the video tag.
      </video>
    </div>
  </div>

  <!-- Side by Side Videos -->
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6">
        <h3 style="text-align: center">HOWNready Assessment</h3>
        <div style="max-width: 100%; overflow: hidden">
          <video style="width: 100%; height: auto" controls>
            <source
              src="https://assets.softr-files.com/applications/9521e7b5-95ff-4a2d-9c75-3e27ff478449/assets/32408fdd-4aba-4f16-82f3-502b425349c0.mp4"
              type="video/mp4" />
            Your browser does not support the video tag.
          </video>
        </div>
      </div>
      <div class="col-md-6">
        <h3 style="text-align: center">How to refer a client?</h3>
        <div style="max-width: 100%; overflow: hidden">
          <video style="width: 100%; height: auto" controls>
            <source
              src="https://assets.softr-files.com/applications/9521e7b5-95ff-4a2d-9c75-3e27ff478449/assets/db1d972c-deae-4888-8b6d-edb5bde9c62b.mp4"
              type="video/mp4" />
            Your browser does not support the video tag.
          </video>
        </div>
      </div>
    </div>
  </div>

  <!-- Services Block -->
  <div class="services-container">
    <div class="services-item">
      <i class="fa-solid fa-home services-icon"></i>
      <div>
        <div class="services-label">Residential</div>
      </div>
    </div>
    <div class="services-item">
      <i class="fa-solid fa-store services-icon"></i>
      <div>
        <div class="services-label">Commercial</div>
      </div>
    </div>
    <div class="services-item">
      <i class="fa-solid fa-piggy-bank services-icon" style="padding-right: 10px;"></i>
      <div>
        <div class="services-label">SMSF</div>
      </div>
    </div>
    <div class="services-item">
      <i class="fa-solid fa-hand-holding-dollar services-icon"></i>
      <div>
        <div class="services-label">Investment</div>
      </div>
    </div>
  </div>

  <!-- Testimony -->
  <div class="spacer"></div>
  <h2 class="text-2xl font-bold">What Our Customers Say</h2>
  <div class="testimonial-carousel">
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div class="testimonial-card">
            <p>
              "Matt was fantastic! My partner and I were purchasing our first
              family home and had so many questions. He was always available
              to answer them with patience and clarity. Highly recommend!"
            </p>
            <h4>Morgan J</h4>
            <small>31, Young family, Sole income</small>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="testimonial-card">
            <p>
              "Refinancing felt overwhelming, but Matt made it quick and
              stress-free. His professionalism and platform are top-notch. I
              now have a much better rate, and I couldn't be happier!"
            </p>
            <h4>Lang G</h4>
            <small>37, Single professional</small>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="testimonial-card">
            <p>
              "Our settlement process was full of delays, but Matt remained
              calm and proactive. His tech platform kept us informed every
              step of the way. Truly impressive!"
            </p>
            <h4>Amy S</h4>
            <small>44, Dual income</small>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="testimonial-card">
            <p>
              "I had challenges with my credit history, but Matt worked
              tirelessly to find the best solution. His genuine care and
              competence turned an impossible situation into a success!"
            </p>
            <h4>William M</h4>
            <small>39, Single professional</small>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="testimonial-card">
            <p>
              "As an investor with a complex portfolio, I needed someone who
              understood my financial situation. Matt not only delivered but
              exceeded my expectations."
            </p>
            <h4>Brendan L</h4>
            <small>48, Property Investor</small>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="testimonial-card">
            <p>
              "As a first-time home buyer, I had no idea what to expect. Matt
              was patient, clear, and incredibly supportive throughout the
              whole process. I can't recommend him enough!"
            </p>
            <h4>Jason W</h4>
            <small>24, Tradesman</small>
          </div>
        </div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>

  <!-- --- Custom PWA Install Popup for Mobile --- -->
  <div id="pwaInstallBanner">
    <span id="pwaMessage">Install our partner app!</span>
    <button id="pwaInstallBtn">Install</button>
    <button id="pwaDismissBtn" class="dismiss">✕</button>
  </div>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="footer-content">
        <img src="https://www.hown.com.au/wp-content/uploads/2024/02/Color-logo-no-background-1-2048x2024.png"
          alt="HOWN Finance & Home Loans" />
        <div class="footer-text">
          <p>Servicing Australia Wide</p>
          <p>Email: <a href="mailto:partners@hown.com.au">partners@hown.com.au</a></p>
          <p>Phone: <a href="tel:+61411504199">0411 504 199</a></p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script>
    const swiper = new Swiper(".mySwiper", {
      slidesPerView: 2,
      spaceBetween: 20,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      breakpoints: {
        320: { slidesPerView: 1 },
        768: { slidesPerView: 2 },
      },
    });
  </script>
</body>

</html>