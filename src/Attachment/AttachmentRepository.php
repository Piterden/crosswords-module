<?php namespace Defr\CrosswordsModule\Attachment;

use Defr\CrosswordsModule\Attachment\Contract\AttachmentRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

class AttachmentRepository extends EntryRepository implements AttachmentRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var AttachmentModel
     */
    protected $model;

    /**
     * Create a new AttachmentRepository instance.
     *
     * @param AttachmentModel $model
     */
    public function __construct(AttachmentModel $model)
    {
        $this->model = $model;
    }
}
