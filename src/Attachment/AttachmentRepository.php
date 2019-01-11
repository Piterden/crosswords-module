<?php namespace Defr\CrosswordsModule\Attachment;

use Anomaly\Streams\Platform\Entry\EntryRepository;
use Defr\CrosswordsModule\Attachment\Contract\AttachmentRepositoryInterface;

class AttachmentRepository extends EntryRepository implements AttachmentRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var  AttachmentModel
     */
    protected $model;

    /**
     * Create a new AttachmentRepository instance.
     *
     * @param  AttachmentModel  $model
     */
    public function __construct(AttachmentModel $model)
    {
        $this->model = $model;
    }

    /**
     * Finds all attachments by a crossword.
     *
     * @param   CrosswordInterface    $crossword  The crossword
     * @return  AttachmentCollection
     */
    public function findAllByCrossword(CrosswordInterface $crossword)
    {
        return $this->model
            ->where(['crossword_id' => $crossword->getId()])
            ->get();
    }

}
