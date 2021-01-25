<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dramaevent[]|\Cake\Collection\CollectionInterface $dramaevents
 */
?>
<div class="dramaevents index content">
    <?= $this->Html->link(__('New Dramaevent'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Dramaevents') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('date') ?></th>
                    <th><?= $this->Paginator->sort('drama_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dramaevents as $dramaevent): ?>
                <tr>
                    <td><?= $this->Number->format($dramaevent->id) ?></td>
                    <td><?= h($dramaevent->date) ?></td>
                    <td><?= $dramaevent->has('drama') ? $this->Html->link($dramaevent->drama->name, ['controller' => 'Dramas', 'action' => 'view', $dramaevent->drama->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $dramaevent->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $dramaevent->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $dramaevent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dramaevent->id)]) ?>
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
