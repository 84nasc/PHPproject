<?php
    /*
    Applicant Interview PHP project notes: 
    This application uses composer and a library called secure-env-php.
    For this demonstration the dbconn parameters were stored in an encrypted .env file to be accessed in dbconn.php. For more information visit:
    https://github.com/johnathanmiller/secure-env-php
    */

    require('./dbconn.php'); // Initializes required db connection and mysqli for querying
    require('C:\TestFiles\googleauthenticator.php'); // Imports required googleauthenticator class file

    /*
      Queries the websites table for site name and secret on uniqueid primary key that equals to 1 since it's the only record on the table. 
      I could have used "... where site_name='My Gmail 2FA'", but it's best to query using unique IDs for data precision and indexing/performance purpose.
    */
    $result = $mysqli->query('select site_name, secret from websites where uniqueid=1');  
    

    $row = $result->fetch_assoc(); // Parses query result set to array

    $code = (new googleauthenticator())->getCode($row['secret']); // Instanciates googleauthenticator to access getCode passing the secret

    $siteName = $row['site_name'];

    echo "Site Name: $siteName <br /> Google Authentication Code: $code";
?>