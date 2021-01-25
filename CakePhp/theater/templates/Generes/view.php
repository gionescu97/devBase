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
            <div class="related">
                <h4><?= __('Related Dramas') ?></h4>
                <?php if (!empty($genere->dramas)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Genere Id') ?></th>
                            <th><?= __('Person Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($genere->dramas as $dramas) : ?>
                        <tr>
                            <td><?= h($dramas->id) ?></td>
                            <td><?= h($dramas->name) ?></td>
                            <td><?= h($dramas->genere_id) ?></td>
                            <td><?= h($dramas->person_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Dramas', 'action' => 'view', $dramas->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Dramas', 'action' => 'edit', $dramas->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Dramas', 'action' => 'delete', $dramas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dramas->id)]) ?>
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
