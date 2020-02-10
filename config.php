<?php
include 'environment.php';
define("BASE_URL", "http://localhost/sushi");
global $config;
$config = array();
if(ENVIRONMENT == "development"){
  $config["host"] = "localhost";
  $config["dbname"] = "bdsushi";
  $config["dbuser"]  = "root";
  $config["dbpass"] = "";
}else{
  $config["host"] = "localhost";
  $config["dbname"] = "bdsushi";
  $config["dbuser"]  = "root";
  $config["dbpass"] = "";
}