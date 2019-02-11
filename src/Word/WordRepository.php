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
     * @param   string          $mask      The mask
     * @param   integer         $page      The page (default: 0)
     * @param   integer         $pageSize  The page size (default: 200)
     * @return  WordCollection
     */
    public function findAllByMask(string $mask, $page = 0, $pageSize = 200): WordCollection
    {
        $attrs = $this->getMaskAttributes($mask);

        return $this->model
            ->select($attrs['columns'])
            ->where($attrs['query'])
            ->offset($page * $pageSize)
            ->limit($pageSize)
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
        $attrs = $this->getMaskAttributes($word);

        return $this->model
            ->select($attrs['columns'])
            ->where($attrs['query'])
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
        $attrs = $this->getMaskAttributes($mask);

        return $this->model
            ->where($attrs['query'])
            ->count();
    }

    /**
     * Gets the mask attributes.
     *
     * @param   string  $mask  The mask
     * @return  array
     */
    public function getMaskAttributes(string $mask): array
    {
        $array   = preg_split('//u', $mask, 0, PREG_SPLIT_NO_EMPTY);
        $length  = mb_strlen($mask);
        $columns = ['id', 'length'];
        $query   = ['length' => $length];
        $i = 1;

        foreach ($array as $letter) {
            $column    = "letter_{$i}";
            $columns[] = $column;

            if ($letter != '_') {
                $query[$column] = mb_strtoupper($letter);
            }

            $i++;
        }

        return [
            'query'   => $query,
            'columns' => $columns,
        ];
    }

}
