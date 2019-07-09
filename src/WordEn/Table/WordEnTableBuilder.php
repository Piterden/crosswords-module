<?php namespace Defr\CrosswordsModule\WordEn\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class WordEnTableBuilder
 *
 * @package  CrosswordsModule
 * @author   Denis Efremov <efremov.a.denis@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://pyrocms.com
 */
class WordEnTableBuilder extends TableBuilder
{

    /**
     * The table views.
     *
     * @var array|string
     */
    protected $views = [
        'all',
        'with_clues' => [
            'columns' => [
                'word',
                'clue_ens',
            ],
        ],
    ];

    /**
     * The table filters.
     *
     * @var array|string
     */
    protected $filters = [];

    /**
     * The table columns.
     *
     * @var array|string
     */
    protected $columns = [
        'word',
    ];

    /**
     * The table buttons.
     *
     * @var array|string
     */
    protected $buttons = [
        'edit',
    ];

    /**
     * The table actions.
     *
     * @var array|string
     */
    protected $actions = [
        'delete',
    ];

    /**
     * The table options.
     *
     * @var array
     */
    protected $options = [
        'limit' => 50,
    ];

    /**
     * The table assets.
     *
     * @var array
     */
    protected $assets = [];

}
