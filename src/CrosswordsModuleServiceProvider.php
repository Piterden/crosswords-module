<?php namespace Defr\CrosswordsModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Anomaly\Streams\Platform\Model\Crosswords\CrosswordsAttachmentsEntryModel;
use Anomaly\Streams\Platform\Model\Crosswords\CrosswordsClueEnsEntryModel;
use Anomaly\Streams\Platform\Model\Crosswords\CrosswordsCluesEntryModel;
use Anomaly\Streams\Platform\Model\Crosswords\CrosswordsCrosswordsEntryModel;
use Anomaly\Streams\Platform\Model\Crosswords\CrosswordsGridsEntryModel;
use Anomaly\Streams\Platform\Model\Crosswords\CrosswordsWordEnsEntryModel;
use Anomaly\Streams\Platform\Model\Crosswords\CrosswordsWordsEntryModel;
use Defr\CrosswordsModule\Attachment\AttachmentModel;
use Defr\CrosswordsModule\Attachment\AttachmentRepository;
use Defr\CrosswordsModule\Attachment\Contract\AttachmentRepositoryInterface;
use Defr\CrosswordsModule\ClueEn\ClueEnModel;
use Defr\CrosswordsModule\ClueEn\ClueEnRepository;
use Defr\CrosswordsModule\ClueEn\Contract\ClueEnRepositoryInterface;
use Defr\CrosswordsModule\Clue\ClueModel;
use Defr\CrosswordsModule\Clue\ClueRepository;
use Defr\CrosswordsModule\Clue\Contract\ClueRepositoryInterface;
use Defr\CrosswordsModule\Crossword\Contract\CrosswordRepositoryInterface;
use Defr\CrosswordsModule\Crossword\CrosswordModel;
use Defr\CrosswordsModule\Crossword\CrosswordRepository;
use Defr\CrosswordsModule\Grid\Contract\GridRepositoryInterface;
use Defr\CrosswordsModule\Grid\GridModel;
use Defr\CrosswordsModule\Grid\GridRepository;
use Defr\CrosswordsModule\Http\Middleware\CorsMiddleware;
use Defr\CrosswordsModule\WordEn\Contract\WordEnRepositoryInterface;
use Defr\CrosswordsModule\WordEn\WordEnModel;
use Defr\CrosswordsModule\WordEn\WordEnRepository;
use Defr\CrosswordsModule\Word\Contract\WordRepositoryInterface;
use Defr\CrosswordsModule\Word\WordModel;
use Defr\CrosswordsModule\Word\WordRepository;
use Illuminate\Routing\Router;

/**
 * Class CrosswordsModuleServiceProvider
 *
 * @package  CrosswordsModule
 * @author   Denis Efremov <efremov.a.denis@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://pyrocms.com
 */
class CrosswordsModuleServiceProvider extends AddonServiceProvider
{

    /**
     * Additional addon plugins.
     *
     * @type array|null
     */
    protected $plugins = [];

    /**
     * The addon Artisan commands.
     *
     * @type array|null
     */
    protected $commands = [];

    /**
     * The addon's scheduled commands.
     *
     * @type array|null
     */
    protected $schedules = [];

    /**
     * The addon API routes.
     *
     * @type array|null
     */
    protected $api = [];

    /**
     * The addon routes.
     *
     * @type array|null
     */
    protected $routes = [
        'admin/crosswords/grids'                 => 'Defr\CrosswordsModule\Http\Controller\Admin\GridsController@index',
        'admin/crosswords/grids/create'          => 'Defr\CrosswordsModule\Http\Controller\Admin\GridsController@create',
        'admin/crosswords/grids/edit/{id}'       => 'Defr\CrosswordsModule\Http\Controller\Admin\GridsController@edit',
        'admin/crosswords/words'                 => [
            'uses' => 'Defr\CrosswordsModule\Http\Controller\Admin\WordsController@index',
        ],
        'admin/crosswords/words/create'          => [
            'uses' => 'Defr\CrosswordsModule\Http\Controller\Admin\WordsController@create',
        ],
        'admin/crosswords/words/edit/{id}'       => [
            'uses' => 'Defr\CrosswordsModule\Http\Controller\Admin\WordsController@edit',
        ],
        'admin/crosswords/en/words'              => [
            'uses' => 'Defr\CrosswordsModule\Http\Controller\Admin\WordEnsController@index',
        ],
        'admin/crosswords/en/words/create'       => [
            'uses' => 'Defr\CrosswordsModule\Http\Controller\Admin\WordEnsController@create',
        ],
        'admin/crosswords/en/words/edit/{id}'    => [
            'uses' => 'Defr\CrosswordsModule\Http\Controller\Admin\WordEnsController@edit',
        ],
        'admin/crosswords/attachments'           => [
            'uses' => 'Defr\CrosswordsModule\Http\Controller\Admin\AttachmentsController@index',
        ],
        'admin/crosswords/attachments/create'    => [
            'uses' => 'Defr\CrosswordsModule\Http\Controller\Admin\AttachmentsController@create',
        ],
        'admin/crosswords/attachments/edit/{id}' => [
            'uses' => 'Defr\CrosswordsModule\Http\Controller\Admin\AttachmentsController@edit',
        ],
        'admin/crosswords'                       => [
            'uses' => 'Defr\CrosswordsModule\Http\Controller\Admin\CrosswordsController@index',
        ],
        'admin/crosswords/create'                => [
            'uses' => 'Defr\CrosswordsModule\Http\Controller\Admin\CrosswordsController@create',
        ],
        'admin/crosswords/edit/{id}'             => [
            'uses' => 'Defr\CrosswordsModule\Http\Controller\Admin\CrosswordsController@edit',
        ],

        'part'                                   => [
            'uses'       => 'Defr\CrosswordsModule\Http\Controller\WordsController@part',
            'middleware' => [CorsMiddleware::class],
        ],
        'crossword/words/find/{page}/{mask}'     => [
            'uses'       => 'Defr\CrosswordsModule\Http\Controller\WordsController@find',
            'middleware' => [CorsMiddleware::class],
        ],
        'crossword/words/count/{mask}'           => [
            'uses'       => 'Defr\CrosswordsModule\Http\Controller\WordsController@count',
            'middleware' => [CorsMiddleware::class],
        ],
        'crossword/clues/find/{word}'            => [
            'uses'       => 'Defr\CrosswordsModule\Http\Controller\CluesController@find',
            'middleware' => [CorsMiddleware::class],
        ],
        'en/part'                                => [
            'uses'       => 'Defr\CrosswordsModule\Http\Controller\WordEnsController@part',
            'middleware' => [CorsMiddleware::class],
        ],
        'crossword/words/en/find/{page}/{mask}'  => [
            'uses'       => 'Defr\CrosswordsModule\Http\Controller\WordEnsController@find',
            'middleware' => [CorsMiddleware::class],
        ],
        'crossword/words/en/count/{mask}'        => [
            'uses'       => 'Defr\CrosswordsModule\Http\Controller\WordEnsController@count',
            'middleware' => [CorsMiddleware::class],
        ],
        'crossword/clues/en/find/{word}'         => [
            'uses'       => 'Defr\CrosswordsModule\Http\Controller\ClueEnsController@find',
            'middleware' => [CorsMiddleware::class],
        ],
        'crossword/create'                       => [
            'uses'       => 'Defr\CrosswordsModule\Http\Controller\CrosswordsController@create',
            'middleware' => [CorsMiddleware::class],
        ],
        'crossword/grids'                        => [
            'uses'       => 'Defr\CrosswordsModule\Http\Controller\GridsController@index',
            'middleware' => [CorsMiddleware::class],
        ],
        'crossword/grids/create'                 => [
            'uses'       => 'Defr\CrosswordsModule\Http\Controller\GridsController@create',
            'middleware' => [CorsMiddleware::class],
        ],
    ];

