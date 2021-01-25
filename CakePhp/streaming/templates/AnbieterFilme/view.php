<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AnbieterFilme $anbieterFilme
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Anbieter Filme'), ['action' => 'edit', $anbieterFilme->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Anbieter Filme'), ['action' => 'delete', $anbieterFilme->id], ['confirm' => __('Are you sure you want to delete # {0}?', $anbieterFilme->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Anbieter Filme'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Anbieter Filme'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="anbieterFilme view content">
            <h3><?= h($anbieterFilme->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Anbieter') ?></th>
                    <td><?= $anbieterFilme->has('anbieter') ? $this->Html->link($anbieterFilme->anbieter->title, ['controller' => 'Anbieter', 'action' => 'view', $anbieterFilme->anbieter->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($anbieterFilme->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Film Id') ?></th>
                    <td><?= $this->Number->format($anbieterFilme->film_id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
