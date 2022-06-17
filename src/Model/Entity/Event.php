<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Event Entity
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $organization_id
 * @property \Cake\I18n\FrozenDate|null $initial_date
 * @property \Cake\I18n\FrozenDate|null $final_date
 * @property string|null $place
 * @property string|null $description
 * @property int|null $active
 * @property int|null $participants
 * @property int|null $user_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property \Cake\I18n\Time|null $initial_hour
 * @property \Cake\I18n\Time|null $final_hour
 *
 * @property \App\Model\Entity\Organization $organization
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\EventActivity[] $event_activities
 * @property \App\Model\Entity\EventElement[] $event_elements
 * @property \App\Model\Entity\EventElementsUser[] $event_elements_users
 */
class Event extends Entity
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
        'organization_id' => true,
        'initial_date' => true,
        'final_date' => true,
        'place' => true,
        'description' => true,
        'active' => true,
        'participants' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'initial_hour' => true,
        'final_hour' => true,
        'organization' => true,
        'user' => true,
        'event_activities' => true,
        'event_elements' => true,
        'event_elements_users' => true,
    ];
}
