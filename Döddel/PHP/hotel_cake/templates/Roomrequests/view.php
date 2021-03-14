<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Roomrequest $roomrequest
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Roomrequest'), ['action' => 'edit', $roomrequest->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Roomrequest'), ['action' => 'delete', $roomrequest->id], ['confirm' => __('Are you sure you want to delete # {0}?', $roomrequest->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Roomrequests'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Roomrequest'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="roomrequests view content">
            <h3><?= h($roomrequest->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Fname') ?></th>
                    <td><?= h($roomrequest->fname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Lname') ?></th>
                    <td><?= h($roomrequest->lname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($roomrequest->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Special Request') ?></th>
                    <td><?= h($roomrequest->special_request) ?></td>
                </tr>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= $roomrequest->has('title') ? $this->Html->link($roomrequest->title->title, ['controller' => 'Titles', 'action' => 'view', $roomrequest->title->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Gender') ?></th>
                    <td><?= $roomrequest->has('gender') ? $this->Html->link($roomrequest->gender->id, ['controller' => 'Genders', 'action' => 'view', $roomrequest->gender->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($roomrequest->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nights Stayed') ?></th>
                    <td><?= $this->Number->format($roomrequest->nights_stayed) ?></td>
                </tr>
                <tr>
                    <th><?= __('Arrival') ?></th>
                    <td><?= h($roomrequest->arrival) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
