<?php namespace Defr\CrosswordsModule\WordEn;

use Anomaly\Streams\Platform\Model\Crosswords\CrosswordsWordEnsEntryModel;
use Defr\CrosswordsModule\ClueEn\ClueEnCollection;
use Defr\CrosswordsModule\ClueEn\ClueEnModel;
use Defr\CrosswordsModule\WordEn\Contract\WordEnInterface;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * Class WordEnModel
 *
 * @package  CrosswordsModule
 * @author   Denis Efremov <efremov.a.denis@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://pyrocms.com
 */
class WordEnModel extends CrosswordsWordEnsEntryModel implements WordEnInterface
{

    /**
     * Eager load relations
     *
     * @var  array
     */
    protected $with = [
        'clueEns',
    ];

    /**
     * Gets the word.
     *
     * @return  string  The word.
     */
    public function getWord(): string
    {
        return $this->word;
    }

    /**
     * ClueEns invert relation.
     *
     * @return HasMany
     */
    public function clueEns(): HasMany
    {
        return $this->hasMany(ClueEnModel::class, 'word_id');
    }

    /**
     * Gets the clues.
     *
     * @return ClueEnCollection The clues.
     */
    public function getClueEns(): ClueEnCollection
    {
        return $this->clueEns()->get();
    }

    /**
     * Gets the clue names.
     *
     * @return Collection The clues.
     */
    public function getClueEnNames(): Collection
    {
        return $this->getClueEns()->pluck('name');
    }

}
