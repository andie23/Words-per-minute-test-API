<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Challenge Entity.
 *
 * @property int $id
 * @property int $time_limit
 * @property string $paragraph
 * @property bool $is_active
 * @property int $created_by
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property string $title
 * @property \App\Model\Entity\Perfomance[] $perfomances
 */
class Challenge extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
