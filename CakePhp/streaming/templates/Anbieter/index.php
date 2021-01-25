<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Anbieter[]|\Cake\Collection\CollectionInterface $anbieter
 */
?>
<div class="anbieter index content">
    <?= $this->Html->link(__('New Anbieter'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Anbieter') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('url') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($anbieter as $anbieter): ?>
                <tr>
                    <td><?= $this->Number->format($anbieter->id) ?></td>
                    <td><?= h($anbieter->title) ?></td>
                    <td><?= h($anbieter->url) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $anbieter->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $anbieter->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $anbieter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $anbieter->id)]) ?>
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
