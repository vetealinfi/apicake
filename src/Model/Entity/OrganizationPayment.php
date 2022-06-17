<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OrganizationPayment Entity
 *
 * @property int $id
 * @property int|null $organization_payment_type_id
 * @property int|null $organization_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\OrganizationPaymentType $organization_payment_type
 * @property \App\Model\Entity\Organization $organization
 */
class OrganizationPayment extends Entity
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
        'organization_payment_type_id' => true,
        'organization_id' => true,
        'created' => true,
        'modified' => true,
        'organization_payment_type' => true,
        'organization' => true,
    ];
}
