<?php
/**
 * Add a slider to the home page, if there is one to add
 *
 * @link http://blackhillswebworks.com/?p=4986
 */

// take away the page title
	remove_action( 'genesis_entry_header', 'genesis_do_post_title' );

	add_action( 'genesis_before_content_sidebar_wrap', 'casabella_home_add_soliloquy_slider' );
	function casabella_home_add_soliloquy_slider() {

		if ( function_exists( 'soliloquy' ) ) {

			soliloquy( '69' );
		}
	}

	add_action( 'genesis_before_content_sidebar_wrap', 'casabella_home_add_tagline_image' );
	function casabella_home_add_tagline_image() {

		echo '<div id="tagline_image"><img src="'. get_home_url() .'/wp-content/uploads/2015/12/casa_tagline.png" nopin="nopin" alt="Become Inspired" /></div>';

	}

	add_action( 'genesis_before_content', 'casabella_home_add_locations' );
	function casabella_home_add_locations() {

		echo '<h1 id="locations">Boston | Cape Cod | New&nbsp;York | Rhode Island</h1>';

	}

	add_action( 'genesis_after_content', 'casabella_home_add_ctas');
	function casabella_home_add_ctas() {

		echo '<div class="sub-content">

			<a id="link-to-shop" href="'. get_home_url() .'/furniture-stores-cape-cod">
			<div class="notch-wrapper">
				<div class="inverted-corner">
				    <div class="top">&nbsp; </div>
						Visit the Shop
				    <div class="bottom"> </div>
				</div>
			</div>
			</a>

			<a id="link-to-services" href="'. get_home_url() .'/interior-design-massachusetts">
			<div class="notch-wrapper">
				<div class="inverted-corner inverted-corner-dark">
				    <div class="top">&nbsp; </div>
						Explore our Services
				    <div class="bottom"> </div>
				</div>
			</div>
			</a>

		</div>';

	}

	add_action( 'genesis_before_footer', 'home_press_section');
	function home_press_section() {
		echo '<div class="section" id="home-press">
			  <div class="home-awards-logos" id="home-awards-logo_1"><img src="'. get_home_url() .'/wp-content/uploads/2017/01/BOB-Home-Logo-2017.jpg" nopin="nopin" alt="Best of Boston Home logo 2017" /></div>
			  <div class="home-awards-logos" id="home-awards-logo_2"><img src="'. get_home_url() .'/wp-content/uploads/2017/01/best-of-houzz-2015-service.jpg" nopin="nopin" alt="Best of Houzz 2015 Service" /></div>
			  <div class="home-awards-logos" id="home-awards-logo_3"><img src="'. get_home_url() .'/wp-content/uploads/2017/01/houzz-10k-saves.jpg" nopin="nopin" alt="Houzz 10k Saves" /></div>
			  <div class="home-awards-logos" id="home-awards-logo_4"><img src="'. get_home_url() .'/wp-content/uploads/2017/01/best-of-cape-cod-2016.jpg" nopin="nopin" alt="Best of Cape Cod logo 2013" /></div>
			  <div class="home-awards-logos" id="home-awards-logo_5"><img src="'. get_home_url() .'/wp-content/uploads/2017/01/best-of-cape-cod-2016.jpg" nopin="nopin" alt="Best of Cape Cod logo 2014" /></div>
			  <div class="home-awards-logos" id="home-awards-logo_6"><img src="'. get_home_url() .'/wp-content/uploads/2017/01/best-of-cape-cod-2016.jpg" nopin="nopin" alt="Best of Cape Cod logo 2015" /></div>
			  <div class="home-awards-logos" id="home-awards-logo_7"><img src="'. get_home_url() .'/wp-content/uploads/2017/01/best-of-cape-cod-2016.jpg" nopin="nopin" alt="Best of Cape Cod logo 2016" /></div>
	          </div> ';
	}


genesis();
