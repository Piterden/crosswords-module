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
        return $this->response->json([
            'success' => true,
            'words'   => $words->findAllByMask($mask, $page),
        ]);
    }

    /**
     * Counts words by its length.
     *
     * @param  WordRepositoryInterface  $words  The words
     * @return JSONResponse
     */
    public function count(WordRepositoryInterface $words, $mask)
    {
        return $this->response->json([
            'success' => true,
            'count'   => $words->countByMask($mask),
        ]);
    }

    public function create(WordRepositoryInterface $words)
    {
        if ($this->request->method() != 'POST') {
            return $this->response->json([
                'error'   => true,
                'message' => 'Allows only POST requests!',
            ]);
        }

        $post   = $this->request->all();
        $params = [];

        /* @var WordInterface|null $word */
        if (!$word = $words->create($params)) {
            return $this->response->json([
                'error'   => true,
                'message' => 'Can\'t create a word!',
            ]);
        }

        return $this->response->json([
            'success' => true,
            'word'    => $word,
        ]);
    }

}
