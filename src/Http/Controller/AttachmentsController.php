<?php namespace Defr\CrosswordsModule\Http\Controller;

use Anomaly\Streams\Platform\Http\Controller\ResourceController;
use Defr\CrosswordsModule\Attachment\Contract\AttachmentRepositoryInterface;
use Defr\CrosswordsModule\Clue\Contract\ClueRepositoryInterface;
use Defr\CrosswordsModule\Crossword\Contract\CrosswordRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class AttachmentsController
 *
 * @package  CrosswordsModule
 * @author   Denis Efremov <efremov.a.denis@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://pyrocms.com
 */
class AttachmentsController extends ResourceController
{

    /**
     * Creates an attachment.
     *
     * @param   AttachmentRepositoryInterface  $attachments The attachments
     * @param   CrosswordRepositoryInterface   $crosswords  The crosswords
     * @param   ClueRepositoryInterface        $clues       The clues
     * @return  Response
     */
    public function create(
        AttachmentRepositoryInterface $attachments,
        CrosswordRepositoryInterface $crosswords,
        ClueRepositoryInterface $clues
    ): Response
    {
        if ($this->request->method() != 'POST') {
            return $this->response->json([
                'error'   => true,
                'message' => 'Allows only POST requests!',
            ]);
        }

        $post = $this->request->all();

        /* @var ClueInterface|null $clue */
        if (!$clue = $clues->find($post['clue'])) {
            return $this->response->json([
                'error'   => true,
                'message' => 'Can\'t find clue!',
            ]);
        }

        /* @var CrosswordInterface|null $crossword */
        if (!$crossword = $crosswords->find($post['crossword'])) {
            return $this->response->json([
                'error'   => true,
                'message' => 'Can\'t find crossword!',
            ]);
        }

        /* @var AttachmentInterface|null $attachment */
        if (!$attachment = $attachments->create([
            'crossword' => $crossword,
            'clue'      => $clue,
            'x'         => $x,
            'y'         => $y,
            'direction' => $direction,
        ])) {
            return $this->response->json([
                'error'   => true,
                'message' => 'Can\'t create attachment!',
            ]);
        }

        return $this->response->json([
            'success' => true,
            'data'    => $attachment,
        ]);
    }

    /**
     * Deletes an attachment.
     *
     * @param   AttachmentRepositoryInterface  $attachments  The attachments
     * @return  Response
     */
    public function delete(AttachmentRepositoryInterface $attachments): Response
    {
        if ($this->request->method() != 'POST') {
            return $this->response->json([
                'error'   => true,
                'message' => 'Allows only POST requests!',
            ]);
        }

        $id = $this->request->get('id');

        if (!$attachments->delete($id)) {
            return $this->response->json([
                'error'   => true,
                'message' => 'Can\'t delete attachment!',
            ]);
        }

        return $this->response->json([
            'success' => true,
            'data'    => $id
        ]);
    }

}
