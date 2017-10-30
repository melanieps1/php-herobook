<?php

  function getDb() {

    $db = pg_connect("host=localhost port=5432 dbname=project3 user=project3 password=project3");

    return $db;

  }

?>