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
     * Gets the length.
     *
     * @return int The length.
     */
    public function getLength(): int
    {
        return $this->length;
    }

    /**
     * Gets the letter by its index.
     *
     * @param   integer  $index  The index (default: 1)
     * @return  string           The letter.
     */
    public function getLetter($index = 1): string
    {
        $letter = "letter_{$index}";

        return $this->$letter;
    }

    /**
     * Gets the word.
     *
     * @return  string  The word.
     */
    public function getWord(): string
    {
        $length = $this->getLength();
        $word   = '';

        for ($i = 1; $i <= $length; $i++) {
            $word .= $this->getLetter($i);
        }

        return $word;
    }

    /**
     * Sets the word.
     *
     * @param  string  $word  The word
     */
    public function setWord(string $word): void
    {
        $this->length = iconv_strlen($word, 'UTF-8');
        $wordArray = preg_split('//u', $word, null, PREG_SPLIT_NO_EMPTY);

        for ($i = 1; $i <= $this->length; $i++) {
            $field = "letter_{$i}";
            $this->$field = $wordArray[$i - 1];
        }
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
