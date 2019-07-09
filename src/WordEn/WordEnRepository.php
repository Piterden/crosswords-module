<?php namespace Defr\CrosswordsModule\WordEn;

use Anomaly\Streams\Platform\Entry\EntryRepository;
use Defr\CrosswordsModule\WordEn\Contract\WordEnInterface;
use Defr\CrosswordsModule\WordEn\Contract\WordEnRepositoryInterface;
use Defr\CrosswordsModule\WordEn\WordEnCollection;

/**
 * Class WordEnRepository
 *
 * @package  CrosswordsModule
 * @author   Denis Efremov <efremov.a.denis@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://pyrocms.com
 */
class WordEnRepository extends EntryRepository implements WordEnRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var WordEnModel
     */
    protected $model;

    /**
     * Create a new WordEnRepository instance.
     *
     * @param WordEnModel $model
     */
    public function __construct(WordEnModel $model)
    {
        $this->model = $model;
    }

    /**
     * Find all words by its mask
     *
     * @param   string          $mask  The mask
     * @param   integer         $page  The page (default: 0)
     * @param   integer         $size  The page size (default: 200)
     * @return  WordEnCollection
     */
    public function findAllByMask(
        string $mask,
        $page = 0,
        $size = 500
    ): WordEnCollection
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
     * @return  WordEnInterface
     */
    public function findByWord(string $word): WordEnInterface
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
