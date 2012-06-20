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
 * Sort publications by latest post filter - via http://jeffri.net/2012/01/sort-by-latest-post-for-wp_list_categories/
 */

function filter_term_sort_by_latest_post_clauses( $pieces, $taxonomies, $args )
{
    global $wpdb;
    if ( in_array('publications', $taxonomies) && $args['orderby'] == 'latest_post' )
    {
        $pieces['fields'] .= ", MAX(p.post_date) AS last_date";
        $pieces['join'] .= " JOIN $wpdb->term_relationships AS tr JOIN $wpdb->posts AS p ON p.ID=tr.object_id AND tr.term_taxonomy_id=tt.term_taxonomy_id";
        $pieces['where'] .= " GROUP BY t.term_id";
        $pieces['orderby'] = "ORDER BY last_date";
        $pieces['order'] = "DESC"; // DESC or ASC
    }
    return $pieces;
}
add_filter('terms_clauses', 'filter_term_sort_by_latest_post_clauses', 10, 3);


/*
 * Trim a string at the end of the last word before the character limit 
 */

function trim_pub_title($input) {
	$length = 35;										
	if (strlen($input) <= $length) {
		return $input;
	}
	else {				  
		//find last space within length
		$last_space = strrpos(substr($input, 0, $length), ' ');
		$trimmed_text = substr($input, 0, $last_space).'&#133;';
		return $trimmed_text;
	}
}


/*
 * Get all publications and output them with their latest pub editions
 */
