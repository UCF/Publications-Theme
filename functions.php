<?php

# Set theme constants
#define('DEBUG', True);                  # Always on
#define('DEBUG', False);                 # Always off
define('DEBUG', isset($_GET['debug'])); # Enable via get parameter
define('THEME_URL', get_bloginfo('stylesheet_directory'));
define('THEME_ADMIN_URL', get_admin_url());
define('THEME_DIR', get_stylesheet_directory());
define('THEME_INCLUDES_DIR', THEME_DIR.'/includes');
define('THEME_STATIC_URL', THEME_URL.'/static');
define('THEME_IMG_URL', THEME_STATIC_URL.'/img');
define('THEME_JS_URL', THEME_STATIC_URL.'/js');
define('THEME_CSS_URL', THEME_STATIC_URL.'/css');
define('THEME_OPTIONS_GROUP', 'settings');
define('THEME_OPTIONS_NAME', 'theme');
define('THEME_OPTIONS_PAGE_TITLE', 'Theme Options');

$theme_options = get_option(THEME_OPTIONS_NAME);
define('GA_ACCOUNT', $theme_options['ga_account']);
define('CB_UID', $theme_options['cb_uid']);
define('CB_DOMAIN', $theme_options['cb_domain']);

require_once('functions-base.php');     # Base theme functions
require_once('custom-taxonomies.php');  # Where per theme taxonomies are defined
require_once('custom-post-types.php');  # Where per theme post types are defined
require_once('shortcodes.php');         # Per theme shortcodes
require_once('functions-admin.php');    # Admin/login functions

/* 
 * Slug of the current Pegasus Magazein edition term in the 
 * editions taxonomy
 */ 
define('CURRENT_EDITION_TERM_SLUG', '2012-summer');

/**
 * Set config values including meta tags, registered custom post types, styles,
 * scripts, and any other statically defined assets that belong in the Config
 * object.
 **/
Config::$custom_post_types = array(
	'Page',
	'PubEdition'
);

Config::$custom_taxonomies = array(
	'Publications'
);

Config::$body_classes = array();

/**
 * Configure theme settings, see abstract class Field's descendants for
 * available fields. -- functions-base.php
 **/
