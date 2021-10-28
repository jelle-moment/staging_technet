<?php
get_header();
$catObject = get_queried_object();
?>

<?php 
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $slug_name2 = sanitize_text_field( $_GET['id'] );

	cat_loop_categorie('productcategorie', null, 1, $slug_name2);
?>
<? } ?>

<? if (!isset($_GET['id']) && empty($_GET['id'])) { ?> 

 <body id="bodyProductenPage">
    <div class="navbar"></div>
    <div id="categorie_header_image" class="homepageCarousel"
			alt="<?php if ( the_title() ) : the_title(); endif; ?>"		 
			style="background-image: url(
			<?php 
			if ( is_post_type_archive('producten')) : echo get_site_url(null, '/wp-content/uploads/2020/11/Service-header.jpg', 'https'); endif;
			if ( is_post_type_archive('vacatures')) : echo get_site_url(null, '/wp-content/uploads/2020/11/Service-header.jpg', 'https'); endif;
			if ( is_post_type_archive('nieuws')) : echo get_site_url(null, '/wp-content/uploads/2020/11/Service-header.jpg', 'https'); endif;
if ( is_post_type_archive('leveranciers')) : echo get_site_url(null, '/wp-content/uploads/2020/11/Service-header.jpg', 'https'); endif;
			if ( is_post_type_archive('successtories')) : echo get_site_url(null, '/wp-content/uploads/2020/11/Service-header.jpg', 'https'); endif; ?>);">
      <div id="categorie_titel" class="carousel-tekst">
        <h2><?php echo $catObject->name; ?></h2>
      </div>
    </div>

    <div class="widthContainer">
      <article class="categorieBeschrijving">
        <p>
         <br>
					<br>
					<br>
					<br>
         </p>
      </article>
    </div>
	 <? } ?>

<? // ALS CPT PRODUCTEN, VACATURES, LEVERANCIERS IS
if ( is_post_type_archive('producten') || is_post_type_archive('vacatures') || is_post_type_archive('leveranciers') || is_post_type_archive('nieuws') ) { ?>
	
<div id="productenblok" class="productenContainer" style="background-image: url(https://tne001.avm-moment.nl/wp-content/uploads/2020/11/Lijnen75.png);");>

<h2>
<?	
if (is_post_type_archive('nieuws')) {
    echo 'technex ';
} else {
		echo 'alle ';
} 
post_type_archive_title() ?>
</h2>

	
<div class="widthContainer">
	
<? 	 
$catObject = get_queried_object();
$category = get_the_category();

if ( is_post_type_archive('producten') || is_post_type_archive('vacatures') || is_post_type_archive('leveranciers') ) {
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
  $query = new WP_Query( array(
		'post_type' 			=> $catObject->name,
		'category_name'		=> $slug_name2,
		'posts_per_page'	=> '6',
		'orderby' 				=> 'publish_date',
  	// 	'order'   				=> 'ASC',
		'order'   				=> 'ASC',
		'paged'						=> $paged
   ) );
	} else {
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
  $query = new WP_Query( array(
		'post_type' 			=> $catObject->name,
		'category_name'		=> $slug_name2,
		'posts_per_page'	=> '6',
		'orderby' 				=> 'ASC',
  		'order'   				=> $order,
		'paged'						=> $paged
   ) );
	}
?>

<!-- START LOOP -->
	<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
			<article>
				<div>
        <div class="imgCont" style="background-image: url(
					<?php if ( get_field('thumpmail_listpagina') ) :
									echo the_field('thumpmail_listpagina');
								elseif ( has_post_thumbnail() ):
									echo get_the_post_thumbnail_url();
								else :
								// plaats de categorie_placeholder_url
									echo $cat_placeholder_url;
								endif;  ?>
				);"></div>
        <h3><?php if ( the_title() ) : the_title(); endif; ?></h3>
				</div>
        <p class="afkappen"><?php if ( has_excerpt() ) : the_excerpt(); endif; ?></p>
        <a href="<?php echo get_permalink( $post->ID ); ?>">Lees meer</a>
      </article>	
	<?php endwhile; ?>
	
<!-- PAGINATION -->
	<div class="pagination">
    <?php 
        echo paginate_links( array(
            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
            'total'        => $query->max_num_pages,
            'current'      => max( 1, get_query_var( 'paged' ) ),
            'format'       => '?paged=%#%',
            'show_all'     => false,
            'type'         => 'plain',
            'end_size'     => 2,
            'mid_size'     => 1,
            'prev_next'    => true,
            'prev_text'    => sprintf( '<i></i> %1$s', __( '<<', 'text-domain' ) ),
            'next_text'    => sprintf( '%1$s <i></i>', __( '>>', 'text-domain' ) ),
            'add_args'     => false,
            'add_fragment' => '#productenblok',
        ) );
    ?>
</div>

<?php wp_reset_postdata(); ?>

<?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
		
<? } ?>
      </div><!-- einde widthContainer -->
    </div>

<? // ALS CPT SUCCESTORIES IS 
if ( is_post_type_archive('successtories') ) { ?>
	
	<div class="successtoriesContainer">
		<div id="productenblok" class="productenContainer1" style="background-image: url(https://tne001.avm-moment.nl/wp-content/uploads/2020/11/Lijnen75.png);");>
      <h2>Alle <?php post_type_archive_title(); ?></h2>
   <div class="widthContainer">
		
	<? if(have_posts()) : while(have_posts()) : the_post(); ?>			
			 <article class="successtoryBlok">
          <div class="storyPersonBlok">
            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
            <div class="personInfo">
              <h3><?php if ( the_title() ) : the_title(); endif; ?></h3>
              <p><? if( get_field('bedrijf') ):?> <p><? the_field('bedrijf'); ?></p> <? endif; ?></p>
              <p><? if( get_field('functie') ):?> <p><? the_field('functie'); ?></p> <? endif; ?></p>
            </div>
          </div>
          <p class="afkappen"><?php if ( has_excerpt() ) : the_excerpt(); endif; ?></p>
          <a href="<?php echo get_permalink( $post->ID ); ?>">Lees meer</a>
        </article>
		<? endwhile; ?>
<? endif; ?>
		<? } ?>

      </div><!-- einde widthContainer -->
    </div>
	 
<? get_footer(); ?>