<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(

	'defaultController' => 'index',
	
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	
	
	'name'=>'Holidoy System',

	// preloading 'log' component
	'preload'=>array('log','bootstrap', 'translate'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.helpers.*',
		'application.modules.translate.TranslateModule',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'admin123456',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
			'generatorPaths' => array(
				//'application.gii',  //nested set  Model and Crud templates
				'bootstrap.gii',
			),
		),
		/*
		'payPal'=>array(
	        'env'=>'sandbox',
	        'account'=>array(
	            'username'=>'kyhlee_1352866061_biz_api1.naver.com',
	            'password'=>'1352866097',
	            'signature'=>'ASxPOVx6NciqmI4ApiRbhDpPx-WrAFlZtnMco0qtZy2a61CUg7l0.rnK',
	            'email'=>'kyhleem@naver.com',
	            'identityToken'=>'123456',
			),
			'components'=>array(
				'buttonManager'=>array(
					//'class'=>'payPal.components.PPDbButtonManager'
					'class'=>'payPal.components.PPPhpButtonManager',
				),
			),
		),
		*/

		'translate',
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'class' => 'WebUser',
			'allowAutoLogin'=>true,
		),
		'bootstrap'=>array(
		        'class'=>'ext.bootstrap.components.Bootstrap', // assuming you extracted bootstrap under extensions
		),
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		// uncomment the following to use a MySQL database
		'db'=>array(
			'connectionString' => 'mysql:host=14.200.134.156;dbname=hotelhub',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'gnaadmin',
			'charset' => 'utf8',
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),		
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=> 'info, trace, warning, error', //'error, warning',
					'logFile' => 'trace.log'
				),
				// uncomment the following to show log messages on web pages
 				array(
 					'class'=>'CWebLogRoute',
 				),
			),
		),
		'image'=>array(
		    'class'=>'application.extensions.image.CImageComponent',
		// GD or ImageMagick
		    'driver'=>'GD',
		// ImageMagick setup path
		    'params'=>array('directory'=>'c:/ImageMagick'), // /usr/lib/ImageMagick-6.8.0
		),
		
		'messages'=>array(
			'class'=>'CDbMessageSource',
			'onMissingTranslation' => array('TranslateModule', 'missingTranslation'),
		),
		'translate'=>array(//if you name your component something else change TranslateModule
			'class'=>'translate.components.MPTranslate',
			//any avaliable options here
			'acceptedLanguages'=>array(
				'en'=>'English',
		        'ko'=>'Korean',
				'zh'=>'Chinese-Simplified'
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'eric@gnaemarketing.com.au',
	),
);
