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
            '/addresses' => array(array(array('_route' => 'addresses_index', '_controller' => 'App\\Controller\\AddressesController::index'), null, array('GET' => 0), null, true, null)),
            '/addresses/new' => array(array(array('_route' => 'addresses_new', '_controller' => 'App\\Controller\\AddressesController::new'), null, array('GET' => 0, 'POST' => 1), null, false, null)),
            '/companies' => array(array(array('_route' => 'companies_index', '_controller' => 'App\\Controller\\CompaniesController::index'), null, array('GET' => 0), null, true, null)),
            '/companies/new' => array(array(array('_route' => 'companies_new', '_controller' => 'App\\Controller\\CompaniesController::new'), null, array('GET' => 0, 'POST' => 1), null, false, null)),
            '/contracts' => array(array(array('_route' => 'contracts_index', '_controller' => 'App\\Controller\\ContractsController::index'), null, array('GET' => 0), null, true, null)),
            '/contracts/new' => array(array(array('_route' => 'contracts_new', '_controller' => 'App\\Controller\\ContractsController::new'), null, array('GET' => 0, 'POST' => 1), null, false, null)),
            '/customers' => array(array(array('_route' => 'customers_index', '_controller' => 'App\\Controller\\CustomersController::index'), null, array('GET' => 0), null, true, null)),
            '/customers/new' => array(array(array('_route' => 'customers_new', '_controller' => 'App\\Controller\\CustomersController::new'), null, array('GET' => 0, 'POST' => 1), null, false, null)),
            '/employees' => array(array(array('_route' => 'employees_index', '_controller' => 'App\\Controller\\EmployeesController::index'), null, array('GET' => 0), null, true, null)),
            '/employees/new' => array(array(array('_route' => 'employees_new', '_controller' => 'App\\Controller\\EmployeesController::new'), null, array('GET' => 0, 'POST' => 1), null, false, null)),
            '/invoices' => array(array(array('_route' => 'invoices_index', '_controller' => 'App\\Controller\\InvoicesController::index'), null, array('GET' => 0), null, true, null)),
            '/invoices/report' => array(array(array('_route' => 'invoices_report', '_controller' => 'App\\Controller\\InvoicesController::report'), null, array('GET' => 0), null, false, null)),
            '/invoices/new' => array(array(array('_route' => 'invoices_new', '_controller' => 'App\\Controller\\InvoicesController::new'), null, array('GET' => 0, 'POST' => 1), null, false, null)),
            '/_profiler' => array(array(array('_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'), null, null, null, true, null)),
            '/_profiler/search' => array(array(array('_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'), null, null, null, false, null)),
            '/_profiler/search_bar' => array(array(array('_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'), null, null, null, false, null)),
            '/_profiler/phpinfo' => array(array(array('_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'), null, null, null, false, null)),
            '/_profiler/open' => array(array(array('_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'), null, null, null, false, null)),
            '/' => array(array(array('_route' => 'login', 'template' => 'login.html.twig', '_controller' => 'App\\Controller\\DefaultController::index'), null, null, null, false, null)),
        );
        $this->regexpList = array(
            0 => '{^(?'
                    .'|/addresses/([^/]++)(?'
                        .'|(*:29)'
                        .'|/edit(*:41)'
                        .'|(*:48)'
                    .')'
                    .'|/c(?'
                        .'|o(?'
                            .'|mpanies/([^/]++)(?'
                                .'|(*:84)'
                                .'|/edit(*:96)'
                                .'|(*:103)'
                            .')'
                            .'|ntracts/([^/]++)(?'
                                .'|(*:131)'
                                .'|/edit(*:144)'
                                .'|(*:152)'
                            .')'
                        .')'
                        .'|ustomers/([^/]++)(?'
                            .'|(*:182)'
                            .'|/edit(*:195)'
                            .'|(*:203)'
                        .')'
                    .')'
                    .'|/employees/([^/]++)(?'
                        .'|(*:235)'
                        .'|/edit(*:248)'
                        .'|(*:256)'
                    .')'
                    .'|/invoices/(?'
                        .'|([^/]++)(?'
                            .'|(*:289)'
                            .'|/edit(*:302)'
                            .'|(*:310)'
                        .')'
                        .'|ajax(*:323)'
                    .')'
                    .'|/_(?'
                        .'|error/(\\d+)(?:\\.([^/]++))?(*:363)'
                        .'|wdt/([^/]++)(*:383)'
                        .'|profiler/([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:429)'
                                .'|router(*:443)'
                                .'|exception(?'
                                    .'|(*:463)'
                                    .'|\\.css(*:476)'
                                .')'
                            .')'
                            .'|(*:486)'
                        .')'
                    .')'
                .')(?:/?)$}sDu',
        );
        $this->dynamicRoutes = array(
            29 => array(array(array('_route' => 'addresses_show', '_controller' => 'App\\Controller\\AddressesController::show'), array('id'), array('GET' => 0), null, false, null)),
            41 => array(array(array('_route' => 'addresses_edit', '_controller' => 'App\\Controller\\AddressesController::edit'), array('id'), array('GET' => 0, 'POST' => 1), null, false, null)),
            48 => array(array(array('_route' => 'addresses_delete', '_controller' => 'App\\Controller\\AddressesController::delete'), array('id'), array('DELETE' => 0), null, false, null)),
            84 => array(array(array('_route' => 'companies_show', '_controller' => 'App\\Controller\\CompaniesController::show'), array('id'), array('GET' => 0), null, false, null)),
            96 => array(array(array('_route' => 'companies_edit', '_controller' => 'App\\Controller\\CompaniesController::edit'), array('id'), array('GET' => 0, 'POST' => 1), null, false, null)),
            103 => array(array(array('_route' => 'companies_delete', '_controller' => 'App\\Controller\\CompaniesController::delete'), array('id'), array('DELETE' => 0), null, false, null)),
            131 => array(array(array('_route' => 'contracts_show', '_controller' => 'App\\Controller\\ContractsController::show'), array('id'), array('GET' => 0), null, false, null)),
            144 => array(array(array('_route' => 'contracts_edit', '_controller' => 'App\\Controller\\ContractsController::edit'), array('id'), array('GET' => 0, 'POST' => 1), null, false, null)),
            152 => array(array(array('_route' => 'contracts_delete', '_controller' => 'App\\Controller\\ContractsController::delete'), array('id'), array('DELETE' => 0), null, false, null)),
            182 => array(array(array('_route' => 'customers_show', '_controller' => 'App\\Controller\\CustomersController::show'), array('id'), array('GET' => 0), null, false, null)),
            195 => array(array(array('_route' => 'customers_edit', '_controller' => 'App\\Controller\\CustomersController::edit'), array('id'), array('GET' => 0, 'POST' => 1), null, false, null)),
            203 => array(array(array('_route' => 'customers_delete', '_controller' => 'App\\Controller\\CustomersController::delete'), array('id'), array('DELETE' => 0), null, false, null)),
            235 => array(array(array('_route' => 'employees_show', '_controller' => 'App\\Controller\\EmployeesController::show'), array('id'), array('GET' => 0), null, false, null)),
            248 => array(array(array('_route' => 'employees_edit', '_controller' => 'App\\Controller\\EmployeesController::edit'), array('id'), array('GET' => 0, 'POST' => 1), null, false, null)),
            256 => array(array(array('_route' => 'employees_delete', '_controller' => 'App\\Controller\\EmployeesController::delete'), array('id'), array('DELETE' => 0), null, false, null)),
            289 => array(array(array('_route' => 'invoices_show', '_controller' => 'App\\Controller\\InvoicesController::show'), array('id'), array('GET' => 0), null, false, null)),
            302 => array(array(array('_route' => 'invoices_edit', '_controller' => 'App\\Controller\\InvoicesController::edit'), array('id'), array('GET' => 0, 'POST' => 1), null, false, null)),
            310 => array(array(array('_route' => 'invoices_delete', '_controller' => 'App\\Controller\\InvoicesController::delete'), array('id'), array('DELETE' => 0), null, false, null)),
            323 => array(array(array('_route' => '_invoices_ajax', '_controller' => 'App\\Controller\\InvoicesController::ajax'), array(), null, null, false, null)),
            363 => array(array(array('_route' => '_twig_error_test', '_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'), array('code', '_format'), null, null, false, null)),
            383 => array(array(array('_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'), array('token'), null, null, false, null)),
            429 => array(array(array('_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'), array('token'), null, null, false, null)),
            443 => array(array(array('_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'), array('token'), null, null, false, null)),
            463 => array(array(array('_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception::showAction'), array('token'), null, null, false, null)),
            476 => array(array(array('_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception::cssAction'), array('token'), null, null, false, null)),
            486 => array(array(array('_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'), array('token'), null, null, false, null)),
        );
    }
}
