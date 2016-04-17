<?php

// This is the database connection configuration.
return array(
	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	'connectionString' => 'mysql:host=localhost;dbname=k2186504_siakdb',
	'emulatePrepare' => true,
	'username' => 'k2186504_siak',
	'password' => 'PasswordQWE123XyZ',
	'charset' => 'utf8',
);