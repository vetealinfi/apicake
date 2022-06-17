<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Comuna Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $code
 * @property int|null $region_id
 * @property int|null $provincia_id
 * @property string|null $region_name_from_2000
 * @property string|null $region_code_from_2000
 * @property string|null $region_name_from_2008
 * @property string|null $region_code_from_2008
 * @property string|null $provincia_name_from_2000
 * @property string|null $provincia_code_from_2000
 * @property string|null $provincia_name_from_2008
 * @property string|null $provincia_code_from_2008
 * @property string|null $provincia_name_from_2010
 * @property string|null $provincia_code_from_2010
 * @property string|null $comuna_code_to_1999
 * @property string|null $comuna_code_from_2000
 * @property string|null $comuna_code_from_2008
 * @property string|null $comuna_code_from_2010
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Region $region
 * @property \App\Model\Entity\Provincia $provincia
 * @property \App\Model\Entity\School[] $schools
 */
class Comuna extends Entity
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
        'code' => true,
        'region_id' => true,
        'provincia_id' => true,
        'region_name_from_2000' => true,
        'region_code_from_2000' => true,
        'region_name_from_2008' => true,
        'region_code_from_2008' => true,
        'provincia_name_from_2000' => true,
        'provincia_code_from_2000' => true,
        'provincia_name_from_2008' => true,
        'provincia_code_from_2008' => true,
        'provincia_name_from_2010' => true,
        'provincia_code_from_2010' => true,
        'comuna_code_to_1999' => true,
        'comuna_code_from_2000' => true,
        'comuna_code_from_2008' => true,
        'comuna_code_from_2010' => true,
        'created' => true,
        'modified' => true,
        'region' => true,
        'provincia' => true,
        'schools' => true,
    ];
}
