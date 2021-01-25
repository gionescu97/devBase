<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Filme[]|\Cake\Collection\CollectionInterface $filme
 */
?>
<div class="filme index content">
    <?= $this->Html->link(__('New Filme'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Filme') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('kategorie_id') ?></th>
                    <th><?= $this->Paginator->sort('kurztext') ?></th>
                    <th><?= $this->Paginator->sort('langtext') ?></th>
                    <th><?= $this->Paginator->sort('bild_url') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($filme as $filme): ?>
                <tr>
                    <td><?= $this->Number->format($filme->id) ?></td>
                    <td><?= h($filme->title) ?></td>
                    <td><?= $filme->has('kategorien') ? $this->Html->link($filme->kategorien->title, ['controller' => 'Kategorien', 'action' => 'view', $filme->kategorien->id]) : '' ?></td>
                    <td><?= h($filme->kurztext) ?></td>
                    <td><?= h($filme->langtext) ?></td>
                    <td><?= h($filme->bild_url) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $filme->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $filme->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $filme->id], ['confirm' => __('Are you sure you want to delete # {0}?', $filme->id)]) ?>
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
