<?php namespace Defr\CrosswordsModule\Http\Controller\Admin;

use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Defr\CrosswordsModule\ClueEn\Form\ClueEnFormBuilder;
use Defr\CrosswordsModule\ClueEn\Table\ClueEnTableBuilder;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CluesController
 *
 * @package  CrosswordsModule
 * @author   Denis Efremov <efremov.a.denis@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://pyrocms.com
 */
class ClueEnsController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param ClueEnTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(ClueEnTableBuilder $table): Response
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param ClueEnFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(ClueEnFormBuilder $form): Response
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param ClueEnFormBuilder $form
     * @param        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(ClueEnFormBuilder $form, $id): Response
    {
        return $form->render($id);
    }
}
