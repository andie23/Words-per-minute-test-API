<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ScoresFixture
 *
 */
class ScoresFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'participant' => ['type' => 'string', 'length' => 145, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'points' => ['type' => 'decimal', 'length' => 14, 'precision' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'wpm' => ['type' => 'decimal', 'length' => 14, 'precision' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'accuracy' => ['type' => 'decimal', 'length' => 14, 'precision' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'time' => ['type' => 'decimal', 'length' => 14, 'precision' => 4, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        '_options' => [
            'engine' => null,
            'collation' => null
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'participant' => 'Lorem ipsum dolor sit amet',
            'points' => '',
            'wpm' => '',
            'accuracy' => '',
            'time' => ''
        ],
    ];
}
