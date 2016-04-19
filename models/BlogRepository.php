<?php

class BlogRepository extends DbRepository
{
 
  /**
   * 指定されたurlのブログ情報を返す。
   */
  public function fetchByBlogUrl($blog_url)
  {
    $sql = "
      select b.* from blog b where b.blog_url = :blog_url
    ";

    return $this->fetch($sql, array(':blog_url' => $blog_url));
  }

}
