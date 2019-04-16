<?php namespace Defr\CrosswordsModule\Grid;

use Defr\CrosswordsModule\Grid\Contract\GridRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

class GridRepository extends EntryRepository implements GridRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var GridModel
     */
    protected $model;

    /**
     * Create a new GridRepository instance.
     *
     * @param GridModel $model
     */
    public function __construct(GridModel $model)
    {
        $this->model = $model;
    }
}
