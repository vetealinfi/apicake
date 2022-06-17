<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CourseAccount Entity
 *
 * @property int $id
 * @property int|null $course_id
 * @property int|null $school_id
 * @property int|null $organization_id
 * @property string|null $year
 * @property string|null $letter
 * @property string|null $name_other
 * @property int|null $active
 * @property int|null $goal_to_raise
 * @property int|null $created_by
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Course $course
 * @property \App\Model\Entity\School $school
 * @property \App\Model\Entity\Organization $organization
 */
class CourseAccount extends Entity
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
        'course_id' => true,
        'school_id' => true,
        'organization_id' => true,
        'year' => true,
        'letter' => true,
        'name_other' => true,
        'active' => true,
        'goal_to_raise' => true,
        'created_by' => true,
        'created' => true,
        'modified' => true,
        'course' => true,
        'school' => true,
        'organization' => true,
    ];
}
