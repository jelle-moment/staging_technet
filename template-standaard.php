<?php /* Template Name:Standaard tekstpagina */ get_header(); ?>

<?php
$permalink_contact = get_permalink( 224 ); 	// var naar contactpagina
?>

	<body>
    <div class="navbar"></div>
    <div id="product_header_image" class="homepageCarousel" alt="<?php if ( the_title() ) : the_title(); endif; ?>" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
      <div id="product_titel" class="carousel-tekst">
        <h2><?php if ( the_title() ) : the_title(); endif; ?></h2>
        
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
      <?php echo the_content(); ?>
      </article>
      </div><!-- einde widthContainer -->
    </div>
    <!-- EINDE detailpage_productbeschrijving --------------------------------------------->

	<!-- CONTACT EN DOWNLOAD -->
  <div class="naar_rechts">
    <div class="artikel_buttons">
       
			<a href="<? echo $permalink_contact ?>" 
				 title="Neem contact op met Technnex">Contact
			</a>

		<? if( get_field('datasheet') ):?> 	
			<a href="<? the_field('datasheet'); ?>" 
				 <? if( get_field('seo_title_datasheet') ):?> 
				 title="<? the_field('seo_title_datasheet'); endif; ?>" 
				 target="_blank">Datasheet
			</a>
		<? endif; ?>
			
				<? if( get_field('brochure') ):?> 	
			<a href="<? the_field('brochure'); ?>" 
				 <? if( get_field('seo_title_brochure') ):?> 
				 title="<? the_field('seo_title_brochure'); endif; ?>" 
				 target="_blank">Brochure
			</a>
		<? endif; ?>

    </div>
		
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
      <ul><li> <h2>Product specificaties</h2></li>
								
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
			
	<!-- VIDEO -->
<? if( get_field('youtube_video_link') ):?>
	<title>Add title here!</title>
		<iframe width="420" height="315"
		 src="https://www.youtube.com/embed/<? the_field('youtube_video_link'); ?>">
  </iframe>
<? endif; ?>


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
