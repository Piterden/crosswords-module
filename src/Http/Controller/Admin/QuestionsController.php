<?php namespace Defr\CrosswordsModule\Http\Controller\Admin;

use Defr\CrosswordsModule\Question\Form\QuestionFormBuilder;
use Defr\CrosswordsModule\Question\Table\QuestionTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class QuestionsController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param QuestionTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(QuestionTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param QuestionFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(QuestionFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param QuestionFormBuilder $form
     * @param        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(QuestionFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
