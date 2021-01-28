<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Patient Entity
 *
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property \Cake\I18n\FrozenDate $birth
 * @property int $svnr
 *
 * @property \App\Model\Entity\Diagnosis[] $diagnoses
 */
class Patient extends Entity
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
        'firstname' => true,
        'lastname' => true,
        'birth' => true,
        'svnr' => true,
        'diagnoses' => true,
    ];

    protected function _getName() {
        return $this->_fields['firstname'].' '.$this->_fields['lastname'];
    }
}
