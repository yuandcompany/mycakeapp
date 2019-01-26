<!doctype html>


<h3>新着商品</h3>

<table cellpadding="0" cellspacing="0">
<thead>
  <tr>
    <th class="main" scope = "col"><?=$this->Paginator->sort('name') ?></th>
    <th scope="col"><?=$this->Paginator->sort('price') ?></th>
    <th scope="col"><?=$this->Paginator->sort('upload_time') ?></th>
    <th scope="col" class="actions"><?=__('Actions') ?></th>
  </tr>
</thead>
<tbody>
  <?php foreach ($market as $product): ?>
    <tr>
      <td><?=h($product->productname) ?></td>
      <td><?=h($product->price) ?></td>
      <td><?=h($product->upload_time) ?></td>
    <td class="actions">
      <?=$this->Html->link(__('View'),['action'=>'view',$product->id]) ?>
    </td>
  </tr>
<?php endforeach; ?>
</tbody>
</table>

<div class="paginator">
  <ul class="pagination">
    <?=$this->Paginator->first('<<' . __('最初')) ?>
    <?=$this->Paginator->prev('<'.__('前へ')) ?>
    <?=$this->Paginator->numbers() ?>
    <?=$this->Paginator->next(__('次').'>') ?>
    <?=$this->Paginator->last(__('最後').'>>') ?>
  </ul>
</div>
