<?php namespace Defr\CrosswordsModule\Word\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Defr\CrosswordsModule\Clue\ClueModel;
// use Defr\CrosswordsModule\Clue\Contract\ClueRepositoryInterface;

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
     * Fields to skip.
     *
     * @var array|string
     */
    protected $skips = [
        // 'length',
        // 'letter_1',
        // 'letter_2',
        // 'letter_3',
        // 'letter_4',
        // 'letter_5',
        // 'letter_6',
        // 'letter_7',
        // 'letter_8',
        // 'letter_9',
        // 'letter_10',
        // 'letter_11',
        // 'letter_12',
        // 'letter_13',
        // 'letter_14',
        // 'letter_15',
        // 'letter_16',
        // 'letter_17',
        // 'letter_18',
        // 'letter_19',
        // 'letter_20',
        // 'letter_21',
        // 'letter_22',
        // 'letter_23',
        // 'letter_24',
        // 'letter_25',
        // 'letter_26',
        // 'letter_27',
        // 'letter_28',
        // 'letter_29',
        // 'letter_30',
        // 'letter_31',
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
