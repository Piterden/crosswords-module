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
     * @return Response
     */
    public function create(GridRepositoryInterface $grids): Response
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
            'name'        => array_get($post, 'name'),
            'description' => array_get($post, 'description'),
            'blanks'      => array_get($post, 'blanks'),
            'width'       => array_get($post, 'width'),
            'height'      => array_get($post, 'height'),
            'tags'        => array_get($post, 'tags'),
        ])) {
            return $this->response->json([
                'success' => false,
                'message' => 'Can\'t create grid!',
            ], 450);
        }

        return $this->response->json([
            'success' => true,
            'data'    => [
                'grid' => $grid,
            ],
        ], 200);
    }

    /**
     * Gets a list of grids
     *
     * @param  GridRepositoryInterface  $grids  The grids
     * @return Response
     */
    public function index(GridRepositoryInterface $grids): Response
    {
        if (!$result = $grids->all()) {
            return $this->response->json([
                'success' => false,
                'message' => 'Can\'t get grids!',
            ], 450);
        }

        return $this->response->json([
            'success' => true,
            'data'    => [
                'grids' => $result,
            ],
        ], 200);
    }

    /**
     * Loads the grid data.
     *
     * @param  GridRepositoryInterface  $grids  The grids
     * @param  string                   $id     The identifier
     * @return Response
     */
    public function view(GridRepositoryInterface $grids, $id): Response
    {
        if (!$grid = $grids->find($id)) {
            return $this->response->json([
                'success' => false,
                'message' => 'Can\'t find grid!',
            ], 450);
        }

        return $this->response->json([
            'success' => true,
            'data'    => [
                'grid' => $grid,
            ],
        ], 200);
    }

}
