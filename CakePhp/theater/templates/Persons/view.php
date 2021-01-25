<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person $person
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Person'), ['action' => 'edit', $person->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Person'), ['action' => 'delete', $person->id], ['confirm' => __('Are you sure you want to delete # {0}?', $person->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Persons'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Person'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="persons view content">
            <h3><?= h($person->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Fname') ?></th>
                    <td><?= h($person->fname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nname') ?></th>
                    <td><?= h($person->nname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sex') ?></th>
                    <td><?= h($person->sex) ?></td>
                </tr>
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= $person->has('role') ? $this->Html->link($person->role->name, ['controller' => 'Roles', 'action' => 'view', $person->role->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($person->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Birthdate') ?></th>
                    <td><?= h($person->birthdate) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Crews') ?></h4>
                <?php if (!empty($person->crews)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Event Id') ?></th>
                            <th><?= __('Person Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($person->crews as $crews) : ?>
                        <tr>
                            <td><?= h($crews->event_id) ?></td>
                            <td><?= h($crews->person_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Crews', 'action' => 'view', $crews->event_id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Crews', 'action' => 'edit', $crews->event_id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Crews', 'action' => 'delete', $crews->event_id], ['confirm' => __('Are you sure you want to delete # {0}?', $crews->event_id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Dramas') ?></h4>
                <?php if (!empty($person->dramas)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Genere Id') ?></th>
                            <th><?= __('Person Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($person->dramas as $dramas) : ?>
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
