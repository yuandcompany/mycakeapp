<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product[]|\Cake\Collection\CollectionInterface $products
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Product'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="products index large-9 medium-8 columns content">
    <h3><?= __('Products') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('productname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tag1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tag2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tag3') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tag4') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tag5') ?></th>
                <th scope="col"><?= $this->Paginator->sort('upload_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('img1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('img2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('img3') ?></th>
                <th scope="col"><?= $this->Paginator->sort('explanation') ?></th>
                <th scope="col"><?= $this->Paginator->sort('r18') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $this->Number->format($product->id) ?></td>
                <td><?= $product->has('user') ? $this->Html->link($product->user->id, ['controller' => 'Users', 'action' => 'view', $product->user->id]) : '' ?></td>
                <td><?= h($product->productname) ?></td>
                <td><?= $this->Number->format($product->category) ?></td>
                <td><?= h($product->tag1) ?></td>
                <td><?= h($product->tag2) ?></td>
                <td><?= h($product->tag3) ?></td>
                <td><?= h($product->tag4) ?></td>
                <td><?= h($product->tag5) ?></td>
                <td><?= h($product->upload_time) ?></td>
                <td><?= $this->Number->format($product->price) ?></td>
                <td><?= h($product->img1) ?></td>
                <td><?= h($product->img2) ?></td>
                <td><?= h($product->img3) ?></td>
                <td><?= h($product->explanation) ?></td>
                <td><?= h($product->r18) ?></td>
                <td><?= h($product->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $product->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
