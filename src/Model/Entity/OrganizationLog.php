<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OrganizationLog Entity
 *
 * @property int $id
 * @property int|null $organization_id
 * @property int|null $user_id
 * @property int|null $type
 * @property string|null $url
 * @property string|null $message
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Organization $organization
 * @property \App\Model\Entity\User $user
 */
class OrganizationLog extends Entity
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
        'organization_id' => true,
        'user_id' => true,
        'type' => true,
        'url' => true,
        'message' => true,
        'created' => true,
        'modified' => true,
        'organization' => true,
        'user' => true,
    ];
}
