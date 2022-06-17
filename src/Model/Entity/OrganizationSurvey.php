<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OrganizationSurvey Entity
 *
 * @property int $id
 * @property int|null $organization_id
 * @property int|null $organization_survey_type_id
 * @property int|null $user_id
 * @property \Cake\I18n\FrozenTime|null $due_date
 * @property string|null $title
 * @property string|null $photo
 * @property int|null $active
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\Organization $organization
 * @property \App\Model\Entity\OrganizationSurveyType $organization_survey_type
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\OrganizationSurveyAnswer[] $organization_survey_answers
 * @property \App\Model\Entity\OrganizationSurveyOption[] $organization_survey_options
 */
class OrganizationSurvey extends Entity
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
        'organization_id' => true,
        'organization_survey_type_id' => true,
        'user_id' => true,
        'due_date' => true,
        'title' => true,
        'photo' => true,
        'active' => true,
        'created' => true,
        'organization' => true,
        'organization_survey_type' => true,
        'user' => true,
        'organization_survey_answers' => true,
        'organization_survey_options' => true,
    ];
}
