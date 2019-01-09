<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class DefrModuleCrosswordsCreateWordsStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug'         => 'words',
        'title_column' => 'length',
        'translatable' => false,
        'searchable'   => true,
        'sortable'     => true,
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'length' => [
            'required' => true,
        ],
        'letter_1',
        'letter_2',
        'letter_3',
        'letter_4',
        'letter_5',
        'letter_6',
        'letter_7',
        'letter_8',
        'letter_9',
        'letter_10',
        'letter_11',
        'letter_12',
        'letter_13',
        'letter_14',
        'letter_15',
        'letter_16',
        'letter_17',
        'letter_18',
        'letter_19',
        'letter_20',
        'letter_21',
        'letter_22',
        'letter_23',
        'letter_24',
        'letter_25',
        'letter_26',
        'letter_27',
        'letter_28',
        'letter_29',
        'letter_30',
        'letter_31',
        'clues',
    ];

}
