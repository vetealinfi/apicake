<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OrganizationSurveyOption Entity
 *
 * @property int $id
 * @property int|null $organization_survey_id
 * @property string|null $option_value
 * @property string|null $photo
 * @property string|null $url
 * @property string|null $description
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\OrganizationSurvey $organization_survey
 * @property \App\Model\Entity\OrganizationSurveyAnswer[] $organization_survey_answers
 */
class OrganizationSurveyOption extends Entity
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
        'option_value' => true,
        'photo' => true,
        'url' => true,
        'description' => true,
        'created' => true,
        'modified' => true,
        'organization_survey' => true,
        'organization_survey_answers' => true,
    ];
}
