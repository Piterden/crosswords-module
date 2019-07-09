<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;
use Defr\CrosswordsModule\WordEn\WordEnModel;

class DefrModuleCrosswordsCreateClueEnsStream extends Migration
{

    /**
     * @var array
     */
    protected $fields = [
        'name' => [
            'namespace' => 'repeater',
            'type'      => 'anomaly.field_type.text',
        ],
        'word_en' => [
            'namespace' => 'repeater',
            'type'      => 'anomaly.field_type.relationship',
            'locked'    => false,
            'config'    => [
                'related' => WordEnModel::class,
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
        'slug'         => 'clue_ens',
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
        'word_en' => [
            'required' => true,
        ],
    ];

}
