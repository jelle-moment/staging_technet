<?php /* Template Name: Servica Aanvraag */ get_header(); ?>

	<body id="bodyProductenPage">

    <div class="navbar"></div>
    <div id="contact_header_image" class="homepageCarousel" style="background-image: url(<?php if( get_field('achtergrondafbeelding') ): the_field('achtergrondafbeelding'); endif; ?>);");>
      <div id="contact_titel" class="carousel-tekst">
        <h2><?php if ( the_title() ) : the_title(); endif; ?></h2>
      </div>
    </div>

    <div class="widthContainer">
      <article id="contact_tekst" class="categorieBeschrijving">

				<div><? the_content(); ?></div>

        <ul>
          <li>Technex BV</li>
          <li>Industrieweg 35</li>
          <li>1521 NE Wormerveer</li>
          <li>Nederland</li>
					<li><a href="tel:0031756474567">+31 (0)75 647 45 67</a></li>
					<li><a href="mailto:info@technex.nl">info@technex.nl</a></li>
        </ul>
      </article>
    </div>

    <div id="contact_container" class="productenContainer">
      <div class="widthContainer">
      <h2>
        Service aanvraag
      </h2>
      <?php echo do_shortcode( '[contact-form-7 id="529" title="Service aanvraag"]' ); ?>

      <form action="action_page.php">
      </form>
      </div><!-- einde widthContainer -->
    </div>
    <!-- EINDE productenContainer --------------------------------------------->

<?php get_footer(); ?>
