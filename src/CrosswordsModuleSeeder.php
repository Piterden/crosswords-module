<?php namespace Defr\CrosswordsModule;

use Anomaly\Streams\Platform\Database\Seeder\Seeder;

class CrosswordsModuleSeeder extends Seeder
{

    /**
     * Runs the seeder
     */
    public function run()
    {
        $password = env('DB_PASSWORD');

        echo "Start RU words seeder\n";
        shell_exec("mysql --user=crossword --database=crossword --password={$password} < words.sql");
        echo "RU Words seeder success\n";

        echo "Start RU clues seeder\n";
        shell_exec("mysql --user=crossword --database=crossword --password={$password} < clues.sql");
        echo "RU Clues seeder success\n";

        echo "Start EN words seeder\n";
        shell_exec("mysql --user=crossword --database=crossword --password={$password} < words_en.sql");
        echo "En Words seeder success\n";

        echo "Start EN clues seeder\n";
        shell_exec("mysql --user=crossword --database=crossword --password={$password} < clues_en.sql");
        echo "RU Clues seeder success\n";
    }

}
