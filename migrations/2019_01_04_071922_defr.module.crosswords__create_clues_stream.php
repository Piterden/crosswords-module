<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;
use Defr\CrosswordsModule\Word\WordModel;

class DefrModuleCrosswordsCreateCluesStream extends Migration
{

    /**
     * @var array
     */
    protected $fields = [
        'name' => [
            'namespace' => 'repeater',
            'type'      => 'anomaly.field_type.text',
        ],
        'word' => [
            'namespace' => 'repeater',
            'type'      => 'anomaly.field_type.relationship',
            'locked'    => false,
            'config'    => [
                'related' => WordModel::class,
            ],
        ],
    ];

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'namespace'    => 'repeater',
        'slug'         => 'clues',
        'title_column' => 'name',
        'searchable'   => true,
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'name' => [
            'required' => true,
        ],
        'word' => [
            'required' => true,
        ],
    ];

}
