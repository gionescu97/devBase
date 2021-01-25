<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Person Entity
 *
 * @property int $id
 * @property string|null $fname
 * @property string $nname
 * @property \Cake\I18n\FrozenDate $birthdate
 * @property string $sex
 * @property int $role_id
 *
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\Crew[] $crews
 * @property \App\Model\Entity\Drama[] $dramas
 */
class Person extends Entity
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
        'fname' => true,
        'nname' => true,
        'birthdate' => true,
        'sex' => true,
        'role_id' => true,
        'role' => true,
        'crews' => true,
        'dramas' => true,
    ];

    protected function _getName() {
        return $this->_fields['fname'].' ('.$this->_fields['nname'].')';
    }
}
