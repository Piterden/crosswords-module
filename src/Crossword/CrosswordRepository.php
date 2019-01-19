<?php namespace Defr\CrosswordsModule\Crossword;

use Defr\CrosswordsModule\Crossword\Contract\CrosswordRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

/**
 * Class CrosswordRepository
 *
 * @package  CrosswordsModule
 * @author   Denis Efremov <efremov.a.denis@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://pyrocms.com
 */
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
