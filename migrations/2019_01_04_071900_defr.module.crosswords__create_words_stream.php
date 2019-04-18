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
        'title_column' => 'word',
        'searchable'   => true,
        'sortable'     => true,
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'word',
    ];

}
