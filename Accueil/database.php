<?php

$db = new PDO('mysql:host=localhost;dbname=users','root', 'marion051011');

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);