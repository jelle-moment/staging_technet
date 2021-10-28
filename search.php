<?php get_header(); ?>

<?php
$permalink_contact = get_permalink( 224 ); // var naar contactpagina
?>

	<body>
		<div class="navbar"></div>
		<div id="product_header_image" class="homepageCarousel" style="background-image: url(https://tne001.avm-moment.nl/wp-content/uploads/2020/11/HeaderAfbeelding-Lijnen-04.jpg);">
			<div id="product_titel" class="carousel-tekst">
				<h2>Zoekresultaten</h2>
			</div>
		</div>

		<div class="positie_rechts">
			<div id="detailpage_productbeschrijving" class="productenContainer">
				<div class="widthContainer">
					<article>
						<h2>
							<?php echo sprintf( __( '%s resultaten voor: ', 'html5blank' ), $wp_query->found_posts ); echo get_search_query(); ?>
						</h2>

							<?php get_template_part( 'loop' ); ?>
							<?php get_template_part( 'pagination' ); ?>
					</article>
				</div>
				<!-- einde widthContainer -->
			</div>


			<!-- CONTACT EN DOWNLOAD -->
			<div class="naar_rechts">
				<div class="artikel_buttons">
					<a href="<? echo $permalink_contact ?>">Contact</a>
				</div>
			</div>
			<!-- positie_rechts -->
		</div>
	</body>

	<?php get_footer(); ?>