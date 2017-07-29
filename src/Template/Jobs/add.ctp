<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Jobs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="jobs form large-8 medium-8 columns content">
    <?= $this->Form->create($job) ?>
    <fieldset>
        <legend><?= __('Add Job') ?></legend>
        <?php
            $job->token = $this->request->getParam('_csrfToken');  //Create session from cookie variable   
            //Insert into Poster Table 
            echo $this->Form->hidden('poster.id');
            echo $this->Form->control('poster.name');
            echo $this->Form->control('poster.email');

            //Insert into Job Table
            echo $this->Form->control('id');
            echo $this->Form->control('title');
            echo $this->Form->control('description', ['rows' => '15']);
            echo $this->Form->control('company_name');
            echo $this->Form->control('postal_code');
            echo $this->Form->control('city');
            echo $this->Form->control('begin_date');
            echo $this->Form->hidden('token');
            echo $this->Form->hidden('poster_id', ['poster_id' => 'poster.id']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        
    </ul>
</nav>