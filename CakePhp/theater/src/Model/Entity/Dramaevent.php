<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Dramaevent Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $date
 * @property int $drama_id
 *
 * @property \App\Model\Entity\Drama $drama
 */
class Dramaevent extends Entity
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
        'datetime' => true,
        'drama_id' => true,
        'drama' => true,
    ];
}
