<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dramaevent $dramaevent
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $dramaevent->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $dramaevent->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Dramaevents'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="dramaevents form content">
            <?= $this->Form->create($dramaevent) ?>
            <fieldset>
                <legend><?= __('Edit Dramaevent') ?></legend>
                <?php
                    echo $this->Form->control('date');
                    echo $this->Form->control('drama_id', ['options' => $dramas]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
