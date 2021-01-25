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
            <?= $this->Html->link(__('Edit Director Movie'), ['action' => 'edit', $directorMovie->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Director Movie'), ['action' => 'delete', $directorMovie->id], ['confirm' => __('Are you sure you want to delete # {0}?', $directorMovie->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Director Movies'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Director Movie'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="directorMovies view content">
            <h3><?= h($directorMovie->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Movie') ?></th>
                    <td><?= $directorMovie->has('movie') ? $this->Html->link($directorMovie->movie->id, ['controller' => 'Movies', 'action' => 'view', $directorMovie->movie->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Person') ?></th>
                    <td><?= $directorMovie->has('person') ? $this->Html->link($directorMovie->person->id, ['controller' => 'Persons', 'action' => 'view', $directorMovie->person->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($directorMovie->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
