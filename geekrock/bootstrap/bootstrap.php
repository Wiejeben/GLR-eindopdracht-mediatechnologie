<?php

// Init main functions
session_start();
require_once 'config.php';

require_once 'bootstrap/autoloader.php';
require_once 'bootstrap/functions.php';

// Run application
require_once 'App/routes.php';