<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Job[]|\Cake\Collection\CollectionInterface $jobs
  */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Got offer?') ?></li>
        <li><?= $this->Html->link(__('New Job'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="jobs index large-10 medium-8 columns content">
    <h3><?= __('Latest Job Posting') ?></h3>
    
    <table>
   
    <!-- first row of the table "Header" -->
        <tr>
            <th width="10%">Job ID</th>
            <th width="50%">Job Title</th>
            <th width="20%">City</th>
            <th width="20%">Posted</th>
        </tr>  

        <!--loop through the job table and list all available jobs -->
        <?php foreach($jobs as $job): ?>
        <tr>
            <td><?= $job->id ?> </td>
            <td>
            <?= $this->Html->link($job->title, ['action' => 'view', $job->id]) ?>
            </td>
            <td><?= $job->city ?></td>
            <td>
            <?= $job->posted->format('d.m.Y') ?>
            </td>
        </tr>

<?php endforeach; ?>
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
