<?php namespace Defr\CrosswordsModule\Word;

use Anomaly\Streams\Platform\Entry\EntryRepository;
use Defr\CrosswordsModule\Word\Contract\WordRepositoryInterface;

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
     * Find all words by its query
     *
     * @param  int  $query  The query
     * @return WordCollection
     */
    public function findAllByQuery($query, $page = 0, $pageSize = 2000)
    {
        $columns = ['id', 'length'];

        for ($i = 1; $i <= $query['length']; ++$i) {
            $columns[] = "letter_{$i}";
        }

        return $this->model
            ->select($columns)
            ->where($query)
            ->offset($page * $pageSize)
            ->limit($pageSize)
            ->get();
    }

    /**
     * Find word by word.
     *
     * @param  string  $word  The word
     * @return WordInterface
     */
    public function findByWord($word)
    {
        $wordArray = preg_split('//u', $word, null, PREG_SPLIT_NO_EMPTY);
        $columns   = ['id', 'length'];
        $query     = [];

        for ($i = 1; $i <= iconv_strlen($word, 'UTF-8'); ++$i) {
            $columns[] = "letter_{$i}";
        }

        $i = 1;

        foreach ($wordArray as $letter) {
            if ($letter != '_') {
                $query["letter_{$i}"] = $letter;
            }
            ++$i;
        }

        return $this->model
            ->select($columns)
            ->where($query)
            ->first();
    }

    /**
     * Counts word by query.
     *
     * @param  int $query The query
     * @return int
     */
    public function countByQuery($query)
    {
        return $this->model->where($query)->count();
    }
}
