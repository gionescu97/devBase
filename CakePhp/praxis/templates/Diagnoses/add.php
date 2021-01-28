<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Diagnosis $diagnosis
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Diagnoses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="diagnoses form content">
            <?= $this->Form->create($diagnosis) ?>
            <fieldset>
                <legend><?= __('Add Diagnosis') ?></legend>
                <?php
                    echo $this->Form->control('title');
                    echo $this->Form->control('diseasearea_id', ['options' => $diseaseareas]);
                    echo $this->Form->control('patients._ids', ['options' => $patients]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
