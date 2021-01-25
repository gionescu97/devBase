<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SupplierMovie $supplierMovie
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Supplier Movie'), ['action' => 'edit', $supplierMovie->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Supplier Movie'), ['action' => 'delete', $supplierMovie->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supplierMovie->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Supplier Movies'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Supplier Movie'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="supplierMovies view content">
            <h3><?= h($supplierMovie->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Supplier') ?></th>
                    <td><?= $supplierMovie->has('supplier') ? $this->Html->link($supplierMovie->supplier->title, ['controller' => 'Suppliers', 'action' => 'view', $supplierMovie->supplier->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Movie') ?></th>
                    <td><?= $supplierMovie->has('movie') ? $this->Html->link($supplierMovie->movie->title, ['controller' => 'Movies', 'action' => 'view', $supplierMovie->movie->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($supplierMovie->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
