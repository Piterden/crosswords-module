<?php namespace Defr\CrosswordsModule\Http\Controller\Admin;

use Defr\CrosswordsModule\Attachment\Form\AttachmentFormBuilder;
use Defr\CrosswordsModule\Attachment\Table\AttachmentTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class AttachmentsController
 *
 * @package  CrosswordsModule
 * @author   Denis Efremov <efremov.a.denis@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://pyrocms.com
 */
class AttachmentsController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param AttachmentTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(AttachmentTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param AttachmentFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(AttachmentFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param AttachmentFormBuilder $form
     * @param        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(AttachmentFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
