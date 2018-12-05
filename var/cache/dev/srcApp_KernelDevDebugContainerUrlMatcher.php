<?php

use Symfony\Component\Routing\Matcher\Dumper\PhpMatcherTrait;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class srcApp_KernelDevDebugContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    use PhpMatcherTrait;

    public function __construct(RequestContext $context)
    {
        $this->context = $context;
        $this->staticRoutes = array(
            '/companies' => array(array(array('_route' => 'companies_index', '_controller' => 'App\\Controller\\CompaniesController::index'), null, array('GET' => 0), null, true, null)),
            '/companies/new' => array(array(array('_route' => 'companies_new', '_controller' => 'App\\Controller\\CompaniesController::new'), null, array('GET' => 0, 'POST' => 1), null, false, null)),
            '/employees' => array(array(array('_route' => 'employees_index', '_controller' => 'App\\Controller\\EmployeesController::index'), null, array('GET' => 0), null, true, null)),
            '/employees/new' => array(array(array('_route' => 'employees_new', '_controller' => 'App\\Controller\\EmployeesController::new'), null, array('GET' => 0, 'POST' => 1), null, false, null)),
            '/_profiler' => array(array(array('_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'), null, null, null, true, null)),
            '/_profiler/search' => array(array(array('_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'), null, null, null, false, null)),
            '/_profiler/search_bar' => array(array(array('_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'), null, null, null, false, null)),
            '/_profiler/phpinfo' => array(array(array('_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'), null, null, null, false, null)),
            '/_profiler/open' => array(array(array('_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'), null, null, null, false, null)),
            '/' => array(array(array('_route' => 'login', 'template' => 'login.html.twig', '_controller' => 'App\\Controller\\DefaultController::index'), null, null, null, false, null)),
        );
        $this->regexpList = array(
            0 => '{^(?'
                    .'|/companies/([^/]++)(?'
                        .'|(*:29)'
                        .'|/edit(*:41)'
                        .'|(*:48)'
                    .')'
                    .'|/employees/([^/]++)(?'
                        .'|(*:78)'
                        .'|/edit(*:90)'
                        .'|(*:97)'
                    .')'
                    .'|/_(?'
                        .'|error/(\\d+)(?:\\.([^/]++))?(*:136)'
                        .'|wdt/([^/]++)(*:156)'
                        .'|profiler/([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:202)'
                                .'|router(*:216)'
                                .'|exception(?'
                                    .'|(*:236)'
                                    .'|\\.css(*:249)'
                                .')'
                            .')'
                            .'|(*:259)'
                        .')'
                    .')'
                .')(?:/?)$}sDu',
        );
        $this->dynamicRoutes = array(
            29 => array(array(array('_route' => 'companies_show', '_controller' => 'App\\Controller\\CompaniesController::show'), array('id'), array('GET' => 0), null, false, null)),
            41 => array(array(array('_route' => 'companies_edit', '_controller' => 'App\\Controller\\CompaniesController::edit'), array('id'), array('GET' => 0, 'POST' => 1), null, false, null)),
            48 => array(array(array('_route' => 'companies_delete', '_controller' => 'App\\Controller\\CompaniesController::delete'), array('id'), array('DELETE' => 0), null, false, null)),
            78 => array(array(array('_route' => 'employees_show', '_controller' => 'App\\Controller\\EmployeesController::show'), array('id'), array('GET' => 0), null, false, null)),
            90 => array(array(array('_route' => 'employees_edit', '_controller' => 'App\\Controller\\EmployeesController::edit'), array('id'), array('GET' => 0, 'POST' => 1), null, false, null)),
            97 => array(array(array('_route' => 'employees_delete', '_controller' => 'App\\Controller\\EmployeesController::delete'), array('id'), array('DELETE' => 0), null, false, null)),
            136 => array(array(array('_route' => '_twig_error_test', '_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'), array('code', '_format'), null, null, false, null)),
            156 => array(array(array('_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'), array('token'), null, null, false, null)),
            202 => array(array(array('_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'), array('token'), null, null, false, null)),
            216 => array(array(array('_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'), array('token'), null, null, false, null)),
            236 => array(array(array('_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception::showAction'), array('token'), null, null, false, null)),
            249 => array(array(array('_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception::cssAction'), array('token'), null, null, false, null)),
            259 => array(array(array('_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'), array('token'), null, null, false, null)),
        );
    }
}
