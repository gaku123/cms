<?php

class TweetController extends Controller
{ 
  public function indexAction()
  {
    $user = $this->session->get('user');

    if ($user) {
      $tweets = $this->db_manager->get('Tweet')
        ->fetchAllPersonalTweetsByUserId($user['id']);
    } else {
      $tweets = $this->db_manager->get('Tweet')->fetchAllTweets();
    }

    return $this->render(array(
      'user'   => $user,
      'tweets' => $tweets,
      'body'   => '',
      '_token' => $this->generateCsrfToken('tweet/index'),
    ));
  }

  public function postAction()
  { 
    // POSTじゃなかったらはじく
    if (!$this->request->isPost()) {
      $this->forward404();
    }

    // CSRF対策
    $token = $this->request->getPost('_token');
    if (!$this->checkCsrfToken('tweet/index', $token)) {
      return $this->redirect('/tweet/index');
    }

    $body = $this->request->getPost('body');
    $user = $this->session->get('user');
    $tweets = $this->db_manager->get('Tweet')
      ->fetchAllPersonalTweetsByUserId($user['id']);

    // バリデーションはモデルに記述。
    $errors = $this->db_manager->get('Tweet')->post($user['id'], $body);
    // エラーがない場合はTopページにリダイレクト。
    if (count($errors) === 0) {
      return $this->redirect('/');
    }

    // エラーがある場合はTopページを再描画
    return $this->render(array(
      'user'      => $user,
      'errors'    => $errors,
      'body'      => $body,
      'tweets'    => $tweets,
      '_token'    => $this->generateCsrfToken('tweet/index'),
    ), 'index');
  }

  /**
   * 各ユーザのタイムライン
   */
  public function userAction($params)
  {
    $user = $this->db_manager->get('User')
      ->fetchByUserName($params['user_name']);
    if (!$user) {
      $this->forward404();
    }

    $tweets = $this->db_manager->get('Tweet')
      ->fetchAllByUserId($user['id']);

    return $this->render(array(
      'user'   => $user,
      'tweets' => $tweets,
    ));
  }

  /**
   * 個別のツイートを表示
   */
  public function showAction($params)
  {
    $tweet = $this->db_manager->get('Tweet')
      ->fetchByIdAndUserName($params['id'], $params['user_name']);

    if (!$tweet) {
      $this->forward404();
    }

    return $this->render(array('tweet' => $tweet));
  }

} 
