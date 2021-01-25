<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Kategorien $kategorien
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $kategorien->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $kategorien->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Kategorien'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="kategorien form content">
            <?= $this->Form->create($kategorien) ?>
            <fieldset>
                <legend><?= __('Edit Kategorien') ?></legend>
                <?php
                    echo $this->Form->control('title');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
