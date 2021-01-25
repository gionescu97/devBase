<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ActorsMovie $actorsMovie
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $actorsMovie->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $actorsMovie->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Actors Movies'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="actorsMovies form content">
            <?= $this->Form->create($actorsMovie) ?>
            <fieldset>
                <legend><?= __('Edit Actors Movie') ?></legend>
                <?php
                    echo $this->Form->control('movie_id', ['options' => $movies]);
                    echo $this->Form->control('person_id', ['options' => $persons]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
