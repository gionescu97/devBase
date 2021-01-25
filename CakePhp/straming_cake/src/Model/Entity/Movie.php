<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Movie Entity
 *
 * @property int $id
 * @property string $title
 * @property int $category_id
 * @property string|null $textshort
 * @property string|null $textlong
 * @property string|null $picture_url
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\SupplierMovie[] $supplier_movies
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
        'title' => true,
        'category_id' => true,
        'textshort' => true,
        'textlong' => true,
        'picture_url' => true,
        'category' => true,
        'supplier_movies' => true,
    ];
}
