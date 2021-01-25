<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ActorsMovie[]|\Cake\Collection\CollectionInterface $actorsMovies
 */
?>
<div class="actorsMovies index content">
    <?= $this->Html->link(__('New Actors Movie'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Actors Movies') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('movie_id') ?></th>
                    <th><?= $this->Paginator->sort('person_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($actorsMovies as $actorsMovie): ?>
                <tr>
                    <td><?= $this->Number->format($actorsMovie->id) ?></td>
                    <td><?= $actorsMovie->has('movie') ? $this->Html->link($actorsMovie->movie->id, ['controller' => 'Movies', 'action' => 'view', $actorsMovie->movie->id]) : '' ?></td>
                    <td><?= $actorsMovie->has('person') ? $this->Html->link($actorsMovie->person->id, ['controller' => 'Persons', 'action' => 'view', $actorsMovie->person->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $actorsMovie->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $actorsMovie->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $actorsMovie->id], ['confirm' => __('Are you sure you want to delete # {0}?', $actorsMovie->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
