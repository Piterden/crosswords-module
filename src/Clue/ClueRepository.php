<?php namespace Defr\CrosswordsModule\Clue;

use Anomaly\Streams\Platform\Entry\EntryRepository;
use Defr\CrosswordsModule\Clue\ClueCollection;
use Defr\CrosswordsModule\Clue\Contract\ClueRepositoryInterface;
use Defr\CrosswordsModule\Word\Contract\WordInterface;

/**
 * Class ClueRepository
 *
 * @package  CrosswordsModule
 * @author   Denis Efremov <efremov.a.denis@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://pyrocms.com
 */
class ClueRepository extends EntryRepository implements ClueRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var  ClueModel
     */
    protected $model;

    /**
     * Create a new ClueRepository instance.
     *
     * @param  ClueModel  $model
     */
    public function __construct(ClueModel $model)
    {
        $this->model = $model;
    }

    /**
     * Finds all clues by a word.
     *
     * @param   WordInterface   $word  The word
     * @return  ClueCollection
     */
    public function findAllByWord(WordInterface $word): ClueCollection
    {
        return $this->model
            ->select(['id', 'name'])
            ->where(['word_id' => $word->getId()])
            ->get();
    }

}
