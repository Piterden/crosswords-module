<?php namespace Defr\CrosswordsModule\Http\Controller;

use Anomaly\Streams\Platform\Http\Controller\ResourceController;
use Defr\CrosswordsModule\Word\Contract\WordRepositoryInterface;

class WordsController extends ResourceController
{

    /**
     * Searches for the first match.
     *
     * @param  WordRepositoryInterface  $words  The words
     * @return JSONResponse
     */
    public function find(WordRepositoryInterface $words, $page = 0, $mask)
    {
        $length = iconv_strlen($mask, 'UTF-8');
        $wordArray = preg_split('//u', $mask, null, PREG_SPLIT_NO_EMPTY);
        $query = [];
        $i = 1;

        foreach ($wordArray as $letter) {
            if ($letter != '_') {
                $query["letter_{$i}"] = $letter;
            }
            $i++;
        }

        return response()->json($words->findAllByQuery(
            array_merge(['length' => $length], $query),
            $page
        ));
    }

    /**
     * Counts words by its length.
     *
     * @param  WordRepositoryInterface  $words  The words
     * @return JSONResponse
     */
    public function count(WordRepositoryInterface $words, $mask)
    {
        $length = iconv_strlen($mask, 'UTF-8');
        $wordArray = preg_split('//u', $mask, null, PREG_SPLIT_NO_EMPTY);
        $query = ['length' => $length];
        $i = 1;

        foreach ($wordArray as $letter) {
            if ($letter != '_') {
                $query["letter_{$i}"] = $letter;
            }
            $i++;
        }

        return $words->countByQuery($query);
    }

}
