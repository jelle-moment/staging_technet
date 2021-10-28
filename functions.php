<?php
/**
 * Author: Gerben Starink | Technex | AVM Moment Design
 * URL: www.avm-moment.nl
 * Custom functions, support, custom post types and more.
 */

require_once 'modules/is-debug.php';

/*------------------------------------*\
    External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
    ACF GUTENBURG
\*------------------------------------*/

// Gutenberg tekst met fotoblok
if (function_exists('acf_register_block_type')) {
	add_action('acf/init', 'register_acf_block_types');
}

function register_acf_block_types() {
	acf_register_block_type(array(
			'name' 				=> 'tekst_met_foto',
			'title' 			=> __('Tekst met foto'),
			'description'	=> __('Custom tekst met foto'),
			'render_template' => 'template-parts/blocks/tekst_met_foto/tekst_met_foto.php',
			'icon'						=> 'editor-paste-text',
			'keywords'				=> array('tekst_met_foto', 'technex'),
		)
	);
}

// Gutenberg tekst met fotoblok
if (function_exists('acf_register_block_type')) {
	add_action('acf/init', 'register_acf_block_quote');
}

function register_acf_block_quote() {
	acf_register_block_type(array(
			'name' 				=> 'quote',
			'title' 			=> __('Tekst quote'),
			'description'	=> __('Custom quote tekst'),
			'render_template' => 'template-parts/blocks/tekst_quote/tekst_quote.php',
			'icon'						=> 'editor-paste-text',
			'keywords'				=> array('quote', 'technex'),
		)
	);
}

// Gutenberg tekst met fotoblok + url
if (function_exists('acf_register_block_type')) {
	add_action('acf/init', 'register_acf_block_quote_url');
}

function register_acf_block_quote_url() {
	acf_register_block_type(array(
			'name' 				=> 'Tekst met foto_url',
			'title' 			=> __('Tekst met foto_url'),
			'description'	=> __('Tekst met foto_url'),
			'render_template' => 'template-parts/blocks/tekst_met_foto_url/tekst_met_foto_url.php',
			'icon'						=> 'editor-paste-text',
			'keywords'				=> array('tekst_met_foto_url', 'technex'),
		)
	);
}

/*------------------------------------*\
    GUTENBURG PATERN
\*------------------------------------*/

