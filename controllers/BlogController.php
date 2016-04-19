<?php

/**
 * 投稿などブログに関する処理をするコントローラ
 */
class BlogController extends Controller
{
  protected $auth_actions = array('post','follow');

  /**
   * トップページ。
   */
  public function indexAction()
  {
    $blog = $this->session->get('blog');
    $entries = $this->db_manager->get('Entry')->fetchAllByBlogId($blog['id']);

    return $this->render(array(
      'blog'   => $blog,
      'entries' => $entries,
      '_token' => $this->generateCsrfToken('tweet/index'),
    ));
  }

  /**
   * 投稿処理をする
   */
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

} 
