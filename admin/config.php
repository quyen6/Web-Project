<?php

const _MODULE = 'auth';
const _ACTION = 'login';

const _CODE = true;

// Thiết lập host
define('_WEB_HOST' , 'http://' . $_SERVER['HTTP_HOST'].'/Web_Project/admin');
define('_WEB_HOST_TEMPLATES' , _WEB_HOST.'/templates');

//Thiết kập path

define('_WEB_PATH',__DIR__);
define('_WEB_PATH_TEMPLATES',_WEB_PATH.'/templates');

//Thông tin kết nổi
const _HOST = 'localhost';
const _DB = 'Web_Project';
const _USER = 'root';
const _PASS = '';
