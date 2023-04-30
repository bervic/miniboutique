<?php
/*$servername = 'localhost';
$username = 'root';
$password = '';
$databasename = 'beaute';
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
die('problème de connexion avec la base de données ' . $conn->connect_error);
}*/

// Connexion à la base de données
//$connexion = mysqli_connect($servername, $username, $password);

// Vérification de la connexion
//if (!$connexion) {
//       die("La connexion à la base de données a échoué : " . mysqli_connect_error());
//}

// Création de la base de données s'elle n'existe pas déjà

/*if (mysqli_query($connexion, $sql)) {
echo "La base de données a été créée avec succès !";
} else {
echo "Erreur lors de la création de la base de données : " . mysqli_error($connexion);
}*/



require_once 'tables.php';

class Connexion
{
        private $host = "localhost";
        private $username = "root";
        private $password = "";
        private $dbname = "beaute";
        private $conn;

        public function __construct()
        {
                $this->conn = new mysqli($this->host, $this->username, $this->password);
                if ($this->conn->connect_error) {
                        die("Connection failed: " . $this->conn->connect_error);
                }

                // query
                $sql_create_db = "CREATE DATABASE IF NOT EXISTS $this->dbname";
                if ($this->conn->query($sql_create_db) === TRUE) {
                        //echo "Database created successfully<br>";
                } else {
                        echo "Error creating database: " . $this->conn->error . "<br>";
                }

                mysqli_select_db($this->conn, $this->dbname);

        }

        public function getConnexion()
        {
                return $this->conn;
        }
}


?>