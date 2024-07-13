<?php

session_start();

const DB_HOST = 'localhost';
const DB_DATABASE = 'da1';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';

if (!function_exists('check_auth')) {
    function check_auth() {
        if (empty($_SESSION['is_admin'])) {
            header('Location: /login');
            exit();
        }
    }
}

if (!function_exists('db_connect')) {
    function db_connect() {
        try {
            $conn = new PDO(
                'mysql:host=' . DB_HOST . ';dbname=' . DB_DATABASE, 
                DB_USERNAME, 
                DB_PASSWORD
            );
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}
