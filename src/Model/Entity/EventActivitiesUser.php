<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EventActivitiesUser Entity
 *
 * @property int $id
 * @property int|null $event_activity_id
 * @property int|null $user_id
 * @property int|null $assigned_by
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\EventActivity $event_activity
 * @property \App\Model\Entity\User $user
 */
class EventActivitiesUser extends Entity
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
        'event_activity_id' => true,
        'user_id' => true,
        'assigned_by' => true,
        'created' => true,
        'modified' => true,
        'event_activity' => true,
        'user' => true,
    ];
}
