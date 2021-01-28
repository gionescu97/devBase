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
            <?= $this->Html->link(__('List Diseaseareas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="diseaseareas form content">
            <?= $this->Form->create($diseasearea) ?>
            <fieldset>
                <legend><?= __('Add Diseasearea') ?></legend>
                <?php
                    echo $this->Form->control('title');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
