<?php get_header(); ?>

	<main role="main" aria-label="Content">
		<!-- section -->
		<section>
			
<div class="homepageCarousel">
	<?php add_revslider('slider-2'); ?>
</div>
		
		<!-- PRODUCT CATEGORIEËN -->
		<div class="productenContainer">
      <h2>Product categorieën</h2>
      <div class="widthContainer">
			<?php cat_loop_homepagina('productcategorie', null, 6, 'title', 'DESC'); ?>
      </div><!-- einde widthContainer -->
    </div>
			
		<div class="overTechnexContainer">
      <div class="widthContainer">
        <img src="https://tne001.avm-moment.nl/wp-content/themes/avm-moment-master/src/assets/images/logo.png" alt="">
        <h2>Uw partner in testoplossingen</h2>
        <p>Technex wil bijdragen aan de optimalisatie van bedrijfsprocessen, via
          kwaliteitsverbetering, door het op de markt brengen van zinvolle
          technologische innovaties. Als toonaangevende leverancier van
          oplossingen op het gebied van technologie en research willen wij
          uitgroeien tot de meest gewaardeerde onderneming in onze bedrijfstak.
        </p>
        <a href="https://www.technex.nl/over-ons/">Lees meer</a>
      </div><!-- einde widthContainer -->
    </div>
			
		<div class="blogCarouselContainer">
      <div class="widthContainer">
				<?php add_revslider('TNE001-Caroussel'); ?>
			</div>
    </div>
					
		<!-- SUCCESSTORIES -->	
		<div class="successtoriesContainer">
      <h2>Succes stories</h2>
      <div class="widthContainer">
				<?php succes_loop_homepagina('successtories', null, 5, 'title', 'DESC'); ?>			
      </div><!-- einde widthContainer -->
    </div>
		
		<!-- PARTNERS -->	
		<div class="onzePartnersContainer">
      <div class="widthContainer">
        <h2>Onze partners</h2>
        <div class="onzePartnersLogosContainer">
          <?php add_revslider('Slider 3'); ?>
        </div>
      </div><!-- einde widthContainer -->
    </div>
			

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>


