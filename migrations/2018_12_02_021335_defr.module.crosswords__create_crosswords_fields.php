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
        'answer'       => 'anomaly.field_type.text',
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
        'clues'        => [
            'type'   => 'anomaly.field_type.repeater',
            'config' => [
                'related' => ClueModel::class,
                // 'manage'  => false,
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
        'length'       => [
            'type'   => 'anomaly.field_type.integer',
            'config' => [
                'min' => 1,
                'max' => 31,
            ],
        ],
        'letter_1'     => [
            'type'   => 'anomaly.field_type.text',
            'config' => [
                'min' => 1,
                'max' => 1,
            ],
        ],
        'letter_2'     => [
            'type'   => 'anomaly.field_type.text',
            'config' => [
                'min' => 1,
                'max' => 1,
            ],
        ],
        'letter_3'     => [
            'type'   => 'anomaly.field_type.text',
            'config' => [
                'min' => 1,
                'max' => 1,
            ],
        ],
        'letter_4'     => [
            'type'   => 'anomaly.field_type.text',
            'config' => [
                'min' => 1,
                'max' => 1,
            ],
        ],
        'letter_5'     => [
            'type'   => 'anomaly.field_type.text',
            'config' => [
                'min' => 1,
                'max' => 1,
            ],
        ],
        'letter_6'     => [
            'type'   => 'anomaly.field_type.text',
            'config' => [
                'min' => 1,
                'max' => 1,
            ],
        ],
        'letter_7'     => [
            'type'   => 'anomaly.field_type.text',
            'config' => [
                'min' => 1,
                'max' => 1,
            ],
        ],
        'letter_8'     => [
            'type'   => 'anomaly.field_type.text',
            'config' => [
                'min' => 1,
                'max' => 1,
            ],
        ],
        'letter_9'     => [
            'type'   => 'anomaly.field_type.text',
            'config' => [
                'min' => 1,
                'max' => 1,
            ],
        ],
        'letter_10'    => [
            'type'   => 'anomaly.field_type.text',
            'config' => [
                'min' => 1,
                'max' => 1,
            ],
        ],
        'letter_11'    => [
            'type'   => 'anomaly.field_type.text',
            'config' => [
                'min' => 1,
                'max' => 1,
            ],
        ],
        'letter_12'    => [
            'type'   => 'anomaly.field_type.text',
            'config' => [
                'min' => 1,
                'max' => 1,
            ],
        ],
        'letter_13'    => [
            'type'   => 'anomaly.field_type.text',
            'config' => [
                'min' => 1,
                'max' => 1,
            ],
        ],
        'letter_14'    => [
            'type'   => 'anomaly.field_type.text',
            'config' => [
                'min' => 1,
                'max' => 1,
            ],
        ],
        'letter_15'    => [
            'type'   => 'anomaly.field_type.text',
            'config' => [
                'min' => 1,
                'max' => 1,
            ],
        ],
        'letter_16'    => [
            'type'   => 'anomaly.field_type.text',
            'config' => [
                'min' => 1,
                'max' => 1,
            ],
        ],
        'letter_17'    => [
            'type'   => 'anomaly.field_type.text',
            'config' => [
                'min' => 1,
                'max' => 1,
            ],
        ],
        'letter_18'    => [
            'type'   => 'anomaly.field_type.text',
            'config' => [
                'min' => 1,
                'max' => 1,
            ],
        ],
        'letter_19'    => [
            'type'   => 'anomaly.field_type.text',
            'config' => [
                'min' => 1,
                'max' => 1,
            ],
        ],
        'letter_20'    => [
            'type'   => 'anomaly.field_type.text',
            'config' => [
                'min' => 1,
                'max' => 1,
            ],
        ],
        'letter_21'    => [
            'type'   => 'anomaly.field_type.text',
            'config' => [
                'min' => 1,
                'max' => 1,
            ],
        ],
        'letter_22'    => [
            'type'   => 'anomaly.field_type.text',
            'config' => [
                'min' => 1,
                'max' => 1,
            ],
        ],
        'letter_23'    => [
            'type'   => 'anomaly.field_type.text',
            'config' => [
                'min' => 1,
                'max' => 1,
            ],
        ],
        'letter_24'    => [
            'type'   => 'anomaly.field_type.text',
            'config' => [
                'min' => 1,
                'max' => 1,
            ],
        ],
        'letter_25'    => [
            'type'   => 'anomaly.field_type.text',
            'config' => [
                'min' => 1,
                'max' => 1,
            ],
        ],
        'letter_26'    => [
            'type'   => 'anomaly.field_type.text',
            'config' => [
                'min' => 1,
                'max' => 1,
            ],
        ],
        'letter_27'    => [
            'type'   => 'anomaly.field_type.text',
            'config' => [
                'min' => 1,
                'max' => 1,
            ],
        ],
        'letter_28'    => [
            'type'   => 'anomaly.field_type.text',
            'config' => [
                'min' => 1,
                'max' => 1,
            ],
        ],
        'letter_29'    => [
            'type'   => 'anomaly.field_type.text',
            'config' => [
                'min' => 1,
                'max' => 1,
            ],
        ],
        'letter_30'    => [
            'type'   => 'anomaly.field_type.text',
            'config' => [
                'min' => 1,
                'max' => 1,
            ],
        ],
        'letter_31'    => [
            'type'   => 'anomaly.field_type.text',
            'config' => [
                'min' => 1,
                'max' => 1,
            ],
        ],
    ];

}
