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


/**
 * Get the pubedition's Issuu ID based on the Wordpress embed code provided by Issuu
 * @return string
 **/
function get_pubedition_docid($post_id) {
	$embedcode  = get_post_meta($post_id, 'pubedition_embed', TRUE);
	preg_match('/(?i)(documentid=)(?P<id>[A-Za-z0-9\-]+)/', $embedcode, $matches);
	$docID		= $matches['id'];
	return $docID;
}


/**
 * Get the pubedition's Issuu docname based on the Wordpress embed code provided by Issuu
 * @return string
 **/
function get_pubedition_docname($post_id) {
	$embedcode  = get_post_meta($post_id, 'pubedition_embed', TRUE);
	preg_match('/(?i)(docname=| name=)(?P<name>[A-Za-z0-9\-\_]+)/', $embedcode, $matches);
	$docname	= $matches['name'];
	return $docname;
}

/*
 * Determine whether or not a pubedition is the only post under its publication.
 * @return bool
 */
function is_only_edition($pubedition_id) {
	$publication = wp_get_post_terms($pubedition_id, 'publications');
	// This should never be an array, but we have to check in case of user error:
	$publication = is_array($publication) ? $publication[0] : $publication;
	
	$args = array(
		'post_type' 	=> 'pubedition',
		'numberposts' 	=> -1,
		'taxonomy' 		=> 'publications',
		'term' 			=> $publication->name
	);
	$publication_pubs = get_posts($args);
	
	if (count($publication_pubs) == 1) {
		return true;
	}
	return false;
} 

/*
 * Return the number of pubeditions associated with a publication.
 * @return int
 */
function get_pubedition_count_by_publication($publication_id) {
	if (!$publication_id) { return false; }
	$pubs = get_pubs(null, $publication_id);
	if (count($pubs)) { return count($pubs); }
	else { return 0; }
}

/*
 * Retrieve publications and return them by their latest pub editions.
 * Allows for filtering by category or by publication name, as well as
 * sorting by name and by latest pub edition.
 * Returns an array of post (pubedition) objects, or false on an empty result.
 *
 * @arg $catid -    Category ID to filter publications by.
 * @arg $pubid -    Publication ID to filter by (will return a list of 
 * 				    pubeditions with this publication ID).
 * @arg $sort - 	How to sort returned publications. 'latest' will 
 * 					return publications from newest tagged pubedition to
 * 					oldest; 'alpha' will return publications in A-Z order.	
 * @return array				
 */
function get_pubs($catid=null, $pubid=null, $sort='latest') {
	
	// Cannot return results by catid and pubid; return false if both are set
	if ($catid !== null && $pubid !== null) { return false; }
	
	// Get terms or posts, depending on whether a pubid/catid is provided or not.
	$publications = null;
	$pubeditions  = null;
	
	// Default args
	$args = array('post_type' => 'pubedition', 'numberposts' => -1);
	// By publication id args
	if ($pubid !== null) {
		$pub = get_term_by('id', $pubid, 'publications');
		$args = array_merge($args, array(
			'taxonomy' => 'publications',
			'term'     => $pub->name,
		));
	}
	// By category id args
	elseif ($catid !== null) {
		$args = array_merge($args, array(
			'cat' => $catid,
		));
	}
	// Sorting args
	switch ($sort) {
		case 'alpha':
			$args = array_merge($args, array('orderby' => 'name'));
			break;
		case 'latest':
		default:
			$args = array_merge($args, array('orderby' => 'date'));
			break;
	}
	
	$pubeditions = get_posts($args);
	
	
	if ($pubid !== null) { 
		foreach ($pubeditions as $pubedition) {
			$publication = get_term($pubid, 'publications');
			$pubedition->publication = $publication->slug;
		}	
		return $pubeditions; 
	}
	else {
		$sortable_pubedition_list = array();
		foreach ($pubeditions as $pubedition) {
			$publication = wp_get_post_terms($pubedition->ID, 'publications', array('fields' => 'all'));
			$publication = is_array($publication) ? $publication[0]->slug : $publication->slug;
			$pubedition->publication = $publication;
	
			// Store the latest pubedition in relation to its publication in
			// $sortable_pubedition_list.  Replace any newer pubeditions for
			// a publication if they're found.
			// Note: Pubeditions must have a publication associated with them, or
			// else bad things happen.					
			if (
				$pubedition->publication !== null &&
				!isset($sortable_pubedition_list[$publication]) || 
				(
					isset($sortable_pubedition_list[$publication]) && 
					date('YmdHis', strtotime($sortable_pubedition_list[$publication]->post_date)) < date('YmdHis', strtotime($pubedition->post_date))
				)
				) {
					$sortable_pubedition_list[strtolower($publication)] = $pubedition;
			}
				
		}
		// Realphabetize results by publication name if necessary
		if ($sort == 'alpha') {
			ksort($sortable_pubedition_list);
		}
		// Remove key association
		$pubeditions_numeric = array();
		foreach ($sortable_pubedition_list as $pubedition) {
			$pubeditions_numeric[] = $pubedition;
		}
				
		return $pubeditions_numeric;
	}
	
}

