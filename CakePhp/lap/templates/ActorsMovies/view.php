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
            <?= $this->Html->link(__('Edit Actors Movie'), ['action' => 'edit', $actorsMovie->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Actors Movie'), ['action' => 'delete', $actorsMovie->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actorsMovie->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Actors Movies'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Actors Movie'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="actorsMovies view content">
            <h3><?= h($actorsMovie->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Movie') ?></th>
                    <td><?= $actorsMovie->has('movie') ? $this->Html->link($actorsMovie->movie->id, ['controller' => 'Movies', 'action' => 'view', $actorsMovie->movie->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Person') ?></th>
                    <td><?= $actorsMovie->has('person') ? $this->Html->link($actorsMovie->person->id, ['controller' => 'Persons', 'action' => 'view', $actorsMovie->person->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($actorsMovie->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
