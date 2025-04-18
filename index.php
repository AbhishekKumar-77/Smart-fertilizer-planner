<?php
$pageTitle = "Smart Fertilizer Planner";
$activeTab = isset($_GET['tab']) ? $_GET['tab'] : 'home';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo $pageTitle; ?></title>
  <link href="./output.css" rel="stylesheet" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    :root {
      --primary-green: #34D399;
      --dark-green: #059669;
      --yellow-accent: #FBBF24;
      --primary-font: 'Roboto', sans-serif;
      --secondary-font: 'Open Sans', sans-serif;
      --dark-bg: #1E293B;
    }

    body {
      font-family: var(--primary-font);
      background-color: var(--dark-bg);
      color: #E5E7EB;
      line-height: 1.6;
      margin: 0;
      padding: 0;
      overflow-x: hidden;
    }

    /* Utility Classes */
    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
      position: relative;
      z-index: 1;
    }

    /* Enhanced Scroll Up Button */
    .scroll-up {
      position: fixed;
      bottom: 20px;
      right: 20px;
      background-color: var(--primary-green);
      color: white;
      padding: 12px 16px;
      border-radius: 8px;
      display: none;
      cursor: pointer;
      z-index: 100;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
      transition: all 0.3s ease;
      font-size: 1rem;
      text-decoration: none;
    }

    .scroll-up:hover {
      background-color: var(--dark-green);
      transform: translateY(-3px);
    }

    /* Improved Background Video */
    .bg-video {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      z-index: -1;
      filter: brightness(0.6) contrast(1.1);
    }

    .bg-video-fallback {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      z-index: -1;
      background: url('assets/images/fallback-bg.jpg') no-repeat center center/cover;
      display: none;
    }

    /* Card Enhancements */
    .crop-card {
      background-color: rgba(255, 255, 255, 0.05);
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .crop-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
    }

    .crop-card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .crop-card-content {
      padding: 20px;
    }

    .crop-card h3 {
      font-size: 1.5rem;
      margin-bottom: 10px;
      color: var(--primary-green);
    }

    .crop-card p {
      font-size: 1rem;
      color: #CBD5E0;
    }

    /* Benefit List */
    .benefit-item {
      position: relative;
      padding-left: 24px;
      margin-bottom: 10px;
      color: #CBD5E0;
    }

    .benefit-item:before {
      content: "\f00c";
      font-family: FontAwesome;
      position: absolute;
      left: 0;
      color: var(--primary-green);
      font-weight: bold;
    }

    /* Image Gallery */
    .image-gallery {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 24px;
    }

    .gallery-item {
      background-color: rgba(139, 69, 19, 0.2);
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .gallery-item:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .gallery-item:hover .gallery-img {
      transform: scale(1.1);
      transition: transform 0.3s ease;
    }

    .gallery-img {
      width: 100%;
      height: 220px;
      object-fit: cover;
    }

    .gallery-caption {
      padding: 16px;
      text-align: center;
    }

    .gallery-caption h3 {
      font-size: 1.25rem;
      color: var(--primary-green);
      margin-bottom: 8px;
    }

    .gallery-caption p {
      font-size: 0.9rem;
      color: #CBD5E0;
    }

    /* Navigation Bar */
    header {
      background-color: rgba(30, 41, 59, 0.7);
      backdrop-filter: blur(10px);
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 50;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    nav ul {
      display: flex;
      gap: 24px;
      list-style: none;
    }

    .nav-link {
      position: relative;
      color: #9CA3AF;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .nav-link:hover {
      color: var(--yellow-accent);
    }

    .nav-link:after {
      content: '';
      position: absolute;
      width: 0;
      height: 2px;
      bottom: -4px;
      left: 0;
      background-color: var(--yellow-accent);
      transition: width 0.3s ease;
    }

    .nav-link:hover:after {
      width: 100%;
    }

    .active-tab {
      color: var(--yellow-accent) !important;
    }

    /* Hero Section */
    .hero-container {
      position: relative;
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
    }

    .hero-container::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(to bottom, rgba(30, 41, 59, 0) 0%, rgba(30, 41, 59, 0.8) 100%);
      z-index: 1;
    }

    .hero-content {
      position: relative;
      z-index: 2;
      padding: 40px;
      text-align: center;
    }

    #typed {
      font-size: 3.5rem;
      font-weight: 700;
      margin-bottom: 20px;
      color: var(--primary-green);
    }

    #tech-badge {
      background-color: var(--dark-green);
      color: white;
      padding: 10px 16px;
      border-radius: 8px;
      font-size: 0.875rem;
      font-weight: 600;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
      animation: pulse 2s infinite;
    }

    @keyframes pulse {
      0% { transform: scale(1); }
      50% { transform: scale(1.05); }
      100% { transform: scale(1); }
    }

    .hero-buttons {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin-top: 30px;
    }

    .hero-buttons a {
      background-color: var(--yellow-accent);
      color: #111827;
      padding: 12px 24px;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 600;
      transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .hero-buttons a:hover {
      background-color: #EAB308;
      transform: translateY(-3px);
      box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
    }

    /* About Section */
    #about {
      background-color: rgba(30, 41, 59, 0.6);
      backdrop-filter: blur(10px);
      padding: 60px 0;
    }

    #about .container {
      max-width: 900px;
    }

    #about h2 {
      font-size: 2.5rem;
      font-weight: 700;
      color: var(--primary-green);
      margin-bottom: 30px;
      text-align: center;
    }

    #about p {
      font-size: 1.125rem;
      color: #CBD5E0;
      margin-bottom: 40px;
      text-align: center;
    }

    .about-features {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 30px;
    }

    .about-feature-item {
      background-color: rgba(255, 255, 255, 0.05);
      border-radius: 12px;
      padding: 25px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .about-feature-item:hover {
      background-color: rgba(255, 255, 255, 0.1);
      transform: translateY(-5px);
    }

    .about-feature-item h3 {
      font-size: 1.5rem;
      font-weight: 600;
      color: var(--primary-green);
      margin-bottom: 15px;
    }

    .about-feature-item p {
      font-size: 1rem;
      color: #CBD5E0;
    }

    /* Updated Crops Section */
    #crops {
      background: linear-gradient(to bottom, var(--dark-bg), var(--dark-bg));
      padding: 60px 0;
      position: relative;
      overflow: hidden;
    }

    /* Add a subtle overlay for depth */
    #crops::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: radial-gradient(circle, rgba(255, 255, 255, 0.2), transparent 70%);
      z-index: 0;
    }

    #crops h2 {
      font-size: 2.5rem;
      font-weight: 700;
      color: #E5E7EB;
      margin-bottom: 40px;
      text-align: center;
      position: relative;
      z-index: 1;
    }

    /* Enhanced Gallery Items with Blooming Effect */
    .gallery-item {
      background-color: rgba(139, 69, 19, 0.2);
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .gallery-item:hover {
      transform: translateY(-10px);
      box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
      background-color: #F0FDF4;
    }

    .gallery-item:hover .gallery-img {
      transform: scale(1.1);
      filter: brightness(1.1);
      transition: transform 0.3s ease, filter 0.3s ease;
    }

    .gallery-img {
      width: 100%;
      height: 220px;
      object-fit: cover;
      transition: transform 0.3s ease, filter 0.3s ease;
    }

    /* Add a pseudo-element for a blooming flower effect on hover */
    .gallery-item::after {
      content: '🌸';
      position: absolute;
      top: 10px;
      right: 10px;
      font-size: 2rem;
      opacity: 0;
      transform: scale(0);
      transition: opacity 0.3s ease, transform 0.3s ease;
    }

    .gallery-item:hover::after {
      opacity: 1;
      transform: scale(1);
      animation: bloom 0.5s ease-in-out;
    }

    @keyframes bloom {
      0% { transform: scale(0); opacity: 0; }
      50% { transform: scale(1.2); opacity: 1; }
      100% { transform: scale(1); opacity: 1; }
    }

    .gallery-caption {
      padding: 16px;
      text-align: center;
      background: linear-gradient(to top, rgba(255, 255, 255, 0.8), transparent);
    }

    .gallery-caption h3 {
      font-size: 1.25rem;
      color: #047857;
      margin-bottom: 8px;
    }

    .gallery-caption p {
      font-size: 0.9rem;
      color: #1F2937;
    }

    /* Update Benefit Item for better contrast */
    .benefit-item {
      position: relative;
      padding-left: 24px;
      margin-bottom: 10px;
      color: #E5E7EB;
    }

    .benefit-item:before {
      content: "\f00c";
      font-family: FontAwesome;
      position: absolute;
      left: 0;
      color: #047857;
      font-weight: bold;
    }

    /* Planner Section */
    #planner {
      background-color: rgba(30, 41, 59, 0.7);
      backdrop-filter: blur(10px);
      padding: 60px 0;
    }

    #planner h2 {
      font-size: 2.5rem;
      font-weight: 700;
      color: var(--primary-green);
      margin-bottom: 40px;
      text-align: center;
    }

    .planner-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
      gap: 40px;
      align-items: center;
    }

    .planner-steps {
      background-color: rgba(255, 255, 255, 0.05);
      border-radius: 12px;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .planner-steps h3 {
      font-size: 1.5rem;
      font-weight: 600;
      color: var(--primary-green);
      margin-bottom: 15px;
    }

    .planner-steps ol {
      list-style: none;
      padding: 0;
    }

    .planner-steps li {
      display: flex;
      align-items: start;
      margin-bottom: 15px;
      font-size: 1.125rem;
      color: #CBD5E0;
    }

    .planner-steps li span {
      background-color: var(--primary-green);
      color: #111827;
      width: 30px;
      height: 30px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 15px;
      font-weight: 600;
    }

    .planner-image {
      border-radius: 12px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .planner-try-button {
      background-color: var(--yellow-accent);
      color: #111827;
      padding: 12px 24px;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 600;
      display: inline-block;
      margin-top: 20px;
      transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .planner-try-button:hover {
      background-color: #EAB308;
      transform: translateY(-3px);
      box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
    }

    .planner-additional-info {
      background-color: rgba(255, 255, 255, 0.05);
      border-radius: 12px;
      padding: 30px;
      margin-top: 40px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .planner-additional-info h3 {
      font-size: 1.5rem;
      font-weight: 600;
      color: var(--primary-green);
      margin-bottom: 20px;
    }

    .planner-additional-info p {
      font-size: 1rem;
      color: #CBD5E0;
    }

    /* Housing Section */
    #housing {
      background-color: rgba(30, 41, 59, 0.8);
      backdrop-filter: blur(10px);
      padding: 60px 0;
    }

    #housing h2 {
      font-size: 2.5rem;
      font-weight: 700;
      color: var(--primary-green);
      margin-bottom: 40px;
      text-align: center;
    }

    .housing-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
      gap: 40px;
      align-items: center;
    }

    .housing-info {
      padding: 20px;
    }

    .housing-info h3 {
      font-size: 1.5rem;
      font-weight: 600;
      color: var(--primary-green);
      margin-bottom: 20px;
    }

    .housing-info p {
      font-size: 1rem;
      color: #CBD5E0;
      margin-bottom: 20px;
    }

    .housing-apply-button {
      background-color: var(--yellow-accent);
      color: #111827;
      padding: 12px 24px;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 600;
      transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      display: inline-block;
    }

    .housing-apply-button:hover {
      background-color: #EAB308;
      transform: translateY(-3px);
      box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
    }

    .housing-image {
      border-radius: 12px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .container {
        padding: 0 15px;
      }

      nav ul {
        gap: 15px;
      }

      .nav-link {
        font-size: 0.875rem;
      }

      #typed {
        font-size: 2.5rem;
      }

      .hero-content {
        padding: 30px;
      }

      .hero-buttons {
        flex-direction: column;
        align-items: center;
        gap: 15px;
      }

      #about .container {
        padding: 0 15px;
      }

      #about h2 {
        font-size: 2rem;
      }

      #about p {
        font-size: 1rem;
      }

      .about-features {
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      }

      #crops h2,
      #planner h2,
      #housing h2 {
        font-size: 2rem;
      }

      .planner-grid,
      .housing-grid {
        grid-template-columns: 1fr;
      }

      .planner-additional-info,
      .housing-info {
        padding: 20px;
      }

      .scroll-up {
        bottom: 15px;
        right: 15px;
      }
    }

    /* Enhanced hero section */
    .hero-container {
      position: relative;
    }

    .tech-highlight {
      position: absolute;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      z-index: -1;
      overflow: hidden;
      border-radius: 1rem;
    }

    .tech-highlight::before {
      content: '';
      position: absolute;
      width: 150%;
      height: 150%;
      top: -25%;
      left: -25%;
      background: radial-gradient(circle, rgba(56, 182, 255, 0.2) 0%, rgba(34, 197, 94, 0.1) 70%, transparent 100%);
      opacity: 0;
      transition: opacity 0.5s ease;
    }

    .tech-active .tech-highlight::before {
      opacity: 1;
    }

    .tech-active {
      position: relative;
    }

    .tech-active::after {
      content: '';
      position: absolute;
      bottom: -5px;
      left: 0;
      width: 100%;
      height: 2px;
      background: linear-gradient(90deg, #38b6ff, #22c55e);
      animation: techUnderline 2s infinite;
    }

    @keyframes techUnderline {
      0% {
        background-position: 0% 50%;
      }

      50% {
        background-position: 100% 50%;
      }

      100% {
        background-position: 0% 50%;
      }
    }
  </style>
</head>

<body class="bg-gray-900 text-white">
  <!-- Background Video with Fallback -->
  <video autoplay muted loop class="bg-video animate__animated animate__fadeIn" id="bgVideo">
    <source src="assets/images/182684-869773927_large.mp4" type="video/mp4" />
    <img src="assets/images/Screenshot 2025-04-11 205116.png" alt="Background Fallback" class="bg-video-fallback" />
  </video>

  <!-- Scroll Up Button -->
  <a href="#" class="scroll-up">
    <i class="fas fa-arrow-up"></i>
  </a>

  <!-- Navbar -->
  <header class="bg-opacity-70 backdrop-blur-md fixed top-0 left-0 right-0 z-50">
  <div class="container mx-auto px-4 py-3 flex justify-between items-center">
    <h1 class="text-2xl font-bold text-green-400">
      <i class="fas fa-leaf mr-2"></i>
      <?php echo $pageTitle; ?>
    </h1>
    <nav>
      <ul class="flex space-x-6">
        <li>
          <a href="#home"
            class="nav-link hover:text-yellow-400 <?php echo $activeTab == 'home' ? 'active-tab' : ''; ?>">Home</a>
        </li>
        <li>
          <a href="#about"
            class="nav-link hover:text-yellow-400 <?php echo $activeTab == 'about' ? 'active-tab' : ''; ?>">About</a>
        </li>
        <li>
          <a href="#crops"
            class="nav-link hover:text-yellow-400 <?php echo $activeTab == 'crops' ? 'active-tab' : ''; ?>">Crops</a>
        </li>
        <li>
          <a href="#planner"
            class="nav-link hover:text-yellow-400 <?php echo $activeTab == 'planner' ? 'active-tab' : ''; ?>">Planner</a>
        </li>
        <li>
          <a href="#housing"
            class="nav-link hover:text-yellow-400 <?php echo $activeTab == 'housing' ? 'active-tab' : ''; ?>">Housing</a>
        </li>
        <li>
          <a href="modules/dashboard.php" class="text-green-400 hover:text-yellow-400 nav-link">Dashboard</a>
        </li>
        <li>
          <a href="modules/login.php"
            class="nav-link hover:text-yellow-400 <?php echo $activeTab == 'login' ? 'active-tab' : ''; ?>">Login</a>
        </li>
      </ul>
    </nav>
  </div>
</header>
  <!-- Hero -->
  <section id="home" class="min-h-screen flex items-center justify-center px-4 pt-24">
    <div class="container">
      <div data-aos="fade-up" data-aos-duration="1200"
        class="max-w-4xl mx-auto rounded-xl overflow-hidden hero-container animate__animated animate__fadeIn">
        <div class="hero-content">
          <h2 id="typed" class="text-4xl md:text-5xl font-extrabold text-green-300" data-aos="fade-in" data-aos-delay="200">
            Customized Agricultural Solutions
          </h2>
          <p class="text-lg mb-6 text-gray-300" data-aos="fade-in" data-aos-delay="400">
            Transforming agriculture with smart solutions. Get customized fertilizer input and rural
            housing support using GIS and MIS technology for optimal land usage and sustainable
            development.
          </p>
          <div class="hero-buttons" data-aos="zoom-in" data-aos-delay="600">
            <a href="modules/fertilizer_planner.php" class="bg-green-600 hover:bg-green-700">Get
              Started</a>
            <a href="modules/housing_form.php" class="bg-yellow-500 hover:bg-yellow-600">Apply for
              Housing</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- About -->
  <section id="about" class="py-20">
    <div class="container">
      <h2 class="text-3xl font-bold text-green-400 mb-8 text-center animate__animated animate__fadeInDown" data-aos="fade-down" data-aos-duration="1000">
        About the Smart Agriculture Platform
      </h2>
      <p class="text-lg text-gray-300 mb-12 text-center animate__animated animate__fadeIn" data-aos="fade-in" data-aos-delay="200">
        The Smart Agriculture Platform integrates Geographic Information System (GIS) and Management
        Information System (MIS) to provide customized fertilizer input for different land parcels. This
        system also supports rural development through effective housing schemes and resource planning.
      </p>
      <div class="about-features grid grid-cols-1 md:grid-cols-3 gap-8 animate__animated animate__fadeInUp" data-aos="fade-up" data-aos-delay="400">
        <div class="about-feature-item bg-gray-800 bg-opacity-50 p-6 rounded-xl" data-aos="zoom-in" data-aos-delay="500">
          <h3 class="text-xl font-bold text-green-300 mb-4">Precision Agriculture</h3>
          <p class="text-gray-400">Our system uses soil health data and satellite imagery to provide precise
            fertilizer recommendations for each plot of land.</p>
        </div>
        <div class="about-feature-item bg-gray-800 bg-opacity-50 p-6 rounded-xl" data-aos="zoom-in" data-aos-delay="600">
          <h3 class="text-xl font-bold text-green-300 mb-4">Crop Optimization</h3>
          <p class="text-gray-400">We analyze historical yield data and weather patterns to suggest the most
            suitable crops for your land, maximizing productivity and sustainability.</p>
        </div>
        <div class="about-feature-item bg-gray-800 bg-opacity-50 p-6 rounded-xl" data-aos="zoom-in" data-aos-delay="700">
          <h3 class="text-xl font-bold text-green-300 mb-4">Rural Development</h3>
          <p class="text-gray-400">Integrated housing schemes help improve living conditions while
            maintaining agricultural productivity, supporting thriving rural communities.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Crops Info -->
  <section id="crops" class="py-20">
    <div class="container">
      <h2 class="text-3xl font-bold mb-12 text-center animate__animated animate__fadeInDown" data-aos="fade-down" data-aos-duration="1000">
        Supported Crops
      </h2>
      <div class="image-gallery animate__animated animate__fadeInUp" data-aos="fade-up" data-aos-delay="200">
        <div class="gallery-item" data-aos="slide-up" data-aos-delay="300">
          <img src="assets/images/360_F_232259658_4mkgOCLEqcFeU9AuIZ2RkxQMn20rHktC.jpg" alt="Wheat" class="gallery-img" />
          <div class="gallery-caption">
            <h3 class="text-xl font-bold mb-3">Wheat</h3>
            <p class="mb-4">Our system provides fertilizer strategy based on soil nitrogen and
              phosphorus needs, optimized for different wheat varieties.</p>
            <ul class="list-none pl-5">
              <li class="benefit-item">Nitrogen management based on soil tests</li>
              <li class="benefit-item">Phosphorus application timing</li>
              <li class="benefit-item">Disease-resistant variety suggestions</li>
            </ul>
          </div>
        </div>
        <div class="gallery-item" data-aos="slide-up" data-aos-delay="400">
          <img src="assets/images/rice.jpg" alt="Rice" class="gallery-img" />
          <div class="gallery-caption">
            <h3 class="text-xl font-bold mb-3">Rice</h3>
            <p class="mb-4">Water logging and fertilizer combination recommendations provided
              for both upland and lowland rice cultivation.</p>
            <ul class="list-none pl-5">
              <li class="benefit-item">Water management strategies</li>
              <li class="benefit-item">Micro-nutrient deficiency solutions</li>
              <li class="benefit-item">Pest control recommendations</li>
            </ul>
          </div>
        </div>
        <div class="gallery-item" data-aos="slide-up" data-aos-delay="500">
          <img src="assets/images/sugarcane.jpg" alt="Sugarcane" class="gallery-img" />
          <div class="gallery-caption">
            <h3 class="text-xl font-bold mb-3">Sugarcane</h3>
            <p class="mb-4">Long-term input plan based on climate and land fertility for
              maximum yield and sugar content.</p>
            <ul class="list-none pl-5">
              <li class="benefit-item">Multi-year nutrient planning</li>
              <li class="benefit-item">Ratoon management</li>
              <li class="benefit-item">Harvest timing optimization</li>
            </ul>
          </div>
        </div>
        <div class="gallery-item" data-aos="slide-up" data-aos-delay="600">
          <img src="assets/images/corn.jpg" alt="Corn/Maize" class="gallery-img" />
          <div class="gallery-caption">
            <h3 class="text-xl font-bold mb-3">Corn/Maize</h3>
            <p class="mb-4">Hybrid-specific fertilizer recommendations and planting density
              optimization for higher yields.</p>
            <ul class="list-none pl-5">
              <li class="benefit-item">Zinc deficiency solutions</li>
              <li class="benefit-item">Intercropping suggestions</li>
              <li class="benefit-item">Harvest moisture monitoring</li>
            </ul>
          </div>
        </div>
        <div class="gallery-item" data-aos="slide-up" data-aos-delay="700">
          <img src="assets/images/soyabean.jpg" alt="Soybean" class="gallery-img" />
          <div class="gallery-caption">
            <h3 class="text-xl font-bold mb-3">Soybean</h3>
            <p class="mb-4">Nitrogen-fixing optimization and micronutrient management for
              protein-rich yields.</p>
            <ul class="list-none pl-5">
              <li class="benefit-item">Inoculant recommendations</li>
              <li class="benefit-item">Pod-fill period nutrition</li>
              <li class="benefit-item">Disease prevention</li>
            </ul>
          </div>
        </div>
        <div class="gallery-item" data-aos="slide-up" data-aos-delay="800">
          <img src="assets/images/cotton.jpg" alt="Cotton" class="gallery-img" />
          <div class="gallery-caption">
            <h3 class="text-xl font-bold mb-3">Cotton</h3>
            <p class="mb-4">Growth-stage specific fertilizer applications for better fiber
              quality and yield.</p>
            <ul class="list-none pl-5">
              <li class="benefit-item">Boll development nutrition</li>
              <li class="benefit-item">Water stress management</li>
              <li class="benefit-item">Harvest aid timing</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Fertilizer Planner -->
  <section id="planner" class="py-20">
    <div class="container">
      <h2 class="text-3xl font-bold text-green-400 mb-12 text-center animate__animated animate__fadeInDown" data-aos="fade-down" data-aos-duration="1000">
        Smart Fertilizer Planner
      </h2>
      <div class="planner-grid grid grid-cols-1 md:grid-cols-2 gap-8 animate__animated animate__fadeInUp" data-aos="fade-up" data-aos-delay="200">
        <div class="planner-steps" data-aos="fade-right" data-aos-delay="300">
          <h3 class="text-2xl font-bold text-green-300 mb-6">How It Works</h3>
          <ol class="list-none pl-0">
            <li class="flex items-start mb-4">
              <span class="bg-green-500 text-gray-900 rounded-full w-8 h-8 flex items-center justify-content-center mr-3">1</span>
              <p class="text-gray-300">Upload your soil test results or let us estimate based on location</p>
            </li>
            <li class="flex items-start mb-4">
              <span class="bg-green-500 text-gray-900 rounded-full w-8 h-8 flex items-center justify-content-center mr-3">2</span>
              <p class="text-gray-300">Select your crop and target yield for optimized planning</p>
            </li>
            <li class="flex items-start mb-4">
              <span class="bg-green-500 text-gray-900 rounded-full w-8 h-8 flex items-center justify-content-center mr-3">3</span>
              <p class="text-gray-300">Get customized fertilizer recommendations based on your specific needs</p>
            </li>
            <li class="flex items-start mb-4">
              <span class="bg-green-500 text-gray-900 rounded-full w-8 h-8 flex items-center justify-content-center mr-3">4</span>
              <p class="text-gray-300">Receive application schedule and methods for best results</p>
            </li>
            <li class="flex items-start mb-4">
              <span class="bg-green-500 text-gray-900 rounded-full w-8 h-8 flex items-center justify-content-center mr-3">5</span>
              <p class="text-gray-300">Monitor progress with regular soil and crop health updates</p>
            </li>
            <li class="flex items-start mb-4">
              <span class="bg-green-500 text-gray-900 rounded-full w-8 h-8 flex items-center justify-content-center mr-3">6</span>
              <p class="text-gray-300">Access expert advice and tailored irrigation strategies</p>
            </li>
            <li class="flex items-start mb-4">
              <span class="bg-green-500 text-gray-900 rounded-full w-8 h-8 flex items-center justify-content-center mr-3">7</span>
              <p class="text-gray-300">Track performance with detailed yield and nutrient reports</p>
            </li>
          </ol>
          <a href="modules/fertilizer_planner.php" class="planner-try-button">Try Our Planner</a>
        </div>
        <div class="planner-image" data-aos="fade-in" data-aos-delay="400">
          <img src="assets/images/fertilizerplanner.webp" alt="Fertilizer Planner Screenshot" class="rounded-xl shadow-lg w-full">
          <img src="assets/images/fertilizer2.jpg" alt="Additional Fertilizer Image" class="rounded-xl shadow-lg mt-4 w-full">
        </div>
      </div>
      <div class="planner-additional-info bg-gray-800 bg-opacity-50 rounded-xl mt-12 animate__animated animate__fadeInUp" data-aos="fade-up" data-aos-delay="500">
        <h3 class="text-2xl font-bold text-green-300 mb-6">Maximize Your Yield with Precision Planning</h3>
        <p class="text-gray-300">Our Smart Fertilizer Planner analyzes soil composition, crop needs, and environmental factors to provide tailored fertilizer recommendations. This ensures optimal nutrient delivery, maximizing your yield potential while minimizing waste and environmental impact.</p>
        <p class="text-gray-300">Utilize real-time weather data to adjust your fertilizer schedule dynamically, ensuring the best application timing. Our system also offers detailed reports on nutrient uptake and soil health trends over time.</p>
        <p class="text-gray-300">Benefit from our expert advice on organic and synthetic fertilizer blends tailored to your land. Additionally, receive guidance on irrigation practices to complement your fertilizer plan for enhanced growth.</p>
        <p class="text-gray-300">Track your progress with our integrated dashboard, which provides visual insights into your field's performance. Connect with our community of farmers for shared knowledge and support.</p>
      </div>
    </div>
  </section>

  <!-- Housing -->
  <section id="housing" class="py-20">
    <div class="container">
      <h2 class="text-3xl font-bold text-green-400 mb-12 text-center animate__animated animate__fadeInDown" data-aos="fade-down" data-aos-duration="1000">
        Rural Housing Initiative
      </h2>
      <div class="housing-grid grid grid-cols-1 md:grid-cols-2 gap-8 animate__animated animate__fadeInUp" data-aos="fade-up" data-aos-delay="200">
        <div class="housing-image" data-aos="flip-up" data-aos-duration="1000">
          <img src="assets/images/rural.jpg" alt="Rural Housing" class="rounded-xl shadow-lg w-full">
          <img src="assets/images/animated rural.jpg" alt="Rural Housing Plan" class="rounded-xl shadow-lg mt-4 w-full">
        </div>
        <div class="housing-info" data-aos="fade-right" data-aos-delay="400">
          <h3 class="text-2xl font-bold text-green-300 mb-6">Sustainable Housing for Farmers</h3>
          <p class="text-gray-300 mb-6">Our Rural Housing Initiative leverages the Management Information System (MIS) to provide affordable and sustainable housing solutions, inspired by schemes like Garib Awas Yojana. Utilizing GIS applications, we map and allocate land efficiently to enhance rural development.</p>
          <p class="text-gray-300 mb-6">These homes are designed to be energy-efficient, eco-friendly, and tailored to the needs of farming communities. The initiative integrates smart planning to ensure improved living standards and support agricultural productivity.</p>
          <p class="text-gray-300 mb-6">Benefits include access to subsidized construction materials, financial assistance through government schemes, and community development programs. GIS technology helps in identifying suitable locations and optimizing land use for housing and farming.</p>
          <p class="text-gray-300 mb-6">We also provide training on sustainable building practices and connect families with local resources. Our goal is to create thriving rural communities with improved infrastructure and economic opportunities.</p>
          <ul class="list-none pl-5 mt-4">
            <li class="benefit-item" data-aos="slide-right" data-aos-delay="500">Eco-friendly and energy-efficient designs</li>
            <li class="benefit-item" data-aos="slide-right" data-aos-delay="600">Subsidized housing under Garib Awas Yojana</li>
            <li class="benefit-item" data-aos="slide-right" data-aos-delay="700">GIS-based land allocation and planning</li>
            <li class="benefit-item" data-aos="slide-right" data-aos-delay="800">Community support and training programs</li>
          </ul>
          <a href="modules/housing_form.php" class="housing-apply-button" data-aos="zoom-in" data-aos-delay="900">Apply for Housing</a>
        </div>
      </div>
    </div>
  </section>

<!-- Farmer Says Section -->
<section id="farmer-says" class="py-20 bg-gray-900">
  <div class="container text-center">
    <h2 class="text-3xl font-bold text-green-400 mb-12 animate__animated animate__fadeInDown" data-aos="fade-down" data-aos-duration="1000">
      Farmer Says
    </h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 animate__animated animate__fadeInUp" data-aos="fade-up" data-aos-delay="200">
      <div class="bg-gray-800 p-6 rounded-xl shadow-lg" data-aos="zoom-in" data-aos-delay="300">
        <img src="assets/images/wheat farmer.webp" alt="Amit Kumar" class="w-16 h-16 rounded-full mx-auto mb-4">
        <p class="text-gray-300 mb-4">"Ged the way I sell my crops and real prices!"</p>
        <h4 class="text-green-400 font-semibold">Amit Kumar</h4>
        <p class="text-gray-500 text-sm">Farmer, Bihar</p>
      </div>
      <div class="bg-gray-800 p-6 rounded-xl shadow-lg" data-aos="zoom-in" data-aos-delay="400">
        <img src="assets/images/farmer1.jpg" alt="Sunita Devi" class="w-16 h-16 rounded-full mx-auto mb-4">
        <p class="text-gray-300 mb-4">"Love the market insights. Helps me plan what to grow!"</p>
        <h4 class="text-green-400 font-semibold">Sunita Devi</h4>
        <p class="text-gray-500 text-sm">Farmer, UP</p>
      </div>
    </div>
  </div>
</section>
<!-- Footer -->
<footer class="bg-green-800 py-12 text-white" style="background-image: url('assets/images/forest-road-bg.jpg'); background-size: cover; background-position: center;">
  <div class="container mx-auto px-4">
  
    <!-- Footer Content with Three Columns at Top -->
    <div class="flex justify-between items-start" style="min-height: 200px;">
      <!-- About Us (Left Top) -->
      <div class="p-4 bg-green-900 bg-opacity-70 rounded-lg">
        <h3 class="text-xl font-bold text-yellow-300 mb-4">About Us</h3>
        <p class="text-white">We are 2nd-year CSE students building the Fair Trade Agri Portal to support farmers through tech.</p>
        <p class="text-yellow-300 mt-2"><i class="fas fa-phone mr-2"></i> +91 7765055565</p>
        <p class="text-yellow-300"><i class="fas fa-envelope mr-2"></i> <a href="mailto:abhishekkumar776505@gmail.com" class="text-yellow-300 hover:underline">abhishekkumar776505@gmail.com</a></p>
      </div>

      <!-- Meet the Team (Center Top) -->
      <div class="p-4 bg-green-900 bg-opacity-70 rounded-lg" style="margin-left: auto; margin-right: auto;">
        <h3 class="text-xl font-bold text-yellow-300 mb-4">Meet the Team</h3>
        <p class="text-white">Abhishek kumar - Team Lead</p>
        <p class="text-white">Diwaker Pandey</p>
        <p class="text-white">Raushan kumar</p>
        <p class="text-white">Pranjul gupta</p>
      </div>

      <!-- Quick Links (Right Top) -->
      <div class="p-4 bg-green-900 bg-opacity-70 rounded-lg">
        <h3 class="text-xl font-bold text-yellow-300 mb-4">Quick Links</h3>
        <ul class="text-white space-y-2">
          <li><a href="#home" class="hover:text-yellow-300">Home</a></li>
          <li><a href="#about" class="hover:text-yellow-300">About</a></li>
          <li><a href="#crops" class="hover:text-yellow-300">Crops</a></li>
          <li><a href="#planner" class="hover:text-yellow-300">Planner</a></li>
          <li><a href="#housing" class="hover:text-yellow-300">Housing</a></li>
          <li><a href="modules/dashboard.php" class="hover:text-yellow-300">Dashboard</a></li>
          <li><a href="#contact" class="hover:text-yellow-300">Contact Us</a></li>
        </ul>
      </div>
    </div>

    <!-- Copyright -->
    <div class="text-center mt-8">
      <p class="text-gray-400">© 2025 Smart Agriculture Platform. All rights reserved.</p>
    </div>
  </div>
</footer>
  <!-- Script Section -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
  <script>
    // Initialize AOS
    AOS.init({
      once: true,
    });

    // Initialize Typed.js for the hero title
    var typed = new Typed('#typed', {
      strings: ["Smart Agriculture Platform", "Customized Agricultural Solutions"],
      typeSpeed: 50,
      backSpeed: 30,
      loop: true
    });

    // Handle scroll-up button visibility
    window.addEventListener('scroll', function () {
      var scrollUpButton = document.querySelector('.scroll-up');
      if (document.documentElement.scrollTop > 300) {
        scrollUpButton.style.display = 'block';
        scrollUpButton.classList.add('animate__bounceIn');
      } else {
        scrollUpButton.style.display = 'none';
        scrollUpButton.classList.remove('animate__bounceIn');
      }
    });

    // Handle background video fallback
    document.addEventListener('DOMContentLoaded', function () {
      var video = document.getElementById('bgVideo');
      var fallback = document.querySelector('.bg-video-fallback');
      video.addEventListener('error', function () {
        video.style.display = 'none';
        fallback.style.display = 'block';
      });
    });
  </script>
</body>

</html>