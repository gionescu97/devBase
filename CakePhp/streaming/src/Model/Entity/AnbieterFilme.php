<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AnbieterFilme Entity
 *
 * @property int $id
 * @property int $anbieter_id
 * @property int $film_id
 *
 * @property \App\Model\Entity\Anbieter $anbieter
 * @property \App\Model\Entity\Film $film
 */
class AnbieterFilme extends Entity
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
        'anbieter_id' => true,
        'film_id' => true,
        'anbieter' => true,
        'film' => true,
    ];
}
