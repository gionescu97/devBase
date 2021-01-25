<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AnbieterFilme $anbieterFilme
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Anbieter Filme'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="anbieterFilme form content">
            <?= $this->Form->create($anbieterFilme) ?>
            <fieldset>
                <legend><?= __('Add Anbieter Filme') ?></legend>
                <?php
                    echo $this->Form->control('anbieter_id', ['options' => $anbieter]);
                    echo $this->Form->control('film_id');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
