<?php namespace Defr\CrosswordsModule\Http\Controller;

use Anomaly\Streams\Platform\Http\Controller\ResourceController;
use Defr\CrosswordsModule\ClueEn\Contract\ClueEnRepositoryInterface;
use Defr\CrosswordsModule\WordEn\Contract\WordEnRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ClueEnsController
 *
 * @package  CrosswordsModule
 * @author   Denis Efremov <efremov.a.denis@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://pyrocms.com
 */
class ClueEnsController extends ResourceController
{

    /**
     * Searches for the clues.
     *
     * @param  WordEnRepositoryInterface  $words  The words
     * @param  ClueEnRepositoryInterface  $clues  The clues
     * @param  string                   $word   The word
     * @return Response
     */
    public function find(
        WordEnRepositoryInterface $words,
        ClueEnRepositoryInterface $clues,
        $word
    ): Response
    {
        if (!$word) {
            return $this->response->json([
                'error'   => true,
                'message' => 'Word not defined!',
            ], 500);
        }

        if (is_numeric($word)) {
            $wordEntry = $words->find($word);
        }

        if (is_string($word)) {
            $wordEntry = $words->findByWord($word);
        }

        if (!$wordEntry) {
            return $this->response->json([
                'error'   => true,
                'message' => 'Word not found!',
            ], 500);
        }

        return $this->response->json([
            'success' => true,
            'clues'   => $clues->findAllByWord($wordEntry),
        ]);
    }

    /**
     * Searches for the first match.
     *
     * @param   ClueEnRepositoryInterface  $clues  The clues
     * @param   WordEnRepositoryInterface  $words  The words
     * @return  Response
     */
    public function create(
        ClueEnRepositoryInterface $clues,
        WordEnRepositoryInterface $words
    ): Response
    {
        if ($this->request->method() != 'POST') {
            return $this->response->json([
                'error'   => true,
                'message' => 'Allows only POST requests!',
            ]);
        }

        $post = $this->request->all();

        /* @var WordEnInterface|null $word */
        if (!$word = $words->find($post['word'])) {
            return $this->response->json([
                'error'   => true,
                'message' => 'Can\'t find word!',
            ]);
        }

        /* @var ClueEnInterface|null $clue */
        if (!$clue = $clues->create([
            'word' => $word,
            'name' => $post['name'],
        ])) {
            return $this->response->json([
                'error'   => true,
                'message' => 'Can\'t create clue!',
            ]);
        }

        return $this->response->json([
            'success' => true,
            'data'    => $clue,
        ]);
    }

    /**
     * Deletes an clue.
     *
     * @param   ClueEnRepositoryInterface  $clues  The clues
     * @return  Response
     */
    public function delete(ClueEnRepositoryInterface $clues): Response
    {
        if (request()->method() != 'POST') {
            return $this->response->json([
                'error'   => true,
                'message' => 'Allows only POST requests!',
            ]);
        }

        $id = request()->get('id');

        if (!$clues->delete($id)) {
            return $this->response->json([
                'error'   => true,
                'message' => 'Can\'t delete clue!',
            ]);
        }

        return $this->response->json([
            'success' => true,
            'data'    => $id
        ]);
    }

}