function my_register_block_patterns_nieuws()
  {
    if (class_exists('WP_Block_Patterns_Registry')) {
      // register pattern
      register_block_pattern('mine/your-pattern-producten', [
        'title' => __('Producten template', 'textdomain'),
        'description' => _x(
          'Your pattern description',
          'Block pattern description',
          'textdomain'
        ),
        'content' =>
          "<!-- wp:heading -->\n<h2>Dit is een titel H2</h2>\n<!-- /wp:heading -->\n\n<!-- wp:heading {\"level\":3} -->\n<h3>Dit is een titel H3</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:html -->\n<div class=\"beschrijvingHide\">\n<!-- /wp:html -->\n\n<!-- wp:heading {\"level\":3} -->\n<h3>Dit is een titel H3</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:acf/tekst-met-foto {\"id\":\"block_5fc7f58086753\",\"name\":\"acf/tekst-met-foto\",\"data\":{\"field_5fba7d2b40bbb\":\"\",\"field_5fba7fa274917\":\"Dit is een titel voor onder de foto\",\"field_5fba7d5e40bbc\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\",\"field_5fbbcb77232be\":\"\",\"field_5fbbcb8fb38cd\":\"\"},\"align\":\"\",\"mode\":\"preview\"} /-->\n\n<!-- wp:html -->\n</div>\n<!-- /wp:html -->",
        'categories' => ['section'],
      ]);
			
			register_block_pattern('mine/your-pattern-nieuws', [
        'title' => __('Nieuws template', 'textdomain'),
        'description' => _x(
          'Your pattern description',
          'Block pattern description',
          'textdomain'
        ),
        'content' =>
          "<!-- wp:heading --><h2>Dit is een H2 kop waar de titel komt</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p><!-- /wp:paragraph --><!-- wp:heading --><h2><strong>Dit is een H3 kop voor een tussentitel in groen</strong></h2><!-- /wp:heading --><!-- wp:paragraph --><p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p><!-- /wp:paragraph --><!-- wp:heading --><h2><strong><Dit is een H3 kop voor een tussentitel in groen</strong></h2><!-- /wp:heading --><!-- wp:paragraph --><p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p><!-- /wp:paragraph -->",
        'categories' => ['section'],
      ]);
			
			register_block_pattern('mine/your-pattern-vacatures', [
        'title' => __('Vacatures template', 'textdomain'),
        'description' => _x(
          'Your pattern description',
          'Block pattern description',
          'textdomain'
        ),
        'content' =>
          "<!-- wp:heading --><h2>Wil jij werken bij Technex?</h2><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>Sales Assistant M/V</h3><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>Over ons</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Technex te Wormerveer is een ambitieuze en gedreven organisatie en specialist op het gebied van geavanceerde industriële test &amp; meetapparatuur en laboratoriuminstrumenten. Als één van de belangrijkste importeurs van o.a. Thermische Analyse, Mechanische Beproevings- en Testinstrumenten en Spuitgietoptimalisatie apparatuur is het bedrijf een professionele en klantgerichte partner voor een grote diversiteit aan klanten, zowel MKB, multinationals en onderzoeksinstellingen en universiteiten in de Benelux.&nbsp;</p><!-- /wp:paragraph --><!-- wp:paragraph --><p><strong><em>Zoek jij een uitdagende baan waarin je klanten en collega’s in de buitendienst ondersteunt? </em></strong><strong><em>Dan is dit een mooie baan voor jou! Interessant? Lees dan snel verder en solliciteer bij Technex!</em></strong></p><!-- /wp:paragraph --><!-- wp:heading {\"level\":3} --><h3><strong><strong>Werkzaamheden</strong></strong></h3><!-- /wp:heading --><!-- wp:list --><ul><li>Een binnendienst rol waarin jij primair je collega’s in de buitendienst ondersteunt en een bijdrage levert aan het tot stand komen van technische oplossingen</li><li>Opstellen van offertes met een passende voorstel dat de klant natuurlijk graag omzet in een order</li><li>Ook ondersteun jij de mensen op de buitendienst met (on)gevraagd advies</li><li>Jij maakt deel uit van een team en werkt intensief samen met je collega op de binnendienst die zich primair meer richt op de administratieve en inkoop activiteiten</li><li>Op het gebied van marketing draag je zorg voor een optimale website en coördineer je (on-line) marketing activiteiten om de naamsbekendheid van Technex te vergroten</li><li>Tot slot speel jij een belangrijke rol binnen projecten en tenders</li></ul><!-- /wp:list --><!-- wp:heading {\"level\":3} --><h3><strong>Vaardigheden en ervaring</strong></h3><!-- /wp:heading --><!-- wp:list --><ul><li>Je hebt MBO+ werk- en denkniveau</li><li>Je hebt 2 à 3 jaar werkervaring in een vergelijkbare commerciële backoffice of PMO functie</li><li>Je hebt ervaring met een ERP/CRM systeem en MS Office (bij voorkeur incl. Excel)</li><li>Je beheerst de Nederlandse- en de Engelse taal goed in woord en geschrift.</li><li>Je bezit over sterke organisatorische en aantoonbare (telefonische) (sales)vaardigheden</li><li>Uiteraard ben je een leuke persoonlijkheid, die goed zelfstandig en in teamverband kan werken</li></ul><!-- /wp:list --><!-- wp:heading {\"level\":3} --><h3><strong>Technex biedt</strong></h3><!-- /wp:heading --><!-- wp:list --><ul><li>Zelfstandige en afwisselende functie voor minimaal 32 uur per week met uitzicht op vaste aanstelling</li><li>Grote mate van zelfstandigheid</li><li>Klein team met open werksfeer en korte communicatielijnen;</li><li>Een marktconform salaris, afhankelijk van je kennis en ervaring</li><li>Interne en externe opleidingen en uitgebreide ondersteuning via onze leverancier(s)</li></ul><!-- /wp:list --><!-- wp:heading {\"level\":3} --><h3><strong>Reageren?</strong></h3><!-- /wp:heading --><!-- wp:paragraph --><p>Hebben wij je interesse gewekt met bovenstaande omschrijving, solliciteer dan nu met je sollicitatiebrief en CV en stuur je gegevens naar: <a href=\"mailto:djvdmeulen@technex.nl\">djvdmeulen@technex.nl</a>.<br>Voor meer informatie kun je kijken op www.technex.nl of bellen met Doeke Jan van der Meulen&nbsp;op 075-6474567.</p><!-- /wp:paragraph -->",
        'categories' => ['section'],
      ]);
			
			register_block_pattern('mine/your-pattern-leveranciers', [
        'title' => __('Leveranciers template', 'textdomain'),
        'description' => _x(
          'Your pattern description',
          'Block pattern description',
          'textdomain'
        ),
        'content' =>
          "<!-- wp:heading -->\n<h2>Dit is een titel H2</h2><!-- /wp:html -->",
        'categories' => ['section'],
      ]);

      // register categories
      register_block_pattern_category('section', [
        'label' => _x('Technex', 'textdomain'),
      ]);
    }
  }

add_action( 'init', 'my_register_block_patterns_nieuws' );


/*------------------------------------*\
    Gutenberg patern
\*------------------------------------*/

// textpattern for 
function mytheme_setup_theme_supported_features() {
    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => __( 'zwart', 'themeLangDomain' ),
            'slug' => 'zwart',
            'color' => '#272523',
        ),
        array(
            'name' => __( 'antraciet', 'themeLangDomain' ),
            'slug' => 'antraciet',
            'color' => '#474442',
        ),
        array(
            'name' => __( 'lichtgrijs', 'themeLangDomain' ),
            'slug' => 'lichtgrijs',
            'color' => '#707070',
        ),
        array(
            'name' => __( 'lichtergrijs', 'themeLangDomain' ),
            'slug' => 'lichtergrijs',
            'color' => '#BCBCBC',
        ),
        array(
            'name' => __( 'lichtstegrijs', 'themeLangDomain' ),
            'slug' => 'lichtstegrijs',
            'color' => '#DDDDDD',
        ),
        array(
            'name' => __( 'groen', 'themeLangDomain' ),
            'slug' => 'groen',
            'color' => '#B6CA00',
        ),
    ) );
}
 
add_action( 'after_setup_theme', 'mytheme_setup_theme_supported_features' );

//* Loading editor styles for the block editor (Gutenberg)
function site_block_editor_styles() {
    wp_enqueue_style( 'site-block-editor-styles', get_theme_file_uri( '/style-editor.css' ), false, '1.0', 'all' );
}
add_action( 'enqueue_block_editor_assets', 'site_block_editor_styles' );

add_editor_style( 'style-editor.css' );


/*------------------------------------*\
    Theme Support
\*------------------------------------*/


// Back-end nav aanpassen vereenvoudigen

