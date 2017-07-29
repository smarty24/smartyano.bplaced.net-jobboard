<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Poster $poster
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Poster'), ['action' => 'edit', $poster->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Poster'), ['action' => 'delete', $poster->id], ['confirm' => __('Are you sure you want to delete # {0}?', $poster->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Posters'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Poster'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="posters view large-9 medium-8 columns content">
    <h3><?= h($poster->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($poster->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($poster->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($poster->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($poster->created) ?></td>
        </tr>
    </table>
</div>
