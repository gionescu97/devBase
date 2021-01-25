<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SearchLog $searchLog
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Search Log'), ['action' => 'edit', $searchLog->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Search Log'), ['action' => 'delete', $searchLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $searchLog->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Search Logs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Search Log'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="searchLogs view content">
            <h3><?= h($searchLog->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= h($searchLog->type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Text') ?></th>
                    <td><?= h($searchLog->text) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($searchLog->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Records') ?></th>
                    <td><?= $this->Number->format($searchLog->records) ?></td>
                </tr>
                <tr>
                    <th><?= __('Time') ?></th>
                    <td><?= h($searchLog->time) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
