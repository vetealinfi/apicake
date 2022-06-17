<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Post Entity
 *
 * @property int $id
 * @property string|null $title
 * @property \Cake\I18n\FrozenDate|null $publishing_date
 * @property string|null $slug
 * @property string|null $body
 * @property string|null $description
 * @property string|null $photo
 * @property int|null $user_id
 * @property int|null $post_category_id
 * @property int|null $post_parent_id
 * @property int|null $post_type_id
 * @property string|null $post_type_detail
 * @property int|null $gallery_id
 * @property int|null $highlight
 * @property string|null $post_products
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\PostCategory $post_category
 * @property \App\Model\Entity\PostParent $post_parent
 * @property \App\Model\Entity\PostType $post_type
 * @property \App\Model\Entity\Gallery $gallery
 * @property \App\Model\Entity\Tag[] $tags
 */
class Post extends Entity
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
        'title' => true,
        'publishing_date' => true,
        'slug' => true,
        'body' => true,
        'description' => true,
        'photo' => true,
        'user_id' => true,
        'post_category_id' => true,
        'post_parent_id' => true,
        'post_type_id' => true,
        'post_type_detail' => true,
        'gallery_id' => true,
        'highlight' => true,
        'post_products' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'post_category' => true,
        'post_parent' => true,
        'post_type' => true,
        'gallery' => true,
        'tags' => true,
    ];
}
