<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OrganizationSurveyAnswer Entity
 *
 * @property int $id
 * @property int|null $organization_survey_id
 * @property int|null $organization_survey_option_id
 * @property int|null $user_id
 * @property string|null $body
 * @property string|null $answer_value
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\OrganizationSurvey $organization_survey
 * @property \App\Model\Entity\OrganizationSurveyOption $organization_survey_option
 * @property \App\Model\Entity\User $user
 */
class OrganizationSurveyAnswer extends Entity
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
        'organization_survey_id' => true,
        'organization_survey_option_id' => true,
        'user_id' => true,
        'body' => true,
        'answer_value' => true,
        'created' => true,
        'organization_survey' => true,
        'organization_survey_option' => true,
        'user' => true,
    ];
}
