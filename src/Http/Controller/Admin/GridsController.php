<?php namespace Defr\CrosswordsModule\Http\Controller\Admin;

use Defr\CrosswordsModule\Grid\Form\GridFormBuilder;
use Defr\CrosswordsModule\Grid\Table\GridTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class GridsController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param GridTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(GridTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Create a new entry.
     *
     * @param GridFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(GridFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param GridFormBuilder $form
     * @param        $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(GridFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
