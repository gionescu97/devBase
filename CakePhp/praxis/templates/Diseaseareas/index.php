<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Diseasearea[]|\Cake\Collection\CollectionInterface $diseaseareas
 */
?>
<div class="diseaseareas index content">
    <?= $this->Html->link(__('New Diseasearea'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Diseaseareas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($diseaseareas as $diseasearea): ?>
                <tr>
                    <td><?= $this->Number->format($diseasearea->id) ?></td>
                    <td><?= h($diseasearea->title) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $diseasearea->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $diseasearea->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $diseasearea->id], ['confirm' => __('Are you sure you want to delete # {0}?', $diseasearea->id)]) ?>
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
