<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * InventoryItem Entity
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $inventory_item_type_id
 * @property int|null $inventory_id
 * @property int|null $quantity
 * @property int|null $user_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\InventoryItemType $inventory_item_type
 * @property \App\Model\Entity\Inventory $inventory
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\InventoryItemLog[] $inventory_item_logs
 */
class InventoryItem extends Entity
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
        'inventory_item_type_id' => true,
        'inventory_id' => true,
        'quantity' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'inventory_item_type' => true,
        'inventory' => true,
        'user' => true,
        'inventory_item_logs' => true,
    ];
}