function my_remove_menu_pages() {
  remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag');
  remove_menu_page('flamingo'); // flamingo
  remove_menu_page('wp-google-maps-menu'); // kaarten
  remove_menu_page('wp-mail-smtp'); // WP Mail
  remove_menu_page('wpseo_dashboard'); // kaarten	
  remove_menu_page('flamingo'); // all import
  remove_menu_page( 'edit-comments.php' ); // Comments
  remove_menu_page( 'themes.php' ); // Appearance
  remove_menu_page( 'plugins.php' ); // Plugins
  // remove_menu_page( 'users.php' ); // Gebruikres
  remove_menu_page( 'tools.php' ); // Tools
  remove_menu_page( 'options-general.php' ); // Settings
  remove_menu_page( 'edit.php?post_type=acf-field-group' );	// Settings
  remove_menu_page( 'duplicator' ); // Settings
  remove_menu_page( 'theme-general-settings' ); // Settings
  remove_menu_page( 'wpcf7' ); // Contact
  remove_menu_page( 'revslider' ); // Rev slider

	//Hide "Tools → Scheduled Actions".
	remove_submenu_page('tools.php', 'action-scheduler');
	//Hide "WooCommerce".
	remove_menu_page('woocommerce');
	// Hide "Products" Woocommerce.
	remove_menu_page('edit.php?post_type=product');
	//Hide "Analytics".
	remove_menu_page('wc-admin&path=/analytics/overview');
	//Hide "Analytics → Overview".
	remove_submenu_page('wc-admin&path=/analytics/overview', 'wc-admin&path=/analytics/overview');
	//Hide "Analytics → Revenue".
	remove_submenu_page('wc-admin&path=/analytics/overview', 'wc-admin&path=/analytics/revenue');
	//Hide "Analytics → Orders".
	remove_submenu_page('wc-admin&path=/analytics/overview', 'wc-admin&path=/analytics/orders');
	//Hide "Analytics → Products".
	remove_submenu_page('wc-admin&path=/analytics/overview', 'wc-admin&path=/analytics/products');
	//Hide "Analytics → Categories".
	remove_submenu_page('wc-admin&path=/analytics/overview', 'wc-admin&path=/analytics/categories');
	//Hide "Analytics → Coupons".
	remove_submenu_page('wc-admin&path=/analytics/overview', 'wc-admin&path=/analytics/coupons');
	//Hide "Analytics → Taxes".
	remove_submenu_page('wc-admin&path=/analytics/overview', 'wc-admin&path=/analytics/taxes');
	//Hide "Analytics → Downloads".
	remove_submenu_page('wc-admin&path=/analytics/overview', 'wc-admin&path=/analytics/downloads');
	//Hide "Analytics → Stock".
	remove_submenu_page('wc-admin&path=/analytics/overview', 'wc-admin&path=/analytics/stock');
	//Hide "Analytics → Settings".
	remove_submenu_page('wc-admin&path=/analytics/overview', 'wc-admin&path=/analytics/settings');
	//Hide "Marketing".
	remove_menu_page('woocommerce-marketing');
};

// add_action( 'admin_menu', 'my_remove_menu_pages' );


if ( ! isset( $content_width ) ) {
    $content_width = 900;
}

if ( function_exists( 'add_theme_support' ) ) {

    // Add Thumbnail Theme Support.
		add_theme_support( 'post-thumbnails', array( 'post', 'page', 'producten', 'vacatures', 'productcategorie', 'nieuws', 'leveranciers' ) ); // Posts and Movies
    add_image_size( 'large', 700, '', true ); // Large Thumbnail.
    add_image_size( 'medium', 250, '', true ); // Medium Thumbnail.
    add_image_size( 'small', 120, '', true ); // Small Thumbnail.
    add_image_size( 'custom-size', 700, 300, true ); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use.
    /*add_theme_support('custom-background', array(
    'default-color' => 'FFF',
    'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use.
    /*add_theme_support('custom-header', array(
    'default-image'          => get_template_directory_uri() . '/img/headers/default.jpg',
    'header-text'            => false,
    'default-text-color'     => '000',
    'width'                  => 1000,
    'height'                 => 198,
    'random-default'         => false,
    'wp-head-callback'       => $wphead_cb,
    'admin-head-callback'    => $adminhead_cb,
    'admin-preview-callback' => $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Enable HTML5 support.
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

    // Localisation Support.
    load_theme_textdomain( 'html5blank', get_template_directory() . '/languages' );
}

/*------------------------------------*\
    Functions
\*------------------------------------*/

// HTML5 Blank navigation
function html5blank_nav() {
    wp_nav_menu(
    array(
        'theme_location'  => 'header-menu',
        'menu'            => '',
        'container'       => 'div',
        'container_class' => 'menu-{menu slug}-container',
        'container_id'    => '',
        'menu_class'      => 'menu',
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<ul>%3$s</ul>',
        'depth'           => 0,
        'walker'          => '',
        )
    );
}

// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts() {
    if ( $GLOBALS['pagenow'] != 'wp-login.php' && ! is_admin() ) {
        if ( HTML5_DEBUG ) {
            // jQuery
            wp_deregister_script( 'jquery' );
            // wp_register_script( 'jquery', get_template_directory_uri() . '/js/lib/jquery.js', array(), '1.11.1' )
						wp_register_script( 'jquery', 'https://code.jquery.com/jquery-1.11.1.min.js', array(), '1.11.1' );

            // Conditionizr
            wp_register_script( 'conditionizr', get_template_directory_uri() . '/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0' );

            // Modernizr
            wp_register_script( 'modernizr', get_template_directory_uri() . '/js/lib/modernizr.js', array(), '2.8.3' );

            // Custom scripts
            wp_register_script(
                'html5blankscripts',
                get_template_directory_uri() . '/js/scripts.js',
                array(
                    'conditionizr',
                    'modernizr',
                    'jquery'
                ),
                '1.0.0' );

            // Enqueue Scripts
            wp_enqueue_script( 'html5blankscripts' );

        // If production
        } else {
            // Scripts minify
            wp_register_script( 'html5blankscripts-min', get_template_directory_uri() . '/js/scripts.min.js', array(), '1.0.0' );
            // Enqueue Scripts
            wp_enqueue_script( 'html5blankscripts-min' );
        }
    }
}

