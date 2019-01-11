<?php namespace Defr\CrosswordsModule;

use Anomaly\Streams\Platform\Database\Seeder\Seeder;
use Defr\CrosswordsModule\Clue\Contract\ClueRepositoryInterface;
use Defr\CrosswordsModule\Word\Contract\WordRepositoryInterface;

class CrosswordsModuleSeeder extends Seeder
{

    /**
     * The clues repository.
     *
     * @var ClueRepositoryInterface
     */
    protected $clues;

    /**
     * The words repository.
     *
     * @var WordRepositoryInterface
     */
    protected $words;

    /**
     * Create an instance of CrosswordModuleSeeder class.
     *
     * @param WordRepositoryInterface $words The words
     * @param ClueRepositoryInterface $clues The clues
     */
    public function __construct(
        WordRepositoryInterface $words,
        ClueRepositoryInterface $clues
    ) {
        $this->words = $words;
        $this->clues = $clues;
    }

    /**
     * Run the seeder.
     */
    public function run()
    {
        function mb_ucfirst ($string, $encoding) {
            $strlen = mb_strlen($string, $encoding);
            $firstChar = mb_substr($string, 0, 1, $encoding);
            $then = mb_substr($string, 1, $strlen - 1, $encoding);
            return mb_strtoupper($firstChar, $encoding) . $then;
        }

        echo "\n\n\033[34;6;228mStarting crosswords seeder!\n";

        // $this->words->truncate();
        // echo "\033[35;6;228mWords removed!\n";

        // $this->clues->truncate();
        // echo "\033[35;6;228mClues removed!\n";

        $files = glob(__DIR__ . '/../resources/seeder/[89]*.json');

        foreach ($files as $file) {
            echo "\033[34;6;228mStarting {$file} file!\n";

            $contents = file_get_contents($file);
            $data     = json_decode($contents, true);

            foreach ($data as $word) {
                $arr = preg_split('//u', $word['answer'], null, PREG_SPLIT_NO_EMPTY);

                $newWord = $this->words->create(
                    array_merge(
                        ['length' => iconv_strlen($word['answer'], 'UTF-8')],
                        array_combine(
                            array_map(
                                function ($key) {
                                    return 'letter_' . ($key + 1);
                                },
                                array_keys($arr)
                            ),
                            $arr
                        )
                    )
                );

                echo "\033[32;6;228mWord \033[36;6;228m`{$word['answer']}` \033[32;6;228mcreated!\n";

                $clues = array_map(function ($clue) {
                    return mb_ucfirst($clue, 'UTF-8') . '.';
                }, $word['clues']);

                foreach ($clues as $clue) {
                    $this->clues->create([
                        'name'    => $clue,
                        'word_id' => $newWord->getId(),
                    ]);
                    echo "\033[33;6;228mClue \033[37;6;228m`{$clue}` \033[33;6;228mcreated!\n";
                }
            }
        }
    }

}
