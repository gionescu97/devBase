<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Crew $crew
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Crew'), ['action' => 'edit', $crew->event_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Crew'), ['action' => 'delete', $crew->event_id], ['confirm' => __('Are you sure you want to delete # {0}?', $crew->event_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Crews'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Crew'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="crews view content">
            <h3><?= h($crew->event_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Dramaevent') ?></th>
                    <td><?= $crew->has('dramaevent') ? $this->Html->link($crew->dramaevent->id, ['controller' => 'Dramaevents', 'action' => 'view', $crew->dramaevent->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Person') ?></th>
                    <td><?= $crew->has('person') ? $this->Html->link($crew->person->id, ['controller' => 'Persons', 'action' => 'view', $crew->person->id]) : '' ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
