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
     * Find all words by its mask
     *
     * @param   string          $mask      The mask
     * @param   integer         $page      The page (default: 0)
     * @param   integer         $pageSize  The page size (default: 2000)
     * @return  WordCollection
     */
    public function findAllByMask($mask, $page = 0, $pageSize = 2000)
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
    public function findByWord($word)
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
     * @return  integer
     */
    public function countByMask($mask)
    {
        $attrs = $this->getMaskAttributes($mask);

        return $this->model
            ->where($attrs['query'])
            ->count();
    }

    // /**
    //  * Gets the word attributes.
    //  *
    //  * @param  string  $word  The word
    //  * @return array   The word attributes.
    //  */
    // private function getWordAttributes($word)
    // {
    //     $length  = iconv_strlen($word, 'UTF-8');
    //     $columns = ['id', 'length'];
    //     $query   = ['length' => $length];

    //     for ($i = 1; $i <= $length; $i++) {
    //         $letter    = iconv_substr($word, $i - 1, 1, 'UTF-8');
    //         $column    = "letter_{$i}";
    //         $columns[] = $column;

    //         if ($letter != '_') {
    //             $query[$column] = $letter;
    //         }
    //     }

    //     return [
    //         'query'   => $query,
    //         'columns' => $columns,
    //     ];
    // }

    /**
     * Gets the mask attributes.
     *
     * @param   string  $mask  The mask
     * @return  array
     */
    public function getMaskAttributes($mask)
    {
        $length  = iconv_strlen($mask, 'UTF-8');
        $columns = ['id', 'length'];
        $query   = ['length' => $length];

        for ($i = 1; $i <= $length; $i++) {
            $letter    = iconv_substr($mask, $i - 1, 1, 'UTF-8');
            $column    = "letter_{$i}";
            $columns[] = $column;

            if ($letter != '_') {
                $query[$column] = $letter;
            }
        }

        return [
            'query'   => $query,
            'columns' => $columns,
        ];
    }

}
