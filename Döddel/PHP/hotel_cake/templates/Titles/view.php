<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Title $title
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Title'), ['action' => 'edit', $title->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Title'), ['action' => 'delete', $title->id], ['confirm' => __('Are you sure you want to delete # {0}?', $title->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Titles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Title'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="titles view content">
            <h3><?= h($title->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($title->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($title->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Roomrequests') ?></h4>
                <?php if (!empty($title->roomrequests)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Fname') ?></th>
                            <th><?= __('Lname') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Special Request') ?></th>
                            <th><?= __('Arrival') ?></th>
                            <th><?= __('Nights Stayed') ?></th>
                            <th><?= __('Title Id') ?></th>
                            <th><?= __('Gender Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($title->roomrequests as $roomrequests) : ?>
                        <tr>
                            <td><?= h($roomrequests->id) ?></td>
                            <td><?= h($roomrequests->fname) ?></td>
                            <td><?= h($roomrequests->lname) ?></td>
                            <td><?= h($roomrequests->email) ?></td>
                            <td><?= h($roomrequests->special_request) ?></td>
                            <td><?= h($roomrequests->arrival) ?></td>
                            <td><?= h($roomrequests->nights_stayed) ?></td>
                            <td><?= h($roomrequests->title_id) ?></td>
                            <td><?= h($roomrequests->gender_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Roomrequests', 'action' => 'view', $roomrequests->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Roomrequests', 'action' => 'edit', $roomrequests->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Roomrequests', 'action' => 'delete', $roomrequests->id], ['confirm' => __('Are you sure you want to delete # {0}?', $roomrequests->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