Config::$theme_settings = array(
	'Analytics' => array(
		new TextField(array(
			'name'        => 'Google WebMaster Verification',
			'id'          => THEME_OPTIONS_NAME.'[gw_verify]',
			'description' => 'Example: <em>9Wsa3fspoaoRE8zx8COo48-GCMdi5Kd-1qFpQTTXSIw</em>',
			'default'     => null,
			'value'       => $theme_options['gw_verify'],
		)),
		new TextField(array(
			'name'        => 'Yahoo! Site Explorer',
			'id'          => THEME_OPTIONS_NAME.'[yw_verify]',
			'description' => 'Example: <em>3236dee82aabe064</em>',
			'default'     => null,
			'value'       => $theme_options['yw_verify'],
		)),
		new TextField(array(
			'name'        => 'Bing Webmaster Center',
			'id'          => THEME_OPTIONS_NAME.'[bw_verify]',
			'description' => 'Example: <em>12C1203B5086AECE94EB3A3D9830B2E</em>',
			'default'     => null,
			'value'       => $theme_options['bw_verify'],
		)),
		new TextField(array(
			'name'        => 'Google Analytics Account',
			'id'          => THEME_OPTIONS_NAME.'[ga_account]',
			'description' => 'Example: <em>UA-9876543-21</em>. Leave blank for development.',
			'default'     => null,
			'value'       => $theme_options['ga_account'],
		)),
		new TextField(array(
			'name'        => 'Chartbeat UID',
			'id'          => THEME_OPTIONS_NAME.'[cb_uid]',
			'description' => 'Example: <em>1842</em>',
			'default'     => null,
			'value'       => $theme_options['cb_uid'],
		)),
		new TextField(array(
			'name'        => 'Chartbeat Domain',
			'id'          => THEME_OPTIONS_NAME.'[cb_domain]',
			'description' => 'Example: <em>some.domain.com</em>',
			'default'     => null,
			'value'       => $theme_options['cb_domain'],
		)),
	),
	
	'Search' => array(
		new RadioField(array(
			'name'        => 'Enable Google Search',
			'id'          => THEME_OPTIONS_NAME.'[enable_google]',
			'description' => 'Enable to use the google search appliance to power the search functionality.',
			'default'     => 1,
			'choices'     => array(
				'On'  => 1,
				'Off' => 0,
			),
			'value'       => $theme_options['enable_google'],
	    )),
		new TextField(array(
			'name'        => 'Search Domain',
			'id'          => THEME_OPTIONS_NAME.'[search_domain]',
			'description' => 'Domain to use for the built-in google search.  Useful for development or if the site needs to search a domain other than the one it occupies. Example: <em>some.domain.com</em>',
			'default'     => null,
			'value'       => $theme_options['search_domain'],
		)),
		new TextField(array(
			'name'        => 'Search Results Per Page',
			'id'          => THEME_OPTIONS_NAME.'[search_per_page]',
			'description' => 'Number of search results to show per page of results',
			'default'     => 10,
			'value'       => $theme_options['search_per_page'],
		)),
	),
	'Site' => array(
		new SelectField(array(
			'name'        => 'Featured Front Page Story',
			'id'          => THEME_OPTIONS_NAME.'[front_page_story]',
			'description' => 'This story will be excluded from the front page\'s footer navigation.',
			'value'       => $theme_options['front_page_story'],
			'default'     => '',
			'choices'     => get_front_page_story_choices()
		)),
	),
	'Social' => array(
		new RadioField(array(
			'name'        => 'Enable OpenGraph',
			'id'          => THEME_OPTIONS_NAME.'[enable_og]',
			'description' => 'Turn on the opengraph meta information used by Facebook.',
			'default'     => 1,
			'choices'     => array(
				'On'  => 1,
				'Off' => 0,
			),
			'value'       => $theme_options['enable_og'],
	    )),
		new TextField(array(
			'name'        => 'Facebook Admins',
			'id'          => THEME_OPTIONS_NAME.'[fb_admins]',
			'description' => 'Comma seperated facebook usernames or user ids of those responsible for administrating any facebook pages created from pages on this site. Example: <em>592952074, abe.lincoln</em>',
			'default'     => null,
			'value'       => $theme_options['fb_admins'],
		)),
		new TextField(array(
			'name'        => 'Facebook URL',
			'id'          => THEME_OPTIONS_NAME.'[facebook_url]',
			'description' => 'URL to the facebook page you would like to direct visitors to.  Example: <em>https://www.facebook.com/CSBrisketBus</em>',
			'default'     => null,
			'value'       => $theme_options['facebook_url'],
		)),
		new TextField(array(
			'name'        => 'Twitter URL',
			'id'          => THEME_OPTIONS_NAME.'[twitter_url]',
			'description' => 'URL to the twitter user account you would like to direct visitors to.  Example: <em>http://twitter.com/csbrisketbus</em>',
			'value'       => $theme_options['twitter_url'],
		)),
		new RadioField(array(
			'name'        => 'Enable Flickr',
			'id'          => THEME_OPTIONS_NAME.'[enable_flickr]',
			'description' => 'Automatically display flickr images throughout the site',
			'default'     => 1,
			'choices'     => array(
				'On'  => 1,
				'Off' => 0,
			),
			'value'       => $theme_options['enable_flickr'],
		)),
		new TextField(array(
			'name'        => 'Flickr Photostream ID',
			'id'          => THEME_OPTIONS_NAME.'[flickr_id]',
			'description' => 'ID of the flickr photostream you would like to show pictures from.  Example: <em>65412398@N05</em>',
			'default'     => '36226710@N08',
			'value'       => $theme_options['flickr_id'],
		)),
		new SelectField(array(
			'name'        => 'Flickr Max Images',
			'id'          => THEME_OPTIONS_NAME.'[flickr_max_items]',
			'description' => 'Maximum number of flickr images to display',
			'value'       => $theme_options['flickr_max_items'],
			'default'     => 12,
			'choices'     => array(
				'6'  => 6,
				'12' => 12,
				'18' => 18,
			),
		)),
	),
	'Devices' => array(
		new TextField(array(
			'name'        => 'iTunes Store iPad App URL',
			'id'          => THEME_OPTIONS_NAME.'[ipad_app_url]',
			'description' => 'URL of the Pegasus Magazine iPad app in the iTunes store. Used for the iPad modal. The modal and footer link will not be displayed if this field is blank.',
			'default'     => '',
			'value'       => $theme_options['ipad_app_url'],
		))
	),
);

