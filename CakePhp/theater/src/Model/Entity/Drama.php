<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Drama Entity
 *
 * @property int $id
 * @property string $name
 * @property int $genere_id
 * @property int $person_id
 *
 * @property \App\Model\Entity\Genere $genere
 * @property \App\Model\Entity\Person $person
 * @property \App\Model\Entity\Dramaevent[] $dramaevents
 */
class Drama extends Entity
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
        'name' => true,
        'genere_id' => true,
        'person_id' => true,
        'genere' => true,
        'person' => true,
        'dramaevents' => true,
    ];
}
