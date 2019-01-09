<?php namespace Defr\CrosswordsModule\Http\Controller\Admin;

use Defr\CrosswordsModule\Word\Form\WordFormBuilder;
use Defr\CrosswordsModule\Word\Table\WordTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class WordsController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param WordTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(WordTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param WordFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(WordFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param WordFormBuilder $form
     * @param        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(WordFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
