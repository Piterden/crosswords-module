<?php namespace Defr\CrosswordsModule\Clue;

use Defr\CrosswordsModule\Clue\Contract\ClueInterface;
use Anomaly\Streams\Platform\Model\Repeater\RepeaterCluesEntryModel;

/**
 * Class ClueModel
 *
 * @package  CrosswordsModule
 * @author   Denis Efremov <efremov.a.denis@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://pyrocms.com
 */
class ClueModel extends RepeaterCluesEntryModel implements ClueInterface
{

    /**
     * Gets the word.
     *
     * @return  WordInterface  The word.
     */
    public function getWord()
    {
        return $this->word;
    }

    /**
     * Gets the clue text.
     *
     * @return  string  The text.
     */
    public function getText()
    {
        return $this->name;
    }

}
