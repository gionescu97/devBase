<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Genere[]|\Cake\Collection\CollectionInterface $generes
 */
?>
<div class="generes index content">
    <?= $this->Html->link(__('New Genere'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Generes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($generes as $genere): ?>
                <tr>
                    <td><?= $this->Number->format($genere->id) ?></td>
                    <td><?= h($genere->name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $genere->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $genere->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $genere->id], ['confirm' => __('Are you sure you want to delete # {0}?', $genere->id)]) ?>
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
