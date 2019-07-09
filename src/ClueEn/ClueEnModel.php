<?php namespace Defr\CrosswordsModule\ClueEn;

use Anomaly\Streams\Platform\Model\Repeater\RepeaterClueEnsEntryModel;
use Defr\CrosswordsModule\ClueEn\Contract\ClueEnInterface;
use Defr\CrosswordsModule\WordEn\Contract\WordEnInterface;

/**
 * Class ClueEnModel
 *
 * @package  CrosswordsModule
 * @author   Denis Efremov <efremov.a.denis@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://pyrocms.com
 */
class ClueEnModel extends RepeaterClueEnsEntryModel implements ClueEnInterface
{

    /**
     * Gets the word.
     *
     * @return  WordInterface  The word.
     */
    public function getWord(): WordEnInterface
    {
        return $this->word;
    }

    /**
     * Gets the clue text.
     *
     * @return  string  The text.
     */
    public function getText(): string
    {
        return $this->name;
    }

}
