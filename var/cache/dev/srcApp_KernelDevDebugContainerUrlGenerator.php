<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class srcApp_KernelDevDebugContainerUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    private static $declaredRoutes;
    private $defaultLocale;

    public function __construct(RequestContext $context, LoggerInterface $logger = null, string $defaultLocale = null)
    {
        $this->context = $context;
        $this->logger = $logger;
        $this->defaultLocale = $defaultLocale;
        if (null === self::$declaredRoutes) {
            self::$declaredRoutes = array(
        'branches_index' => array(array(), array('_controller' => 'App\\Controller\\BranchesController::index'), array(), array(array('text', '/branches/')), array(), array()),
        'branches_new' => array(array(), array('_controller' => 'App\\Controller\\BranchesController::new'), array(), array(array('text', '/branches/new')), array(), array()),
        'branches_show' => array(array('id'), array('_controller' => 'App\\Controller\\BranchesController::show'), array(), array(array('variable', '/', '[^/]++', 'id', true), array('text', '/branches')), array(), array()),
        'branches_edit' => array(array('id'), array('_controller' => 'App\\Controller\\BranchesController::edit'), array(), array(array('text', '/edit'), array('variable', '/', '[^/]++', 'id', true), array('text', '/branches')), array(), array()),
        'branches_delete' => array(array('id'), array('_controller' => 'App\\Controller\\BranchesController::delete'), array(), array(array('variable', '/', '[^/]++', 'id', true), array('text', '/branches')), array(), array()),
        'companies_index' => array(array(), array('_controller' => 'App\\Controller\\CompaniesController::index'), array(), array(array('text', '/companies/')), array(), array()),
        'companies_new' => array(array(), array('_controller' => 'App\\Controller\\CompaniesController::new'), array(), array(array('text', '/companies/new')), array(), array()),
        'companies_show' => array(array('id'), array('_controller' => 'App\\Controller\\CompaniesController::show'), array(), array(array('variable', '/', '[^/]++', 'id', true), array('text', '/companies')), array(), array()),
        'companies_edit' => array(array('id'), array('_controller' => 'App\\Controller\\CompaniesController::edit'), array(), array(array('text', '/edit'), array('variable', '/', '[^/]++', 'id', true), array('text', '/companies')), array(), array()),
        'companies_delete' => array(array('id'), array('_controller' => 'App\\Controller\\CompaniesController::delete'), array(), array(array('variable', '/', '[^/]++', 'id', true), array('text', '/companies')), array(), array()),
        'employees_index' => array(array(), array('_controller' => 'App\\Controller\\EmployeesController::index'), array(), array(array('text', '/employees/')), array(), array()),
        'employees_new' => array(array(), array('_controller' => 'App\\Controller\\EmployeesController::new'), array(), array(array('text', '/employees/new')), array(), array()),
        'employees_show' => array(array('id'), array('_controller' => 'App\\Controller\\EmployeesController::show'), array(), array(array('variable', '/', '[^/]++', 'id', true), array('text', '/employees')), array(), array()),
        'employees_edit' => array(array('id'), array('_controller' => 'App\\Controller\\EmployeesController::edit'), array(), array(array('text', '/edit'), array('variable', '/', '[^/]++', 'id', true), array('text', '/employees')), array(), array()),
        'employees_delete' => array(array('id'), array('_controller' => 'App\\Controller\\EmployeesController::delete'), array(), array(array('variable', '/', '[^/]++', 'id', true), array('text', '/employees')), array(), array()),
        '_twig_error_test' => array(array('code', '_format'), array('_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'), array('code' => '\\d+'), array(array('variable', '.', '[^/]++', '_format', true), array('variable', '/', '\\d+', 'code', true), array('text', '/_error')), array(), array()),
        '_wdt' => array(array('token'), array('_controller' => 'web_profiler.controller.profiler::toolbarAction'), array(), array(array('variable', '/', '[^/]++', 'token', true), array('text', '/_wdt')), array(), array()),
        '_profiler_home' => array(array(), array('_controller' => 'web_profiler.controller.profiler::homeAction'), array(), array(array('text', '/_profiler/')), array(), array()),
        '_profiler_search' => array(array(), array('_controller' => 'web_profiler.controller.profiler::searchAction'), array(), array(array('text', '/_profiler/search')), array(), array()),
        '_profiler_search_bar' => array(array(), array('_controller' => 'web_profiler.controller.profiler::searchBarAction'), array(), array(array('text', '/_profiler/search_bar')), array(), array()),
        '_profiler_phpinfo' => array(array(), array('_controller' => 'web_profiler.controller.profiler::phpinfoAction'), array(), array(array('text', '/_profiler/phpinfo')), array(), array()),
        '_profiler_search_results' => array(array('token'), array('_controller' => 'web_profiler.controller.profiler::searchResultsAction'), array(), array(array('text', '/search/results'), array('variable', '/', '[^/]++', 'token', true), array('text', '/_profiler')), array(), array()),
        '_profiler_open_file' => array(array(), array('_controller' => 'web_profiler.controller.profiler::openAction'), array(), array(array('text', '/_profiler/open')), array(), array()),
        '_profiler' => array(array('token'), array('_controller' => 'web_profiler.controller.profiler::panelAction'), array(), array(array('variable', '/', '[^/]++', 'token', true), array('text', '/_profiler')), array(), array()),
        '_profiler_router' => array(array('token'), array('_controller' => 'web_profiler.controller.router::panelAction'), array(), array(array('text', '/router'), array('variable', '/', '[^/]++', 'token', true), array('text', '/_profiler')), array(), array()),
        '_profiler_exception' => array(array('token'), array('_controller' => 'web_profiler.controller.exception::showAction'), array(), array(array('text', '/exception'), array('variable', '/', '[^/]++', 'token', true), array('text', '/_profiler')), array(), array()),
        '_profiler_exception_css' => array(array('token'), array('_controller' => 'web_profiler.controller.exception::cssAction'), array(), array(array('text', '/exception.css'), array('variable', '/', '[^/]++', 'token', true), array('text', '/_profiler')), array(), array()),
        'login' => array(array(), array('template' => 'login.html.twig', '_controller' => 'App\\Controller\\DefaultController::index'), array(), array(array('text', '/')), array(), array()),
    );
        }
    }

    public function generate($name, $parameters = array(), $referenceType = self::ABSOLUTE_PATH)
    {
        $locale = $parameters['_locale']
            ?? $this->context->getParameter('_locale')
            ?: $this->defaultLocale;

        if (null !== $locale && null !== $name) {
            do {
                if ((self::$declaredRoutes[$name.'.'.$locale][1]['_canonical_route'] ?? null) === $name) {
                    unset($parameters['_locale']);
                    $name .= '.'.$locale;
                    break;
                }
            } while (false !== $locale = strstr($locale, '_', true));
        }

        if (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Unable to generate a URL for the named route "%s" as such route does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens, $hostTokens, $requiredSchemes) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens, $requiredSchemes);
    }
}
