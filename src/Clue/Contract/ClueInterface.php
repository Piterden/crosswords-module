<?php namespace Defr\CrosswordsModule\Clue\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Defr\CrosswordsModule\Word\Contract\WordInterface;

interface ClueInterface extends EntryInterface
{

    /**
     * Gets the word.
     *
     * @return  WordInterface  The word.
     */
    public function getWord(): WordInterface;

    /**
     * Gets the clue text.
     *
     * @return  string  The text.
     */
    public function getText(): string;

}