    /**
     * The addon middleware.
     *
     * @type array|null
     */
    protected $middleware = [];

    /**
     * Addon group middleware.
     *
     * @var array
     */
    protected $groupMiddleware = [
        //'web' => [
        //    Defr\CrosswordsModule\Http\Middleware\ExampleMiddleware::class,
        //],
    ];

    /**
     * Addon route middleware.
     *
     * @type array|null
     */
    protected $routeMiddleware = [];

    /**
     * The addon event listeners.
     *
     * @type array|null
     */
    protected $listeners = [
        //Defr\CrosswordsModule\Event\ExampleEvent::class => [
        //    Defr\CrosswordsModule\Listener\ExampleListener::class,
        //],
    ];

    /**
     * The addon alias bindings.
     *
     * @type array|null
     */
    protected $aliases = [
        //'Example' => Defr\CrosswordsModule\Example::class
    ];

    /**
     * The addon
     *
     * @type array|null
     */
    protected $bindings = [
        CrosswordsGridsEntryModel::class       => GridModel::class,
        CrosswordsCluesEntryModel::class       => ClueModel::class,
        CrosswordsWordsEntryModel::class       => WordModel::class,
        CrosswordsClueEnsEntryModel::class     => ClueEnModel::class,
        CrosswordsWordEnsEntryModel::class     => WordEnModel::class,
        CrosswordsCrosswordsEntryModel::class  => CrosswordModel::class,
        CrosswordsAttachmentsEntryModel::class => AttachmentModel::class,
    ];

    /**
     * The addon singleton bindings.
     *
     * @type array|null
     */
    protected $singletons = [
        GridRepositoryInterface::class       => GridRepository::class,
        ClueRepositoryInterface::class       => ClueRepository::class,
        WordRepositoryInterface::class       => WordRepository::class,
        ClueEnRepositoryInterface::class     => ClueEnRepository::class,
        WordEnRepositoryInterface::class     => WordEnRepository::class,
        CrosswordRepositoryInterface::class  => CrosswordRepository::class,
        AttachmentRepositoryInterface::class => AttachmentRepository::class,
    ];

    /**
     * Additional service providers.
     *
     * @type array|null
     */
    protected $providers = [
        //\ExamplePackage\Provider\ExampleProvider::class
    ];

    /**
     * The addon view overrides.
     *
     * @type array|null
     */
    protected $overrides = [
        //'streams::errors/404' => 'module::errors/404',
        //'streams::errors/500' => 'module::errors/500',
    ];

    /**
     * The addon mobile-only view overrides.
     *
     * @type array|null
     */
    protected $mobile = [
        //'streams::errors/404' => 'module::mobile/errors/404',
        //'streams::errors/500' => 'module::mobile/errors/500',
    ];

    /**
     * Register the addon.
     */
    public function register()
    {
        // Run extra pre-boot registration logic here.
        // Use method injection or commands to bring in services.
    }

    /**
     * Boot the addon.
     */
    public function boot()
    {
        // Run extra post-boot registration logic here.
        // Use method injection or commands to bring in services.
    }

    /**
     * Map additional addon routes.
     *
     * @param Router $router
     */
    public function map(Router $router)
    {
        // Register dynamic routes here for example.
        // Use method injection or commands to bring in services.
    }

}
