<?php namespace Defr\CrosswordsModule\Http\Controller\Admin;

use Defr\CrosswordsModule\Clue\Form\ClueFormBuilder;
use Defr\CrosswordsModule\Clue\Table\ClueTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class CluesController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param ClueTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(ClueTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param ClueFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(ClueFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param ClueFormBuilder $form
     * @param        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(ClueFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
