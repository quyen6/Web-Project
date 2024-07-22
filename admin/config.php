<?php

const _MODULE = 'home';
const _ACTION = 'dashboard';

const _CODE = true;

// Thiết lập host
define('_WEB_HOST' , 'http://' . $_SERVER['HTTP_HOST'].'/Web_Project/admin');
define('_WEB_HOST_TEMPLATES' , _WEB_HOST.'/templates');

//Thiết kập path

define('_WEB_PATH',__DIR__);
define('_WEB_PATH_TEMPLATES',_WEB_PATH.'/templates');

//Thông tin kết nổi
const _HOST = 'localhost';
const _DB = 'viet_sql';
const _USER = 'root';
const _PASS = '';
