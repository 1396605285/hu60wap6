<?php
try {
$tpl=$PAGE->start();

header('Content-type: text/css');
$tpl->display('tpl:comm.css.xhtml');
} catch(exception $ERR) {
throw new $ERR;
 }