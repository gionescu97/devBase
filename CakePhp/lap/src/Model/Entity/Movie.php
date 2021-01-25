<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Movie Entity
 *
 * @property int $id
 * @property string $title_1
 * @property string|null $title_2
 * @property \Cake\I18n\FrozenDate $premiere
 * @property int $generes_id
 *
 * @property \App\Model\Entity\Genere $genere
 * @property \App\Model\Entity\ActorsMovie[] $actors_movies
 * @property \App\Model\Entity\DirectorMovie[] $director_movies
 */
class Movie extends Entity
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
        'title_1' => true,
        'title_2' => true,
        'premiere' => true,
        'generes_id' => true,
        'genere' => true,
        'actors_movies' => true,
        'directors_movies' => true,
    ];
}
