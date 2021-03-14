<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Roomrequest Entity
 *
 * @property int $id
 * @property string $fname
 * @property string $lname
 * @property string $email
 * @property string|null $special_request
 * @property \Cake\I18n\FrozenTime $arrival
 * @property int $nights_stayed
 * @property int $title_id
 * @property int $gender_id
 *
 * @property \App\Model\Entity\Title $title
 * @property \App\Model\Entity\Gender $gender
 */
class Roomrequest extends Entity
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
        'lname' => true,
        'email' => true,
        'special_request' => true,
        'arrival' => true,
        'nights_stayed' => true,
        'title_id' => true,
        'gender_id' => true,
        'title' => true,
        'gender' => true,
    ];
}
