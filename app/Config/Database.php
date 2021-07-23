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
	public $defaultGroup = 'default';

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
		'hostname' => 'localhost',
	    'username' => 'testuser',
	    'password' => 'Fz(}TsZw$XQWH33',
	    'database' => 'wise1',
	    'DBDriver' => 'MySQLi',
	    'DBPrefix' => '',
	    'pconnect' => FALSE,
	    'DBDebug' => (ENVIRONMENT !== 'production'),
	    'cache_on' => FALSE,
	    'cachedir' => '',
	    'char_set' => 'utf8',
	    'DBCollat' => 'utf8_general_ci',
	    'swap_pre' => '',
	    'encrypt' => FALSE,
	    'compress' => FALSE,
	    'stricton' => FALSE,
	    'failover' => array(),
	    'save_queries' => TRUE,
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

			// Under Travis-CI, we can set an ENV var named 'DB_GROUP'
			// so that we can test against multiple databases.
			if ($group = getenv('DB'))
			{
				if (is_file(TESTPATH . 'travis/Database.php'))
				{
					require TESTPATH . 'travis/Database.php';

					if (! empty($dbconfig) && array_key_exists($group, $dbconfig))
					{
						$this->tests = $dbconfig[$group];
					}
				}
			}
		}
	}

	//--------------------------------------------------------------------

}
