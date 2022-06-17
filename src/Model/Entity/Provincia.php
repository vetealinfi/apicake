<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Provincia Entity
 *
 * @property int $id
 * @property int|null $region_id
 * @property string|null $name
 * @property string|null $code
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Region $region
 * @property \App\Model\Entity\Comuna[] $comunas
 * @property \App\Model\Entity\School[] $schools
 */
class Provincia extends Entity
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
        'region_id' => true,
        'name' => true,
        'code' => true,
        'created' => true,
        'modified' => true,
        'region' => true,
        'comunas' => true,
        'schools' => true,
    ];
}
