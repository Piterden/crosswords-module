<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;
use Defr\CrosswordsModule\Clue\ClueModel;
use Defr\CrosswordsModule\Crossword\CrosswordModel;

class DefrModuleCrosswordsCreateCrosswordsFields extends Migration
{

    /**
     * The addon fields.
     *
     * @var array
     */
    protected $fields = [
        'name'         => 'anomaly.field_type.text',
        'description'  => 'anomaly.field_type.markdown',
        'blanks'       => 'anomaly.field_type.textarea',
        'direction'    => 'anomaly.field_type.boolean',
        'published_at' => 'anomaly.field_type.datetime',
        'word'         => 'anomaly.field_type.text',
        'slug'         => [
            'type'   => 'anomaly.field_type.slug',
            'config' => [
                'slugify' => 'name',
                'type'    => '_',
            ],
        ],
        'width'        => [
            'type'   => 'anomaly.field_type.integer',
            'config' => [
                'min' => 1,
            ],
        ],
        'height'       => [
            'type'   => 'anomaly.field_type.integer',
            'config' => [
                'min' => 1,
            ],
        ],
        'x'            => [
            'type'   => 'anomaly.field_type.integer',
            'config' => [
                'min' => 1,
            ],
        ],
        'y'            => [
            'type'   => 'anomaly.field_type.integer',
            'config' => [
                'min' => 1,
            ],
        ],
        'clue'         => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'mode'    => 'lookup',
                'related' => ClueModel::class,
            ],
        ],
        'crossword'    => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'mode'    => 'lookup',
                'related' => CrosswordModel::class,
            ],
        ],
    ];

}
