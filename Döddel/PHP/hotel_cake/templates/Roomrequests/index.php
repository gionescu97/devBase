<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Roomrequest[]|\Cake\Collection\CollectionInterface $roomrequests
 */
?>
<div class="roomrequests index content">
    <?= $this->Form->create() ?>
            <fieldset>
                <?php
                    echo $this->Form->control('search_string', ['div' => false, 'label' => false, 'placeholder' => 'search']);
                    echo $this->Form->control('Search', ['class' => 'button float-right', 'type' => 'submit', 'div' => false])
                ?>
            </fieldset>
        <?= $this->Form->end() ?>
    <h3><?= __('Roomrequests') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('fname') ?></th>
                    <th><?= $this->Paginator->sort('lname') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('special_request') ?></th>
                    <th><?= $this->Paginator->sort('arrival') ?></th>
                    <th><?= $this->Paginator->sort('nights_stayed') ?></th>
                    <th><?= $this->Paginator->sort('title_id') ?></th>
                    <th><?= $this->Paginator->sort('gender_id') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($roomrequests as $roomrequest): ?>
                <tr>
                    <td><?= h($roomrequest->fname) ?></td>
                    <td><?= h($roomrequest->lname) ?></td>
                    <td><?= h($roomrequest->email) ?></td>
                    <td><?= h($roomrequest->special_request) ?></td>
                    <td><?= h($roomrequest->arrival) ?></td>
                    <td><?= $this->Number->format($roomrequest->nights_stayed) ?></td>
                    <td><?= $roomrequest->has('title') ? $this->Html->link($roomrequest->title->title, ['controller' => 'Titles', 'action' => 'view', $roomrequest->title->id]) : '' ?></td>
                    <td><?= $roomrequest->has('gender') ? $this->Html->link($roomrequest->gender->gender, ['controller' => 'Genders', 'action' => 'view', $roomrequest->gender->id]) : '' ?></td>
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
