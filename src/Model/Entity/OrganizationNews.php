<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OrganizationNews Entity
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $organization_id
 * @property string|null $title
 * @property string|null $body
 * @property \Cake\I18n\FrozenDate|null $publication_date
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Organization $organization
 */
class OrganizationNews extends Entity
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
        'user_id' => true,
        'organization_id' => true,
        'title' => true,
        'body' => true,
        'publication_date' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'organization' => true,
    ];
}
