<?php namespace Defr\CrosswordsModule\Http\Controller;

use Anomaly\Streams\Platform\Http\Controller\ResourceController;
use Defr\CrosswordsModule\Clue\Contract\ClueRepositoryInterface;
use Defr\CrosswordsModule\Word\Contract\WordRepositoryInterface;

class CluesController extends ResourceController
{

    /**
     * Searches for the clues.
     *
     * @param  WordRepositoryInterface  $words  The words
     * @param  ClueRepositoryInterface  $clues  The clues
     * @param  string                   $word   The word
     * @return ClueCollection
     */
    public function find(
        WordRepositoryInterface $words,
        ClueRepositoryInterface $clues,
        $word
    ) {
        if (!$word) {
            return $this->response->json([
                'error'   => true,
                'message' => 'Word not defined!',
            ], 500);
        }

        if (is_string($word)) {
            $wordEntry = $words->findByWord($word);
        }

        if (is_numeric($word)) {
            $wordEntry = $words->find($word);
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
     * @return  JSONResponse
     */
    public function create(
        ClueRepositoryInterface $clues,
        WordRepositoryInterface $words
    )
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
     * @return  JSONResponse
     */
    public function delete(ClueRepositoryInterface $clues)
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
