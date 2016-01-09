<?php

class AwitterApplication extends Application
{
  public function getRootDir() { return dirname(__FILE__); }

  public function registerRoutes()
  {
    return array(
      '/'
        => array('controller' => 'tweet', 'action' => 'index'),
    );
  }

}
