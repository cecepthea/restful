<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['script_dir'] = 'assets/js/';

$config['style_dir'] = 'assets/css/';

$config['cache_dir'] = 'assets/cache/';

$config['dev'] = TRUE;
if (ENVIRONMENT == 'testing') {$config['dev'] = TRUE;}

$config['combine'] = FALSE;

$config['minify_js'] = FALSE;

$config['minify_css'] = FALSE;