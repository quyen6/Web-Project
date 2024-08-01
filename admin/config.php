<?php

const _MODULE = 'auth';
const _ACTION = 'login';

const _CODE = true;

// Thiết lập host
define('_WEB_HOST' , 'http://' . $_SERVER['HTTP_HOST'].'/Web_Project/admin');
define('_WEB_HOST_TEMPLATES' , _WEB_HOST.'/templates');
define('_WEB_HOST_1','http://' . $_SERVER['HTTP_HOST'].'/Web_Project');

//Thiết kập path

define('_WEB_PATH',__DIR__);
define('_WEB_PATH_TEMPLATES',_WEB_PATH.'/templates');
define('BASE_URL', '/Web_Project/');  // Thay đổi theo đường dẫn thực tế của dự án
//Thông tin kết nổi
const _HOST = 'localhost';
const _DB = 'Web_Project';
const _USER = 'root';
const _PASS = '';
