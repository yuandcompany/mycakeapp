<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

//アップロード用
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use RuntimeException;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 *
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $products = $this->paginate($this->Products);

        $this->set(compact('products'));
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('product', $product);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */

     //出品処理
     public function add(){



     //現在時刻をDBに入力する都合上、タイムゾーンを設定
    date_default_timezone_set('Asia/Tokyo');


     //POST送信時の処理
     if($this->request->is('post')){

         $this->set("message","読み込むファイルを選んでください。");
         if (isset($this->request->data['UploadData'])) {
             //アップロードするファイルの場所
             //$uploaddir=""とするとwebroot直下にアップされる
             $uploaddir = "uploaded/";
             $uploadfile = $uploaddir.basename($this->request->data['UploadData']['img_name']['name']);
             //echo $uploaddir."<br/>".$uploadfile."<br/>";

             //画像をテンポラリーの場所から、上記で設定したアップロードファイルの置き場所へ移動
             if (move_uploaded_file($this->request->data['UploadData']['img_name']['tmp_name'], $uploadfile)){

                 $productsTable = TableRegistry::get('products');
                 //Productインスタンスを用意
                 $newproduct=$productsTable->newEntity();

                 $newproduct->productname=$this->request->data['productname'];
                 $newproduct->price=$this->request->data['price'];
                 $newproduct->r18=$this->request->data['r18'];
                 $newproduct->category=$this->request->data['category'];
                 $newproduct->explanation=$this->request->data['explanation'];
                 $newproduct->upload_time=date("Y-m-d H:i:s");


                 if($productsTable->save($newproduct)){
                   $this->Flash->success(__('商品を登録しました。'));

                 }else{
                   $this->Flash->error(__('商品の登録に失敗しました。もう一度入力してください。'));
                 }

             }else{
                 //失敗したら、errorを表示
                 $this->Flash->error(__('商品の登録に失敗しました。もう一度入力してください'));
             }
         }



     }
   }
    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $users = $this->Products->Users->find('list', ['limit' => 200]);
        $this->set(compact('product', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
