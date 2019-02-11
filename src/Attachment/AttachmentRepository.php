<?php namespace Defr\CrosswordsModule\Attachment;

use Anomaly\Streams\Platform\Entry\EntryRepository;
use Defr\CrosswordsModule\Attachment\AttachmentCollection;
use Defr\CrosswordsModule\Attachment\Contract\AttachmentRepositoryInterface;
use Defr\CrosswordsModule\Crossword\Contract\CrosswordInterface;

/**
 * Class AttachmentRepository
 *
 * @package  CrosswordsModule
 * @author   Denis Efremov <efremov.a.denis@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://pyrocms.com
 */
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
    public function findAllByCrossword(CrosswordInterface $crossword): AttachmentCollection
    {
        return $this->model
            ->where(['crossword_id' => $crossword->getId()])
            ->get();
    }

}
