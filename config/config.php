<?php
 return array (
	'logs' => 
	array (
		'path' => 'backup/logs',
		'type' => 'file',
	),
	'DB' => 
	array (
		'type' => 'mysqli',
		'tablePre' => 'iwebshop_',
		'read' => 
		array (
			0 => 
			array (
				'host' => 'localhost:3306',
				'user' => 'root',
				'passwd' => 'root',
				'name' => 'iwebshop',
			),
		),
		'write' => 
		array (
			'host' => 'localhost:3306',
			'user' => 'root',
			'passwd' => 'root',
			'name' => 'iwebshop',
		),
	),
	'interceptor' => 
	array (
		0 => 'themeroute@onCreateController',
		1 => 'layoutroute@onCreateView',
		2 => 'plugin',
	),
	'langPath' => 'language',
	'viewPath' => 'views',
	'skinPath' => 'skin',
	'classes' => 'classes.*',
	'rewriteRule' => 'url',  //伪静态设置   url：非伪静态；pathinfo：伪静态；
	'theme' => 
	array (
		'pc' => 
		array (
			'sysdefault' => 'green',
			'sysseller' => 'green',
			'default' => 'red',
		),
		'mobile' => 
		array (
			'sysdefault' => 'default',
			'sysseller' => 'default',
			'default' => 'black',
		),
	),
	'timezone' => 'Etc/GMT-8',
	'upload' => 'upload',
	'dbbackup' => 'backup/database',
	'safe' => 'cookie',
	'lang' => 'zh_sc',
	'debug' => '2',
	'configExt' => 
	array (
		'site_config' => 'config/site_config.php',
	),
	'encryptKey' => 'a58d02ea5060f6dbcfecc825aa731954',
	'authorizeCode' => '',
)?>