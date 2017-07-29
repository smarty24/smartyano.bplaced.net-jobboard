<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $job->id],
                ['confirm' => __('Are you sure you want to delete {0}?', $job->title)] )  ?>     
        </li>
        <li><?= $this->Html->link(__('Preview'), ['action' => 'view', $job->id]) ?></li>
       
        
    </ul>
</nav>
<div class="jobs form large-8 medium-8 columns content">
    <?= $this->Form->create($job) ?>
    <fieldset>
        <legend><?= __('Edit Job') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('description', ['rows'=>'15']);
            echo $this->Form->control('company_name');
            echo $this->Form->control('postal_code');
            echo $this->Form->control('city');
            echo $this->Form->control('begin_date');
            echo $this->Form->hidden('token');
            echo $this->Form->hidden('poster_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        
    </ul>
</nav>