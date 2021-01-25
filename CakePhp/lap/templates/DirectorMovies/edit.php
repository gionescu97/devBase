<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DirectorMovie $directorMovie
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $directorMovie->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $directorMovie->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Director Movies'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="directorMovies form content">
            <?= $this->Form->create($directorMovie) ?>
            <fieldset>
                <legend><?= __('Edit Director Movie') ?></legend>
                <?php
                    echo $this->Form->control('movie_id', ['options' => $movies]);
                    echo $this->Form->control('persons_id', ['options' => $persons]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
