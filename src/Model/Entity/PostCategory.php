<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PostCategory Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $slug
 * @property string|null $photo
 * @property string|null $description
 * @property int|null $parent_id
 * @property int|null $lft
 * @property int|null $rght
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\ParentPostCategory $parent_post_category
 * @property \App\Model\Entity\ChildPostCategory[] $child_post_categories
 * @property \App\Model\Entity\Post[] $posts
 */
class PostCategory extends Entity
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
        'name' => true,
        'slug' => true,
        'photo' => true,
        'description' => true,
        'parent_id' => true,
        'lft' => true,
        'rght' => true,
        'created' => true,
        'modified' => true,
        'parent_post_category' => true,
        'child_post_categories' => true,
        'posts' => true,
    ];
}
