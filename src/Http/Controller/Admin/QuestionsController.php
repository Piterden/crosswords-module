<?php namespace Defr\CrosswordsModule\Http\Controller\Admin;

use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Defr\CrosswordsModule\Question\Form\QuestionFormBuilder;
use Defr\CrosswordsModule\Question\Table\QuestionTableBuilder;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class QuestionsController
 *
 * @package  CrosswordsModule
 * @author   Denis Efremov <efremov.a.denis@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://pyrocms.com
 */
class QuestionsController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param QuestionTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(QuestionTableBuilder $table): Response
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param QuestionFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(QuestionFormBuilder $form): Response
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
    public function edit(QuestionFormBuilder $form, $id): Response
    {
        return $form->render($id);
    }
}
