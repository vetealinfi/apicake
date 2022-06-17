<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OrganizationInvitation Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $email
 * @property int|null $organization_id
 * @property int|null $user_id
 * @property int|null $state
 * @property int|null $is_admin
 * @property string|null $slug
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Organization $organization
 * @property \App\Model\Entity\User $user
 */
class OrganizationInvitation extends Entity
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
        'email' => true,
        'organization_id' => true,
        'user_id' => true,
        'state' => true,
        'is_admin' => true,
        'slug' => true,
        'created' => true,
        'modified' => true,
        'organization' => true,
        'user' => true,
    ];
}
