<?php
require_once __DIR__ . '/../configs/db_init.php';
require_once __DIR__ . '/../Router.php';
require_once __DIR__ . '/../configs/routes.php';
// require_once __DIR__ . '/Blog.php';

Router::init($routes);

//echo $blog->start();
