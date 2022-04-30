<?php
    class Connection extends PDO {

        const HOSTNAME = "ec2-52-3-60-53.compute-1.amazonaws.com";
        const USERNAME = "ncjchshbsefykm";
        const PASSWORD = "f509e51228976c5021d8fbc1fb8c5c290fbdcc82c83e2a0810df927e949cec1d";
        const SCHEMA = "d2lnco1q03954o";
        const PORT = 5432;

        private $conn;

        # magic method
        public function __construct() {
            $key = "strval";
            $dsn = "pgsql:host={$key(self::HOSTNAME)};dbname={$key(self::SCHEMA)};port={$key(self::PORT)}";
            $this->conn = new PDO($dsn, self::USERNAME, self::PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        }

        public function getConnection() {
            $this->conn->query("SET timezone TO 'America/Sao_Paulo'");
            return $this->conn;
        }
    } 