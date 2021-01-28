<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DiagnosesPatient Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $visit
 * @property int $patient_id
 * @property int $diagnosis_id
 *
 * @property \App\Model\Entity\Patient $patient
 * @property \App\Model\Entity\Diagnosis $diagnosis
 */
class DiagnosesPatient extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'visit' => true,
        'patient_id' => true,
        'diagnosis_id' => true,
        'patient' => true,
        'diagnosis' => true,
    ];
}
