<?php namespace Defr\CrosswordsModule\Http\Controller\Admin;

use Defr\CrosswordsModule\Crossword\Form\CrosswordFormBuilder;
use Defr\CrosswordsModule\Crossword\Table\CrosswordTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class CrosswordsController
 *
 * @package  CrosswordsModule
 * @author   Denis Efremov <efremov.a.denis@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://pyrocms.com
 */
class CrosswordsController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param CrosswordTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(CrosswordTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param CrosswordFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(CrosswordFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param CrosswordFormBuilder $form
     * @param        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(CrosswordFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
