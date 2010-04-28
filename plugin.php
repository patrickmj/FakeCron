<?php
define('FAKE_CRON_PLUGIN_DIR', dirname(__FILE__));

date_default_timezone_set('America/New_York');

add_plugin_hook('install', 'fake_cron_install');
add_plugin_hook('uninstall', 'fake_cron_uninstall');
add_plugin_hook('public_theme_header', 'fake_cron_public_theme_header');
add_plugin_hook('public_theme_footer', 'fake_cron_public_theme_footer');
add_plugin_hook('define_routes', 'fake_cron_define_routes');
add_filter('admin_navigation_main', 'fake_cron_admin_navigation_main');


function fake_cron_install() {
	$db = get_db();				

	$sql = "CREATE TABLE IF NOT EXISTS `{$db->prefix}fake_cron_tasks` (
	  `id` int(11) NOT NULL auto_increment,
	  `name` text COLLATE utf8_unicode_ci NOT NULL,
	  `description` text COLLATE utf8_unicode_ci NULL,
	  `interval`  int(11) NULL ,	  		
	  `last_run` datetime DEFAULT NULL,
	  `controller` text COLLATE utf8_unicode_ci NULL,
	  `action` text COLLATE utf8_unicode_ci NULL,
	  `data` text COLLATE utf8_unicode_ci NULL
	  PRIMARY KEY (`id`)
	) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";


	$db->exec($sql);		
	
}


function fake_cron_uninstall() {
		$db = get_db();
		$sql = "DROP TABLE IF EXISTS `{$db->prefix}fake_cron_terms`";
		$db->exec($sql);	
}

function fake_cron_define_routes($router)
{
	$router->addRoute(
		'fake_cron_fakecron',
		new Zend_Controller_Router_Route(
			'fake-cron/tasks/fakecron/:con/:act', 
			array(
				'module'       => 'fake-cron', 
				'controller'   => 'tasks', 
				'action'       => 'fakecron',
				'con'			=> '/w+',
				'act'			=> '/w+'
			)
		)
	);	
	
}


function fake_cron_admin_navigation_main($tabs)
{
		$tabs['Fake Cron'] = uri('fake-cron/tasks');
		return $tabs;	

}

function fake_cron_public_theme_header()
{
	echo "\n<script type='text/javascript' src='" . WEB_PLUGIN . "/FakeCron/views/javascripts/fakecron.js'></script>";
	
	$tasksTable = get_db()->getTable("FakeCron_Task");
	$html = "\n<script type='text/javascript'>\n";
	$html .= "FakeCron.baseURL='" . uri('fake-cron/tasks/fakecron/')  . "' ; ";
	$html .= "FakeCron.tasks = " . $tasksTable->buildTasksJSON() . ";\n";
	$html .= "</script>";
	echo $html;
	
}


function fake_cron_public_theme_footer()
{
	
	
	
}


?>
