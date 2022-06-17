<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SchoolsUser Entity
 *
 * @property int $id
 * @property int|null $school_id
 * @property int|null $user_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\School $school
 * @property \App\Model\Entity\User $user
 */
class SchoolsUser extends Entity
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
        'school_id' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'school' => true,
        'user' => true,
    ];
}