/* 
 * Return a subset of publications for use in a paginated display.
 */
function paginate_pubs($pubs, $per_page=16, $pagenum=0) {
	if (empty($pubs)) { return false; }
	
	// Define an offset
	if ($pagenum == 0) { 
		$offset = 0;
	}
	else { $offset = $per_page*($pagenum-1); }
	
	$paginated_pubs = array();
	for ($i=$offset; $i<($offset + $per_page); $i++) {
		if (isset($pubs[$i])) {
			$paginated_pubs[] = $pubs[$i];
		}
	}
	
	return $paginated_pubs;
}

/*
 * Display publications.  Requires an array of post objects (get_pubs() results)
 * If $styling is set to 'alphalist', an alphabetized index of publication names
 * will be returned.
 * If $reference_pubeditions is set to 'true', the function will assume you are
 * displaying an archive of pubeditions and will link to their respective posts
 * instead of their publication.
 *
 * @return string
 */
function display_pubs($pubs, $reference_pubeditions=false, $styling='default') {
	if (empty($pubs)) { return null; }
	
	switch ($styling) {
		case 'alphalist':
			ob_start(); ?>
			
			<div class="span12">
				<ul class="alphabetical_pubs">
					<?php
					$currentletter = '';
					foreach ($pubs as $post) {
						$cats    = get_the_category($post->ID);
						$catlist = ''; 
						if ($cats[0] == '') { $catlist = "n/a"; } 
						else { 
							foreach ($cats as $cat) {
								$catlist .= "<a href='".get_category_link( $cat->cat_ID )."'>".$cat->cat_name."</a>, ";
							}
							$catlist = substr($catlist, 0, -2); //remove last stray comma and space
						}
						$publication = $post->publication;
						$publication = get_term_by('slug', $publication, 'publications');
						$publication_name = $publication->name;
						$pubdate 		  = date('M j, Y', strtotime($post->post_date));
						$publink 		  = get_term_link($publication_name, 'publications');
			
						$firstletter = strtoupper(substr($publication_name, 0, 1));
						if ($firstletter != $currentletter) { ?>
							<h2 class="sortall_letter"><?=$firstletter?></h2>
						<?php	
							$currentletter = $firstletter;
						} ?>
						<li>
							<h3><a target="_blank" href="<?=$publink?>"><?=$publication_name?></a></h3>
							<p><strong>Published:</strong> <?=$pubdate?></p>
							<p><strong>Found in:</strong> <?=$catlist?></p>
							<?php
							if (is_only_edition($post->ID) == false) { 
								$archive_link = get_permalink(get_page_by_title('Archive')->ID).'?publication='.$publication->slug;
							?>
								<p><strong>Previous editions:</strong> <a href="<?=$archive_link?>">View All (<?=get_pubedition_count_by_publication($publication->term_id)?>)</a></p>
							<?php
							} ?>
							<br/>
						</li>
					<?php
					} ?>
				</ul>
			</div>
			
			<?php
			print ob_get_clean();
			break;
			
		case 'default':
		default:
			ob_start();
			
			foreach ($pubs as $post) {
				//Get pubedition's thumbnail from Issuu based on the document ID found in the pub's shortcode:
				$docID 			  = get_pubedition_docid($post->ID);
				$thumb 			  = "<img src='http://image.issuu.com/".$docID."/jpg/page_1_thumb_large.jpg' alt='".$post->post_title."' title='".$post->post_title."' />";
				$cats  			  = get_the_category($post->ID);
				$catlist = ''; 
				if ($cats[0] == '') { $catlist = "n/a"; } 
				else { 
					foreach ($cats as $cat) {
						$catlist .= "<a href='".get_category_link( $cat->cat_ID )."'>".$cat->cat_name."</a>, ";
					}
					$catlist = substr($catlist, 0, -2); //remove last stray comma and space
				} 
				$publication = $post->publication;
				$publication = get_term_by('slug', $publication, 'publications');
				$pubedition_link  = get_permalink($post->ID);
				if ($reference_pubeditions == false) {
					$publication_name = $publication->name;
					$publication_link = get_term_link($publication_name, 'publications');
					$publink = $publication_link;
				}
				else {
					$publication_name = $post->post_title;
					$publication_term_name = $publication->name;
					$publication_link = get_term_link($publication_term_name, 'publications');
					$publink = $pubedition_link;
				}
				$pubdate 		  = date('M j, Y', strtotime($post->post_date));
				$issuulink 		  = get_post_meta($post->ID, 'pubedition_embed', TRUE);
			
			?>
			
				<div class="span3 pub">
					<div class="pub_details">		
						<h3><a target="_blank" href="<?=$publink?>"><?=trim_pub_title($publication_name)?></a></h3>
						<p class="pubthumb"><a target="_blank" href="<?=$publink?>"><?=$thumb?></a></p>						
						<div>
							<a data-toggle="modal" class="btn btn-small puburl_link" href="#linkmodal_<?=$post->post_name?>">Link To Publication</a>
							<a data-toggle="modal" class="btn btn-small pubembed_link" href="#embedmodal_<?=$post->post_name?>"><i class="icon-share"></i> Embed Code</a>
						</div>
						<div class="modal fade hide" id="linkmodal_<?=$post->post_name?>">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">×</button>
								<h3 class="pubmodal_title">Link to <?=$publication_name?></h3>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="span2">
										<p class="pubmodal_thumb"><?=$thumb?></p>
									</div>
									<div class="span4">
										<p><strong>Instructions:</strong></p>
										<p>Copy/paste the URL below to link to this publication.</p>
										<div class="well">
											<input type="text" value="<?=$publication_link?>" name="puburl" class="puburl" /></input>
										</div>
										<p><small>This address will always refer to the latest edition of the publication.</small></p>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<a href="#" class="btn" data-dismiss="modal">Close</a>
							</div>
						</div>
						
						<div class="modal fade hide" id="embedmodal_<?=$post->post_name?>">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">×</button>
								<h3 class="pubmodal_title">Embed <?=$publication_name?> on your site</h3>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="span2">
										<p class="pubmodal_thumb"><?=$thumb?></p>
									</div>
									<div class="span4">
										<p><strong>Instructions:</strong></p>
										<p>Copy/paste the code below wherever you want the publication* to display on your site.</p>
										<div class="well">
										<?php if ($docID) { ?>
											<textarea name="pubembed" class="pubembed"><div><object style="width:420px;height:273px"><param name="movie" value="http://static.issuu.com/webembed/viewers/style1/v2/IssuuReader.swf?mode=mini&amp;backgroundColor=%23222222&amp;documentId=<?=$docID?>" /><param name="allowfullscreen" value="true"/><param name="menu" value="false"/><param name="wmode" value="transparent"/><embed src="http://static.issuu.com/webembed/viewers/style1/v2/IssuuReader.swf" type="application/x-shockwave-flash" allowfullscreen="true" menu="false" wmode="transparent" style="width:420px;height:273px" flashvars="mode=mini&amp;backgroundColor=%23222222&amp;documentId=<?=$docID?>" /></object></div></textarea>
										<?php } else { ?>Embed code not available.<?php } ?>
										</div>
										<p><small>*If a new edition of this publication is released, you'll need to update your embed code to display the latest version.</small></p>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<a href="#" class="btn" data-dismiss="modal">Close</a>
							</div>
						</div>
						
						<p><strong>Published:</strong> <?=$pubdate?></p>
						<p><strong>Found in:</strong> <?=$catlist?></p>
						<?php
						if (is_only_edition($post->ID) == false && $reference_pubeditions == false) { 
							$archive_link = get_permalink(get_page_by_title('Archive')->ID).'?publication='.$publication->slug;
						?>
							<p><strong>Previous editions:</strong> <a href="<?=$archive_link?>">View All (<?=get_pubedition_count_by_publication($publication->term_id)?>)</a></p>
						<?php
						} ?>
					</div>
				</div>			
			
			<?php
			}
			print ob_get_clean();
			break;
	}
}

