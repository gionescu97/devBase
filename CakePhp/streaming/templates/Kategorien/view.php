<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Kategorien $kategorien
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Kategorien'), ['action' => 'edit', $kategorien->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Kategorien'), ['action' => 'delete', $kategorien->id], ['confirm' => __('Are you sure you want to delete # {0}?', $kategorien->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Kategorien'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Kategorien'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="kategorien view content">
            <h3><?= h($kategorien->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($kategorien->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($kategorien->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
