<!doctype html>
<html lang="ja">
<head>
  <?=$this->Html->charset() ?>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title><?=$this->name.'/'.$this->request->action ?></title>




  <?=$this->Html->css('base.css') ?>
  <?=$this->Html->css('top.css') ?>
<?=$this->fetch('meta') ?>
<?=$this->fetch('css') ?>
<?=$this->fetch('script') ?>

<?php
//ログインユーザー名取得。nullならゲストさんと表示
if($this->request->session()->read('Auth.User.username')==null) {
$login_user = 'ゲスト';
}else{
  $login_user=$this->request->session()->read('Auth.User.username');
}
?>
こんにちは、<?=$login_user?>　さん



</head>


<body>
<header class="head row">
  <li>
    <h1>サイトの名前</h1>
    <a href="<?=$this->Url->build(['controller'=>'Users','action'=>'login']);?>" class="btn">&gt;ログイン</a>
  </li>
  <div class="top-bar-section">
    <ul class="right">
      <li><a target="_brank" href ="https://www.google.co.jp/?gws_rd=ssl">about</a></li>
    </ul>
  </div>
  </header>



<li>

  <?=$this->Flash->render()?>
  <div class="container clearfix">
  <div class="actions index medium-9 columns content">
  <?=$this->fetch('content')?>
  </div>
  <nav class="large-2 medium-3 columns sidebar" id="actions-sidebar">
  <ul class="side-nav">
  <li class="heading"><?=__('Actions') ?></li>

  <?php
  //もしログインしていればログアウトページへのリンクをそうでなければログインページのリンクをメニューに表示
   if($login_user != "ゲスト"): ?>


  <li><?=$this->Html->link(__('商品を出品する'),['controller'=>'Products','action'=>'add']) ?></li>
  <li><?=$this->Html->link(__('出品した商品の確認'),['action'=>'home2']) ?></li>
  <li><?=$this->Html->link(__('購入した商品のダウンロード'),['controller'=>'Products','action'=>'これから作る']) ?></li>
  <li><?=$this->Html->link(__('ポイントを確認する'),['controller'=>'Products','action'=>'これから作る']) ?></li>
  <li><?=$this->Html->link(__('ユーザー情報の編集'),['controller'=>'Users','action'=>'edit']) ?></li>
  <li><?=$this->Html->link(__('ログアウト'),['controller'=>'Users','action'=>'logout'])?></li>
  </ul>
  </nav>
  </div>

<?php else: ?>


<li><?=$this->Html->link(__('ログイン'),['controller'=>'Users','action'=>'login'])?></li>
<li><?=$this->Html->link(__('新規会員登録'),['controller'=>'Users','action'=>'add']) ?></li>

</li>
<?php endif; ?>


<footer class="foot row">

  <a href="<?=$this->Url->build(['controller'=>'Top','action'=>'index']);?>" class="btn">&gt;ホーム</a>
  <a href="<?=$this->Url->build(['controller'=>'Top','action'=>'termofuse']);?>" class="btn">&gt;利用規約</a>
  <a href="<?=$this->Url->build(['controller'=>'Top','action'=>'aboutthisservice']);?>" class="btn">&gt;このサービスについて</a>
  <a href="<?=$this->Url->build(['controller'=>'Top','action'=>'frequentquestion']);?>" class="btn">&gt;よくある質問</a>
  <a href="<?=$this->Url->build(['controller'=>'Top','action'=>'news']);?>" class="btn">&gt;お知らせ</a>
  <a href="<?=$this->Url->build(['controller'=>'Top','action'=>'privacypolicy']);?>" class="btn">&gt;プライバシーポリシー</a>
  <h5>copyright 2018 yuki-serizawa.<h5>
</footer>
</body>

</html>
