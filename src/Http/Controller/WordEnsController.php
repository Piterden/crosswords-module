<?php namespace Defr\CrosswordsModule\Http\Controller;

use Anomaly\Streams\Platform\Http\Controller\ResourceController;
use Defr\CrosswordsModule\WordEn\Contract\WordEnRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class WordsController
 *
 * @package  CrosswordsModule
 * @author   Denis Efremov <efremov.a.denis@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://pyrocms.com
 */
class WordEnsController extends ResourceController
{

    public function part()
    {
        return '<button class="clickable">Fire</button>';
    }

    /**
     * Searches for the first match.
     *
     * @param  WordEnRepositoryInterface  $words  The words
     * @return Response
     */
    public function find(WordEnRepositoryInterface $words, $page = 0, $mask): Response
    {
        return $this->response->json([
            'success' => true,
            'words'   => $words->findAllByMask($mask, $page),
        ]);
    }

    /**
     * Counts words by its length.
     *
     * @param  WordEnRepositoryInterface  $words  The words
     * @return Response
     */
    public function count(WordEnRepositoryInterface $words, $mask): Response
    {
        return $this->response->json([
            'success' => true,
            'count'   => $words->countByMask($mask),
        ]);
    }

    /**
     * { function_description }
     *
     * @param  WordEnRepositoryInterface $words  The words
     * @return Response
     */
    public function create(WordEnRepositoryInterface $words): Response
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
