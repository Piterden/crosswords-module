<?php namespace Defr\CrosswordsModule\Crossword\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class CrosswordFormBuilder
 *
 * @package  CrosswordsModule
 * @author   Denis Efremov <efremov.a.denis@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://pyrocms.com
 */
class CrosswordFormBuilder extends FormBuilder
{

    /**
     * The form fields.
     *
     * @var array|string
     */
    protected $fields = [
        '*',
        'crossword' => [
            'type' => 'defr.field_type.crossword',
        ],
    ];

    /**
     * Additional validation rules.
     *
     * @var array|string
     */
    protected $rules = [];

    /**
     * Fields to skip.
     *
     * @var array|string
     */
    protected $skips = [
        'width',
        'height',
        'blanks',
        'published_at',
    ];

    /**
     * The form actions.
     *
     * @var array|string
     */
    protected $actions = [];

    /**
     * The form buttons.
     *
     * @var array|string
     */
    protected $buttons = [
        'cancel',
    ];

    /**
     * The form options.
     *
     * @var array
     */
    protected $options = [];

    /**
     * The form sections.
     *
     * @var array
     */
    protected $sections = [
        'general' => [
            'tabs' => [
                'main' => [
                    'title'  => 'defr.module.crosswords::tab.main',
                    'fields' => [
                        'name',
                        'slug',
                        'description',
                    ],
                ],
                'crossword'     => [
                    'title'  => 'defr.module.crosswords::tab.crossword',
                    'fields' => [
                        'crossword',
                    ],
                ],
            ],
        ],
    ];

    /**
     * The form assets.
     *
     * @var array
     */
    protected $assets = [];

}
