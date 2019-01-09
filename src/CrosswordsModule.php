<?php namespace Defr\CrosswordsModule;

use Anomaly\Streams\Platform\Addon\Module\Module;

class CrosswordsModule extends Module
{

    /**
     * The navigation display flag.
     *
     * @var bool
     */
    protected $navigation = true;

    /**
     * The addon icon.
     *
     * @var string
     */
    protected $icon = 'fa fa-th';

    /**
     * The module sections.
     *
     * @var array
     */
    protected $sections = [
        'crosswords' => [
            'buttons' => [
                'new_crossword',
            ],
        ],
        'words' => [
            'buttons' => [
                'new_word',
            ],
        ],
    ];

}
