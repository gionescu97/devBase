<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Diagnosis[]|\Cake\Collection\CollectionInterface $diagnoses
 */
?>
<div class="diagnoses index content">
    <?= $this->Html->link(__('New Diagnosis'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Diagnoses') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('diseasearea_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($diagnoses as $diagnosis): ?>
                <tr>
                    <td><?= $this->Number->format($diagnosis->id) ?></td>
                    <td><?= h($diagnosis->title) ?></td>
                    <td><?= $diagnosis->has('diseasearea') ? $this->Html->link($diagnosis->diseasearea->title, ['controller' => 'Diseaseareas', 'action' => 'view', $diagnosis->diseasearea->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $diagnosis->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $diagnosis->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $diagnosis->id], ['confirm' => __('Are you sure you want to delete # {0}?', $diagnosis->id)]) ?>
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
