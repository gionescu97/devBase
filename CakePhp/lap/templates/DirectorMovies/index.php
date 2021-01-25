<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DirectorMovie[]|\Cake\Collection\CollectionInterface $directorMovies
 */
?>
<div class="directorMovies index content">
    <?= $this->Html->link(__('New Director Movie'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Director Movies') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('movie_id') ?></th>
                    <th><?= $this->Paginator->sort('persons_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($directorMovies as $directorMovie): ?>
                <tr>
                    <td><?= $this->Number->format($directorMovie->id) ?></td>
                    <td><?= $directorMovie->has('movie') ? $this->Html->link($directorMovie->movie->id, ['controller' => 'Movies', 'action' => 'view', $directorMovie->movie->id]) : '' ?></td>
                    <td><?= $directorMovie->has('person') ? $this->Html->link($directorMovie->person->id, ['controller' => 'Persons', 'action' => 'view', $directorMovie->person->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $directorMovie->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $directorMovie->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $directorMovie->id], ['confirm' => __('Are you sure you want to delete # {0}?', $directorMovie->id)]) ?>
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
