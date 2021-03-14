<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Productionfirm[]|\Cake\Collection\CollectionInterface $productionfirms
 */
?>
<div class="productionfirms index content">
    <?= $this->Html->link(__('New Productionfirm'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Productionfirms') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productionfirms as $productionfirm): ?>
                <tr>
                    <td><?= $this->Number->format($productionfirm->id) ?></td>
                    <td><?= h($productionfirm->description) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $productionfirm->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productionfirm->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productionfirm->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productionfirm->id)]) ?>
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
