<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Job $job
  */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Jobs'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="jobs view large-8 medium-8 columns content">
    <div class="row">
        <h4><?= __($job->title) ?></h4>
        <?= $this->Text->autoParagraph(h($job->description)); ?>
    </div>
    <h5><?= __('<strong>Information to posted job description</strong>') ?></h5>
    <ul class="center">
        <li><?= __('<strong>Company Name: </strong>') . h($job->company_name) ?></li>
        <li><?= __('<strong>City: </strong>') . h($job->city) ?></li>
        <li><?= __('<strong>Postal Code: </strong>') . h($job->postal_code) ?></li>
        <li><?= __('<strong>Posted on: </strong>') . h($job->posted->format('d.m.Y')) ?></li>
        <li><?= __('<strong>Begin Date: </strong>') . h($job->begin_date->format('d.m.Y')) ?></li>
    </ul>
<br />
<br />
<br />
</div>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        
    </ul>
</nav>
