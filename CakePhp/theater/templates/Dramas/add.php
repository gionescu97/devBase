<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Drama $drama
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Dramas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="dramas form content">
            <?= $this->Form->create($drama) ?>
            <fieldset>
                <legend><?= __('Add Drama') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('genere_id', ['options' => $generes]);
                    echo $this->Form->control('person_id', ['options' => $persons]);
                    echo $this->Form->control('datetime', ['type' => 'datetime-local']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
