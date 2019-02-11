<?php namespace Defr\CrosswordsModule\Clue\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryRepositoryInterface;
use Defr\CrosswordsModule\Clue\ClueCollection;
use Defr\CrosswordsModule\Word\Contract\WordInterface;

interface ClueRepositoryInterface extends EntryRepositoryInterface
{

    /**
     * Finds all clues by a word.
     *
     * @param   WordInterface   $word  The word
     * @return  ClueCollection
     */
    public function findAllByWord(WordInterface $word): ClueCollection;

}