// Load HTML5 Blank conditional scripts
function html5blank_conditional_scripts() {
    if ( is_page( 'pagenamehere' ) ) {
        // Conditional script(s)
        // wp_register_script( 'scriptname', get_template_directory_uri() . '/js/scriptname.js', array( 'jquery' ), '1.0.0' );
        // wp_enqueue_script( 'scriptname' );
    }
}

// Load HTML5 Blank styles
function html5blank_styles() {
    if ( HTML5_DEBUG ) {
        // normalize-css
        wp_register_style( 'normalize', get_template_directory_uri() . '/css/lib/normalize.css', array(), '7.0.0' );
				// wp_enqueue_style('normalize');
        // Custom CSS
        wp_register_style( 'html5blank', get_template_directory_uri() . '/style.css', array( 'normalize' ), '1.0' );
        // Register CSS
        wp_enqueue_style( 'html5blank' );
    } else {
        // Custom CSS
        wp_register_style( 'html5blankcssmin', get_template_directory_uri() . '/style.css', array(), '1.0' );
        // Register CSS
        wp_enqueue_style( 'html5blankcssmin' );
    }
}

// Register HTML5 Blank Navigation
function register_html5_menu() {
    register_nav_menus( array( // Using array to specify more menus if needed
        'header-menu'  => esc_html( 'Header Menu', 'html5blank' ), // Main Navigation
        'extra-menu'   => esc_html( 'Extra Menu', 'html5blank' ) // Extra Navigation if needed (duplicate as many as you need!)
    ) );
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args( $args = '' ) {
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter( $var ) {
    return is_array( $var ) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list( $thelist ) {
    return str_replace( 'rel="category tag"', 'rel="tag"', $thelist );
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class( $classes ) {
    global $post;
    if ( is_home() ) {
        $key = array_search( 'blog', $classes, true );
        if ( $key > -1 ) {
            unset( $classes[$key] );
        }
    } elseif ( is_page() ) {
        $classes[] = sanitize_html_class( $post->post_name );
    } elseif ( is_singular() ) {
        $classes[] = sanitize_html_class( $post->post_name );
    }

    return $classes;
}

// Remove the width and height attributes from inserted images
function remove_width_attribute( $html ) {
    $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
    return $html;
}

// If Dynamic Sidebar Exists
if ( function_exists( 'register_sidebar' ) ) {
    // Define Sidebar Widget Area 1
    register_sidebar( array(
        'name'          => esc_html( 'Widget Area 1', 'html5blank' ),
        'description'   => esc_html( 'Description for this widget-area...', 'html5blank' ),
        'id'            => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );

    // Define Sidebar Widget Area 2
    register_sidebar( array(
        'name'          => esc_html( 'Widget Area 2', 'html5blank' ),
        'description'   => esc_html( 'Description for this widget-area...', 'html5blank' ),
        'id'            => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style() {
    global $wp_widget_factory;

    if ( isset( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'] ) ) {
        remove_action( 'wp_head', array(
            $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
            'recent_comments_style'
        ) );
    }
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination() {
    global $wp_query;
    $big = 999999999;
    echo paginate_links( array(
        'base'    => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
        'format'  => '?paged=%#%',
        'current' => max( 1, get_query_var( 'paged' ) ),
        'total'   => $wp_query->max_num_pages,
    ) );
}

// Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
function html5wp_index( $length ) {
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post( $length ) {
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt( $length_callback = '', $more_callback = '' ) {
    global $post;
    if ( function_exists( $length_callback ) ) {
        add_filter( 'excerpt_length', $length_callback );
    }
    if ( function_exists( $more_callback ) ) {
        add_filter( 'excerpt_more', $more_callback );
    }
    $output = get_the_excerpt();
    $output = apply_filters( 'wptexturize', $output );
    $output = apply_filters( 'convert_chars', $output );
    // $output = '<p>' . $output . '</p>';
    echo esc_html( $output );
}

// Custom View Article link to Post
function html5_blank_view_article( $more ) {
    global $post;
    return '... <a class="view-article" href="' . get_permalink( $post->ID ) . '">' . esc_html_e( 'View Article', 'html5blank' ) . '</a>';
}

// Remove Admin bar
function remove_admin_bar() {
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove( $tag ) {
    return preg_replace( '~\s+type=["\'][^"\']++["\']~', '', $tag );
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', '', $html );
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ( $avatar_defaults ) {
    $myavatar                   = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = 'Custom Gravatar';
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments() {
    if ( ! is_admin() ) {
        if ( is_singular() AND comments_open() AND ( get_option( 'thread_comments' ) == 1 ) ) {
            wp_enqueue_script( 'comment-reply' );
        }
    }
}

// Custom Comments Callback
function html5blankcomments( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    extract( $args, EXTR_SKIP );

    if ( 'div' == $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo esc_html( $tag ) ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID(); ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID(); ?>" class="comment-body">
    <?php endif; ?>
    <div class="comment-author vcard">
    <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
    <?php printf( esc_html( '<cite class="fn">%s</cite> <span class="says">says:</span>' ), get_comment_author_link() ) ?>
    </div>
<?php if ( $comment->comment_approved == '0' ) : ?>
    <em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.' ) ?></em>
    <br />
<?php endif; ?>

    <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
        <?php
            printf( esc_html( '%1$s at %2$s' ), get_comment_date(), get_comment_time() ) ?></a><?php edit_comment_link( esc_html_e( '(Edit)' ), '  ', '' );
        ?>
    </div>

    <?php comment_text() ?>

    <div class="reply">
    <?php comment_reply_link( array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ) ?>
    </div>
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
<?php }

/*------------------------------------*\
    Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action( 'wp_enqueue_scripts', 'html5blank_header_scripts' ); // Add Custom Scripts to wp_head
add_action( 'wp_print_scripts', 'html5blank_conditional_scripts' ); // Add Conditional Page Scripts
add_action( 'get_header', 'enable_threaded_comments' ); // Enable Threaded Comments
add_action( 'wp_enqueue_scripts', 'html5blank_styles' ); // Add Theme Stylesheet
add_action( 'init', 'register_html5_menu' ); // Add HTML5 Blank Menu
add_action( 'widgets_init', 'my_remove_recent_comments_style' ); // Remove inline Recent Comment Styles from wp_head()
add_action( 'init', 'html5wp_pagination' ); // Add our HTML5 Pagination

// Remove Actions
remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action( 'wp_head', 'rel_canonical' );
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

// Add Filters
add_filter( 'avatar_defaults', 'html5blankgravatar' ); // Custom Gravatar in Settings > Discussion
add_filter( 'body_class', 'add_slug_to_body_class' ); // Add slug to body class (Starkers build)
add_filter( 'widget_text', 'do_shortcode' ); // Allow shortcodes in Dynamic Sidebar
add_filter( 'widget_text', 'shortcode_unautop' ); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' ); // Remove surrounding <div> from WP Navigation
// add_filter( 'nav_menu_css_class', 'my_css_attributes_filter', 100, 1 ); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter( 'nav_menu_item_id', 'my_css_attributes_filter', 100, 1 ); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter( 'page_css_class', 'my_css_attributes_filter', 100, 1 ); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter( 'the_category', 'remove_category_rel_from_category_list' ); // Remove invalid rel attribute
add_filter( 'the_excerpt', 'shortcode_unautop' ); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter( 'the_excerpt', 'do_shortcode' ); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter( 'excerpt_more', 'html5_blank_view_article' ); // Add 'View Article' button instead of [...] for Excerpts
// add_filter( 'show_admin_bar', 'remove_admin_bar' ); // Remove Admin bar
add_filter( 'style_loader_tag', 'html5_style_remove' ); // Remove 'text/css' from enqueued stylesheet
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 ); // Remove width and height dynamic attributes to thumbnails
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 ); // Remove width and height dynamic attributes to post images
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 ); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter( 'the_excerpt', 'wpautop' ); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode( 'html5_shortcode_demo', 'html5_shortcode_demo' ); // You can place [html5_shortcode_demo] in Pages, Posts now.
add_shortcode( 'html5_shortcode_demo_2', 'html5_shortcode_demo_2' ); // Place [html5_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

/*------------------------------------*\
    Custom Post Types
\*------------------------------------*/

// Let op: soms permalink truck doen!!!
// add_action( 'after_switch_theme', 'flush_rewrite_rules' ); // Let op, als 404 deze regel even aanzetten.

// Create Custom Post type: vacatures
function create_post_type_vacatures() {
    register_taxonomy_for_object_type( 'category', 'vacatures' ); // Register Taxonomies for Category
    register_taxonomy_for_object_type( 'post_tag', 'vacatures' );
    register_post_type( 'vacatures', // Register Custom Post Type
        array(
        'labels'       => array(
            'name'               => esc_html( 'Vacatures', 'vacatures' ), // Rename these to suit
            'singular_name'      => esc_html( 'Vacatures', 'vacatures' ),
            'add_new'            => esc_html( 'Add New', 'vacatures' ),
            'add_new_item'       => esc_html( 'Add New', 'vacatures' ),
            'edit'               => esc_html( 'Edit', 'vacatures' ),
            'edit_item'          => esc_html( 'Edit vacature', 'vacatures' ),
            'new_item'           => esc_html( 'New vacature', 'vacatures' ),
            'view'               => esc_html( 'View vacature', 'vacatures' ),
            'view_item'          => esc_html( 'View vacature', 'vacatures' ),
            'search_items'       => esc_html( 'Search vacature', 'vacatures' ),
            'not_found'          => esc_html( 'No vacatures found', 'vacatures' ),
            'not_found_in_trash' => esc_html( 'No vacatures found in Trash', 'vacatures' ),
        ),
        'public'       => true,
				'show_in_rest' => true, // Zet Gutenberg editor aan
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive'  => true,
        'supports'     => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export'   => true, // Allows export in Tools > Export
        'taxonomies'   => array(
            // 'post_tag',
            //'category'
        ) // Add Category and Post Tags support
    ) );
}
add_action( 'init', 'create_post_type_vacatures' );

// Create Custom Post type: productcategorien
function create_post_type_productcategorie() {
    register_taxonomy_for_object_type( 'category', 'productcategorie' ); // Register Taxonomies for Category
    register_taxonomy_for_object_type( 'post_tag', 'productcategorie' );
    register_post_type( 'productcategorie', // Register Custom Post Type
        array(
        'labels'       => array(
            'name'               => esc_html( 'Productcategorie', 'productcategorie' ), // Rename these to suit
            'singular_name'      => esc_html( 'Productcategorie', 'productcategorie' ),
            'add_new'            => esc_html( 'Add New', 'productcategorie' ),
            'add_new_item'       => esc_html( 'Add New', 'productcategorie' ),
            'edit'               => esc_html( 'Edit', 'productcategorie' ),
            'edit_item'          => esc_html( 'Edit Productcategorie', 'productcategorie' ),
            'new_item'           => esc_html( 'New Productcategorie', 'productcategorie' ),
            'view'               => esc_html( 'View Productcategorie', 'productcategorie' ),
            'view_item'          => esc_html( 'View Productcategorie', 'productcategorie' ),
            'search_items'       => esc_html( 'Search Productcategorie', 'productcategorie' ),
            'not_found'          => esc_html( 'No Productcategorie found', 'productcategorie' ),
            'not_found_in_trash' => esc_html( 'No Productcategorie found in Trash', 'productcategorie' ),
        ),
        'public'       => true,
				'show_in_rest' => true, // Zet Gutenberg editor aan
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive'  => true,
        'supports'     => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom HTML6 Blank post for supports
        'can_export'   => true, // Allows export in Tools > Export
        'taxonomies'   => array(
            // 'post_tag',
            // 'category'
        ) // Add Category and Post Tags support
    ) );
}
add_action( 'init', 'create_post_type_productcategorie' );

// Create Custom Post: producten
function create_post_type_producten() {
    register_taxonomy_for_object_type( 'category', 'producten' ); // Register Taxonomies for Category
    register_taxonomy_for_object_type( 'post_tag', 'producten' );
    register_post_type( 'producten', // Register Custom Post Type
        array(
        'labels'       => array(
            'name'               => esc_html( 'Producten', 'producten' ), // Rename these to suit
            'singular_name'      => esc_html( 'Producten', 'producten' ),
            'add_new'            => esc_html( 'Add New', 'producten' ),
            'add_new_item'       => esc_html( 'Add New', 'producten' ),
            'edit'               => esc_html( 'Edit', 'producten' ),
            'edit_item'          => esc_html( 'Edit Product', 'producten' ),
            'new_item'           => esc_html( 'New Product', 'producten' ),
            'view'               => esc_html( 'View Product', 'producten' ),
            'view_item'          => esc_html( 'View Product', 'producten' ),
            'search_items'       => esc_html( 'Search Product', 'producten' ),
            'not_found'          => esc_html( 'No Product found', 'producten' ),
            'not_found_in_trash' => esc_html( 'No Product found in Trash', 'producten' ),
        ),
        'public'       => true,
				'show_in_rest' => true, // Zet Gutenberg editor aan
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive'  => true,
        'supports'     => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom HTML6 Blank post for supports
        'can_export'   => true, // Allows export in Tools > Export
        'taxonomies'   => array(
            // 'post_tag',
            'category'
        ) // Add Category and Post Tags support
    ) );
}
add_action( 'init', 'create_post_type_producten' );

// Create Custom Post: succes stories
function create_post_type_successtories() {
    register_taxonomy_for_object_type( 'category', 'successtories' ); // Register Taxonomies for Category
    register_taxonomy_for_object_type( 'post_tag', 'successtories' );
    register_post_type( 'successtories', // Register Custom Post Type
        array(
        'labels'       => array(
            'name'               => esc_html( 'Succes stories', 'successtories' ), // Rename these to suit
            'singular_name'      => esc_html( 'Succes stories', 'successtories' ),
            'add_new'            => esc_html( 'Add New', 'successtories' ),
            'add_new_item'       => esc_html( 'Add New', 'successtories' ),
            'edit'               => esc_html( 'Edit', 'successtories' ),
            'edit_item'          => esc_html( 'Edit Succes stories', 'successtories' ),
            'new_item'           => esc_html( 'New Succes stories', 'successtories' ),
            'view'               => esc_html( 'View Succes stories', 'successtories' ),
            'view_item'          => esc_html( 'View Succes stories', 'successtories' ),
            'search_items'       => esc_html( 'Search Succes stories', 'successtories' ),
            'not_found'          => esc_html( 'No Succes stories found', 'successtories' ),
            'not_found_in_trash' => esc_html( 'No Succes stories found in Trash', 'successtories' ),
        ),
        'public'       => true,
				'show_in_rest' => true, // Zet Gutenberg editor aan
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive'  => true,
        'supports'     => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom HTML6 Blank post for supports
        'can_export'   => true, // Allows export in Tools > Export
        'taxonomies'   => array(
            // 'post_tag',
            'category'
        ) // Add Category and Post Tags support
    ) );
}
add_action( 'init', 'create_post_type_successtories' );

// Create Custom Post: Leveranciers
function create_post_type_leveranciers() {
    register_taxonomy_for_object_type( 'category', 'leveranciers' ); // Register Taxonomies for Category
    register_taxonomy_for_object_type( 'post_tag', 'leveranciers' );
    register_post_type( 'leveranciers', // Register Custom Post Type
        array(
        'labels'       => array(
            'name'               => esc_html( 'Leveranciers', 'leveranciers' ), // Rename these to suit
            'singular_name'      => esc_html( 'Leveranciers', 'leveranciers' ),
            'add_new'            => esc_html( 'Add New', 'leveranciers' ),
            'add_new_item'       => esc_html( 'Add New', 'leveranciers' ),
            'edit'               => esc_html( 'Edit', 'leveranciers' ),
            'edit_item'          => esc_html( 'Edit Leveranciers', 'leveranciers' ),
            'new_item'           => esc_html( 'New Leveranciers', 'leveranciers' ),
            'view'               => esc_html( 'View Leverancier', 'leveranciers' ),
            'view_item'          => esc_html( 'View Leveranciers', 'leveranciers' ),
            'search_items'       => esc_html( 'Search Leveranciers', 'leveranciers' ),
            'not_found'          => esc_html( 'No Leveranciers found', 'leveranciers' ),
            'not_found_in_trash' => esc_html( 'No Leveranciers found in Trash', 'leveranciers' ),
        ),
        'public'       => true,
				'show_in_rest' => true, // Zet Gutenberg editor aan
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive'  => true,
        'supports'     => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom HTML6 Blank post for supports
        'can_export'   => true, // Allows export in Tools > Export
        'taxonomies'   => array(
            // 'post_tag',
            'category'
        ) // Add Category and Post Tags support
    ) );
}
add_action( 'init', 'create_post_type_leveranciers' );

// Create Custom Post: Nieuws
function create_post_type_nieuws() {
    register_taxonomy_for_object_type( 'category', 'nieuws' ); // Register Taxonomies for Category
    register_taxonomy_for_object_type( 'post_tag', 'nieuws' );
    register_post_type( 'nieuws', // Register Custom Post Type
        array(
        'labels'       => array(
            'name'               => esc_html( 'Nieuws', 'nieuws' ), // Rename these to suit
            'singular_name'      => esc_html( 'Nieuws', 'nieuws' ),
            'add_new'            => esc_html( 'Add New', 'nieuws' ),
            'add_new_item'       => esc_html( 'Add New', 'nieuws' ),
            'edit'               => esc_html( 'Edit', 'nieuws' ),
            'edit_item'          => esc_html( 'Edit Nieuws', 'nieuws' ),
            'new_item'           => esc_html( 'New Nieuws', 'nieuws' ),
            'view'               => esc_html( 'View Nieuws', 'nieuws' ),
            'view_item'          => esc_html( 'View Nieuws', 'nieuws' ),
            'search_items'       => esc_html( 'Search Nieuws', 'nieuws' ),
            'not_found'          => esc_html( 'No Nieuws found', 'nieuws' ),
            'not_found_in_trash' => esc_html( 'No Nieuws found in Trash', 'nieuws' ),
        ),
        'public'       => true,
				'show_in_rest' => true, // Zet Gutenberg editor aan
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive'  => true,
        'supports'     => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom HTML6 Blank post for supports
        'can_export'   => true, // Allows export in Tools > Export
        'taxonomies'   => array(
            // 'post_tag',
            'category'
        ) // Add Category and Post Tags support
    ) );
}
add_action( 'init', 'create_post_type_nieuws' );

// 
function custom_post_type_cat_filter($query) {
  if ( !is_admin() && $query->is_main_query() ) {
    if ($query->is_category()) {
      $query->set( 'post_type', 
									array( 'post', 
												 'leveranciers' 
											 ) );
    }
  }
}

add_action('pre_get_posts','custom_post_type_cat_filter');

/*------------------------------------*\
    ShortCode Functions
\*------------------------------------*/

// Shortcode Demo with Nested Capability
function html5_shortcode_demo( $atts, $content = null ) {
    return '<div class="shortcode-demo">' . do_shortcode( $content ) . '</div>'; // do_shortcode allows for nested Shortcodes
}

// Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
function html5_shortcode_demo_2( $atts, $content = null ) {
    return '<h2>' . $content . '</h2>';
}

/*------------------------------------*\
    LOOPS
\*------------------------------------*/

// <?php // cat_loop_homepagina('html5-blank', null, 5, 'title', 'DESC');
function cat_loop_homepagina($post_type = 'any', $cat, $posts_page = '3', $orderby = 'title', $order = 'ASC', $css = 'none') {

$args = array(
	'post_type' 			=> $post_type, // any
	'category_name'		=> $cat,
	'posts_per_page'	=> $posts_page,
	'orderby' 				=> $orderby,
  'order'   				=> $order,
	'orderby' 				=> 'date',
	// 'meta_value'			=> 1,
	// 'meta_key'				=> $meta_key, // 'ev_homepagina_pas',
	// 'orderby’ => 'title', 
	// 'orderby’ => 'ASC', 
);
	
$loop = new WP_Query( $args );
if ( $loop->have_posts() ) :
    while ( $loop->have_posts() ) : $loop->the_post();
?> 
		
 <article>
	 <div><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" width="1000" height="562">
		 <h3><?php if ( the_title() ) : the_title(); endif; ?></h3></div>
      <p class="afkappen"><?php if ( has_excerpt() ) : the_excerpt(); endif; ?></p>
      			<?php if( get_field('link_producten_listpagina') ): ?>
   				<a href="<?php the_field('link_producten_listpagina'); ?>">Lees meer</a>
			<?php endif; ?>
</article>
			
<?php
 endwhile;
    wp_reset_postdata();
else :
    _e( 'Sorry, no posts matched your criteria.', 'textdomain' );
endif;
};



// <?php // cat_loop_categorie('productcategorie', $cat, 1, $post_id2);
function cat_loop_categorie($post_type = 'any', $cat, $posts_page = '3', $slug_name, $css = 'none') {

$args = array(
	'name'						=> $slug_name,
	'post_type' 			=> $post_type,
	'category_name'		=> $cat,
	'posts_per_page'	=> $posts_page,
	'p' 							=> $post_id2,
);
	
$loop = new WP_Query( $args );
if ( $loop->have_posts() ) :
    while ( $loop->have_posts() ) : $loop->the_post();
	
	// maak global van url voor categorie placeholder voor buiten de functie
	global $cat_placeholder_url;
	$cat_placeholder_url = get_the_post_thumbnail_url();
?>

		<div id="categorie_header_image" class="homepageCarousel" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
      <div id="categorie_titel" class="carousel-tekst">
				<h2><?php if ( the_title() ) : the_title(); endif; ?></h2>
      </div>
    </div>
<div class="widthContainer_breedte">
    <div class="widthContainer">
      	<article class="categorieBeschrijving">
					<?php if ( !empty( get_the_content() ) )
						{ 
							echo the_content();
						} ?>
					
      	</article>
    </div>
	</div>	
<?php
 endwhile;
    wp_reset_postdata();
else :
    _e( 'Sorry, no posts matched your criteria test.', 'textdomain' );
endif;
};
?>

<?
// <?php // cat_loop_producten('producten', null, 5, 'title', 'DESC');
function cat_loop_producten($post_type = 'any', $cat, $posts_page = '3', $orderby = 'title', $order = 'ASC', $css = 'none') {

$args = array(
	'post_type' 			=> $post_type, // any
	'category_name'		=> $cat,
	'posts_per_page'	=> $posts_page,
	'orderby' 				=> $orderby,
  'order'   				=> $order,
	// 'meta_value'			=> 1,
	// 'meta_key'				=> $meta_key, // 'ev_homepagina_pas',
	// 'orderby’ => 'title', 
	// 'orderby’ => 'ASC', 
);
	
$loop = new WP_Query( $args );
if ( $loop->have_posts() ) :
    while ( $loop->have_posts() ) : $loop->the_post();
	// global $post;  // Let op: deze uitgezet, is voor primary loop en dit is de secondary loop
?> 		
 	  <article>
        <div class="imgCont" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);"></div>
        <h3><?php if ( the_title() ) : the_title(); endif; ?></h3><div>			
			</div>
        <p class="afkappen"><?php if ( has_excerpt() ) : the_excerpt(); endif; ?></p>
        <a href="<?php echo get_permalink( $post->ID ); ?>">Lees meer</a>
      </article>		
<?php
 endwhile;
		
    wp_reset_postdata();
else :
    _e( 'Sorry, no posts matched your criteria.', 'textdomain' );
endif;
};

// <?php // succes_loop_homepagina('producten', null, 5, 'title', 'DESC');
function succes_loop_homepagina($post_type = 'any', $cat, $posts_page = '3', $orderby = 'title', $order = 'ASC', $css = 'none') {

$args = array(
	'post_type' 			=> $post_type, // any
	'category_name'		=> $cat,
	'posts_per_page'	=> $posts_page,
	'orderby' 				=> $orderby,
  'order'   				=> $order,
	// 'meta_value'			=> 1,
	// 'meta_key'				=> $meta_key, // 'ev_homepagina_pas',
	// 'orderby’ => 'title', 
	// 'orderby’ => 'ASC', 
);
	
$loop = new WP_Query( $args );
if ( $loop->have_posts() ) :
    while ( $loop->have_posts() ) : $loop->the_post();
	// global $post; // Let op: deze uitgezet, is voor primary loop en dit is de secondary loop
?>
						
			 <article class="successtoryBlok">
          <div class="storyPersonBlok">

<img src="<? 
	if ( get_field('afbeeelding_voor_homepagina') ): echo the_field('afbeeelding_voor_homepagina'); 
	else: echo get_the_post_thumbnail_url();
	endif; ?>"<? 
	echo 'alt="' . esc_html ( get_the_title() ) . '"/>'; ?>
						
						<div class="personInfo">
              <h3><?php if ( the_title() ) : the_title(); endif; ?></h3>
              <p><? if( get_field('bedrijf') ):?> <p><? the_field('bedrijf'); ?></p> <? endif; ?></p>
              <p><? if( get_field('functie') ):?> <p><? the_field('functie'); ?></p> <? endif; ?></p>
            </div>
          </div>
          <p class="afkappen"><?php if ( has_excerpt() ) : the_excerpt(); endif; ?></p>
          <a href="<?php echo get_permalink( $post->ID ); ?>">Lees meer</a>
        </article>
						
<?php
 endwhile;
    wp_reset_postdata();
else :
    _e( 'Sorry, no posts matched your criteria.', 'textdomain' );
endif;
};
			
			
// <?php // loop_cat_featuresimage('productcategorie' , $idd);
function loop_cat_featuresimage($post_type = 'any', $id) {

$args = array(
	'post_type' 			=> $post_type,
	'posts_per_page'	=> '1',
	'p'         			=> $id,
);
	
$loop = new WP_Query( $args );
if ( $loop->have_posts() ) :
    while ( $loop->have_posts() ) : $loop->the_post();

	global $cat_placeholder_url_detailpage;
	$cat_placeholder_url_detailpage = get_the_post_thumbnail_url();

 endwhile;
    wp_reset_postdata();
else :
    _e( 'Sorry, no posts matched your criteria.', 'textdomain' );
endif;
};

/*------------------------------------*\
    DEBUGGINNG CODE
\*------------------------------------*/

define( 'WP_DEBUG_DISPLAY', true );
// @ini_set( 'display_errors', 0 );

// Show object
function gqo() {
$catObject = get_queried_object();
$category = $catObject->name;
echo '<pre>' , var_dump($catObject) , '</pre>';
};

// Show var
// echo $post->ID
// svar($post)

function svar($var) {
	echo '<pre>' , var_dump($var) , '</pre>';
	die;
}