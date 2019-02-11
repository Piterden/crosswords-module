<?php namespace Defr\CrosswordsModule\Attachment\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Defr\CrosswordsModule\Clue\Contract\ClueInterface;
use Defr\CrosswordsModule\Crossword\Contract\CrosswordInterface;
use Defr\CrosswordsModule\Word\Contract\WordInterface;

interface AttachmentInterface extends EntryInterface
{

    /**
     * Gets the clue.
     *
     * @return  ClueInterface  The clue.
     */
    public function getClue(): ClueInterface;

    /**
     * Gets the crossword.
     *
     * @return  CrosswordInterface  The crossword.
     */
    public function getCrossword(): CrosswordInterface;

    /**
     * Gets the word.
     *
     * @return  WordInterface  The word.
     */
    public function getWord(): WordInterface;

}
