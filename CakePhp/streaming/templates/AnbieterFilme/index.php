<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AnbieterFilme[]|\Cake\Collection\CollectionInterface $anbieterFilme
 */
?>
<div class="anbieterFilme index content">
    <?= $this->Html->link(__('New Anbieter Filme'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Anbieter Filme') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('anbieter_id') ?></th>
                    <th><?= $this->Paginator->sort('film_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($anbieterFilme as $anbieterFilme): ?>
                <tr>
                    <td><?= $this->Number->format($anbieterFilme->id) ?></td>
                    <td><?= $anbieterFilme->has('anbieter') ? $this->Html->link($anbieterFilme->anbieter->title, ['controller' => 'Anbieter', 'action' => 'view', $anbieterFilme->anbieter->id]) : '' ?></td>
                    <td><?= $this->Number->format($anbieterFilme->film_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $anbieterFilme->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $anbieterFilme->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $anbieterFilme->id], ['confirm' => __('Are you sure you want to delete # {0}?', $anbieterFilme->id)]) ?>
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
