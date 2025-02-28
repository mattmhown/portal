<?php include 'session_check.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <link rel="manifest" href="manifest.json" />
  <!-- Set your theme color -->
  <meta name="theme-color" content="#51BBC4" />
  <!-- iOS Status Bar setting using your custom hex -->
  <meta name="apple-mobile-web-app-status-bar-style" content="#51BBC4" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Preload font -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css?family=Oswald:300&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
  <!-- Swiper CSS -->
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

  <style>
    /* Ensure html and body take full height */
    html,
    body {
      height: 100%;
      margin: 0;
      padding: 0;
    }

    :root {
      --primary-color: #51bbc4;
      --background-color: #ffffff;
    }

    /* Page Wrapper for Sticky Footer */
    .wrapper {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    /* Content area will expand to fill available space */
    .content {
      flex: 1;
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
      background-image: url("https://assets.softr-files.com/applications/9521e7b5-95ff-4a2d-9c75-3e27ff478449/assets/4e873979-7f33-4843-82e6-12e42cf5ce0b.jpeg");
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
    }

    /* Desktop Navigation */
    .logo-container,
    .mobile-logo-container {
      width: 100%;
      height: 100px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      background: rgba(255, 255, 255, 0.8);
      position: sticky;
      top: 0;
      z-index: 1000;
      padding: 0;
    }

    .logo {
      height: 100px;
      width: auto;
      object-fit: contain;
    }

    .menu {
      display: flex;
      justify-content: center;
      align-items: center;
      flex: 1;
      gap: 10px;
    }

    .menu a,
    .mobile-menu a {
      color: var(--primary-color);
      text-decoration: none;
      padding: 0 20px;
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

    .mobile-menu.mobile-menu-open {
      display: flex;
      opacity: 1;
      transform: translateY(0);
    }

    .mobile-menu a {
      padding: 10px;
      font-size: 20px;
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

    /* Header Text Styles */
    h1 {
      color: var(--primary-color);
      font-size: 3em;
      font-weight: bold;
      font-family: Arial, sans-serif;
    }

    h2 {
      color: var(--primary-color);
      font-size: 2em;
      font-family: Arial, sans-serif;
    }

    h3 {
      color: var(--primary-color);
      font-size: 1.25em;
      font-family: Arial, sans-serif;
    }

    h4 {
      color: var(--primary-color);
      font-size: 0.8em;
      font-family: Arial, sans-serif;
    }

    h5 {
      color: black;
      font-size: 1.35em;
      font-family: Arial, sans-serif;
    }

    /* Services Block */
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

    .services-item {
      display: flex;
      align-items: center;
      justify-content: center;
      background: rgba(0, 0, 0, 0.2);
      padding: 5px;
      margin: 10px;
      border-radius: 10px;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.4);
      transition: transform 0.3s ease;
      flex: 1 1 calc(5% - 20px);
      max-width: calc(5% - 20px);
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
      height: 100px;
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

    /* Client Cards Section Styles */
    .client-table-container {
      margin: 20px auto;
      max-width: 95%;
      background: rgba(255, 255, 255, 0.2);
      padding: 20px;
      border-radius: 8px;
      backdrop-filter: blur(5px);
    }

    .client-table-container h2 {
      color: var(--primary-color);
      margin-bottom: 20px;
    }

    /* Status Filter Buttons */
    .status-filter-btn {
      margin: 0 15px;
      padding: 8px 16px;
      font-size: 22px;
      border: none;
      background: rgba(12, 170, 175, 0.25);
      color: #fff;
      border-radius: 4px;
      cursor: pointer;
      transition: background 0.3s;
    }

    .status-filter-btn:hover,
    .status-filter-btn.active {
      background: #3fa6b0;
    }

    /* Sticky Controls */
    .sticky-controls {
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: sticky;
      top: 100px;
      background: rgba(255, 255, 255, 0);
      padding: 10px 0;
      z-index: 2;
    }

    .extra-buttons {
      display: flex;
      gap: 10px;
    }

    /* Client Card Styles */
    .client-card {
      background: rgba(255, 255, 255, 0.3);
      border-radius: 8px;
      padding: 20px;
      margin: 10px 0;
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      justify-content: space-between;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      font-size: 20px;
    }

    .client-card:hover {
      transform: scale(1.02);
      box-shadow: 0px 0px 25px rgba(81, 187, 196, 0.6);
    }

    .client-card .field {
      flex: 1 1 30px;
      margin: 0;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .client-card .field.notes {
      flex: 2 1 30px;
      position: relative;
      text-align: left;
      width: 100%;
      max-width: 100%;
    }

    .client-card .toggle-notes {
      margin-left: 10px;
    }

    /* Use a block-level element for expanded notes and add a helper class */
    .expanded-notes {
      display: none;
      white-space: normal;
      overflow-wrap: break-word;
      width: 100%;
      margin-top: 10px;
      text-align: left;
    }

    .show {
      display: block !important;
    }

    /* Mobile Adjustments for Client Cards */
    @media (max-width: 576px) {
      .client-card {
        flex-direction: column;
        align-items: flex-start;
        text-align: left;
      }

      .client-card .field {
        width: 100%;
        white-space: normal;
        overflow: visible;
        text-overflow: initial;
        margin-bottom: 10px;
        text-align: left;
      }
    }
  </style>

  <script>
    // Placeholder client data – replace with Supabase code when ready.
    let currentStatusFilter = "Pending";
    let allData = [
      { name: "John Doe", phone: "+61 400 123 456", email: "john@example.com", status: "Pending", notes: "Follow up next week. Call regarding mortgage options and refinancing.", state: "NSW" },
      { name: "Jane Smith", phone: "+61 455 678 910", email: "jane@example.com", status: "Complete", notes: "Requested more info on home loans and eligibility criteria.", state: "VIC" },
      { name: "Mike Johnson", phone: "+61 411 222 333", email: "mike@example.com", status: "Pending", notes: "Call scheduled for next Tuesday to discuss loan options.", state: "QLD" },
      { name: "Emily Davis", phone: "+61 422 333 444", email: "emily@example.com", status: "Pending", notes: "Follow up regarding commercial property loan details.", state: "NSW" },
      { name: "Robert Wilson", phone: "+61 433 555 666", email: "robert@example.com", status: "Complete", notes: "Completed initial consultation. Waiting on documents.", state: "VIC" }
    ];

    function populateClientCards() {
      const container = document.getElementById("clientCardsContainer");
      container.innerHTML = '';
      allData.forEach((row, index) => {
        // Filter by status
        if (row.status !== currentStatusFilter) return;
        let card = document.createElement('div');
        card.className = 'client-card';
        card.innerHTML = `
          <div class="field" style="color: #3fa6b0;"><strong>Name:</strong><span style="color: black; margin-left: 14px;""> ${row.name}</span></div>
          <div class="field" style="color: #3fa6b0;"><strong>Phone:</strong><span style="color: black; margin-left: 9px;""> ${row.phone}</span></div>
          <div class="field" style="color: #3fa6b0;"><strong>Email:</strong><span style="color: black; margin-left: 15px;""> ${row.email}</span></div>
          <div class="field" style="color: #3fa6b0;"><strong>Status:</strong><span style="color: black; margin-left: 9px;""> ${row.status}</span></div>
          <div class="field notes" id="notes-${index}">
            <strong style="color: #3fa6b0;">Notes:</strong>
            <span class="notes-preview"; style="margin-left: 14px;"">${row.notes.substring(0, 20)}...</span>
            <button onclick="toggleNotes('notes-${index}')" class="btn btn-sm btn-info toggle-notes" style="color: white; letter-spacing: 2px; font-size: 17px;">View</button>
            <button onclick="toggleNotes('notes-${index}')" class="btn btn-sm btn-secondary hide-btn" style="display:none; margin-left: 24px; --bs-btn-bg: white; --bs-btn-color: #0dcaf0 letter-spacing: 2px; font-size: 17px;">Hide</button>
            <div class="expanded-notes";>${row.notes}</div>
          </div>
          <div class="field"><strong style="color: #3fa6b0;">State:</strong> <span style="margin-left: 17px;">${row.state}</span></div>
        `;
        container.appendChild(card);
      });
    }

    function toggleNotes(id) {
      let notesField = document.getElementById(id);
      let previewText = notesField.querySelector(".notes-preview");
      let fullText = notesField.querySelector(".expanded-notes");
      let viewButton = notesField.querySelector(".toggle-notes");
      let hideButton = notesField.querySelector(".hide-btn");

      if (!fullText.classList.contains("show")) {
        // Expand: Hide preview and view button, show full notes and hide button
        fullText.classList.add("show");
        previewText.style.display = "none";
        viewButton.style.display = "none";
        hideButton.style.display = "inline-block";
      } else {
        // Collapse: Hide full notes, show preview and view button, hide hide button
        fullText.classList.remove("show");
        previewText.style.display = "inline-block";
        viewButton.style.display = "inline-block";
        hideButton.style.display = "none";
      }
    }

    function filterClientCards() {
      const input = document.getElementById("clientSearchInput").value.toUpperCase();
      const cards = document.querySelectorAll(".client-card");
      cards.forEach(card => {
        card.style.display = card.textContent.toUpperCase().includes(input) ? '' : 'none';
      });
    }

    function setStatusFilter(status) {
      currentStatusFilter = status;
      document.getElementById("pendingBtn").classList.toggle("active", status === "Pending");
      document.getElementById("completeBtn").classList.toggle("active", status === "Complete");
      populateClientCards();
    }

    function showMore() {
      alert("Show more functionality placeholder: In a live system, this would load additional cards.");
    }

    document.addEventListener("DOMContentLoaded", () => {
      populateClientCards();
    });

    // Mobile Menu Toggle
    document.addEventListener("DOMContentLoaded", function () {
      var menuToggle = document.querySelector(".mobile-menu-toggle");
      var menu = document.querySelector(".mobile-menu");
      menuToggle.addEventListener("click", function () {
        menu.classList.toggle("mobile-menu-open");
      });
    });
  </script>

  <title>Summary - HOWN Portal</title>
</head>

<body>
  <div class="wrapper">
    <!-- All page content (header, main content, etc.) goes inside the .content container -->
    <div class="content">
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
          <a href="/Dashboard.php">Home</a>
          <a href="/HOWNready.php">HOWNready</a>
          <a href="/Submit_Lead.php">Submit Lead</a>
          <a href="/HOWNlife.php">HOWNlife</a>
          <a href="/contact-us">Contact Us</a>
        </div>
      </div>
      
      <!-- Client Summary Cards Section -->
      <div class="client-table-container">
        <div style="text-align: center; margin-bottom: 0px;">
          <p>Select Status Filter:</p>
          <!-- Status Filter Buttons -->
          <div style="text-align: center; margin-bottom: 10px;">
            <button id="pendingBtn" onclick="setStatusFilter('Pending')" class="status-filter-btn active"
              style="padding-left: 20px; padding-right: 20px;">Pending</button>
            <button id="completeBtn" onclick="setStatusFilter('Complete')" class="status-filter-btn">Complete</button>
          </div>
          <!-- Sticky Controls: Search Bar and Extra Buttons -->
          <div class="sticky-controls">
            <input type="text" id="clientSearchInput" class="form-control" style="max-width:300px; margin-right: 20px;"
              placeholder="Search clients..." onkeyup="filterClientCards()">
            <div class="extra-buttons">
              <button type="button"
                style="color: #ffffff; background-color: #0dcaf0; letter-spacing: 2px; font-size: 18px; --bs-btn-border-width: 0;" onclick="
                alert('Help: AI assistant');"
                class="btn btn-secondary">Help</button>
              <button type="button"
                style="color: #ffffff; background-color: #0dcaf0; letter-spacing: 2px; font-size: 18px; --bs-btn-border-width: 0;"
                onclick="alert('Export your clients status as a list');" class="btn btn-secondary">Export</button>
            </div>
          </div>
          <!-- Cards Container -->
          <div id="clientCardsContainer"></div>
          <!-- Show More Button -->
          <div style="text-align: center; margin-top: 20px;">
            <button type="button" onclick="showMore()" class="btn btn-primary"
              style="color: #ffffff; background-color: #0dcaf0; letter-spacing: 2px; font-size: 18px; --bs-btn-border-width: 0;">Show
              More</button>
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
        <i class="fa-solid fa-piggy-bank services-icon"></i>
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
    <!-- Footer (always at the bottom of the page) -->
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
  </div>
</body>

</html>