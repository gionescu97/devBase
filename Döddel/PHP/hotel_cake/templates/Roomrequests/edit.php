<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Roomrequest $roomrequest
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $roomrequest->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $roomrequest->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Roomrequests'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="roomrequests form content">
            <?= $this->Form->create($roomrequest) ?>
            <fieldset>
                <legend><?= __('Edit Roomrequest') ?></legend>
                <?php
                    echo $this->Form->control('fname');
                    echo $this->Form->control('lname');
                    echo $this->Form->control('email');
                    echo $this->Form->control('special_request');
                    echo $this->Form->control('arrival');
                    echo $this->Form->control('nights_stayed');
                    echo $this->Form->control('title_id', ['options' => $titles]);
                    echo $this->Form->control('gender_id', ['options' => $genders]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
