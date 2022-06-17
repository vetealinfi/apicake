<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Expense Entity
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $write_user_id
 * @property int|null $user_other
 * @property int|null $amount
 * @property int|null $description
 * @property int|null $organization_id
 * @property \Cake\I18n\FrozenDate|null $expense_date
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\WriteUser $write_user
 * @property \App\Model\Entity\Organization $organization
 */
class Expense extends Entity
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
        'write_user_id' => true,
        'user_other' => true,
        'amount' => true,
        'description' => true,
        'organization_id' => true,
        'expense_date' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'write_user' => true,
        'organization' => true,
    ];
}
