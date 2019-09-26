<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Perfomance Entity.
 *
 * @property int $id
 * @property float $challenge_id
 * @property \App\Model\Entity\Challenge $challenge
 * @property int $participant_id
 * @property \App\Model\Entity\Participant $participant
 * @property int $net_wpm
 * @property int $gross_wpm
 * @property int $accuracy
 * @property int $correct_words
 * @property int $incorrect_words
 * @property string $typed_list
 * @property string $mistake_list
 * @property float $minutes
 * @property bool $is_time_out
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Perfomance extends Entity
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
