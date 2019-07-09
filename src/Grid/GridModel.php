<?php namespace Defr\CrosswordsModule\Grid;

use Defr\CrosswordsModule\Grid\Contract\GridInterface;
use Anomaly\Streams\Platform\Model\Crosswords\CrosswordsGridsEntryModel;

class GridModel extends CrosswordsGridsEntryModel implements GridInterface
{

    /**
     * Gets the width.
     *
     * @return <type> The width.
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Gets the height.
     *
     * @return <type> The height.
     */
    public function getHeight()
    {
        return $this->height;
    }

}
