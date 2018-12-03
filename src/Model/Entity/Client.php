<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Client Entity
 *
 * @property int $id
 * @property string $name
 * @property string $firstname
 * @property string $phone
 * @property string $email
 * @property \Cake\I18n\FrozenDate $birthdate
 * @property bool $gender
 * @property \Cake\I18n\FrozenTime $creationdate
 */
class Client extends Entity
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
        'name' => true,
        'firstname' => true,
        'phone' => true,
        'email' => true,
        'birthdate' => true,
        'gender' => true,
        'artist' => true,
        'creationdate' => true,
        'rating' => true
    ];
}
