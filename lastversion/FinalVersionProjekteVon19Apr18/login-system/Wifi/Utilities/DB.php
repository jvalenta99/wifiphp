<?php
namespace Wifi\Utilities;

/**
 * Singleton pattern mit instance. Die mysqli Connection wird nur 
 * ein einziges mal erzeugt! Alle Zugriffe über instance geben das selbe
 * Objekt zurück.
 */
class DB {
    protected static $connection;

    /**
     * Creates connection to database
     *
     * @return void
     */
    private static function createConnection() {        
        self::$connection = new \mysqli(DB_CONNECT['host'], DB_CONNECT['user'], DB_CONNECT['password'], DB_CONNECT['database']);
        if (!self::$connection) {
            die ('Database Connection Error');
        }
    }

    public static function instance() {
        self::checkConnection();
        // static methods self: bezieht sich auf Klasse, $this auf die Instanz
        return self::$connection;
    }

    /* public static function query($sql) {
        // Log in Logfile
        self::checkConnection();
        $res = self::$connection->query ($sql);
        return $res;
    }  */

    protected static function checkConnection() {
        if (self::$connection === NULL) {
            self::createConnection();
        }
    }


}