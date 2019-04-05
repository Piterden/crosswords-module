<?php namespace Defr\CrosswordsModule\Word;

use Anomaly\Streams\Platform\Entry\EntryRepository;
use Defr\CrosswordsModule\Word\Contract\WordInterface;
use Defr\CrosswordsModule\Word\Contract\WordRepositoryInterface;
use Defr\CrosswordsModule\Word\WordCollection;

/**
 * Class WordRepository
 *
 * @package  CrosswordsModule
 * @author   Denis Efremov <efremov.a.denis@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://pyrocms.com
 */
class WordRepository extends EntryRepository implements WordRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var WordModel
     */
    protected $model;

    /**
     * Create a new WordRepository instance.
     *
     * @param WordModel $model
     */
    public function __construct(WordModel $model)
    {
        $this->model = $model;
    }

    /**
     * Find all words by its mask
     *
     * @param   string          $mask  The mask
     * @param   integer         $page  The page (default: 0)
     * @param   integer         $size  The page size (default: 200)
     * @return  WordCollection
     */
    public function findAllByMask(
        string $mask,
        $page = 0,
        $size = 500
    ): WordCollection
    {
        return $this->model
            ->select(['id', 'word'])
            ->where('word', 'LIKE', $mask)
            ->offset($page * $size)
            ->limit($size)
            ->get();
    }

    /**
     * Find word by word string.
     *
     * @param   string         $text  The text
     * @return  WordInterface
     */
    public function findByWord(string $word): WordInterface
    {
        return $this->model
            ->select(['id', 'word'])
            ->where('word', $word)
            ->first();
    }

    /**
     * Counts word by mask.
     *
     * @param   string   $mask  The mask
     * @return  int
     */
    public function countByMask(string $mask): int
    {
        return $this->model
            ->select(['id', 'word'])
            ->where('word', 'LIKE', $mask)
            ->count();
    }

}
