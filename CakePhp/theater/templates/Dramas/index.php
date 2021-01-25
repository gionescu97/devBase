<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Drama[]|\Cake\Collection\CollectionInterface $dramas
 */
?>
<div class="dramas index content">
    <?= $this->Html->link(__('New Drama'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Dramas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('genere_id') ?></th>
                    <th><?= $this->Paginator->sort('person_id') ?></th>
                    <th><?= $this->Paginator->sort('datetime') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dramas as $drama): ?>
                <tr>
                    <td><?= $this->Number->format($drama->id) ?></td>
                    <td><?= h($drama->name) ?></td>
                    <td><?= $drama->has('genere') ? $this->Html->link($drama->genere->name, ['controller' => 'Generes', 'action' => 'view', $drama->genere->id]) : '' ?></td>
                    <td><?= $drama->has('person') ? $this->Html->link($drama->person->name, ['controller' => 'Persons', 'action' => 'view', $drama->person->id]) : '' ?></td>
                    <td>
                    <?php foreach ($drama->dramaevents as $dramaevent): ?>
                    <?= h($dramaevent->datetime) ?><br>
                    <?php endforeach; ?>
                    </td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $drama->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $drama->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $drama->id], ['confirm' => __('Are you sure you want to delete # {0}?', $drama->id)]) ?>
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
