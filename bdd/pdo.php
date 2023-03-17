<?php
$dbConfig = parse_ini_file(__DIR__ . '/../config/db.ini');
[
  'DB_HOST' => $host,
  'DB_PORT' => $port,
  'DB_NAME' => $dbName,
  'DB_CHARSET' => $dbCharset,
  'DB_USER' => $user,
  'DB_PASSWORD' => $password
] = $dbConfig;
$dsn = "mysql:host=$host;port=$port;dbname=$dbName;charset=$dbCharset";
$options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];

try {
  $pdo = new PDO($dsn, $user, $password, $options);
} catch (PDOException $e) {
  exit('Une erreur est survenue : ' . $e->getCode() . ' - ' . $e->getMessage());
}