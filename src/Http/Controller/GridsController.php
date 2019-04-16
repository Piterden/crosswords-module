<?php namespace Defr\CrosswordsModule\Http\Controller;

use Anomaly\Streams\Platform\Http\Controller\ResourceController;
use Defr\CrosswordsModule\Grid\Contract\GridRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * Controls the data flow into grids object and updates the view whenever data changes.
 */
class GridsController extends ResourceController
{

    /**
     * Creates a new instance and stores it into DB.
     *
     * @param  GridRepositoryInterface  $grids  The grids
     */
    public function create(GridRepositoryInterface $grids)
    {
        if ($this->request->method() != 'POST') {
            return $this->response->json([
                'success' => false,
                'message' => 'Only POST requests are allowed!',
            ], 400);
        }

        $post = $this->request->all();

        /* @var GridInterface|null $clue */
        if (!$grid = $grids->create([
            'name'   => $post['name'],
            'blanks' => $post['blanks'],
            'tags'   => $post['tags'],
        ])) {
            return $this->response->json([
                'success' => false,
                'message' => 'Can\'t create grid!',
            ], 450);
        }

        return $this->response->json([
            'success' => true,
            'data'    => $grid,
        ], 200);
    }

}
