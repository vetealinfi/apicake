<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SocialProfile Entity
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $provider
 * @property string|resource $access_token
 * @property string $identifier
 * @property string|null $username
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $full_name
 * @property string|null $email
 * @property string|null $birth_date
 * @property string|null $gender
 * @property string|null $picture_url
 * @property bool $email_verified
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 */
class SocialProfile extends Entity
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
        'user_id' => true,
        'provider' => true,
        'access_token' => true,
        'identifier' => true,
        'username' => true,
        'first_name' => true,
        'last_name' => true,
        'full_name' => true,
        'email' => true,
        'birth_date' => true,
        'gender' => true,
        'picture_url' => true,
        'email_verified' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
    ];
}
