<?php namespace Defr\CrosswordsModule\Http\Controller\Admin;

use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Defr\CrosswordsModule\Word\Form\WordFormBuilder;
use Defr\CrosswordsModule\Word\Table\WordTableBuilder;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class WordsController
 *
 * @package  CrosswordsModule
 * @author   Denis Efremov <efremov.a.denis@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://pyrocms.com
 */
class WordsController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param WordTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(WordTableBuilder $table): Response
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param WordFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(WordFormBuilder $form): Response
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
    public function edit(WordFormBuilder $form, $id): Response
    {
        return $form->render($id);
    }
}
