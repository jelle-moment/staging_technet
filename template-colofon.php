<?php /* Template Name:  Contact template */ get_header(); ?>

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
		
		<div>
			<? echo do_shortcode( '[wpgmza id="1"]' ); ?>
		<div>
		
	</div>

    <div id="contact_container" class="productenContainer">
      <div class="widthContainer">
				
<?php
	if (isset($_GET['productnaam']) && !empty($_GET['productnaam'])) {
	$productnaam = sanitize_text_field( $_GET['productnaam'] ); ?>
	    <h2>Vul het onderstaande formulier in om uw vraag te stellen over de <strong><? echo $productnaam; ?></strong></h2>
<? } else { ?>
		<h2>Vul het onderstaande formulier in om uw vraag te stellen</h2>
<? } ?>

      <p>
        Wij zullen uw vraag z.s.m. per email beantwoorden.
        Neemt u liever telefonisch contact op zijn wij ook direct te bereiken
        op <strong><a href="tel:0031756474567">+31 (0)75 647 45 67</a></strong>
      </p>
      
      <?php echo do_shortcode( '[contact-form-7 id="4" title="Contact form 1"]' ); ?>

      <form action="action_page.php">
      </form>
      </div><!-- einde widthContainer -->
    </div>

    <!-- EINDE productenContainer --------------------------------------------->

<?php get_footer(); ?>
