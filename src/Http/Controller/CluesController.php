<?php namespace Defr\CrosswordsModule\Http\Controller;

use Anomaly\Streams\Platform\Http\Controller\ResourceController;
use Defr\CrosswordsModule\Clue\Contract\ClueRepositoryInterface;
use Defr\CrosswordsModule\Word\Contract\WordRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CluesController
 *
 * @package  CrosswordsModule
 * @author   Denis Efremov <efremov.a.denis@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://pyrocms.com
 */
class CluesController extends ResourceController
{

    /**
     * Searches for the clues.
     *
     * @param  WordRepositoryInterface  $words  The words
     * @param  ClueRepositoryInterface  $clues  The clues
     * @param  string                   $word   The word
     * @return Response
     */
    public function find(
        WordRepositoryInterface $words,
        ClueRepositoryInterface $clues,
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
     * @param   ClueRepositoryInterface  $clues  The clues
     * @param   WordRepositoryInterface  $words  The words
     * @return  Response
     */
    public function create(
        ClueRepositoryInterface $clues,
        WordRepositoryInterface $words
    ): Response
    {
        if ($this->request->method() != 'POST') {
            return $this->response->json([
                'error'   => true,
                'message' => 'Allows only POST requests!',
            ]);
        }

        $post = $this->request->all();

        /* @var WordInterface|null $word */
        if (!$word = $words->find($post['word'])) {
            return $this->response->json([
                'error'   => true,
                'message' => 'Can\'t find word!',
            ]);
        }

        /* @var ClueInterface|null $clue */
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
     * @param   ClueRepositoryInterface  $clues  The clues
     * @return  Response
     */
    public function delete(ClueRepositoryInterface $clues): Response
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
