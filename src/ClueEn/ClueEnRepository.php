<?php namespace Defr\CrosswordsModule\ClueEn;

use Anomaly\Streams\Platform\Entry\EntryRepository;
use Defr\CrosswordsModule\ClueEn\ClueEnCollection;
use Defr\CrosswordsModule\ClueEn\Contract\ClueEnRepositoryInterface;
use Defr\CrosswordsModule\WordEn\Contract\WordEnInterface;

/**
 * Class ClueEnRepository
 *
 * @package  CrosswordsModule
 * @author   Denis Efremov <efremov.a.denis@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://pyrocms.com
 */
class ClueEnRepository extends EntryRepository implements ClueEnRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var  ClueEnModel
     */
    protected $model;

    /**
     * Create a new ClueEnRepository instance.
     *
     * @param  ClueEnModel  $model
     */
    public function __construct(ClueEnModel $model)
    {
        $this->model = $model;
    }

    /**
     * Finds all clues by a word.
     *
     * @param   WordInterface   $word  The word
     * @return  ClueEnCollection
     */
    public function findAllByWord(WordEnInterface $word): ClueEnCollection
    {
        return $this->model
            ->select(['id', 'name'])
            ->where(['word_id' => $word->getId()])
            ->get();
    }

}
