<?php namespace Config;

/**
 * Database Configuration
 *
 * @package Config
 */

class Database extends \CodeIgniter\Database\Config
{
	/**
	 * The directory that holds the Migrations
	 * and Seeds directories.
	 *
	 * @var string
	 */
	public $filesPath = APPPATH . 'Database/';

	/**
	 * Lets you choose which connection group to
	 * use if no other is specified.
	 *
	 * @var string
	 */
	public $defaultGroup = 'tests';

	/**
	 * The default database connection.
	 *
	 * @var array
	 */
	public $default = [
		'DSN'	=>'',
		'hostname' => 'localhost',
		'username' => 'testuser',
	    'password' => 'Fz(}TsZw$XQWH33',
	    'database' => 'wise1',
	    'DBDriver' => 'MySQLi',
	    'DBPrefix' => '',
	    'pconnect' => FALSE,
	    'db_debug' => (ENVIRONMENT !== 'production'),
	    'cache_on' => FALSE,
	    'cachedir' => '',
	    'char_set' => 'utf8',
	    'DBCollat' => 'utf8_general_ci',
	    'swap_pre' => '',
	    'encrypt' => FALSE,
	    'compress' => FALSE,
	    'stricton' => FALSE,
	    'failover' => array(),
		'port'     => 3306,
	];

	
	/**
	 * This database connection is used when
	 * running PHPUnit database tests.
	 *
	 * @var array
	 */
         public $tests = [
		'DSN'      => '',
		'hostname' => '127.0.0.1',
		'username' => '',
		'password' => '',
		'database' => ':memory:',
		'DBDriver' => 'SQLite3',
		'DBPrefix' => 'db_',  // Needed to ensure we're working correctly with prefixes live. DO NOT REMOVE FOR CI DEVS
		'pConnect' => false,
		'DBDebug'  => (ENVIRONMENT !== 'production'),
		'charset'  => 'utf8',
		'DBCollat' => 'utf8_general_ci',
		'swapPre'  => '',
		'encrypt'  => false,
		'compress' => false,
		'strictOn' => false,
		'failover' => [],
		'port'     => 3306,
	];

	//--------------------------------------------------------------------

	public function __construct()
	{
		parent::__construct();

		// Ensure that we always set the database group to 'tests' if
		// we are currently running an automated test suite, so that
		// we don't overwrite live data on accident.
		if (ENVIRONMENT === 'testing')
		{
			$this->defaultGroup = 'tests';
		}
	}

}
