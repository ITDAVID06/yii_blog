<?php

// This is the database connection configuration.
return array(
    'class' => 'system.db.CDbConnection',
    // 'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
    'connectionString' => 'mysql:host=localhost;dbname=yii_blog',
    // the parsed database schema data can remain valid in cache for 3600 seconds
    'schemaCachingDuration' => 3600,
    // 'emulatePrepare' => true,
    'username' => 'root',
    'password' => '',
    // 'charset' => 'utf8',
    'tablePrefix' => 'tbl_',
);
