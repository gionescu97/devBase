<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Filme $filme
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Filme'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="filme form content">
            <?= $this->Form->create($filme) ?>
            <fieldset>
                <legend><?= __('Add Filme') ?></legend>
                <?php
                    echo $this->Form->control('title');
                    echo $this->Form->control('kategorie_id', ['options' => $kategorien]);
                    echo $this->Form->control('kurztext');
                    echo $this->Form->control('langtext');
                    echo $this->Form->control('bild_url');
                    echo $this->Form->control('anbieter._ids', ['options' => $anbieter]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
