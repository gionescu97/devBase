<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dramaevent $dramaevent
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Dramaevent'), ['action' => 'edit', $dramaevent->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Dramaevent'), ['action' => 'delete', $dramaevent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dramaevent->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Dramaevents'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Dramaevent'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="dramaevents view content">
            <h3><?= h($dramaevent->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Drama') ?></th>
                    <td><?= $dramaevent->has('drama') ? $this->Html->link($dramaevent->drama->name, ['controller' => 'Dramas', 'action' => 'view', $dramaevent->drama->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($dramaevent->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($dramaevent->date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
