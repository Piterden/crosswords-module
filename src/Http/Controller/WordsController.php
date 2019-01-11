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
        return $this->response->json($words->findAllByMask($mask, $page));
    }

    /**
     * Counts words by its length.
     *
     * @param  WordRepositoryInterface  $words  The words
     * @return JSONResponse
     */
    public function count(WordRepositoryInterface $words, $mask)
    {
        return $words->countByMask($mask);
        return $this->response->json([
            'success' => true,
            'data'    => $words->countByMask($mask),
        ]);
    }

    public function create(WordRepositoryInterface $words)
    {
        if (request()->method() != 'POST') {
            return response()->json(['error' => 'Allows only POST requests!']);
        }

        $post   = request()->all();
        $params = [];


        /* @var WordInterface|null $word */
        if (!$word = $words->create($params)) {
            return response()->json(['error' => 'Can\'t create a word!']);
        }

        /* @var AttachmentInterface|null $attachment */
        if (!$attachment = $attachments->create([
            'crossword' => $crossword,
            'clue'      => $clue,
            'x'         => $x,
            'y'         => $y,
            'direction' => $direction,
        ])) {
            return response()->json(['error' => 'Can\'t create attachment!']);
        }

        return response()->json([
            'success' => true,
            'data'    => $attachment,
        ]);
    }

}
