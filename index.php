<?php
//Setting up important stuff
require_once('template.class.php');
define('TEMPLATE_PATH', 'templates');

//Instanciate new object
$template = new Template(TEMPLATE_PATH.'/test.tpl.html');

//Assign values
$template->assign('title', 'Hello');
$template->assign('text', 'test');
$template->assign('text2', 'test 2');

//Showing content
$template->show();