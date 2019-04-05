<?php namespace Defr\CrosswordsModule\Word;

use Anomaly\Streams\Platform\Model\Crosswords\CrosswordsWordsEntryModel;
use Defr\CrosswordsModule\Clue\ClueCollection;
use Defr\CrosswordsModule\Clue\ClueModel;
use Defr\CrosswordsModule\Word\Contract\WordInterface;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * Class WordModel
 *
 * @package  CrosswordsModule
 * @author   Denis Efremov <efremov.a.denis@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://pyrocms.com
 */
class WordModel extends CrosswordsWordsEntryModel implements WordInterface
{

    /**
     * Eager load relations
     *
     * @var  array
     */
    protected $with = [
        'clues',
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
     * Clues invert relation.
     *
     * @return HasMany
     */
    public function clues(): HasMany
    {
        return $this->hasMany(ClueModel::class, 'word_id');
    }

    /**
     * Gets the clues.
     *
     * @return ClueCollection The clues.
     */
    public function getClues(): ClueCollection
    {
        return $this->clues()->get();
    }

    /**
     * Gets the clue names.
     *
     * @return Collection The clues.
     */
    public function getClueNames(): Collection
    {
        return $this->getClues()->pluck('name');
    }

}
