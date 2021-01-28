<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DiagnosesPatientsFixture
 */
class DiagnosesPatientsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'visit' => ['type' => 'datetime', 'length' => null, 'precision' => null, 'null' => false, 'default' => null, 'comment' => ''],
        'patient_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'diagnosis_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_patients_has_diagnoses_diagnoses1_idx' => ['type' => 'index', 'columns' => ['diagnosis_id'], 'length' => []],
            'fk_patients_has_diagnoses_patients_idx' => ['type' => 'index', 'columns' => ['patient_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_patients_has_diagnoses_patients' => ['type' => 'foreign', 'columns' => ['patient_id'], 'references' => ['patients', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'fk_patients_has_diagnoses_diagnoses1' => ['type' => 'foreign', 'columns' => ['diagnosis_id'], 'references' => ['diagnoses', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'visit' => '2021-01-27 12:54:21',
                'patient_id' => 1,
                'diagnosis_id' => 1,
            ],
        ];
        parent::init();
    }
}
