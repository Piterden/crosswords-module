<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class DefrModuleCrosswordsCreateGridsStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug'         => 'grids',
        'title_column' => 'name',
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'name',
        'description',
        'blanks' => [
            'required' => true,
        ],
        'tags',
    ];

}
