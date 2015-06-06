<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/bean')) {
            // bean
            if (rtrim($pathinfo, '/') === '/bean') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_bean;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'bean');
                }

                return array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\BeanController::indexAction',  '_route' => 'bean',);
            }
            not_bean:

            // bean_create
            if ($pathinfo === '/bean/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_bean_create;
                }

                return array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\BeanController::createAction',  '_route' => 'bean_create',);
            }
            not_bean_create:

            // bean_new
            if ($pathinfo === '/bean/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_bean_new;
                }

                return array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\BeanController::newAction',  '_route' => 'bean_new',);
            }
            not_bean_new:

            // bean_show
            if (preg_match('#^/bean/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_bean_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'bean_show')), array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\BeanController::showAction',));
            }
            not_bean_show:

            // bean_edit
            if (preg_match('#^/bean/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_bean_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'bean_edit')), array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\BeanController::editAction',));
            }
            not_bean_edit:

            // bean_update
            if (preg_match('#^/bean/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_bean_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'bean_update')), array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\BeanController::updateAction',));
            }
            not_bean_update:

            // bean_delete
            if (preg_match('#^/bean/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_bean_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'bean_delete')), array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\BeanController::deleteAction',));
            }
            not_bean_delete:

        }

        // formindex
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'formindex')), array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\DefaultController::indexAction',));
        }

        if (0 === strpos($pathinfo, '/field')) {
            // field
            if (rtrim($pathinfo, '/') === '/field') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_field;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'field');
                }

                return array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\FieldController::indexAction',  '_route' => 'field',);
            }
            not_field:

            // field_create
            if ($pathinfo === '/field/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_field_create;
                }

                return array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\FieldController::createAction',  '_route' => 'field_create',);
            }
            not_field_create:

            // field_new
            if ($pathinfo === '/field/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_field_new;
                }

                return array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\FieldController::newAction',  '_route' => 'field_new',);
            }
            not_field_new:

            // field_show
            if (preg_match('#^/field/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_field_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'field_show')), array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\FieldController::showAction',));
            }
            not_field_show:

            // field_edit
            if (preg_match('#^/field/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_field_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'field_edit')), array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\FieldController::editAction',));
            }
            not_field_edit:

            // field_update
            if (preg_match('#^/field/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_field_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'field_update')), array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\FieldController::updateAction',));
            }
            not_field_update:

            // field_delete
            if (preg_match('#^/field/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_field_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'field_delete')), array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\FieldController::deleteAction',));
            }
            not_field_delete:

        }

        if (0 === strpos($pathinfo, '/model')) {
            // model
            if (rtrim($pathinfo, '/') === '/model') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_model;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'model');
                }

                return array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\ModelController::indexAction',  '_route' => 'model',);
            }
            not_model:

            // model_create
            if ($pathinfo === '/model/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_model_create;
                }

                return array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\ModelController::createAction',  '_route' => 'model_create',);
            }
            not_model_create:

            // model_new
            if ($pathinfo === '/model/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_model_new;
                }

                return array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\ModelController::newAction',  '_route' => 'model_new',);
            }
            not_model_new:

            // model_show
            if (preg_match('#^/model/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_model_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'model_show')), array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\ModelController::showAction',));
            }
            not_model_show:

            // model_edit
            if (preg_match('#^/model/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_model_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'model_edit')), array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\ModelController::editAction',));
            }
            not_model_edit:

            // model_update
            if (preg_match('#^/model/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_model_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'model_update')), array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\ModelController::updateAction',));
            }
            not_model_update:

            // model_delete
            if (preg_match('#^/model/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_model_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'model_delete')), array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\ModelController::deleteAction',));
            }
            not_model_delete:

        }

        if (0 === strpos($pathinfo, '/project')) {
            // project
            if (rtrim($pathinfo, '/') === '/project') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_project;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'project');
                }

                return array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\ProjectController::indexAction',  '_route' => 'project',);
            }
            not_project:

            // project_create
            if ($pathinfo === '/project/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_project_create;
                }

                return array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\ProjectController::createAction',  '_route' => 'project_create',);
            }
            not_project_create:

            // project_new
            if ($pathinfo === '/project/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_project_new;
                }

                return array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\ProjectController::newAction',  '_route' => 'project_new',);
            }
            not_project_new:

            // project_show
            if (preg_match('#^/project/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_project_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'project_show')), array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\ProjectController::showAction',));
            }
            not_project_show:

            // project_edit
            if (preg_match('#^/project/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_project_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'project_edit')), array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\ProjectController::editAction',));
            }
            not_project_edit:

            // project_update
            if (preg_match('#^/project/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_project_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'project_update')), array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\ProjectController::updateAction',));
            }
            not_project_update:

            // project_delete
            if (preg_match('#^/project/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_project_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'project_delete')), array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\ProjectController::deleteAction',));
            }
            not_project_delete:

        }

        if (0 === strpos($pathinfo, '/test')) {
            // test
            if (rtrim($pathinfo, '/') === '/test') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_test;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'test');
                }

                return array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\TestController::indexAction',  '_route' => 'test',);
            }
            not_test:

            // test_create
            if ($pathinfo === '/test/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_test_create;
                }

                return array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\TestController::createAction',  '_route' => 'test_create',);
            }
            not_test_create:

            // test_new
            if ($pathinfo === '/test/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_test_new;
                }

                return array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\TestController::newAction',  '_route' => 'test_new',);
            }
            not_test_new:

            // test_show
            if (preg_match('#^/test/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_test_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'test_show')), array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\TestController::showAction',));
            }
            not_test_show:

            // test_edit
            if (preg_match('#^/test/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_test_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'test_edit')), array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\TestController::editAction',));
            }
            not_test_edit:

            // test_update
            if (preg_match('#^/test/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_test_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'test_update')), array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\TestController::updateAction',));
            }
            not_test_update:

            // test_delete
            if (preg_match('#^/test/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_test_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'test_delete')), array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\TestController::deleteAction',));
            }
            not_test_delete:

        }

        if (0 === strpos($pathinfo, '/user')) {
            // user
            if (rtrim($pathinfo, '/') === '/user') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_user;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'user');
                }

                return array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\UserController::indexAction',  '_route' => 'user',);
            }
            not_user:

            // user_create
            if ($pathinfo === '/user/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_user_create;
                }

                return array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\UserController::createAction',  '_route' => 'user_create',);
            }
            not_user_create:

            // user_new
            if ($pathinfo === '/user/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_user_new;
                }

                return array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\UserController::newAction',  '_route' => 'user_new',);
            }
            not_user_new:

            // user_show
            if (preg_match('#^/user/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_user_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_show')), array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\UserController::showAction',));
            }
            not_user_show:

            // user_edit
            if (preg_match('#^/user/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_user_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_edit')), array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\UserController::editAction',));
            }
            not_user_edit:

            // user_update
            if (preg_match('#^/user/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_user_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_update')), array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\UserController::updateAction',));
            }
            not_user_update:

            // user_delete
            if (preg_match('#^/user/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_user_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_delete')), array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\UserController::deleteAction',));
            }
            not_user_delete:

        }

        if (0 === strpos($pathinfo, '/webservice')) {
            // webservice
            if (rtrim($pathinfo, '/') === '/webservice') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_webservice;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'webservice');
                }

                return array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\WebServiceController::indexAction',  '_route' => 'webservice',);
            }
            not_webservice:

            // webservice_create
            if ($pathinfo === '/webservice/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_webservice_create;
                }

                return array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\WebServiceController::createAction',  '_route' => 'webservice_create',);
            }
            not_webservice_create:

            // webservice_new
            if ($pathinfo === '/webservice/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_webservice_new;
                }

                return array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\WebServiceController::newAction',  '_route' => 'webservice_new',);
            }
            not_webservice_new:

            // webservice_show
            if (preg_match('#^/webservice/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_webservice_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'webservice_show')), array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\WebServiceController::showAction',));
            }
            not_webservice_show:

            // webservice_edit
            if (preg_match('#^/webservice/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_webservice_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'webservice_edit')), array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\WebServiceController::editAction',));
            }
            not_webservice_edit:

            // webservice_update
            if (preg_match('#^/webservice/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_webservice_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'webservice_update')), array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\WebServiceController::updateAction',));
            }
            not_webservice_update:

            // webservice_delete
            if (preg_match('#^/webservice/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_webservice_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'webservice_delete')), array (  '_controller' => 'WebService\\WebServiceBundle\\Controller\\WebServiceController::deleteAction',));
            }
            not_webservice_delete:

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
