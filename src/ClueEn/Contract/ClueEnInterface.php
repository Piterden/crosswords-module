<?php namespace Defr\CrosswordsModule\ClueEn\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Defr\CrosswordsModule\WordEn\Contract\WordEnInterface;

interface ClueEnInterface extends EntryInterface
{

    /**
     * Gets the word.
     *
     * @return  WordInterface  The word.
     */
    public function getWord(): WordEnInterface;

    /**
     * Gets the clue text.
     *
     * @return  string  The text.
     */
    public function getText(): string;

}
