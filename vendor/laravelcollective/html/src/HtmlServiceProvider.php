<?php

namespace Collective\Html;

<<<<<<< HEAD
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Illuminate\View\Compilers\BladeCompiler;

class HtmlServiceProvider extends ServiceProvider
{
    /**
     * Supported Blade Directives
     *
     * @var array
     */
    protected $directives = ['entities','decode','script','style','image','favicon','link','secureLink','linkAsset','linkSecureAsset','linkRoute','linkAction','mailto','email','ol','ul','dl','meta','tag','open','model','close','token','label','input','text','password','hidden','email','tel','number','date','datetime','datetimeLocal','time','url','file','textarea','select','selectRange','selectYear','selectMonth','getSelectOption','checkbox','radio','reset','image','color','submit','button','old'
    ];
=======
use Illuminate\Support\ServiceProvider;

class HtmlServiceProvider extends ServiceProvider
{
>>>>>>> PatientRecord

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerHtmlBuilder();

        $this->registerFormBuilder();

<<<<<<< HEAD
        $this->app->alias('html', HtmlBuilder::class);
        $this->app->alias('form', FormBuilder::class);

        $this->registerBladeDirectives();
=======
        $this->app->alias('html', 'Collective\Html\HtmlBuilder');
        $this->app->alias('form', 'Collective\Html\FormBuilder');
>>>>>>> PatientRecord
    }

    /**
     * Register the HTML builder instance.
     *
     * @return void
     */
    protected function registerHtmlBuilder()
    {
        $this->app->singleton('html', function ($app) {
            return new HtmlBuilder($app['url'], $app['view']);
        });
    }

    /**
     * Register the form builder instance.
     *
     * @return void
     */
    protected function registerFormBuilder()
    {
        $this->app->singleton('form', function ($app) {
<<<<<<< HEAD
            $form = new FormBuilder($app['html'], $app['url'], $app['view'], $app['session.store']->token(), $app['request']);
=======
            $form = new FormBuilder($app['html'], $app['url'], $app['view'], $app['session.store']->token());
>>>>>>> PatientRecord

            return $form->setSessionStore($app['session.store']);
        });
    }

    /**
<<<<<<< HEAD
     * Register Blade directives.
     *
     * @return void
     */
    protected function registerBladeDirectives()
    {
        $this->app->afterResolving('blade.compiler', function (BladeCompiler $bladeCompiler) {
            $namespaces = [
                'Html' => get_class_methods(HtmlBuilder::class),
                'Form' => get_class_methods(FormBuilder::class),
            ];

            foreach ($namespaces as $namespace => $methods) {
                foreach ($methods as $method) {
                    if (in_array($method, $this->directives)) {
                        $snakeMethod = Str::snake($method);
                        $directive = strtolower($namespace).'_'.$snakeMethod;

                        $bladeCompiler->directive($directive, function ($expression) use ($namespace, $method) {
                            return "<?php echo $namespace::$method($expression); ?>";
                        });
                    }
                }
            }
        });
    }

    /**
=======
>>>>>>> PatientRecord
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
<<<<<<< HEAD
        return ['html', 'form', HtmlBuilder::class, FormBuilder::class];
=======
        return ['html', 'form', 'Collective\Html\HtmlBuilder', 'Collective\Html\FormBuilder'];
>>>>>>> PatientRecord
    }
}
