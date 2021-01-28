<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Patient $patient
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Patient'), ['action' => 'edit', $patient->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Patient'), ['action' => 'delete', $patient->id], ['confirm' => __('Are you sure you want to delete # {0}?', $patient->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Patients'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Patient'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="patients view content">
            <h3><?= h($patient->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Firstname') ?></th>
                    <td><?= h($patient->firstname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Lastname') ?></th>
                    <td><?= h($patient->lastname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($patient->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Svnr') ?></th>
                    <td><?= $this->Number->format($patient->svnr) ?></td>
                </tr>
                <tr>
                    <th><?= __('Birth') ?></th>
                    <td><?= h($patient->birth) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Diagnoses') ?></h4>
                <?php if (!empty($patient->diagnoses)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Diseasearea Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($patient->diagnoses as $diagnoses) : ?>
                        <tr>
                            <td><?= h($diagnoses->id) ?></td>
                            <td><?= h($diagnoses->title) ?></td>
                            <td><?= h($diagnoses->diseasearea_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Diagnoses', 'action' => 'view', $diagnoses->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Diagnoses', 'action' => 'edit', $diagnoses->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Diagnoses', 'action' => 'delete', $diagnoses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $diagnoses->id)]) ?>
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
