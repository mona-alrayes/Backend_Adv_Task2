<?php

namespace Database;

use PDO;
use PDOException;

class Database
{
    private static $host = 'localhost';
    private static $db_name = 'blog_db';
    private static $username = 'root';
    private static $password = 'root';
    private static $conn = null;

    // Establishes a database connection
    public static function connect()
    {
        if (self::$conn === null) {
            try {
                self::$conn = new PDO(
                    'mysql:host=' . self::$host . ';dbname=' . self::$db_name,
                    self::$username,
                    self::$password
                );
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                throw new \Exception('Connection Error: ' . $e->getMessage());
            }
        }
        return self::$conn;
    }

    // Disconnect the database by setting the connection to null
    public static function disconnect()
    {
        self::$conn = null;
    }

    // Method to execute a SQL query with parameters
    public static function Query($sql, $params = [])
    {
        $stmt = self::connect()->prepare($sql);

        if (!$stmt->execute($params)) {
            throw new \Exception('Query execution failed: ' . implode(' ', $stmt->errorInfo()));
        }

        return $stmt;
    }

    // Method to execute a SELECT query and return the results
    public static function Get($sql, $params = [])
    {
        $stmt = self::Query($sql, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
