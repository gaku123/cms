<?php

/**
 * クラスを定義したファイルを自動的に読み込むためのオートロードという仕組みを管理するクラス。
 */
class ClassLoader
{
  protected $dirs;

  /**
   * PHPにオートローダクラスを登録する
   */
  public function register()
  {
    spl_autoload_register(array($this, 'loadClass'));
  }

  /**
  * 検索対象にするときに使う
  */
  public function registerDir($dir)
  {
    $this->dirs[] = $dir;
  }

  /**
   * オートロード時にPHPから自動的に呼び出され、
   * クラスファイルの読み込みを行うメソッド
   */  
  public function loadClass($class)
  {
    foreach ($this->dirs as $dir) {
      $file = $dir . '/' . $class . '.php';
      if (is_readable($file)) {
        require $file;
        return;
      }
    }
  }
}
