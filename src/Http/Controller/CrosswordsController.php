<?php namespace Defr\CrosswordsModule\Http\Controller;

use Anomaly\Streams\Platform\Http\Controller\ResourceController;
use Defr\CrosswordsModule\Crossword\Contract\CrosswordRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CrosswordsController
 *
 * @package  CrosswordsModule
 * @author   Denis Efremov <efremov.a.denis@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://pyrocms.com
 */
class CrosswordsController extends ResourceController
{

    /**
     * Searches for the first match.
     *
     * @param   CrosswordRepositoryInterface  $crosswords  The crosswords
     * @return  Response
     */
    public function create(CrosswordRepositoryInterface $crosswords): Response
    {
        if ($this->request->method() != 'POST') {
            return $this->response->json([
                'success' => false,
                'message' => 'Only POST requests are allowed!',
            ], 400);
        }

        if (!$user = auth()->user()) {
            return $this->response->json([
                'success' => false,
                'message' => 'Only authorized users can save crosswords!',
            ], 403);
        }

        dd($user);

        $post = $this->request->all();

        // $username = $user->username;
        $name = "{$post['name']}@test_user";

        /* @var CrosswordInterface|null $clue */
        if (!$crossword = $crosswords->create([
            'name'        => $name,
            'slug'        => str_slug($name),
            'description' => $post['description'],
            'width'       => $post['width'],
            'height'      => $post['height'],
            'blanks'      => $post['blanks'],
            'words'       => $post['words'],
        ])) {
            return $this->response->json([
                'success' => false,
                'message' => 'Can\'t create crossword!',
            ], 450);
        }

        return $this->response->json([
            'success' => true,
            'data'    => $crossword,
        ], 200);
    }

    /**
     * @param CrosswordRepositoryInterface $crosswords
     * @return mixed
     */
    public function edit(CrosswordRepositoryInterface $crosswords): Response
    {
        if ($this->request->method() != 'POST') {
            return $this->response->json([
                'success' => false,
                'message' => 'Allows only POST requests!',
            ]);
        }

        $post = $this->request->all();

        if (!$crossword = $crosswords->update([
            'name'        => $post['name'],
            'slug'        => $post['slug'],
            'description' => $post['description'],
            'width'       => $post['width'],
            'height'      => $post['height'],
            'blanks'      => $post['blanks'],
            'words'       => $post['words'],
        ])) {
            return $this->response->json([
                'success' => false,
                'message' => 'Can\'t edit crossword!',
            ]);
        }

        return $this->response->json([
            'success' => true,
            'data'    => $crossword,
        ]);
    }

}
