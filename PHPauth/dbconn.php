<?php
    /*
    In this demonstration I placed env., env.enc and env.key in my C:\ drive for good practice. 
    The .env contains the following variables: DB_HOST, DB_USER, DB_PASS, DB_NAME.
    For more information on the encryption library used visit: https://github.com/johnathanmiller/secure-env-php
    */
    require_once './vendor/autoload.php'; // loads composer packages
    use SecureEnvPHP\SecureEnvPHP; // imports SecureEnvPHP class in SecureEnvPHP namespace
    (new SecureEnvPHP())->parse('c:\.env.enc', 'c:\.env.key'); // instanciates SecureEnvPHP object and calls parse decrypt .env.enc with env.key. Env variable then become available via getenv() function.
    $host = getenv('DB_HOST');
    $dbUser = getenv('DB_USER');
    $dbPwd = getenv('DB_PASS');
    $dbName = getenv('DB_NAME');
    $mysqli = new mysqli($host, $dbUser, $dbPwd, $dbName); // initializes mysqli driver
?>