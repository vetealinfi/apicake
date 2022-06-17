<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EducationTypesSchool Entity
 *
 * @property int $id
 * @property int|null $school_id
 * @property int|null $education_type_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\School $school
 * @property \App\Model\Entity\EducationType $education_type
 */
class EducationTypesSchool extends Entity
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
        'education_type_id' => true,
        'created' => true,
        'modified' => true,
        'school' => true,
        'education_type' => true,
    ];
}
