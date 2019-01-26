<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>


<!doctype html>

<h1>商品情報の入力</h1>
<!-- 入力フォーム -->
<?php
echo $this->form->create('UploadData', array('enctype' => 'multipart/form-data','url' => '/products/add','type' => 'post'));
echo $this->form->input('UploadData.img_name', array('type'=>'file' ));

// 一般的なテキスト入力
echo $this->Form->control('productname', ['label' => '商品名','required' => true]);


// 数値のみの入力
echo $this->Form->control('price', ['type' => 'number', 'label' => '価格', 'required' => true, 'min' => 0, 'max' => 200000]);

// ラジオボタン
echo $this->Form->control('r18', [
  'type' => 'radio',
  'label' => 'R指定',
  'required' => true,
  'options' => [
    false => '成人向けコンテンツを含まない',
    true => '成人向けコンテンツを含む'
  ],
]);

// セレクトボックスで使うoptionの定義
$list = [
  [ 'text' => 'イラスト・画像', 'value' => 1 ],
  [ 'text' => '漫画', 'value' => 2 ],
  [ 'text' => 'テキスト・文章', 'value' => 3 ],
  [ 'text' => '音楽', 'value' => 4 ],
  [ 'text' => 'その他', 'value' => 5 ],
];

// セレクトボックス
echo $this->Form->control('category', [
  'type' => 'select',
  'label' => 'カテゴリー',
  'required' => true,
  'options' => $list,
  'multiple' => false,
  'empty' => '選択してください'
]);

 //商品説明
echo $this -> Form -> input ( "explanation", [ "type" => "textarea",
                                      "cols" => 40,
                                      "rows" => 10,
                                      "label" => "商品の説明（400字以内）" ] );

?>

<?= $this->form->button('送信'); ?>
<?= $this->form->end(); ?>
