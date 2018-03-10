<?php

function pageErrHandler( $errno, $errstr )
{
     echo "Error: [$errno] $errstr";
     die();
}
function exceptionHandler($e) {
    echo "Exception: '", $e, "'\n";
    die();
}
set_error_handler( "pageErrHandler" );
set_exception_handler("exceptionHandler");

?>