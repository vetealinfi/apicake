<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Page Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $metatags
 * @property string|null $slug
 * @property string|null $body
 * @property string|null $photo
 * @property int|null $menu_id
 * @property int|null $type
 * @property int|null $site_id
 * @property int|null $in_home
 * @property int|null $user_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Menu $menu
 * @property \App\Model\Entity\Site $site
 * @property \App\Model\Entity\User $user
 */
class Page extends Entity
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
        'description' => true,
        'metatags' => true,
        'slug' => true,
        'body' => true,
        'photo' => true,
        'menu_id' => true,
        'type' => true,
        'site_id' => true,
        'in_home' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'menu' => true,
        'site' => true,
        'user' => true,
    ];
}
