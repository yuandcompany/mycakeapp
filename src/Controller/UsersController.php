<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */



    public function initialize(){

    //レイアウトはtopと共通
    $this->viewBuilder()->setLayout("top");

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
    //'loginRedirect'=>[
      //'controller'=>'Users',
      //'action'=>'login'
    //],
    'loginRedirect'=>[
      'controller'=>'Top',
      'action'=>'index'
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
    //return $this->redirect($this->Auth->logout());
}

//認証を使わないページの設定
public function beforeFilter(Event $event){
  parent::beforeFilter($event);
  //$this->Auth->allow(['login','index','add']);//後でいじる。本では後で'addを削除する'
  //$this->Auth->allow(['login','add']);
  $this->Auth->allow();

}


//認証時のロールチェック
public function isAuthorized($user=null){
    //管理者はtrue
    if($user['role']==='admin'){
      return true;
    }

    //一般ユーザーはfalse
    if ($user['role']==='user'){
      return false;
    }

    //他は全てfalse
    return false;

}

    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
      //現在時刻をDBに入力する都合上、タイムゾーンを設定
     date_default_timezone_set('Asia/Tokyo');




      //POST送信時の処理
      if($this->request->is('post')){
        $usersTable = TableRegistry::get('users');

        //Usersインスタンスを用意
        $newuser=$usersTable->newEntity();

        $newuser->username=$this->request->data['username'];
        $newuser->mail=$this->request->data['mail'];
        $newuser->password=$this->request->data['password'];
        $newuser->role='user';

        //$newuser->birth_at=$this->request->data['birth_at'];
        //$newuser->explanation=$this->request->data['gender'];
        //$newuser->register_time=date("Y-m-d H:i:s");


        if($usersTable->save($newuser)){
          $this->Flash->success(__('ユーザーを登録しました。'));

        }else{
          $this->Flash->error(__('ユーザーの登録に失敗しました。もう一度入力してください。'));
        }
      }
    }


    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        //ユーザーIDをセットしてそこからユーザー情報をDBからひっぱってくるっぽい。基本bakeで生成されたのでよくわわかってない
        $id=$this->request->session()->read('Auth.User.id');

        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('会員情報が更新されました。'));

                return $this->redirect(['action' => 'edit']);
            }
            $this->Flash->error(__('会員情報が正常に更新されませんでした。もう一度入力してください。'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
