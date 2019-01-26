<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<!doctype html>
<h2>会員情報の入力</h2>

<?php
////////////////////ここから下までは別サイト（https://www.ritolab.com/entry/70#a_02）からもってきたので、コントローラーとかみあってない
//////////add_doneメソッドを作ってそこに飛ぶ仕様にするか
  // フォーム開始
  echo $this -> Form -> create (
                "Users", [ "type" => "post",
                          "url" => [ "controller" => "Users",
                                     "action" => "add" ] ] );

  // hidden の生成
  //echo $this->Form->control('test', ['type' => 'hidden', 'value' => 12345]);



  // 一般的なテキスト入力
  echo $this->Form->control('username', ['label' => 'ユーザー名','required' => true]);
  echo $this->Form->control('mail', ['label' => 'メールアドレス','required' => true]);
  echo $this->Form->control('password', ['label' => 'パスワード（半角英数字・7文字以上）','required' => true]);
  //birthday
 echo $this->Form->control('birth_at', [
   'type' => 'datetime',
   'label' => '生年月日',
   'required' => true,
   'monthNames' => false,
   'minYear' => date('Y')-70,
   'maxYear' => date('Y'),
 ]);




  // ラジオボタン
  echo $this->Form->control('gender', [
    'type' => 'radio',
    'label' => '性別',
    'required' => true,
    'options' => [
      1 => '男性',
      2 => '女性',
      3 => 'その他'
    ],
  ]);


  // 送信ボタン
  echo $this->Form->submit('送信');

  // フォーム終了
  echo $this->Form->end();
