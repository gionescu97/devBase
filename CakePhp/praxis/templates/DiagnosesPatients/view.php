<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DiagnosesPatient $diagnosesPatient
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Diagnoses Patient'), ['action' => 'edit', $diagnosesPatient->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Diagnoses Patient'), ['action' => 'delete', $diagnosesPatient->id], ['confirm' => __('Are you sure you want to delete # {0}?', $diagnosesPatient->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Diagnoses Patients'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Diagnoses Patient'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="diagnosesPatients view content">
            <h3><?= h($diagnosesPatient->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Patient') ?></th>
                    <td><?= $diagnosesPatient->has('patient') ? $this->Html->link($diagnosesPatient->patient->id, ['controller' => 'Patients', 'action' => 'view', $diagnosesPatient->patient->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Diagnosis') ?></th>
                    <td><?= $diagnosesPatient->has('diagnosis') ? $this->Html->link($diagnosesPatient->diagnosis->title, ['controller' => 'Diagnoses', 'action' => 'view', $diagnosesPatient->diagnosis->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($diagnosesPatient->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Visit') ?></th>
                    <td><?= h($diagnosesPatient->visit) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
