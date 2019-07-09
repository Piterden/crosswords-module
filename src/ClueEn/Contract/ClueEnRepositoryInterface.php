<?php namespace Defr\CrosswordsModule\ClueEn\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryRepositoryInterface;
use Defr\CrosswordsModule\ClueEn\ClueEnCollection;
use Defr\CrosswordsModule\WordEn\Contract\WordEnInterface;

interface ClueEnRepositoryInterface extends EntryRepositoryInterface
{

    /**
     * Finds all clues by a word.
     *
     * @param   WordInterface   $word  The word
     * @return  ClueEnCollection
     */
    public function findAllByWord(WordEnInterface $word): ClueEnCollection;

}
