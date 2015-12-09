<?php

require '../bootstrap.php';
$tmp = new Request;
echo "getRequestUri()<br />";
echo $tmp->getRequestUri();
echo "<br />isPost()<br />";
echo $tmp->isPost();
echo "<br />getHost()<br />";
echo $tmp->getHost();
echo "<br />isSsl()<br />";
echo $tmp->isSsl();
echo "<br />getBaseUrl()<br />";
echo $tmp->getBaseUrl();
echo "<br />getPathInfo()<br />";
echo $tmp->getPathInfo();
echo "<br />dirname(__FILE__) . '/core'<br />";
echo dirname(__FILE__) . '/core';
echo "<br />\$SERVER['SCRIPT_NAME']<br />";
echo $_SERVER['SCRIPT_NAME'];
echo "<br />dirname(...)<br />";
echo dirname($_SERVER['SCRIPT_NAME']);

echo "<br />";
$router = new Router(array(
            '/account' => array('controller' => 'account', 'action' => 'index'),
            '/account/:action' => array('controller' => 'account'),
            ));
echo "<br />routes<br />";
var_dump($router->getRoutes()); echo "<br />";
var_dump($router->resolve('/account')); echo "<br />";
var_dump($router->resolve('/account/signup')); echo "<br />";

echo "<br />response<br />";
$response = new Response;
$response->setContent('hello <br />');
$response->setHttpHeader("test", "value");
$response->setStatusCode("200", "OK");
$response->send();

