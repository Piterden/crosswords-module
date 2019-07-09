<?php namespace Defr\CrosswordsModule\Http\Controller\Admin;

use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Defr\CrosswordsModule\WordEn\Form\WordEnFormBuilder;
use Defr\CrosswordsModule\WordEn\Table\WordEnTableBuilder;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class WordsController
 *
 * @package  CrosswordsModule
 * @author   Denis Efremov <efremov.a.denis@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://pyrocms.com
 */
class WordEnsController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param WordTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(WordEnTableBuilder $table): Response
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param WordFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(WordEnFormBuilder $form): Response
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
    public function edit(WordEnFormBuilder $form, $id): Response
    {
        return $form->render($id);
    }
}
