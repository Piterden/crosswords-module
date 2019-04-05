<?php namespace Defr\CrosswordsModule\Word\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Defr\CrosswordsModule\Clue\ClueModel;
// use Defr\CrosswordsModule\Clue\Contract\ClueRepositoryInterface;

/**
 * Class WordFormBuilder
 *
 * @package  CrosswordsModule
 * @author   Denis Efremov <efremov.a.denis@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://pyrocms.com
 */
class WordFormBuilder extends FormBuilder
{

    /**
     * The form fields.
     *
     * @var array|string
     */
    protected $fields = [
        'word' => [
            'label'  => 'Word',
            'type'   => 'anomaly.field_type.text',
            'config' => [
                'max'          => 31,
                'min'          => 2,
                'show_counter' => true,
            ],
        ],
        'clues',
    ];

    /**
     * Additional validation rules.
     *
     * @var array|string
     */
    protected $rules = [];

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
        'main' => [
            'fields' => [
                'word',
                'clues',
            ],
        ],
    ];

    /**
     * Fired when making the form.
     */
    public function onMake()
    {
        $entry = $this->getFormEntry();

        $this->getFormField('word')->setValue($entry->getWord());
        $this->getFormField('clues')->setValue($entry->getClues());
    }

    /**
     * Fired just before saving the form entry.
     */
    public function onSaving()
    {
        if (!$word = $this->getFormValue('word')) {
            return;
        }

        $entry = $this->getFormEntry();
        $entry->setWord($word);

        $this->disableFormField('word');
    }

}
