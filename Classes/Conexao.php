<?php

    class Conexao {
        private static $conn;

        public static function getConexao() {
            if (empty(self::$conn)) {
                self::$conn = new PDO('mysql:host=localhost; port=3306; dbname=academia', 'root', '');

                return self::$conn;
            }
        }

        public static function fecharconexao() {
            if (!empty(self::$conn)) {
                self::$conn = null;
            }
        }
    }

?>