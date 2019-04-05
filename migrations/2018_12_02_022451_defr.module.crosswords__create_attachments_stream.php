<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class DefrModuleCrosswordsCreateAttachmentsStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug' => 'attachments',
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'crossword' => [
            'required' => true,
        ],
        'clue'      => [
            'required' => true,
        ],
        'x'         => [
            'required' => true,
        ],
        'y'         => [
            'required' => true,
        ],
        'direction' => [
            'required' => true,
        ],
    ];

}
