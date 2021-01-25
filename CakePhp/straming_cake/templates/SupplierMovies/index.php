<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SupplierMovie[]|\Cake\Collection\CollectionInterface $supplierMovies
 */
?>
<div class="supplierMovies index content">
    <?= $this->Html->link(__('New Supplier Movie'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Supplier Movies') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('supplier_id') ?></th>
                    <th><?= $this->Paginator->sort('movie_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($supplierMovies as $supplierMovie): ?>
                <tr>
                    <td><?= $this->Number->format($supplierMovie->id) ?></td>
                    <td><?= $supplierMovie->has('supplier') ? $this->Html->link($supplierMovie->supplier->title, ['controller' => 'Suppliers', 'action' => 'view', $supplierMovie->supplier->id]) : '' ?></td>
                    <td><?= $supplierMovie->has('movie') ? $this->Html->link($supplierMovie->movie->title, ['controller' => 'Movies', 'action' => 'view', $supplierMovie->movie->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $supplierMovie->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $supplierMovie->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $supplierMovie->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supplierMovie->id)]) ?>
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
