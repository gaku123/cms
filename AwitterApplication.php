<?php

class AwitterApplication extends Application
{
  public function getRootDir() { return dirname(__FILE__); }

  public function registerRoutes()
  {
    return array(
      '/'
        => array('controller' => 'tweet', 'action' => 'index'),
      '/account/:action'
        => array('controller' => 'account'),
      '/tweet/:action'
        => array('controller' => 'tweet'),
    );
  }

  /**
   * アプリケーションの設定
   */
  protected function configure()
  {
    $this->db_manager->connect('master', array(
      'dsn'    => 'mysql:dbname=awitter;host=localhost',
      'user'   => 'atm-user',
      'password' => 'awitter_dbpass',
    ));
  }

}
