<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Authentication\PasswordHasher\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property int|null $group_id
 * @property int|null $active
 * @property string|null $full_name
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $identificator
 * @property string|null $slug
 * @property string|null $description
 * @property string|null $contact_phone
 * @property string|null $photo
 * @property string|null $username
 * @property string|null $email
 * @property string|null $password
 * @property int|null $email_verified
 * @property int|null $welcome_email
 * @property string|null $last_account
 * @property string|null $api_key
 * @property string|null $api_key_plain
 * @property string|null $user_hash
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Group $group
 * @property \App\Model\Entity\ChargeUser[] $charge_users
 * @property \App\Model\Entity\Charge[] $charges
 * @property \App\Model\Entity\Event[] $events
 * @property \App\Model\Entity\Expense[] $expenses
 * @property \App\Model\Entity\Income[] $incomes
 * @property \App\Model\Entity\InventoryItem[] $inventory_items
 * @property \App\Model\Entity\OrganizationInvitation[] $organization_invitations
 * @property \App\Model\Entity\OrganizationLog[] $organization_logs
 * @property \App\Model\Entity\OrganizationNews[] $organization_news
 * @property \App\Model\Entity\OrganizationSurveyAnswer[] $organization_survey_answers
 * @property \App\Model\Entity\OrganizationSurvey[] $organization_surveys
 * @property \App\Model\Entity\Page[] $pages
 * @property \App\Model\Entity\Payment[] $payments
 * @property \App\Model\Entity\Post[] $posts
 * @property \App\Model\Entity\SocialProfile[] $social_profiles
 * @property \App\Model\Entity\Subuser[] $subusers
 * @property \App\Model\Entity\EventActivity[] $event_activities
 * @property \App\Model\Entity\EventElement[] $event_elements
 * @property \App\Model\Entity\Organization[] $organizations
 * @property \App\Model\Entity\School[] $schools
 */
class User extends Entity
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
        'group_id' => true,
        'active' => true,
        'full_name' => true,
        'first_name' => true,
        'last_name' => true,
        'identificator' => true,
        'slug' => true,
        'description' => true,
        'contact_phone' => true,
        'photo' => true,
        'username' => true,
        'email' => true,
        'password' => true,
        'email_verified' => true,
        'welcome_email' => true,
        'last_account' => true,
        'api_key' => true,
        'api_key_plain' => true,
        'user_hash' => true,
        'created' => true,
        'modified' => true,
        'group' => true,
        'charge_users' => true,
        'charges' => true,
        'events' => true,
        'expenses' => true,
        'incomes' => true,
        'inventory_items' => true,
        'organization_invitations' => true,
        'organization_logs' => true,
        'organization_news' => true,
        'organization_survey_answers' => true,
        'organization_surveys' => true,
        'pages' => true,
        'payments' => true,
        'posts' => true,
        'social_profiles' => true,
        'subusers' => true,
        'event_activities' => true,
        'event_elements' => true,
        'organizations' => true,
        'schools' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected $_hidden = [
        'password',
    ];

    // Automatically hash passwords when they are changed.
    protected function _setPassword(string $password)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($password);
    }
}
