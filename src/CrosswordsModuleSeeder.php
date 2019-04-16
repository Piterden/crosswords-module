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

        echo "Start words seeder\n";
        shell_exec("mysql --user=crossword --database=crossword --password={$password} < words.sql");
        echo "Words seeder success\n";

        echo "Start clues seeder\n";
        shell_exec("mysql --user=crossword --database=crossword --password={$password} < clues.sql");
        echo "Clues seeder success\n";
    }

}
