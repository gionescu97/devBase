<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SearchLog $searchLog
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $searchLog->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $searchLog->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Search Logs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="searchLogs form content">
            <?= $this->Form->create($searchLog) ?>
            <fieldset>
                <legend><?= __('Edit Search Log') ?></legend>
                <?php
                    echo $this->Form->control('type');
                    echo $this->Form->control('text');
                    echo $this->Form->control('time', ['empty' => true]);
                    echo $this->Form->control('records');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
