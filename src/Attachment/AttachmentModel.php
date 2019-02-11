<?php namespace Defr\CrosswordsModule\Attachment;

use Anomaly\Streams\Platform\Model\Crosswords\CrosswordsAttachmentsEntryModel;
use Defr\CrosswordsModule\Attachment\Contract\AttachmentInterface;
use Defr\CrosswordsModule\Clue\Contract\ClueInterface;
use Defr\CrosswordsModule\Crossword\Contract\CrosswordInterface;
use Defr\CrosswordsModule\Word\Contract\WordInterface;

/**
 * Class AttachmentModel
 *
 * @package  CrosswordsModule
 * @author   Denis Efremov <efremov.a.denis@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://pyrocms.com
 */
class AttachmentModel extends CrosswordsAttachmentsEntryModel implements AttachmentInterface
{

    /**
     * Eager loaded relations.
     *
     * @var  array
     */
    protected $with = [
        'clues',
        'crosswords',
    ];

    /**
     * Gets the clue.
     *
     * @return  ClueInterface  The clue.
     */
    public function getClue(): ClueInterface
    {
        return $this->clue;
    }

    /**
     * Gets the crossword.
     *
     * @return  CrosswordInterface  The crossword.
     */
    public function getCrossword(): CrosswordInterface
    {
        return $this->crossword;
    }

    /**
     * Gets the word.
     *
     * @return  WordInterface  The word.
     */
    public function getWord(): WordInterface
    {
        return $this->getClue()->getWord();
    }

}
