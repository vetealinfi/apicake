<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MeliCategory Entity
 *
 * @property int $id
 * @property string|null $meli_id
 * @property int|null $parent_id
 * @property string|null $name
 * @property string|null $picture
 * @property string|null $permalink
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\Meli $meli
 * @property \App\Model\Entity\ParentMeliCategory $parent_meli_category
 * @property \App\Model\Entity\ChildMeliCategory[] $child_meli_categories
 */
class MeliCategory extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'meli_id' => true,
        'parent_id' => true,
        'name' => true,
        'picture' => true,
        'permalink' => true,
        'modified' => true,
        'created' => true,
        'meli' => true,
        'parent_meli_category' => true,
        'child_meli_categories' => true,
    ];
}
