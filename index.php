<?php require_once ("header.php"); ?>

<!-- Wrapper sections -->
<div class="content">
  <section id="accueil">
    <!-- Slider -->
    <div id="sequence" class="seq">

      <div class="seq-screen">
        <ul class="seq-canvas">
          <li class="seq-in">
            <div class="seq-model" data-seq-enabled="step1">
              <img data-seq src="assets/img/slide1.jpg" alt="Un jeune homme jouant de la guitare" />
            </div>

            <div class="seq-title">
              <div id="zoomEffect"><h2 data-seq><a href="enregistrement.php">Réservez maintenant</a></h2></div>
              <h3 data-seq>Sunflower : un groupe de musique pour <br> animer vos soirées dans l'Aude et l'Hérault</h3>
            </div>
          </li>

          <li>
            <div class="seq-model" data-seq-enabled="step2">
              <img data-seq src="assets/img/slide2b.jpg" alt="" />
            </div>

            <div class="seq-title">
              <div id="zoomEffect"><h2 data-seq><a href="enregistrement.php">Réservez maintenant</a></h2></div>
              <h3 data-seq>Laissez-nous rendre vos événements inoubliables !</h3>
            </div>
          </li>

          <li>
            <div class="seq-model"  data-seq-enabled="step3">
              <img data-seq src="assets/img/slide3c.png" alt="" />
            </div>

            <div class="seq-title">
              <div id="zoomEffect"><h2 data-seq><a href="enregistrement.php">Réservez maintenant</a></h2></div>
              <h3 data-seq>Reggae, Soul, Pop, guitar et choeurs :<br> Alban et Carole ont un large répertoire musical.</h3>
            </div>
          </li>
        </ul>
      </div>

      <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
        <button type="button" class="seq-prev" aria-label="Previous">Précédent</button>
        <button type="button" class="seq-next" aria-label="Next">Suivant</button>
      </fieldset>

      <ul role="navigation" aria-label="Pagination" class="seq-pagination">
        <li><a href="#step1" rel="step1" title="Go to slide 1"><img src="assets/css/modern-slide-in/modern-slide-in/images/tn-model1.png" /></a></li>
        <li><a href="#step2" rel="step2" title="Go to slide 2"><img src="assets/css/modern-slide-in/modern-slide-in/images/tn-model2.png" /></a></li>
        <li><a href="#step3" rel="step3" title="Go to slide 3"><img src="assets/css/modern-slide-in/modern-slide-in/images/tn-model3.png" /></a></li>
      </ul>
    </div>
  </section>
  <!-- Section Présentation -->
  <section id="intro">
    <div class="presentation">
      <h2>﻿Vous cherchez un groupe pour animer un mariage, une réception, une soirée ?</h2>
      <p>Nous sommes SUNFLOWER, un duo guitare-voix, et nous possédons un large répertoire de musiques dansantes et d'ambiance. Nous vous proposons un cocktail de reggae, rock, soul en français et anglais (Bob marley, Sting ,Selah Sue, Police, Beatles....).</p>
      <p>Il vous suffira de faire appel à nous, nous ferons de cet soirée un événement inoubliable.</p>
      <p>N'hésitez pas à nous contacter et nous vous enverrons une démo musicale.</p>
      <p>Nous sommes un duo guitare voix et notre style tourne autour du reggae de la soul avec quelques reprises rock.</p>
      <p>Contact : 06 10 93 37 46</p>
      <div class="styleCompo">
        <h2>Style :</h2>
          <p>
            <ul>
              <li>Reggae soul</li>
              <li>Influences</li>
              <li>Bob marley, Sting, Beatles</li>
          </ul>
          </p>
          <h2>Composition :</h2>
          <p>
            <ul>
              <li>Alban à la guitare et les choeurs</li>
              <li>Carole chanteuse principale</li>
              <li>Looper plus percussions</li>
          </ul>
        </p>
      </div>
    </div>
  </section>
  <!-- Section démo vidéo -->
  <section id="demo">
    <iframe src="https://player.vimeo.com/video/2306191?title=0&byline=0&portrait=0" width="840" height="473" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen class="video"></iframe>
  </section>
  <!-- Section formulaire de contact -->
  <section id="contact">
    <!-- Carte Google -->
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2909.0776943332376!2d2.9890109149120203!3d43.186880590477784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12b1ac4458fedf41%3A0xaf06c215d114c329!2sAvenue+Anatole+France%2C+11100+Narbonne!5e0!3m2!1sfr!2sfr!4v1516118240441" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
  </section>
  <!-- <section id="reservation">
    <h1>Demande de réservation</h1>
  </section> -->
</div>
<!-- end sections -->

<?php require_once ("footer.php"); ?>
