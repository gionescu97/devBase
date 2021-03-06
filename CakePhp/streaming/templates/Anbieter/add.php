<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Anbieter $anbieter
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Anbieter'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="anbieter form content">
            <?= $this->Form->create($anbieter) ?>
            <fieldset>
                <legend><?= __('Add Anbieter') ?></legend>
                <?php
                    echo $this->Form->control('title');
                    echo $this->Form->control('url');
                    echo $this->Form->control('filme._ids', ['options' => $filme]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
