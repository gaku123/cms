<?php

class EntryRepository extends DbRepository
{
  /**
   * ブログ投稿処理
   *
   * バリデーションも行い、エラー文書の配列を返す。
   */
  public function post($user_id, $body)
  {
    $errors = $this->validateBody($body);
    if (count($errors) === 0) {
      $this->insert($user_id, $body);
    }

    return $errors;
  }

  /**
   * ツイート本文のバリデーション処理
   */
  public function validateBody($body)
  {
    $errors = array();

    if (!strlen($body)) {
      $errors[] = 'ツイートが未入力です。';
    } else if (mb_strlen($body, "utf-8") > 140) {
      $errors[] = 'ツイートは140字以内で入力してください。';
    }

    return $errors;
  }

  private function insert($user_id, $body)
  {
    $now = new DateTime();

    $sql = "
      insert into tweet(user_id, body, created_at, updated_at)
        values(:user_id, :body, :created_at, :updated_at)
    ";

    $stmt = $this->execute($sql, array(
      ':user_id'    => $user_id,
      ':body'       => $body,
      ':created_at' => $now->format('Y-m-d H:i:s'),
      ':updated_at' => $now->format('Y-m-d H:i:s'),
     ));
  }

  /**
   * 指定されたブログの投稿を全て返す。
   */
  public function fetchAllEntriesByBlogId($blog_id)
  {
    $sql = "
      select e.*, u.user_name from entry e join user u on e.user_id = u.id
      left join follow f on f.following_id = t.user_id and f.user_id = :user_id
      r_id or f.user_id = :user_id order by t.created_at desc
    ";

    return $this->fetchAll($sql, array(':user_id' => $user_id));
  }

  /**
   * 全てのユーザのツイートを返す。
   */
  public function fetchAllTweets()
  {
    $sql = "
      select t.*, u.user_name from tweet t join user u on t.user_id = u.id
      order by t.created_at desc
    ";

    return $this->fetchAll($sql);
  }

  /**
   * 指定されたidのユーザのツイートとユーザIDを返す。
   *
   * tweetテーブルとuserテーブルを表結合し、
   * tweetテーブル全てとuserテーブルのuser_nameを選択して返す。
   */
  public function fetchAllByBlogId($blog_id)
  {
    $sql = "
      select e.*, u.user_name from entry e join user u on e.user_id = u.id
      where e.id = :blog_id order by e.created_at desc
    ";

    return $this->fetchAll($sql, array(':blog_id' => $blog_id));
  }

  public function fetchByIdAndUserName($id, $user_name)
  {
    $sql = "
      select t.*, u.user_name from tweet t join user u on t.user_id = u.id
      where u.user_name = :user_name and t.id = :id
    ";

    return $this->fetch($sql, array(
      ':user_name' => $user_name,
      ':id'        => $id,
    ));
  }

}
