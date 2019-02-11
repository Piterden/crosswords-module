<?php namespace Defr\CrosswordsModule\Attachment\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryRepositoryInterface;
use Defr\CrosswordsModule\Attachment\AttachmentCollection;
use Defr\CrosswordsModule\Crossword\Contract\CrosswordInterface;

interface AttachmentRepositoryInterface extends EntryRepositoryInterface
{

    /**
     * Finds all attachments by a crossword.
     *
     * @param   CrosswordInterface    $crossword  The crossword
     * @return  AttachmentCollection
     */
    public function findAllByCrossword(CrosswordInterface $crossword): AttachmentCollection;

}
