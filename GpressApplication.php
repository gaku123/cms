<?php

/**
 * アプリケーションを表すクラス
 */
class GpressApplication extends Application
{
  protected $login_action = array('account', 'login');

  public function getRootDir() { return dirname(__FILE__); }

  public function registerRoutes()
  {
    return array(
      '/'
        => array('controller' => 'blog', 'action' => 'index'),
      '/account/:action'
        => array('controller' => 'account'),
      '/tweet/:action'
        => array('controller' => 'tweet'),
      '/tweet/show/:user_name'
        => array('controller' => 'tweet', 'action' => 'user'),
      '/tweet/show/:user_name/:id'
        => array('controller' => 'tweet', 'action' => 'show'),
      '/tweet/follow'
        => array('controller' => 'tweet', 'action' => 'follow'),
    );
  }

  /**
   * アプリケーションの設定
   */
  protected function configure()
  {
    $this->db_manager->connect('master', array(
      'dsn'    => 'mysql:dbname=gpress;host=localhost',
      'user'   => 'atm-user',
      'password' => 'gp_dbpass',
    ));

    $blog_url = $_SERVER["SERVER_NAME"];
    $this->session->set('blog', $this->db_manager->get('Blog')->fetchByBlogUrl($blog_url));
 
  }

}
