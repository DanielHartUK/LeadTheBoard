<?php

defined("SITE_DIR")
	or define("SITE_DIR", dirname(__FILE__)); 

defined("SITE_PATH")
    or define("SITE_PATH", realpath(dirname(__FILE__) ));

defined("JS_PATH")	
    or define("JS_PATH", realpath(dirname(__FILE__) . '/js'));

defined("CSS_PATH")
    or define("CSS_PATH", realpath(dirname(__FILE__) . '/css'));

// Creating constants for heavily used paths makes things a lot easier.
defined("SITE_URL")
    or define("SITE_URL", $siteURL); 

defined("TEMPLATES_PATH")
    or define("TEMPLATES_PATH", realpath(dirname(__FILE__) . '/views/templates'));

defined("INCLUDES_PATH")
    or define("INCLUDES_PATH", realpath(dirname(__FILE__) . '/includes'));

defined("VIEWS_PATH")
    or define("VIEWS_PATH", realpath(dirname(__FILE__) . '/views'));

defined("HUB_PATH")
    or define("HUB_PATH", realpath(dirname(__FILE__) . '/hub'));

defined("ACCOUNT_PATH")
    or define("ACCOUNT_PATH", realpath(dirname(__FILE__) . '/account'));
  
defined("ACHIEVEMENTICONS_PATH")
    or define("ACHIEVEMENTICONS_PATH", realpath(dirname(__FILE__) . '/assets/achievements'));

defined("UPLOADS_PATH")
    or define("UPLOADS_PATH", realpath(dirname(__FILE__) . '/assets/uploads'));