Config::$links = array(
	array('rel' => 'shortcut icon', 'href' => THEME_IMG_URL.'/favicon.ico',),
	array('rel' => 'alternate', 'type' => 'application/rss+xml', 'href' => get_bloginfo('rss_url'),),
);

Config::$styles = array(
	array('admin' => True, 'src' => THEME_CSS_URL.'/admin.css',),
	THEME_STATIC_URL.'/bootstrap/css/bootstrap.css',
	get_bloginfo('stylesheet_url'),
);


Config::$scripts = array(
	array('admin' => True, 'src' => THEME_JS_URL.'/admin.js',),
	'http://universityheader.ucf.edu/bar/js/university-header.js',
	array('name' => 'jquery', 'src' => 'http://code.jquery.com/jquery-1.7.1.min.js',),
	THEME_STATIC_URL.'/bootstrap/js/bootstrap.js',
	THEME_STATIC_URL.'/js/jquery.cookie.js',
	array('name' => 'base-script',  'src' => THEME_JS_URL.'/webcom-base.js',),
	array('name' => 'theme-script', 'src' => THEME_JS_URL.'/script.js',),
	/* TODO: Write this functionality into a shortcode, only call these libraries when necessary: */
	array('name' => 'rgraph-effects', 'src' => THEME_JS_URL.'/rgraph/RGraph.common.effects.js',),
	array('name' => 'rgraph-core', 'src' => THEME_JS_URL.'/rgraph/RGraph.common.core.js',),
	array('name' => 'rgraph-tooltips', 'src' => THEME_JS_URL.'/rgraph/RGraph.common.tooltips.js',),
	array('name' => 'rgraph-key', 'src' => THEME_JS_URL.'/rgraph/RGraph.common.key.js',),
	array('name' => 'rgraph-dynamic', 'src' => THEME_JS_URL.'/rgraph/RGraph.common.dynamic.js',),
	array('name' => 'rgraph-line', 'src' => THEME_JS_URL.'/rgraph/RGraph.line.js',),
	array('name' => 'inview', 'src' => THEME_JS_URL.'/inview.js',),
	/*array('name' => 'bigger-better-js', 'src' => THEME_DIR.'/dev/bigger-better/bigger-better.js',)*/
);

Config::$metas = array(
	array('charset' => 'utf-8',),
);
if ($theme_options['gw_verify']){
	Config::$metas[] = array(
		'name'    => 'google-site-verification',
		'content' => htmlentities($theme_options['gw_verify']),
	);
}
if ($theme_options['yw_verify']){
	Config::$metas[] = array(
		'name'    => 'y_key',
		'content' => htmlentities($theme_options['yw_verify']),
	);
}
if ($theme_options['bw_verify']){
	Config::$metas[] = array(
		'name'    => 'msvalidate.01',
		'content' => htmlentities($theme_options['bw_verify']),
	);
}
				
/*
 * Returns featured image URL of a specified post ID
 * In this theme, this function retrieves the generic 'thumbnail' size, rather than 'single-post-thumbnail'.
 */
function get_featured_image_url($id) {
	$url = '';
	if(has_post_thumbnail($id)
		&& ($thumb_id = get_post_thumbnail_id($id)) !== False
		&& ($image = wp_get_attachment_image_src($thumb_id, 'thumbnail')) !== False) {
		return $image[0];
	}
	return $url;
}

/*
 * Returns a theme option value or NULL if it doesn't exist
 */
function get_theme_option($key) {
	global $theme_options;
	return isset($theme_options[$key]) ? $theme_options[$key] : NULL;
}

/*
 * Returns an array of choices for the front page features story site setting.
 */
function get_front_page_story_choices() {
	$choices = array();

	$stories = get_posts(array('post_type'=>'story', 'numberposts'=>-1));
	foreach($stories as $story) {
		$choices[$story->post_title] = $story->ID;
	}
	return $choices;
}

/*
 * Get all publications and output them with their latest pub editions
 */
