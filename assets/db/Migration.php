<?php
include_once __DIR__ . '/../db/DBController.php';

$path='./assets/db/Migrations.sql';

DB::Migrate($path,true);