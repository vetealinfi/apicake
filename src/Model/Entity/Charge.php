<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Charge Entity
 *
 * @property int $id
 * @property int|null $charge_type_id
 * @property string|null $name
 * @property string|null $description
 * @property int|null $amount
 * @property int|null $extensibility
 * @property int|null $active
 * @property int|null $user_id
 * @property \Cake\I18n\FrozenDate|null $initial_date
 * @property \Cake\I18n\FrozenDate|null $final_date
 * @property int|null $organization_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\ChargeType $charge_type
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Organization $organization
 * @property \App\Model\Entity\ChargeUser[] $charge_users
 * @property \App\Model\Entity\Payment[] $payments
 */
class Charge extends Entity
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
        'charge_type_id' => true,
        'name' => true,
        'description' => true,
        'amount' => true,
        'extensibility' => true,
        'mandatory' => true,
        'active' => true,
        'user_id' => true,
        'initial_date' => true,
        'final_date' => true,
        'organization_id' => true,
        'created' => true,
        'modified' => true,
        'charge_type' => true,
        'user' => true,
        'organization' => true,
        'charge_users' => true,
        'payments' => true,
    ];
}