function get_pubs_list($catid) {
	
	$per_page = 16; //number of publications shown per page
	
	//define an offset for pagination based on whether Show All is activated or not
	if ( !isset($_GET['pagenum']) ) { 
		$offset = 0;
	}
	else { $offset = $per_page*(($_GET['page'])-1); }
	
	//Define get_terms args based on query string params
	if ( isset($_GET['sort']) ) {
		switch ($_GET['sort']) {
			case 'alphabetical':
				$args = array( 'number' => $per_page, 'offset' => $offset );
				break;
			case 'newest': //NEED TO FORCE THIS TO SORT BY NEWEST PUBS!!
				$args = array( 'number' => $per_page, 'offset' => $offset, 'orderby' => 'none', 'order' => 'DESC' );
				break;
			case 'showall':
				$args = array('hide_empty' => 0);
				break;
		}
	}
	else { $args = array( 'number' => $per_page, 'offset' => $offset ); }	
	
	//Need to start unordered list for Show All pg before the publications foreach loop
	if ($_GET['sort'] == "showall") { print '<div class="span12"><h2>All Publications</h2><ul class="showall_pubs">'; }
	
	$publications = get_terms( 'publications', $args );

	foreach ($publications as $publication) {
		$publicationID 		= $publication->term_taxonomy_id;
		$publicationName 	= $publication->name;
		?>
		
		<?php if (!($_GET['sort'] == "showall")) { print '<div class="span3">'; } ?>
						
			<?php
			$latestEdition = get_posts(array('post_type' => 'pubedition', 'taxonomy' => 'publications', 'term' => $publicationName, 'category' => $catid, 'order' => 'DESC', 'post_status' => 'publish', 'numberposts' => 1));
			?>
			
				<?php
					foreach ($latestEdition as $post) {
					
						$thumb = get_featured_image_url($post->ID);
						if ($thumb =="") {
							$thumb = THEME_IMG_URL.'/placeholder.jpg';
						}
						$thumb = "<img src='".$thumb."' alt='".$post->post_title."' title='".$post->post_title."' />";
						
						$cats = get_the_category($post->ID);
						$catlist =""; 
						if ($cats[0] =="") { $catlist = "n/a"; } 
						else { 
							foreach ($cats as $cat) {
								$catlist .= "<a href='".get_category_link( $cat->cat_ID )."'>".$cat->cat_name."</a>, ";
							}
							$catlist = substr($catlist, 0, -2);
						} 
						
						$pubdate = $post->post_date; 
						$pubdate = date('M j, Y', strtotime($pubdate));
						
						$publink = get_term_link( $publicationName, 'publications' );
						$issuulink = get_post_meta($post->ID, 'pubedition_url', TRUE);
						
						if ( ($_GET['sort'] == "alphabetical") || ($_GET['sort'] == "newest") || (!(isset($_GET['sort']))) ) {
						?>
						
							<div class="pub_details">		
								<h3><a href="<?=$publink?>"><?=$post->post_title?></a></h3>
								<p><a href="<?=$publink?>"><?=$thumb?></a></p>
								<p><a class="btn" href="<?=$publink?>">Click to View</a></p>
								<p><strong>Found Under</strong> <?=$catlist?></p>
								<p><strong>Published On</strong> <?=$pubdate?></p>
							</div>
								
						<?php	
						} else if ($_GET['sort'] == "showall") { ?>
						
							<li>
								<h3><a href="<?=$publink?>"><?=$post->post_title?></a></h3>
								<p><strong>Found Under</strong> <?=$catlist?></p>
								<p><strong>Published On</strong> <?=$pubdate?></p>
							</li>
							
						<?php
						}
					} //end foreach
				
				//Close span3 wrapper for non-Show All pages
				if (!($_GET['sort'] == "showall")) { print '</div>'; }
				
				
	} // end foreach	
	
	//Close unordered list/div for Show All pg
	if ($_GET['sort'] == "showall") { print '</ul></div>'; }
	?>
	
	</div> <!-- Close containing .row div -->
	
	<?php	
	// If showall isn't set, serve up some pagination
	if(!($_GET['sort'] == "showall")) {
	
		$total_terms = wp_count_terms( 'publications' );
		$pages = ceil($total_terms/$per_page);
	
		// If there's more than one page...
		if( $pages > 1 ) {
		?>
			<div class="row">
				<div class="pagination">
					<ul>
						
					<?php
					for ($pagecount = 1; $pagecount <= $pages; $pagecount++) { ?>
						<li <?php if ($pagecount == $_GET['pagenum']) { print 'class="active"'; } ?>><a href="<?=get_site_url()?>?pagenum=<?=$pagecount?><?php if ($_GET['sort'] == "alphabetical") { print "&sort=alphabetical"; } else if ($_GET['sort'] == "newest") { print "&sort=newest"; } ?>"><?=$pagecount?></a></li>
					<?php
					}
					?>
	
					</ul>
				</div>
			</div>
			<?php
		}
	}		
}