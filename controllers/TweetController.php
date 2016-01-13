<?php

class TweetController extends Controller
{ 
  public function indexAction()
  {
    $user = $this->session->get('user');

    return $this->render(array('user'=>$user));
  }
} 
