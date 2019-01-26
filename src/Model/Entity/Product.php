<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $productname
 * @property int $category
 * @property string $tag1
 * @property string $tag2
 * @property string $tag3
 * @property string $tag4
 * @property string $tag5
 * @property \Cake\I18n\FrozenTime $upload_time
 * @property int $price
 * @property string $img1
 * @property string $img2
 * @property string $img3
 * @property string $explanation
 * @property bool $r18
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\User $user
 */
class Product extends Entity
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
        'user_id' => true,
        'productname' => true,
        'category' => true,
        'tag1' => true,
        'tag2' => true,
        'tag3' => true,
        'tag4' => true,
        'tag5' => true,
        'upload_time' => true,
        'price' => true,
        'img1' => true,
        'img2' => true,
        'img3' => true,
        'explanation' => true,
        'r18' => true,
        'created' => true,
        'user' => true
    ];
}
