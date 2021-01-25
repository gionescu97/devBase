<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Genere $genere
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Genere'), ['action' => 'edit', $genere->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Genere'), ['action' => 'delete', $genere->id], ['confirm' => __('Are you sure you want to delete # {0}?', $genere->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Generes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Genere'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="generes view content">
            <h3><?= h($genere->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($genere->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($genere->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
