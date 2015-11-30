<?php

require '../bootstrap.php';
$tmp = new Request;
echo $tmp->getRequestUri();
echo $tmp->isPost();
echo $tmp->getHost();
echo $tmp->isSsl();

echo "<br />";
echo $tmp->getBaseUrl() . "<br />";
echo $tmp->getPathInfo();

echo dirname(__FILE__).'/core';
echo "<br />";
echo $_SERVER['SCRIPT_NAME'];
echo "<br />";
echo dirname($_SERVER['SCRIPT_NAME']);

