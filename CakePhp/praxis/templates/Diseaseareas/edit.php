<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Diseasearea $diseasearea
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $diseasearea->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $diseasearea->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Diseaseareas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="diseaseareas form content">
            <?= $this->Form->create($diseasearea) ?>
            <fieldset>
                <legend><?= __('Edit Diseasearea') ?></legend>
                <?php
                    echo $this->Form->control('title');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
