<!DOCTYPE html>
<html>
<head>
<title><?= $title ?></title>
    <style>
    h1{font-size:48pt;
        margin: 0px 0px 10px 0px; padding: 0px 20px;color:red;
        background: linear-gradient(to right,#aaa,#fff);}
        p{font-size:14pt; color:#666}
        </style>


</head>
<body>

<p>this is people table records.</p>
<table>
  <thead><tr>
    <th>id</th><th>name</th><th>mail</th><th>age</th>
  </tr></thead>

  <?php foreach($data->toArray() as $obj): ?>
    <tr>
      <td><?=h($obj->id)?></td>
      <td><?=h($obj->name)?></td>
      <td><?=h($obj->mail)?></td>
      <td><?=h($obj->age)?></td>
    </tr>
  <?php endforeach; ?>
</table>
</body>
</html>
