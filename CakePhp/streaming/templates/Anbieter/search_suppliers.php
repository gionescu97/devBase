<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Anbieter $anbieter
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Anbieter'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="anbieter form content">

            <?= $this->Form->create(null, ['type' => 'post', 'url' => [
                'controller' => 'Anbieter',
                'action' => 'search_suppliers'
            ]]) ?>
            <fieldset>
                <legend><?= __('Suche durchführen') ?></legend>
                <input type="text" id="search_word" name="search_word", maxlength="25">
            </fieldset>
            <?php
            
            ?>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('url') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($foundedSuppliers as $anbieter): ?>
                <tr>
                    <td><?= $this->Number->format($anbieter->id) ?></td>
                    <td><?= h($anbieter->title) ?></td>
                    <td><?= h($anbieter->url) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $anbieter->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $anbieter->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $anbieter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $anbieter->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
