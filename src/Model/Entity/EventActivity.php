<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EventActivity Entity
 *
 * @property int $id
 * @property int|null $event_id
 * @property string|null $name
 * @property string|null $description
 * @property int|null $ready
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Event $event
 * @property \App\Model\Entity\User[] $users
 */
class EventActivity extends Entity
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
        'event_id' => true,
        'name' => true,
        'description' => true,
        'ready' => true,
        'created' => true,
        'modified' => true,
        'event' => true,
        'users' => true,
    ];
}
