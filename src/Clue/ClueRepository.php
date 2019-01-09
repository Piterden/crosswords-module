<?php namespace Defr\CrosswordsModule\Clue;

use Anomaly\Streams\Platform\Entry\EntryRepository;
use Defr\CrosswordsModule\Clue\Contract\ClueRepositoryInterface;
use Defr\CrosswordsModule\Word\Contract\WordInterface;

class ClueRepository extends EntryRepository implements ClueRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var ClueModel
     */
    protected $model;

    /**
     * Create a new ClueRepository instance.
     *
     * @param ClueModel $model
     */
    public function __construct(ClueModel $model)
    {
        $this->model = $model;
    }

    /**
     * Find all clues by word
     *
     * @param WordInterface $word The word
     * @return ClueCollection
     */
    public function findAllByWord(WordInterface $word)
    {
        return $this->model
            ->select(['id', 'name'])
            ->where(['word_id' => $word->getId()])
            ->get();
    }
}