/*
 * Display pagination links for lists of publications.
 * Note that the $pubs arg here requires the total count
 * of all pubs, not the count of pubs already filtered with 
 * paginate_pubs().
 */
function display_pagination($pubcount, $per_page, $pagenum, $pageurl) {
	if (!$pubcount || !$per_page || !$pagenum || !$pageurl) { return false; }
	
	$queryseparator = strpos($pageurl, '?') !== false ? '&' : '?';
	$pages = ceil($pubcount/$per_page);
	if ($pubcount > $per_page) {
		ob_start(); ?>
		<div class="row">
			<div class="pagination">
				<ul>
					<li <?php if ($pagenum == 1) { print 'class="active"'; } ?>>
						<a href="<?=$pageurl?>">
							1
						</a>
					</li>
				<?php 
				for ($pagecount = 2; $pagecount <= $pages; $pagecount++) { ?>
					<li <?php if ($pagecount == $pagenum) { print 'class="active"'; } ?>>
						<a href="<?=$pageurl?><?=$queryseparator?>pagenum=<?=$pagecount?>">
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
	print ob_get_clean();
}

/*
 * Output an issuu pub or a link for ipad/iphone users
 */
function embed_issuu($post_id) { 
	
	$pub 		= get_post($post_id);
	$pubtitle 	= $pub->post_title;
	$shortcode 	= get_post_meta($post_id, 'pubedition_embed', TRUE);
	
	$docID 		= get_pubedition_docid($post_id);
	$docname	= get_pubedition_docname($post_id);
	
	if( (strstr($_SERVER['HTTP_USER_AGENT'],"iPad")) || (strstr($_SERVER['HTTP_USER_AGENT'],"iPhone")) || (strstr($_SERVER['HTTP_USER_AGENT'],"iPod")) || (strstr($_SERVER['HTTP_USER_AGENT'],"Android")) ) {
	?>
	
		<div class="container-fluid" id="device_fallback_wrap">
			<div class="row-fluid" id="device_fallback_row">
				<div class="span12">
					<h1><?=$pubtitle?></h1>
					<br/>
					<a href="http://issuu.com/universityofcentralflorida/docs/<?=$docname?>?mode=mobile"><img src='http://image.issuu.com/<?=$docID?>/jpg/page_1_thumb_large.jpg' alt='<?=$pubtitle?>' title='<?=$pubtitle?>' /></a>
					<p><a class="btn btn-primary btn-large" href="http://issuu.com/universityofcentralflorida/docs/<?=$docname?>?mode=mobile">View Publication</a></p>
				</div>
			</div>
		</div>
	
	<?php 
	} else {
	?>
	
		<div class="publication_wrap">
			<?=apply_filters('the_content', $shortcode)?>
		</div>
	
	<?php
	}

}

?>
