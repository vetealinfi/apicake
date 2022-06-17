<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Payment Entity
 *
 * @property int $id
 * @property int|null $total_payment
 * @property int|null $amount_payed
 * @property \Cake\I18n\FrozenTime|null $payed_date
 * @property int|null $user_id
 * @property int|null $charge_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Charge $charge
 */
class Payment extends Entity
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
        'total_payment' => true,
        'amount_payed' => true,
        'payed_date' => true,
        'user_id' => true,
        'charge_id' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'charge' => true,
    ];
}
