<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Movie[]|\Cake\Collection\CollectionInterface $movies
 */
?>
<div class="movies index content">
    <?= $this->Html->link(__('New Movie'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Movies') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('title_1') ?></th>
                    <th><?= $this->Paginator->sort('title_2') ?></th>
                    <th><?= $this->Paginator->sort('premiere') ?></th>
                    <th><?= $this->Paginator->sort('generes_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($movies as $movie): ?>
                <tr>
                    <td><?= $this->Number->format($movie->id) ?></td>
                    <td><?= h($movie->title_1) ?></td>
                    <td><?= h($movie->title_2) ?></td>
                    <td><?= h($movie->premiere) ?></td>
                    <td><?= $movie->has('genere') ? $this->Html->link($movie->genere->name, ['controller' => 'Generes', 'action' => 'view', $movie->genere->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $movie->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $movie->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $movie->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movie->id)]) ?>
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
