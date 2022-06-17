<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Subuser Entity
 *
 * @property int $id
 * @property int|null $parent_id
 * @property int|null $user_id
 * @property int|null $organization_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\ParentSubuser $parent_subuser
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Organization $organization
 * @property \App\Model\Entity\ChildSubuser[] $child_subusers
 */
class Subuser extends Entity
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
        'parent_id' => true,
        'user_id' => true,
        'organization_id' => true,
        'created' => true,
        'modified' => true,
        'parent_subuser' => true,
        'user' => true,
        'organization' => true,
        'child_subusers' => true,
    ];
}
