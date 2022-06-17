<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * School Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $rol
 * @property string|null $rol_dv
 * @property int|null $region_id
 * @property int|null $provincia_id
 * @property int|null $comuna_id
 * @property int|null $school_type_id
 * @property int|null $secondary_school_type_id
 * @property int|null $rural
 * @property string|null $phone
 * @property string|null $cellphone
 * @property string|null $address
 * @property float|null $latitude
 * @property float|null $longitude
 * @property int|null $school_integration_programs
 * @property int|null $matricula
 * @property int|null $school_state_id
 * @property int|null $religion_orientation_id
 * @property string|null $religion_orientation_other
 * @property int|null $registration_payment_range_id
 * @property int|null $monthly_payment_range_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Region $region
 * @property \App\Model\Entity\Provincia $provincia
 * @property \App\Model\Entity\Comuna $comuna
 * @property \App\Model\Entity\SchoolType $school_type
 * @property \App\Model\Entity\SecondarySchoolType $secondary_school_type
 * @property \App\Model\Entity\SchoolState $school_state
 * @property \App\Model\Entity\ReligionOrientation $religion_orientation
 * @property \App\Model\Entity\RegistrationPaymentRange $registration_payment_range
 * @property \App\Model\Entity\MonthlyPaymentRange $monthly_payment_range
 * @property \App\Model\Entity\CourseAccount[] $course_accounts
 * @property \App\Model\Entity\EducationType[] $education_types
 * @property \App\Model\Entity\User[] $users
 */
class School extends Entity
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
        'rol' => true,
        'rol_dv' => true,
        'region_id' => true,
        'provincia_id' => true,
        'comuna_id' => true,
        'school_type_id' => true,
        'secondary_school_type_id' => true,
        'rural' => true,
        'phone' => true,
        'cellphone' => true,
        'address' => true,
        'latitude' => true,
        'longitude' => true,
        'school_integration_programs' => true,
        'matricula' => true,
        'school_state_id' => true,
        'religion_orientation_id' => true,
        'religion_orientation_other' => true,
        'registration_payment_range_id' => true,
        'monthly_payment_range_id' => true,
        'created' => true,
        'modified' => true,
        'region' => true,
        'provincia' => true,
        'comuna' => true,
        'school_type' => true,
        'secondary_school_type' => true,
        'school_state' => true,
        'religion_orientation' => true,
        'registration_payment_range' => true,
        'monthly_payment_range' => true,
        'course_accounts' => true,
        'education_types' => true,
        'users' => true,
    ];
}
