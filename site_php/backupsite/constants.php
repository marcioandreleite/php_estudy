<?PHP

	define('DMNCMS',		true);
	define('DS',			DIRECTORY_SEPARATOR);
	define('BASEDIR',		realpath(dirname(__FILE__)).DS);
	define('SYSTEM_PATH',	BASEDIR.'system');
	define('APP_PATH',		BASEDIR.'application');
	define('DATE_FORMAT',	'd-m-Y');
	define('DATETIME_FORMAT',		'd-m-Y H:i:s');
	define('INSTALLED',		true);


	/*
	 *---------------------------------------------------------------
	 * Sql Server-Configuration
	 *---------------------------------------------------------------
	 *
	 *     The following constants define the logins which should be used to access the database.
	 *
	 */

	define('HOST',		'167.114.208.77');
	define('USER',		'sa');
	define('PASS',		'#2022Dia2e22#PLkzT@');
	define('WEB_DB',	'dmncms');
	define('PAGE_START', microtime(true));
	define('LOG_SQL',	false);
	define('DRIVER', 	'sqlsrv');
	define('MD5',		0);
	define('SOCKET_LIBRARY',1);
	define('ENVIRONMENT', 'production');


	/*
	 *---------------------------------------------------------------
	 * Mu Server Version
	 *---------------------------------------------------------------
	 *
	 *     Define MuOnline Server Version
	 * 		- version 0 - below season 1
	 * 		- version 1 - season 1
	 * 		- version 2 - season 2 and higher
	 * 		- version 3 - ex700 and higher
	 * 		- version 4 - season 8 and higher
	 * 		- version 5 - season 10 and higher
	 * 		- version 6 - season 11 and higher
	 * 		- version 7 - season 12 and higher
	 * 		- version 8 - season 13 and higher
	 * 		- version 9 - season 14 and higher
	 * 		- version 10 - season 15 and higher
	 * 		- version 11 - season 16 and higher
	 * 		- version 12 - season 17 and higher
	 * 		- version 13 - season 18 and higher
	 *
	 */

	define('MU_VERSION',		13);


	/*
	 *---------------------------------------------------------------
	 * Admin CP
	 *---------------------------------------------------------------
	 *
	 */

	define('USERNAME',	'admin');
	define('PASSWORD', 	'5J&435R!N8At');
	define('PINCODE', 	'115303');
	define('SECURITY_SALT','Pba02UXgQe');
	define('ACP_IP_CHECK',false);
	define('ACP_IP_WHITE_LIST','127.0.0.1');


