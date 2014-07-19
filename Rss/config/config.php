<?php

$config['module']['rss'] = array
(
	/*
	 * Main config items
	 *
	 */
	'name' => "RSS",
	'description' => "Makes one RSS feed from articles",
	'author' => "Ionize Dev Team",
	'version' => "1.2",

	'has_frontend' => TRUE,
	'has_admin' => TRUE,

	/*
	 * Module's config items
	 *
	 */
	'module_rss_name' => 'RSS',
	'module_rss_feed_title'=> 'RSS Feed title',

	// RSS Feed Description
	'module_rss_feed_description' => 'RSS feed description',

	// RSS Feed Author's Email
	'module_rss_feed_author' => 'RSS Feed Author',

	// IDs of pages used for RSS, comma separated (childs pages will also be used)
	'module_rss_pages' => '',
);

return $config['module']['rss'];

