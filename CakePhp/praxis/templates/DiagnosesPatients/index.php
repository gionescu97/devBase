<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DiagnosesPatient[]|\Cake\Collection\CollectionInterface $diagnosesPatients
 */
?>
<div class="diagnosesPatients index content">
    <?= $this->Html->link(__('New Diagnoses Patient'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Diagnoses Patients') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('visit') ?></th>
                    <th><?= $this->Paginator->sort('patient_id') ?></th>
                    <th><?= $this->Paginator->sort('diagnosis_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($diagnosesPatients as $diagnosesPatient): ?>
                <tr>
                    <td><?= $this->Number->format($diagnosesPatient->id) ?></td>
                    <td><?= h($diagnosesPatient->visit) ?></td>
                    <td><?= $diagnosesPatient->has('patient') ? $this->Html->link($diagnosesPatient->patient->id, ['controller' => 'Patients', 'action' => 'view', $diagnosesPatient->patient->id]) : '' ?></td>
                    <td><?= $diagnosesPatient->has('diagnosis') ? $this->Html->link($diagnosesPatient->diagnosis->title, ['controller' => 'Diagnoses', 'action' => 'view', $diagnosesPatient->diagnosis->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $diagnosesPatient->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $diagnosesPatient->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $diagnosesPatient->id], ['confirm' => __('Are you sure you want to delete # {0}?', $diagnosesPatient->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
