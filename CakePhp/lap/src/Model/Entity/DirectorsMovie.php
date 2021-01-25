<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DirectorsMovie Entity
 *
 * @property int $id
 * @property int $movie_id
 * @property int $person_id
 *
 * @property \App\Model\Entity\Movie $movie
 * @property \App\Model\Entity\Person $person
 */
class DirectorsMovie extends Entity
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
        'movie_id' => true,
        'person_id' => true,
        'movie' => true,
        'person' => true,
    ];
}