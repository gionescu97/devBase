<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SearchLog[]|\Cake\Collection\CollectionInterface $searchLogs
 */
?>
<div class="searchLogs index content">
    <?= $this->Html->link(__('New Search Log'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Search Logs') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('type') ?></th>
                    <th><?= $this->Paginator->sort('text') ?></th>
                    <th><?= $this->Paginator->sort('time') ?></th>
                    <th><?= $this->Paginator->sort('records') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($searchLogs as $searchLog): ?>
                <tr>
                    <td><?= $this->Number->format($searchLog->id) ?></td>
                    <td><?= h($searchLog->type) ?></td>
                    <td><?= h($searchLog->text) ?></td>
                    <td><?= h($searchLog->time) ?></td>
                    <td><?= $this->Number->format($searchLog->records) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $searchLog->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $searchLog->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $searchLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $searchLog->id)]) ?>
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
