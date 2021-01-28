<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Diagnosis $diagnosis
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Diagnosis'), ['action' => 'edit', $diagnosis->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Diagnosis'), ['action' => 'delete', $diagnosis->id], ['confirm' => __('Are you sure you want to delete # {0}?', $diagnosis->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Diagnoses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Diagnosis'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="diagnoses view content">
            <h3><?= h($diagnosis->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($diagnosis->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Diseasearea') ?></th>
                    <td><?= $diagnosis->has('diseasearea') ? $this->Html->link($diagnosis->diseasearea->title, ['controller' => 'Diseaseareas', 'action' => 'view', $diagnosis->diseasearea->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($diagnosis->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Patients') ?></h4>
                <?php if (!empty($diagnosis->patients)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Firstname') ?></th>
                            <th><?= __('Lastname') ?></th>
                            <th><?= __('Birth') ?></th>
                            <th><?= __('Svnr') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($diagnosis->patients as $patients) : ?>
                        <tr>
                            <td><?= h($patients->id) ?></td>
                            <td><?= h($patients->firstname) ?></td>
                            <td><?= h($patients->lastname) ?></td>
                            <td><?= h($patients->birth) ?></td>
                            <td><?= h($patients->svnr) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Patients', 'action' => 'view', $patients->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Patients', 'action' => 'edit', $patients->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Patients', 'action' => 'delete', $patients->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patients->id)]) ?>
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
