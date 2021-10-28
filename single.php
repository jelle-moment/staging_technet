<?php get_header(); ?>

<?php
$permalink_contact = get_permalink( 224 ); 	// var naar contactpagina
$id_cat = '0';

// laad var met de categorie waar product in zit
$categories = get_the_category();
if ( ! empty( $categories ) ) {
	if ( $categories[0]->name == 'Thermische Analyse' ) : $id_cat='189'; endif;
	if ( $categories[0]->name == 'Materiaal beproeving' ) : $id_cat='190'; endif;
	if ( $categories[0]->name == 'Spuitgietoptimalisatie' ) : $id_cat='191'; endif;
	if ( $categories[0]->name == 'life science' ) : $id_cat='192'; endif;
	if ( $categories[0]->name == 'Nano & micro technologie' ) : $id_cat='193'; endif;
	if ( $categories[0]->name == 'Service' ) : $id_cat='194'; endif;
}

loop_cat_featuresimage('productcategorie' , $id_cat);
?>

	<body>
    <div class="navbar"></div>
    <div id="product_header_image" class="homepageCarousel" alt="<?php if ( the_title() ) : the_title(); endif; ?>" style="background-image: url(
<?php 
if ( has_post_thumbnail() ) :
	echo get_the_post_thumbnail_url();
		else :
	// plaats de categorie_placeholder_url
	echo $cat_placeholder_url_detailpage;
endif;  ?>
);">
      <div id="product_titel" class="carousel-tekst">
        <h1><?php if ( the_title() ) : the_title(); endif; ?></h1>
        
    				<?		// Check rows exists.
if( have_rows('productspecificaties-header') ): ?>
	<ul>
<? while( have_rows('productspecificaties-header') ) : the_row();
				
        // Load sub field value.
        $titel_product = get_sub_field('titel-product');
				$waarde = get_sub_field('waarde');

				echo '<li>';
          echo '<h3>' . $titel_product . '</h3>';
          echo '<p>' . $waarde . '</p>';
        echo '</li>';
    endwhile; ?>
	</ul>
<?
// No value.
else :
    // Do something...
endif;?>
       
      </div>
    </div>

    <div class="positie_rechts">
    <div id="detailpage_productbeschrijving" class="productenContainer">
      <div class="widthContainer">
      				
      <article>
				
      <?php
				echo the_content(); ?>
			<a href="#" id="LeesMeerButton">Lees meer</a>
      </article>
      </div><!-- einde widthContainer -->
    </div>
    <!-- EINDE detailpage_productbeschrijving --------------------------------------------->

	<!-- CONTACT | DOWNLOAD -->
			
  <div class="naar_rechts">
    <div class="artikel_buttons">
	
			<a href="<? echo $permalink_contact . "?productnaam=" . get_the_title(); ?>" 
				 title="Neem contact op met Technnex">Contact</a>

			<?		// Check rows exists.
if( have_rows('download-documenten') ):
while( have_rows('download-documenten') ) : the_row();
				
	// Load sub field value.
	$titel_product = get_sub_field('tekst_button');
	$seo_title_button = get_sub_field('seo_button');
	$downloaddoc = get_sub_field('pdf_button');?>
		
	<a href="<? echo $downloaddoc; ?>" 
		title="<? echo $seo_title_button; ?>" 
		target="_blank"><? echo $titel_product; ?></a>
  <?  endwhile;
			
// No value.
else :
    
endif;?>
</div>		
			
<!-- CAMPAGNE ---------->

<?php if( get_field('titel_campagne') ): // is de titel ingevuld? Toon dan het campagneblok ?>
<div class="actie_kader">
	<?php if( get_field('titel_campagne') ): ?><h2><?php the_field('titel_campagne'); ?></h2><?php endif; ?>
	<?php if( get_field('tekst_campagne') ): ?><p><?php the_field('tekst_campagne'); ?></p><?php endif; ?>
	<?php if( get_field('id_contactformulier') ): echo do_shortcode( '[contact-form-7 id="'.get_field( "id_contactformulier" ).'"]' ); endif; ?>
	
	<?php if( get_field('link_button') ): ?><a href="<?php the_field('link_button'); ?>">
	<?php if ( get_field( 'tekst_button' ) ): the_field('tekst_button');
else: echo 'Bekijken'; endif; ?>
	</a><?php endif; ?>
	

	
</div>
<?php endif; ?>		
		

<!-- EINDE CAMPAGNE ---------->
				
<!-- PARTNERS -->
		
<? if( get_field('logo_partner') ):?>
    <div class="product_partner_container">
      <h2>Partner</h2>
				<a href="<? if( get_field('url_naar_partner') ):?><? the_field('url_naar_partner'); endif; ?>" target="_blank">
      		<img src="<? the_field('logo_partner'); ?>" 
					title="<? if( get_field('seo_title') ):?><? the_field('seo_title'); endif; ?>" 
					alt="<? if( get_field('seo_alt') ):?><? the_field('seo_alt'); endif; ?>" 
					width="300px">
				</a>
			</div>
<? endif; ?>
		
<!-- PRODUCT SPEC'S -->		
		
<? if( have_rows('titelblok-product') ): ?>
				
	<aside class="product_specificaties">
      <ul><li><h2>
				<?php 
					if( get_field('titel_productspecificaties') ):
					echo the_field('titel_productspecificaties');
					else :
					// plaats de categorie_placeholder_url
					echo 'Product specificaties';
					endif;  ?>
				</h2></li>
								
    <?while( have_rows('titelblok-product') ) : the_row();
        $titel_product = get_sub_field('titel-product');
				$waarde = get_sub_field('waarde');
				echo '<li>';
          echo '<h3>' . $titel_product . '</h3>';
          echo '<p>' . $waarde . '</p>';
        echo '</li>';
    // End loop.
    endwhile;
// No value.
else :
    // Do something...
endif;?>
      </ul>
    </aside>
  </div><!-- naar_rechts -->
			
<?php 
if ( get_field('vimeo_of_youtube') == 'vimeo' && get_field('youtube_video_link') ) : ?>
	<iframe src="https://player.vimeo.com/video/<? the_field('youtube_video_link'); ?>" width="420" height="315" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
<? endif ?>
			
<?php 
if ( get_field('vimeo_of_youtube') == 'youtube' && get_field('youtube_video_link') ) : ?>
	<iframe src="https://www.youtube.com/embed/<? the_field('youtube_video_link'); ?>" width="420" height="315" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
<? endif ?>
						
  </div><!-- positie_rechts -->

    <!-- EINDE successtoriesContainer ----------------------------------------->

 <script type="text/javascript">
  document.getElementById('LeesMeerButton').addEventListener('click', function(e){
    e.preventDefault(); // prevent a tag default

    var buttonText = LeesMeerButton.innerHTML; // vervang button tekst nadat aangeklikt is
    buttonText = buttonText.replace("Lees meer", "Minder tekst");
    LeesMeerButton.innerHTML = buttonText;

    // show/dontShow alle tekst van de beschrijving
    var x = document.getElementsByClassName("beschrijvingHide");
    for (var i=0;i<x.length;i+=1){
      if (x[i].style.display === "block") {
        x[i].style.display = "none";
      } else {
        x[i].style.display = "block";
        }
      }
    });//addEventListener

  </script>

  </body>

<?php get_footer(); ?>
