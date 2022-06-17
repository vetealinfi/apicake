<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Income Entity
 *
 * @property int $id
 * @property int|null $organization_id
 * @property int|null $user_id
 * @property int|null $amount
 * @property string|null $motive
 * @property string|null $description
 * @property \Cake\I18n\FrozenDate|null $income_date
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\Organization $organization
 * @property \App\Model\Entity\User $user
 */
class Income extends Entity
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
        'amount' => true,
        'motive' => true,
        'description' => true,
        'income_date' => true,
        'created' => true,
        'organization' => true,
        'user' => true,
    ];
}
