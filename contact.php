<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MyGES - Contact</title>
  <meta content="Le Réseau des Grandes Écoles Spécialisées (Réseau GES) qui existe depuis plus de 50 ans, est l’un des plus importants réseaux d’enseignement supérieur à Paris avec 8 300 étudiants de Bac à Bac+5 qui délivre pour toutes ses écoles et spécialisations des diplômes reconnus par l’État niveaux 6 & 7." name="description">

  <meta content="reseau ges ecole alternance" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span>MyGES</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="index.html#hero">Accueil</a></li>
          <li><a class="nav-link scrollto" href="index.html#about">A propos</a></li>
          <li><a class="nav-link scrollto" href="index.html#ecoles">Écoles</a></li>
          <li><a class="nav-link scrollto" href="index.html#team">Équipe</a></li>
          <li><a class="nav-link scrollto" href="#">Contact</a></li>
          <li><a class="getstarted scrollto" href="#">Se connecter</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.html">Acceuil</a></li>
          <li>Contact</li>
        </ol>
        <h2>Nous contacter</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">

          <div class="container" data-aos="fade-up">

            <header class="section-header">
              <h2>Contact</h2>
              <p>Envoyez-nous un e-mail</p>
            </header>

            <div class="row gy-4">


              <div class="col-lg-6">

                <div class="row gy-4">
                  <div class="col-md-13">
                    <div class="info-box">
                      <i class="bi bi-geo-alt"></i>
                      <h3>Adresse</h3>
                      <p>A85 Av. Pierre Grenier,<br>Boulogne-Billancourt 2100, France</p>
                      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2626.28520072863!2d2.251841515321888!3d48.833698410399585!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6720d8f00c413%3A0x3188ba64d6f57509!2zUsOpc2VhdSBHRVMsIEdyYW5kZXMgw4ljb2xlcyBTcMOpY2lhbGlzw6llcw!5e0!3m2!1sfr!2sfr!4v1633782948697!5m2!1sfr!2sfr" width="100%" height="100%" frameborder="0" style="border:0"></iframe>

                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="info-box">
                      <i class="bi bi-telephone"></i>
                      <h3>Appelez-Nous</h3>
                      <p>+33 1 41 41 02 35</p>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="info-box">
                      <i class="bi bi-clock"></i>
                      <h3>Heures d'ouverture</h3>
                      <p>Lundi - Vendredi<br>09:00 – 18:00</p>
                    </div>
                  </div>
                </div>

              </div>

              <div class="col-lg-6">
                <form action="forms/contact.php" method="POST" class="php-email-form">
                  <div class="row gy-4">

                    <div class="col-md-6">
                      <input type="text" name="name" class="form-control" placeholder="Votre nom" required>
                    </div>

                    <div class="col-md-6 ">
                      <input type="email" class="form-control" name="email" placeholder="Votre E-Mail" required>
                    </div>

                    <div class="col-md-12">
                      <input type="text" class="form-control" name="subject" placeholder="Sujet" required>
                    </div>

                    <div class="col-md-12">
                      <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                    </div>

                    <div class="col-md-12 text-center">
                      <div class="loading">Chargement...</div>

                      <?php if (!empty($_SESSION['email_error']) || !empty($_SESSION['success'])) : ?>

                        <div class="<?= $_SESSION['success'] ? "sent-message" : "error-message "  ?> d-block"><?= $_SESSION['success'] ? $_SESSION['success'] : $_SESSION['email_error'] ?></div>

                        <?php unset($_SESSION['email_error']); ?>
                        <?php unset($_SESSION['success']); ?>
                      <?php endif; ?>

                      <button type="submit">Envoyer le message</button>
                    </div>

                  </div>
                </form>

              </div>


            </div>

          </div>

        </section><!-- End Contact Section -->
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12 text-center">
            <h4>Notre Newsletter</h4>
            <p>Si vous voulez nous contactez, vous serez aussi sûrement intéressé par notre newsletter pour recevoir toutes les informations du réseau GES !</p>
          </div>
          <div class="col-lg-6">
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="S'abonner">
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="index.html" class="logo d-flex align-items-center">
              <img src="assets/img/logo.png" alt="">
              <span>MyGES</span>
            </a>
            <p>Le Réseau des Grandes Ecoles Spécialisées (Réseau GES) est l’un des plus importants réseau d’enseignement supérieur à Paris avec près de 8 300 étudiants de Bac à Bac+5. Toutes ses écoles et spécialisations délivrent des titres reconnus par l’État niveaux 6 et 7.</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram bx bxl-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin bx bxl-linkedin"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Liens utiles</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#hero">Accueil</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#about">A propos</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#ecoles">Écoles</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Termes et Conditions d'utilisation</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Politique de protection des données personnelles</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Écoles</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="https://www.ppa.fr/ecole-commerce-alternance.html">PPA Business School</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="https://www.esgi.fr/">ESGI</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="https://www.eiml-paris.fr/">EIML Paris</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="https://www.ican-design.fr/">ICAN</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="https://www.ecitv.fr/">ECITV</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="https://www.engde.fr/">ENGDE</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
            <h4>Contactez-Nous</h4>
            <p>
              85 Av. Pierre Grenier <br>
              Boulogne-Billancourt, 92100<br>
              France <br><br>
              <strong>Téléphone:</strong> +33 1 41 41 02 35<br>
              <strong>Email:</strong> direction-ges@reseau-ges.fr<br>
            </p>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>MyGES</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>