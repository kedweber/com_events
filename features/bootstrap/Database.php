<?php

/**
 * Com
 *
 * @author 		Joep van der Heijden <joep.van.der.heijden@moyoweb.nl>
 * @category	
 * @package 	
 * @subpackage	
 */

trait Database{

    /**
     * Connects to a MySQL database
     *
     * @param   string    $host
     * @param   string    $user
     * @param   string    $password
     * @param   string    $dbname
     * @param   int       $port
     * @return  mysqli
     * @throws  Exception thrown when their is a connection error.
     */
    public function connect($host = 'localhost', $user = 'root', $password = 'root', $dbname, $port = 8889)
    {
        if($host === 'localhost') {
            $host = '127.0.0.1';
        }

        $this->printDebug('connecting to MySQL database: ' . $dbname . ' on ' . $host . ':' . $port);
        $mysqli = new mysqli($host, $user, $password, $dbname, 8889);

        if ($mysqli->connect_errno) {
            throw new Exception("Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
        }

        return $mysqli;
    }

    /**
     * Truncates the given table
     *
     * @param   $table      name of the table to truncate
     * @throws  Exception   thrown when the query fails
     */
    public static function truncate($table)
    {
        self::_printDebug("truncating table: " . $table );

        if (!self::$mysqli->query("TRUNCATE " . self::$db_prefix . $table)) {
            throw new Exception("Table truncate failed: (" . self::$mysqli->errno . ") " . self::$mysqli->error);
        }
    }
}