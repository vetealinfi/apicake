<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Organization Entity
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $organization_type_id
 * @property int|null $organization_state_id
 * @property string|null $about
 * @property string|null $slug
 * @property int|null $goal_amount
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\OrganizationType $organization_type
 * @property \App\Model\Entity\OrganizationState $organization_state
 * @property \App\Model\Entity\Charge[] $charges
 * @property \App\Model\Entity\CourseAccount[] $course_accounts
 * @property \App\Model\Entity\Event[] $events
 * @property \App\Model\Entity\Expense[] $expenses
 * @property \App\Model\Entity\Income[] $incomes
 * @property \App\Model\Entity\Inventory[] $inventories
 * @property \App\Model\Entity\OrganizationInvitation[] $organization_invitations
 * @property \App\Model\Entity\OrganizationLog[] $organization_logs
 * @property \App\Model\Entity\OrganizationNews[] $organization_news
 * @property \App\Model\Entity\OrganizationPayment[] $organization_payments
 * @property \App\Model\Entity\OrganizationSurvey[] $organization_surveys
 * @property \App\Model\Entity\Subuser[] $subusers
 * @property \App\Model\Entity\User[] $users
 */
class Organization extends Entity
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
        'organization_type_id' => true,
        'organization_state_id' => true,
        'about' => true,
        'slug' => true,
        'goal_amount' => true,
        'created' => true,
        'modified' => true,
        'organization_type' => true,
        'organization_state' => true,
        'charges' => true,
        'course_accounts' => true,
        'events' => true,
        'expenses' => true,
        'incomes' => true,
        'inventories' => true,
        'organization_invitations' => true,
        'organization_logs' => true,
        'organization_news' => true,
        'organization_payments' => true,
        'organization_surveys' => true,
        'subusers' => true,
        'users' => true,
    ];
}
