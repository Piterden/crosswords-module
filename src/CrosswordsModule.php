<?php namespace Defr\CrosswordsModule;

use Anomaly\Streams\Platform\Addon\Module\Module;

/**
 * Class CrosswordsModule
 *
 * @package  CrosswordsModule
 * @author   Denis Efremov <efremov.a.denis@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://pyrocms.com
 */
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
