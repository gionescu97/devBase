<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Filme Entity
 *
 * @property int $id
 * @property string $title
 * @property int $kategorie_id
 * @property string|null $kurztext
 * @property string|null $langtext
 * @property string|null $bild_url
 *
 * @property \App\Model\Entity\Kategorien $kategorien
 * @property \App\Model\Entity\Anbieter[] $anbieter
 */
class Filme extends Entity
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
        'title' => true,
        'kategorie_id' => true,
        'kurztext' => true,
        'langtext' => true,
        'bild_url' => true,
        'kategorien' => true,
        'anbieter' => true,
    ];
}
