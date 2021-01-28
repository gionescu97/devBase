<?php

/**
 * @var \App\View\AppView $this
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="diagnosesPatients form content">
            <?= $this->Form->create() ?>
            <fieldset>
                <legend><?= __('Search patient diagnosis') ?></legend>
                <?php
                echo $this->Form->control('patient_id', ['type' => 'text', 'label' => 'PatientID', 'placeholder' => 'e.g.: 1']);
                ?>

                <label for="gender">Period</label>
                <?php
                echo $this->Form->radio('period', [
                    ['value' => 'this_month', 'text' => ' this month'],
                    ['value' => 'last_month', 'text' => ' last month'],
                    ['value' => 'all_periods', 'text' => ' all treatment periods']
                ], [
                    'value' => $period
                ]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Search')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<?php if (isset($diagnosesPatients)) : ?>
    <?php if (count($diagnosesPatients) > 0) : ?>
        <div class="row">
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th><?= $this->Paginator->sort('patient_id') ?></th>
                            <th><?= $this->Paginator->sort('diagnosearea_id') ?></th>
                            <th><?= $this->Paginator->sort('diagnosis_id') ?></th>
                            <th><?= $this->Paginator->sort('visit') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($diagnosesPatients as $diagnosesPatient) : ?>
                            <tr>
                                <td><?= $diagnosesPatient->has('patient') ? $this->Html->link($diagnosesPatient->patient->name, ['controller' => 'Patients', 'action' => 'view', $diagnosesPatient->patient->id]) : '' ?></td>
                                <td><?= $diagnosesPatient->diagnosis->has('diseasearea') ? $this->Html->link($diagnosesPatient->diagnosis->diseasearea->title, ['controller' => 'Diseaseareas', 'action' => 'view', $diagnosesPatient->diagnosis->diseasearea->id]) : '' ?></td>
                                <td><?= $diagnosesPatient->has('diagnosis') ? $this->Html->link($diagnosesPatient->diagnosis->title, ['controller' => 'Diagnoses', 'action' => 'view', $diagnosesPatient->diagnosis->id]) : '' ?></td>
                                <td><?= h($diagnosesPatient->visit->format('Y-m-d h:m:s')) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

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
    <?php else : ?>
        <div class="row">
            <h2>Kein Patient mit ID <?= $patientId ?> <?php if (isset($date)) {echo "in " . $date->i18nFormat('Y MMMM'); } ?> gefunden.
        </div>
    <?php endif; ?>
<?php endif; ?>