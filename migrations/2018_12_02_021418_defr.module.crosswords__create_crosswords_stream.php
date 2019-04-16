<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class DefrModuleCrosswordsCreateCrosswordsStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug'         => 'crosswords',
        'title_column' => 'name',
        'versionable'  => true,
        'trashable'    => true,
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
        'slug' => [
            'unique'   => true,
            'required' => true,
        ],
        'description',
        'width',
        'height',
        'grid',
        'published_at',
    ];

}
