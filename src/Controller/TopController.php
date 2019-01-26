<?php
namespace App\Controller;
use App\Controller\AppController;

class TopController extends TopBaseController{
  //デフォルトテーブルを使わない
  public $useTable = false;

  //初期化
   public function initialize(){

    parent::initialize();
    $this->loadComponent('Paginator');

    //必要なモデルをすべてロード
    $this->loadModel('Users');
    $this->loadModel('Products');
    //$this->loadModel('Bidrequests');
    //$this->loadModel('Bidinfo');
    //$this->loadModel('Bidmessages');


    //ログインしているユーザー情報をauthuserに設定
    $this->set('authuser',$this->Auth->user());

    //レイアウトを設定
    $this->viewBuilder()->setLayout("top");




   }


    //トップページ
    public function index(){


      $values=['title'=>'hello',
              'message'=>'hihihihihihi'
      ];
      $this->set($values);

    //ページネーションでProductsを取得
      $market=$this->paginate('Products',[
        'order'=>['endtime'=>'desc'],
        'limit'=>10]);
        $this->set(compact('market'));
        }

   //商品情報の表示
   public function view($id=null)
   {
     //$idのProductを取得
     $product=$this->Products->get($id,[
       'contain'=>['Users','Bidinfo','Bidinfo.Users']
     ]);
   }

   //出品処理
   public function add(){
     //Productインスタンスを用意
     $product=$this->Products->newEntity();
     //POST送信時の処理
     if($this->request->is('post')){
       //$productにフォームの送信内容を反映
       $product=$this->Products->patchEntity($product,$this->request->getData());
       //$product->$this->productname=$name;


       //$productを保存する
       if($this->Products->save($product)){
         //成功時のメッセージ
         $this->Flash->success(__('商品を登録しました。'));
         //トップページ（INDEX）へ移動。
         $this->redirect(['action'=>'index']);
       }
       //失敗時のメッセージ
       $this->Flash->error(__('商品のアップロードに失敗しました。もう一度入力してください。'));
     }
     //値を保管
     $this->set(compact('product'));
   }

   //出品処理2
   public function adddone(){}

 //出品情報の表示
 public function home2()
 {
   //自分が出品したProductをページネーションで表示
   $products=$this->paginate('Products',[
     'conditions'=>['Products.user_id'=>$this->Auth->user('id')],
     //'contain'=>['Users','Bidinfo'],
     'contain'=>['Users'],
     'order'=>['created'=>'desc'],
     'limit'=> 10])->toArray();
     $this->set(compact('products'));


 }



  //利用規約
  public function termofuse(){
  }
  //このサービスについて
  public function aboutthisservice(){
  }
  //よくある質問
  public function frequentquestion(){
  }

  //お知らせ
  public function news(){

  }
  //プライバシーポリシー
  public function privacypolicy(){

  }
}
?>
