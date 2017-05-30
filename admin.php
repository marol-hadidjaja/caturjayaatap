<?php
error_log('admin - index.php\n', 3, '/home/caturjaya/public_html/Site_User_errors.log');
function __autoload($class)
{
    if(strpos($class, 'CI_') !== 0)
    {
        @include_once( APPPATH . 'core/'. $class . '.php' );
    }
}
