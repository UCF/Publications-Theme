Publications-Theme
=============

Wordpress theme for UCF Publications.

Installation
=============
This theme requires the following plugins:

* Gravity Forms
* Relevanssi

Upon installation:
* In Settings > Reading, set 'Blog pages show at most' to '1' (pagination may not work correctly otherwise).  'Front page displays' should be set to 'Your latest posts.'
* Add links to Footer Widgets 2, 3, and 4: Today (today.ucf.edu), Marketing (umark.ucf.edu), and Contact (link to Contact page).
* Update Relevanssi settings and build index:
	* What to include in the index:  Custom, set below
	* Custom post types to index:  pubedition
	* Index and search your posts' tags:  checked
	* Index and search your posts' categories:  checked
	* Custom taxonomies to index:  publications
* In Theme Options > Search, TURN OFF Google Search.
* Create pages named 'Categories' and 'Archive'.

Notes
=============
The WP Issuu plugin required to execute the Issuu-provided shortcode is included in this theme as of v1.0.6.

This theme automatically pulls publication thumbnails from Issuu based on the documentId found in the Issuu pub WordPress shortcode; PubEdition thumbnails are therefore disabled.

Note that, unlike other Generic Theme variations, Publications in this theme are a taxonomy, NOT a custom post type!  The Publications taxonomy groups together PubEditions, which are the individual editions of a given Publication.

Publications are displayed on the site by their newest PubEdition.  Newest PubEditions are determined by the PubEdition's publish date; be sure to set the publish date when adding new PubEditions.  Be sure to check that a Publication already exists when creating a new PubEdition.

Note that PubEditions need to be categorized individually.  A new edition of a Publication can have new categories that the previous PubEdition didn't have, but not adding all of the categories from the previous PubEdition(s) will result in outdated PubEditions being displayed on By Category listings.  In general, it's probably best to stay consistent with categorization of posts throughout the editions of the given Publication.