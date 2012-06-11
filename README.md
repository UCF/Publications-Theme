Publications-Theme
=============

Wordpress theme for UCF Publications.

Notes
=============
This theme requires the following plugins:

-WP Issuu by Issuu
-Gravity Forms
-Relevanssi

Upon installation:
-In Settings > Reading, set 'Blog pages show at most' to '1' (pagination may not work correctly otherwise).  'Front page displays' should be set to 'Your latest posts.'
-Add links to Footer Widgets 2, 3, and 4: Today (today.ucf.edu), Marketing (umark.ucf.edu), and Contact (link to Contact page).
-Update Relevanssi settings and build index:
	-What to include in the index:  Custom, set below
	-Custom post types to index:  pubedition
	-Index and search your posts' tags:  checked
	-Index and search your posts' categories:  checked
	-Custom taxonomies to index:  publications

This theme automatically pulls publication thumbnails from Issuu based on the documentId found in the Issuu pub WordPress shortcode; PubEdition thumbnails are therefore disabled.

Note that, unlike other Generic Theme variations, Publications in this theme are a taxonomy, NOT a custom post type!  The Publications taxonomy groups together PubEditions, which are the individual editions of a given Publication.

Publications are displayed on the site by their newest PubEdition.  Newest PubEditions are determined by the PubEdition's publish date; be sure to set the publish date when adding new PubEditions.  Be sure to check that a Publication already exists when creating a new PubEdition.