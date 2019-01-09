<?php namespace Defr\CrosswordsModule\Word\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

class WordTableBuilder extends TableBuilder
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
                'word'  => [
                    'value' => 'entry.word',
                ],
                'clues' => [
                    'value' => 'entry.get_clue_names.implode("<br>")',
                ],
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
        'word' => [
            'value' => 'entry.word',
        ],
        // 'clues' => [
        //     'value' => 'entry.get_clue_names.implode("<br>")',
        // ],
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
        'limit'    => 50,
        'order_by' => [
            'length'   => 'ASC',
            'letter_1' => 'ASC',
            'letter_2' => 'ASC',
            'letter_3' => 'ASC',
            'letter_4' => 'ASC',
        ],
    ];

    /**
     * The table assets.
     *
     * @var array
     */
    protected $assets = [];

}