function get_pubs_list($catid = null) {
	
	//INITIAL PAGINATION PARAMETERS
	
	//Manually define how many pubs will display per page
	$per_page = 16;
	
	//define an offset for pagination based on whether Show All is activated or not
	if ( !isset($_GET['pagenum']) ) { 
		$offset = 0;
	}
	else { $offset = $per_page*(($_GET['pagenum'])-1); }
	
	//DEFINE ARGUMENTS FOR RETRIEVING TERMS (PUBLICATIONS) BASED ON QUERY PARAMS	
	
	if ( isset($_GET['sort']) ) {
		switch ($_GET['sort']) {
			case 'alphabetical':
				$args = array('hide_empty' => 0);
				break;
			case 'latest':
				$args = array( 'number' => $per_page, 'offset' => $offset, 'orderby' => 'latest_post' );
				break;
		}
	}
	else if (is_category()) { 
		$args = array('hide_empty' => 0, 'orderby' => 'latest_post'); 
	}
	else {
		$args = array( 'number' => $per_page, 'offset' => $offset, 'orderby' => 'latest_post' ); //default to sort by latest pubedition
	}
	
	//Need to start <ul> for Alphabetical pg before the publications foreach loop
	switch ($_GET['sort']) {
		case 'alphabetical':
			print '<div class="span12"><ul class="alphabetical_pubs">';
			break;
		default:
			break;
	}
	
	//We're also going to set up a variable for grouping the Show All sort later
	$currentletter = '';
	
	
	//GET THE LIST OF TERMS (PUBLICATIONS)
	
	$publications = get_terms( 'publications', $args );	

	foreach ($publications as $publication) {
		$publicationID 		= $publication->term_taxonomy_id;
		$publicationName 	= $publication->name;
		
		/*if (!($publication->name == $term)) {
			unset($publication);
		}*/
			
		//GET THE FIRST POST FOR EACH PUBLICATION AND DISPLAY IT
			
		$latestEdition = get_posts(array('post_type' => 'pubedition', 'taxonomy' => 'publications', 'term' => $publicationName, 'category' => $catid, 'order' => 'DESC', 'post_status' => 'publish', 'numberposts' => 1));
			
		foreach ($latestEdition as $post) {
					
			switch ($_GET['sort']) {
				case 'alphabetical':
					break;
				default:
					print '<div class="span3 pub">'; 
					break;
			}
						
						
			//Get pubedition's thumbnail from Issuu based on the document ID found in the pub's shortcode:
			$embedcode_explode = preg_split("/documentId=/", get_post_meta($post->ID, 'pubedition_embed', TRUE)); //split up shortcode at documentid
			$embedcode_explode = preg_split("/ name=/", $embedcode_explode[1]); //remove the rest of the embed code, leaving the document id
			$docID 			   = $embedcode_explode[0];
			$thumb = "<img src='http://image.issuu.com/".$docID."/jpg/page_1_thumb_large.jpg' alt='".$post->post_title."' title='".$post->post_title."' />";
					
			$cats = get_the_category($post->ID);
			$catlist =""; 
			if ($cats[0] =="") { $catlist = "n/a"; } 
			else { 
				foreach ($cats as $cat) {
					$catlist .= "<a href='".get_category_link( $cat->cat_ID )."'>".$cat->cat_name."</a>, ";
				}
				$catlist = substr($catlist, 0, -2); //remove last stray comma and space
			} 
					
			$pubdate = $post->post_date; 
			$pubdate = date('M j, Y', strtotime($pubdate));
			
			$publink = get_term_link( $publicationName, 'publications' );
			$issuulink = get_post_meta($post->ID, 'pubedition_embed', TRUE);
			
			$pubslug = $post->post_name;
			
			
			if ( ($_GET['sort'] == "latest") || (!(isset($_GET['sort']))) ) {
			?>
					
				<div class="pub_details">		
					<h3><a target="_blank" href="<?=$publink?>"><?=trim_pub_title($publicationName)?></a></h3>
					<p class="pubthumb"><a target="_blank" href="<?=$publink?>"><?=$thumb?></a></p>
					<!--<p><strong>Link to Publication:</strong></p>-->
					
					<a data-toggle="modal" class="btn btn-small puburl_link" href="#linkmodal_<?=$pubslug?>">Link To Publication</a><a data-toggle="modal" class="btn btn-small pubembed_link" href="#embedmodal_<?=$pubslug?>"><i class="icon-share"></i> Embed Code</a>
					<div class="modal fade hide" id="linkmodal_<?=$pubslug?>">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">×</button>
							<h3 class="pubmodal_title">Link to <?=$publicationName?></h3>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="span2">
									<p class="pubmodal_thumb"><?=$thumb?></p>
								</div>
								<div class="span4">
									<p><strong>Instructions:</strong></p>
									<p>Copy and paste the URL below wherever you'd like to link to this publication.</p>
									<div class="well">
										<input type="text" value="<?=get_term_link( $publicationName, 'publications' )?>" name="puburl" class="puburl" /></input>
									</div>
									<p><small>This link will always point to the latest edition/print of the publication.</small></p>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<a href="#" class="btn" data-dismiss="modal">Close</a>
						</div>
					</div>
					
					<div class="modal fade hide" id="embedmodal_<?=$pubslug?>">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">×</button>
							<h3 class="pubmodal_title">Embed <?=$publicationName?> on your site</h3>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="span2">
									<p class="pubmodal_thumb"><?=$thumb?></p>
								</div>
								<div class="span4">
									<p><strong>Instructions:</strong></p>
									<p>Copy the code below and paste it into an HTML text editor, similar to a YouTube video embed.</p>
									<div class="well">
									<?php if ($docID) { ?>
										<textarea name="pubembed" class="pubembed"><div><object style="width:420px;height:273px"><param name="movie" value="http://static.issuu.com/webembed/viewers/style1/v2/IssuuReader.swf?mode=mini&amp;backgroundColor=%23222222&amp;documentId=<?=$docID?>" /><param name="allowfullscreen" value="true"/><param name="menu" value="false"/><param name="wmode" value="transparent"/><embed src="http://static.issuu.com/webembed/viewers/style1/v2/IssuuReader.swf" type="application/x-shockwave-flash" allowfullscreen="true" menu="false" wmode="transparent" style="width:420px;height:273px" flashvars="mode=mini&amp;backgroundColor=%23222222&amp;documentId=<?=$docID?>" /></object></div></textarea>
									<?php } else { print "Embed code not available."; } ?>
									</div>
									<p><small>This embed code will display the current edition/print of this publication.  If a newer version of this publication is released, you'll need to get a new embed code to display the latest version.</small></p>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<a href="#" class="btn" data-dismiss="modal">Close</a>
						</div>
					</div>
					
					<p><strong>Published:</strong> <?=$pubdate?></p>
					<p><strong>Found in:</strong> <?=$catlist?></p>
				</div>
							
			<?php	
			} else if ($_GET['sort'] == "alphabetical") { 
				$firstletter = strtoupper(substr($publicationName, 0, 1));
				if ($firstletter != $currentletter) { ?>
				 	<h2 class="sortall_letter"><?=$firstletter?></h2>
				
				<?php	
				 	$currentletter = $firstletter;
			  	}
			?>
					
				<li>
					<h3><a target="_blank" href="<?=$publink?>"><?=$publicationName?></a></h3>
					<p><strong>Published:</strong> <?=$pubdate?></p>
					<p><strong>Found in:</strong> <?=$catlist?></p>
					<br/>
				</li>
						
			<?php
			}
					
			//Close span3 wrapper for non-Alphabetical pages
			if (!($_GET['sort'] == "alphabetical")) { print '</div>'; }
					
		}// end latestedition foreach
	} // end publications foreach	
	
	//Close unordered list/div for Alphabetical pg
	if ($_GET['sort'] == "alphabetical") { print '</ul></div>'; } ?>
	
	</div> <!-- Close containing .row div -->
	
	<?php	
	
	//OUTPUT PAGINATION:
	
	// If Alphabetical isn't set (and this isn't a category listing)...
	if (!(is_category())) {
		if( ($_GET['sort'] == "latest") || (!(isset($_GET['sort']))) ) {
		
			$total_terms = wp_count_terms( 'publications' );
			$pages = ceil($total_terms/$per_page);
		
			// If there's more than one page...
			if( $pages > 1 ) {
			?>
				<div class="row">
					<div class="pagination">
						<ul>
							<li <?php if (!($_GET['pagenum'])) { print 'class="active"'; } ?>>
								<a href="<?=get_site_url()?>
								<?php if ($_GET['sort'] == "latest") { 
									print "?sort=latest"; 
								} ?>">
									1
								</a>
							</li>
						<?php 
						for ($pagecount = 2; $pagecount <= $pages; $pagecount++) { ?>
							<li <?php if ($pagecount == $_GET['pagenum']) { print 'class="active"'; } ?>>
								<a href="<?=get_site_url()?>
								?pagenum=<?=$pagecount?>
								<?php if ($_GET['sort'] == "latest") { 
									print "&sort=latest"; 
								} ?>">
								<?=$pagecount?>
								</a>
							</li>
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
}


/*
 * Output an issuu pub or a link for ipad/iphone users
 */
function embed_issuu($shortcode = null) { 

	//$shortcode 		   	  	= get_post_meta($post->ID, 'pubedition_embed', TRUE);
	$embedcode_explode_id 	= preg_split("/documentId=/", $shortcode); //split up shortcode at documentid
	$embedcode_explode_id 	= preg_split("/ name=/", $embedcode_explode_id[1]); //remove the rest of the embed code, leaving the document id
	$docID 			   	  	= $embedcode_explode_id[0];
	
	$embedcode_explode_name = preg_split("/name=/", $shortcode); //split up shortcode at name
	$embedcode_explode_name = preg_split("/ user/", $embedcode_explode_name[1]); //remove the rest of the embed code, leaving the name
	$docname 				= $embedcode_explode_name[0];
	
	if( (strstr($_SERVER['HTTP_USER_AGENT'],"iPad")) || (strstr($_SERVER['HTTP_USER_AGENT'],"iPhone")) || (strstr($_SERVER['HTTP_USER_AGENT'],"iPod")) ) {
	?>
	
	<div class="row" id="device_fallback_wrap">
		<div class="span5">
			<img src='http://image.issuu.com/<?=$docID?>/jpg/page_1_thumb_large.jpg' alt='<?=$post->post_title?>' title='<?=$post->post_title?>' />
		</div>
		<div class="span7">
			<h2><?=$post->post_title?></h2>
			<p>Hello, <?=$_SERVER['HTTP_USER_AGENT']?> user!</p>
			<p><a href="http://issuu.com/universityofcentralflorida/docs/<?=$docname?>?mode=mobile">Click here</a> to access this publication on your device.</p>
		</div>
	</div>
	
	<?php 
	} else {
		echo apply_filters('the_content', $shortcode); 
	}

}