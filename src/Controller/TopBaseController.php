<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;//added.
use Cake\Event\Event;//added.

class TopBaseController extends AppController
{
  //初期化
  public function initialize(){

      //$this->viewBuilder()->setLayout("top");

    parent::initialize();
    //各種コンポーネントのロード
    $this->loadComponent('RequestHandler');
    $this->loadComponent('Flash');
    $this->loadComponent('Auth',[
      'authorize' =>['Controller'],
      'authenticate'=>[
        'Form'=>[
          'fields'=>[
            'username'=>'username',
            'password'=>'password'
          ]
        ]
      ],
    'loginRedirect'=>[
      'controller'=>'Users',
      'action'=>'login'
    ],
    'logoutRedirect'=>[
      'controller'=>'Users',
      'action'=>'logout',
    ],
    'authError'=>'ログインしてください',
  ]);
    }




//ログイン処理
function login(){
//post時の処理
    if($this->request->isPost()){
      $user=$this->Auth->identify();
      //Authのidentifyをユーザーに設定
      if(!empty($user)){
        $this->Auth->setUser($user);
        return $this->redirect($this->Auth->redirectUrl());
      }
      $this->Flash->error('ユーザー名かパスワードが間違っています。');
    }
}

//ログアウト処理
public function logout(){
    //セッションを破棄
    $this->request->session()->destroy();
    return $this->redirect($this->Auth->logout());
}

//認証を使わないページの設定
public function beforeFilter(Event $event){
  parent::beforeFilter($event);
  //$this->Auth->allow(['login','index','add']);//後でいじる。本では後で'addを削除する'
  $this->Auth->allow(['index','termofuse','add','addDone']);
}

//認証時のロールチェック
public function isAuthorized($user=null){
    //管理者はtrue
    if($user['role']==='admin'){
      return true;
    }

    //一般ユーザーはTopControllerのみtrueほかはfalse
    if ($user['role']==='user'){
      if($this->name=='Top'){
        return true;
      }else{
      return false;
    }
  }
    //他は全てfalse
    return false;

}
}
