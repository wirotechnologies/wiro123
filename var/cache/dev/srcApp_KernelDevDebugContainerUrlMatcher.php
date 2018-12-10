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
            '/branches' => array(array(array('_route' => 'branches_index', '_controller' => 'App\\Controller\\BranchesController::index'), null, array('GET' => 0), null, true, null)),
            '/branches/new' => array(array(array('_route' => 'branches_new', '_controller' => 'App\\Controller\\BranchesController::new'), null, array('GET' => 0, 'POST' => 1), null, false, null)),
            '/companies' => array(array(array('_route' => 'companies_index', '_controller' => 'App\\Controller\\CompaniesController::index'), null, array('GET' => 0), null, true, null)),
            '/companies/new' => array(array(array('_route' => 'companies_new', '_controller' => 'App\\Controller\\CompaniesController::new'), null, array('GET' => 0, 'POST' => 1), null, false, null)),
            '/customers/address' => array(array(array('_route' => 'customers_address_index', '_controller' => 'App\\Controller\\CustomersAddressController::index'), null, array('GET' => 0), null, true, null)),
            '/customers/address/new' => array(array(array('_route' => 'customers_address_new', '_controller' => 'App\\Controller\\CustomersAddressController::new'), null, array('GET' => 0, 'POST' => 1), null, false, null)),
            '/employees' => array(array(array('_route' => 'employees_index', '_controller' => 'App\\Controller\\EmployeesController::index'), null, array('GET' => 0), null, true, null)),
            '/employees/new' => array(array(array('_route' => 'employees_new', '_controller' => 'App\\Controller\\EmployeesController::new'), null, array('GET' => 0, 'POST' => 1), null, false, null)),
            '/invoices' => array(array(array('_route' => 'invoices_index', '_controller' => 'App\\Controller\\InvoicesController::index'), null, array('GET' => 0), null, true, null)),
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
                    .'|/branches/([^/]++)(?'
                        .'|(*:28)'
                        .'|/edit(*:40)'
                        .'|(*:47)'
                    .')'
                    .'|/c(?'
                        .'|ompanies/([^/]++)(?'
                            .'|(*:80)'
                            .'|/edit(*:92)'
                            .'|(*:99)'
                        .')'
                        .'|ustomers/address/([^/]++)(?'
                            .'|(*:135)'
                            .'|/edit(*:148)'
                            .'|(*:156)'
                        .')'
                    .')'
                    .'|/employees/([^/]++)(?'
                        .'|(*:188)'
                        .'|/edit(*:201)'
                        .'|(*:209)'
                    .')'
                    .'|/invoices/([^/]++)(?'
                        .'|(*:239)'
                        .'|/edit(*:252)'
                        .'|(*:260)'
                    .')'
                    .'|/_(?'
                        .'|error/(\\d+)(?:\\.([^/]++))?(*:300)'
                        .'|wdt/([^/]++)(*:320)'
                        .'|profiler/([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:366)'
                                .'|router(*:380)'
                                .'|exception(?'
                                    .'|(*:400)'
                                    .'|\\.css(*:413)'
                                .')'
                            .')'
                            .'|(*:423)'
                        .')'
                    .')'
                .')(?:/?)$}sDu',
        );
        $this->dynamicRoutes = array(
            28 => array(array(array('_route' => 'branches_show', '_controller' => 'App\\Controller\\BranchesController::show'), array('id'), array('GET' => 0), null, false, null)),
            40 => array(array(array('_route' => 'branches_edit', '_controller' => 'App\\Controller\\BranchesController::edit'), array('id'), array('GET' => 0, 'POST' => 1), null, false, null)),
            47 => array(array(array('_route' => 'branches_delete', '_controller' => 'App\\Controller\\BranchesController::delete'), array('id'), array('DELETE' => 0), null, false, null)),
            80 => array(array(array('_route' => 'companies_show', '_controller' => 'App\\Controller\\CompaniesController::show'), array('id'), array('GET' => 0), null, false, null)),
            92 => array(array(array('_route' => 'companies_edit', '_controller' => 'App\\Controller\\CompaniesController::edit'), array('id'), array('GET' => 0, 'POST' => 1), null, false, null)),
            99 => array(array(array('_route' => 'companies_delete', '_controller' => 'App\\Controller\\CompaniesController::delete'), array('id'), array('DELETE' => 0), null, false, null)),
            135 => array(array(array('_route' => 'customers_address_show', '_controller' => 'App\\Controller\\CustomersAddressController::show'), array('id'), array('GET' => 0), null, false, null)),
            148 => array(array(array('_route' => 'customers_address_edit', '_controller' => 'App\\Controller\\CustomersAddressController::edit'), array('id'), array('GET' => 0, 'POST' => 1), null, false, null)),
            156 => array(array(array('_route' => 'customers_address_delete', '_controller' => 'App\\Controller\\CustomersAddressController::delete'), array('id'), array('DELETE' => 0), null, false, null)),
            188 => array(array(array('_route' => 'employees_show', '_controller' => 'App\\Controller\\EmployeesController::show'), array('id'), array('GET' => 0), null, false, null)),
            201 => array(array(array('_route' => 'employees_edit', '_controller' => 'App\\Controller\\EmployeesController::edit'), array('id'), array('GET' => 0, 'POST' => 1), null, false, null)),
            209 => array(array(array('_route' => 'employees_delete', '_controller' => 'App\\Controller\\EmployeesController::delete'), array('id'), array('DELETE' => 0), null, false, null)),
            239 => array(array(array('_route' => 'invoices_show', '_controller' => 'App\\Controller\\InvoicesController::show'), array('id'), array('GET' => 0), null, false, null)),
            252 => array(array(array('_route' => 'invoices_edit', '_controller' => 'App\\Controller\\InvoicesController::edit'), array('id'), array('GET' => 0, 'POST' => 1), null, false, null)),
            260 => array(array(array('_route' => 'invoices_delete', '_controller' => 'App\\Controller\\InvoicesController::delete'), array('id'), array('DELETE' => 0), null, false, null)),
            300 => array(array(array('_route' => '_twig_error_test', '_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'), array('code', '_format'), null, null, false, null)),
            320 => array(array(array('_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'), array('token'), null, null, false, null)),
            366 => array(array(array('_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'), array('token'), null, null, false, null)),
            380 => array(array(array('_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'), array('token'), null, null, false, null)),
            400 => array(array(array('_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception::showAction'), array('token'), null, null, false, null)),
            413 => array(array(array('_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception::cssAction'), array('token'), null, null, false, null)),
            423 => array(array(array('_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'), array('token'), null, null, false, null)),
        );
    }
}
