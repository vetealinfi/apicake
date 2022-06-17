<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * InventoryItemLog Entity
 *
 * @property int $id
 * @property int|null $inventory_item_id
 * @property int|null $user1_id
 * @property int|null $user2_id
 * @property string|null $detail
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\InventoryItem $inventory_item
 * @property \App\Model\Entity\User1 $user1
 * @property \App\Model\Entity\User2 $user2
 */
class InventoryItemLog extends Entity
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
        'inventory_item_id' => true,
        'user1_id' => true,
        'user2_id' => true,
        'detail' => true,
        'created' => true,
        'modified' => true,
        'inventory_item' => true,
        'user1' => true,
        'user2' => true,
    ];
}
