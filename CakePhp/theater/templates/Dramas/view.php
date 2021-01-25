<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Drama $drama
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Drama'), ['action' => 'edit', $drama->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Drama'), ['action' => 'delete', $drama->id], ['confirm' => __('Are you sure you want to delete # {0}?', $drama->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Dramas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Drama'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="dramas view content">
            <h3><?= h($drama->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($drama->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Genere') ?></th>
                    <td><?= $drama->has('genere') ? $this->Html->link($drama->genere->name, ['controller' => 'Generes', 'action' => 'view', $drama->genere->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Person') ?></th>
                    <td><?= $drama->has('person') ? $this->Html->link($drama->person->id, ['controller' => 'Persons', 'action' => 'view', $drama->person->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($drama->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Dramaevents') ?></h4>
                <?php if (!empty($drama->dramaevents)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Date') ?></th>
                            <th><?= __('Drama Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($drama->dramaevents as $dramaevents) : ?>
                        <tr>
                            <td><?= h($dramaevents->id) ?></td>
                            <td><?= h($dramaevents->date) ?></td>
                            <td><?= h($dramaevents->drama_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Dramaevents', 'action' => 'view', $dramaevents->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Dramaevents', 'action' => 'edit', $dramaevents->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Dramaevents', 'action' => 'delete', $dramaevents->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dramaevents->id)]) ?>
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
