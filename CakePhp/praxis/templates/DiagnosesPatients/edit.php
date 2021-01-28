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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $diagnosesPatient->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $diagnosesPatient->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Diagnoses Patients'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="diagnosesPatients form content">
            <?= $this->Form->create($diagnosesPatient) ?>
            <fieldset>
                <legend><?= __('Edit Diagnoses Patient') ?></legend>
                <?php
                    echo $this->Form->control('visit');
                    echo $this->Form->control('patient_id', ['options' => $patients]);
                    echo $this->Form->control('diagnosis_id', ['options' => $diagnoses]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
