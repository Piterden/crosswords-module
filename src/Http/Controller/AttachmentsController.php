<?php namespace Defr\CrosswordsModule\Http\Controller;

use Anomaly\Streams\Platform\Http\Controller\ResourceController;
use Defr\CrosswordsModule\Attachment\Contract\AttachmentRepositoryInterface;
use Defr\CrosswordsModule\Clue\Contract\ClueRepositoryInterface;
use Defr\CrosswordsModule\Crossword\Contract\CrosswordRepositoryInterface;

class AttachmentsController extends ResourceController
{

    /**
     * Creates an attachment.
     *
     * @param   AttachmentRepositoryInterface  $attachments The attachments
     * @param   CrosswordRepositoryInterface   $crosswords  The crosswords
     * @param   ClueRepositoryInterface        $clues       The clues
     * @return  JSONResponse
     */
    public function create(
        AttachmentRepositoryInterface $attachments,
        CrosswordRepositoryInterface $crosswords,
        ClueRepositoryInterface $clues
    )
    {
        if (request()->method() != 'POST') {
            return response()->json(['error' => 'Allows only POST requests!']);
        }

        $post = request()->all();

        /* @var ClueInterface|null $clue */
        if (!$clue = $clues->find($post['clue'])) {
            return response()->json(['error' => 'Can\'t find clue!']);
        }

        /* @var CrosswordInterface|null $crossword */
        if (!$crossword = $crosswords->find($post['crossword'])) {
            return response()->json(['error' => 'Can\'t find crossword!']);
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

    /**
     * Deletes an attachment.
     *
     * @param   AttachmentRepositoryInterface  $attachments  The attachments
     * @return  JSONResponse
     */
    public function delete(AttachmentRepositoryInterface $attachments)
    {
        if (request()->method() != 'POST') {
            return response()->json(['error' => 'Allows only POST requests!']);
        }

        $id = request()->get('id');

        if (!$attachments->delete($id)) {
            return response()->json(['error' => 'Can\'t delete attachment!']);
        }

        return response()->json([
            'success' => true,
            'data'    => $id
        ]);
    }

}
