<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="products view large-9 medium-8 columns content">
    <h3><?= h($product->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $product->has('user') ? $this->Html->link($product->user->id, ['controller' => 'Users', 'action' => 'view', $product->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Productname') ?></th>
            <td><?= h($product->productname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tag1') ?></th>
            <td><?= h($product->tag1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tag2') ?></th>
            <td><?= h($product->tag2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tag3') ?></th>
            <td><?= h($product->tag3) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tag4') ?></th>
            <td><?= h($product->tag4) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tag5') ?></th>
            <td><?= h($product->tag5) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Img1') ?></th>
            <td><?= h($product->img1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Img2') ?></th>
            <td><?= h($product->img2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Img3') ?></th>
            <td><?= h($product->img3) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Explanation') ?></th>
            <td><?= h($product->explanation) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($product->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= $this->Number->format($product->category) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($product->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Upload Time') ?></th>
            <td><?= h($product->upload_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($product->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('R18') ?></th>
            <td><?= $product->r18 ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
