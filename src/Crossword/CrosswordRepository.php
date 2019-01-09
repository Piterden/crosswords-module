<?php namespace Defr\CrosswordsModule\Crossword;

use Defr\CrosswordsModule\Crossword\Contract\CrosswordRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

class CrosswordRepository extends EntryRepository implements CrosswordRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var CrosswordModel
     */
    protected $model;

    /**
     * Create a new CrosswordRepository instance.
     *
     * @param CrosswordModel $model
     */
    public function __construct(CrosswordModel $model)
    {
        $this->model = $model;
    }
}
