<?php
    $configFile = __DIR__ . '/config.json';
    $configData = file_get_contents($configFile);
    $config = json_decode($configData, true);

    $host = $config['host'];
    $username = $config['username'];
    $password = $config['password'];
    $database = $config['database'];

    $connect = mysqli_connect($host, $username, $password, $database);
?>