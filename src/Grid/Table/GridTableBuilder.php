<?php namespace Defr\CrosswordsModule\Grid\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

class GridTableBuilder extends TableBuilder
{

    /**
     * The table views.
     *
     * @var array|string
     */
    protected $views = [];

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
        'width',
        'height',
        'blanks',
    ];

    /**
     * The table buttons.
     *
     * @var array|string
     */
    protected $buttons = [
        'edit'
    ];

    /**
     * The table actions.
     *
     * @var array|string
     */
    protected $actions = [
        'delete'
    ];

    /**
     * The table options.
     *
     * @var array
     */
    protected $options = [
        'limit'            => 25,
        'show_headers'     => false,
        'sortable_headers' => false,
        'table_view'       => 'defr.module.crosswords::table/table',
    ];


    /**
     * The table assets.
     *
     * @var array
     */
    protected $assets = [];

}
