<?php /* Template Name:  Colofon template */ get_header(); ?>

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
				
	</div>



    <!-- EINDE productenContainer --------------------------------------------->

<?php get_footer(); ?>
