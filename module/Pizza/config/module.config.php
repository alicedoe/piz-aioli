<?php

namespace Pizza;

return array(
    'router' => array(
        'routes' => array(
            //controller index
            'index' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'constraints' => array(
                        'id'     => '[0-9]+',
                    ),
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'Pizza\Controller\Index',
                        'action' => 'pizofday',
                    ),
                ),
            ),         
            'listcart' => array(
                'type'    => 'segment',
                'options' => array(
                    'route' => '/listcart',
                    'defaults' => array(
                        'controller' => 'Pizza\Controller\Ajax',
                        'action' => 'listcart',
                    ),
                ),
            ),
            'addtocart' => array(
                'type'    => 'segment',
                'options' => array(
                    'route' => '/addtocart[/:id]',
                    'defaults' => array(
                        'controller' => 'Pizza\Controller\Ajax',
                        'action' => 'addtocart',
                    ),
                ),
            ),
            'emptycart' => array(
                'type'    => 'segment',
                'options' => array(
                    'route' => '/emptycart',
                    'defaults' => array(
                        'controller' => 'Pizza\Controller\Ajax',
                        'action' => 'emptycart',
                    ),
                ),
            ),
            'localisation' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/localisation',
                    'defaults' => array(
                        'controller' => 'Pizza\Controller\Index',
                        'action'     => 'localisation',
                        
                    )
                ),
            ),
            'cartepizzas' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/cartepizzas',
                    'defaults' => array(
                        'controller' => 'Pizza\Controller\Index',
                        'action' => 'cartepizzas',
                    ),
                ),
            ),
            'detailpizzamenu' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/detailpizzamenu[/:id]',
                    'defaults' => array(
                        'controller' => 'Pizza\Controller\Index',
                        'action' => 'detailpizzamenu',
                    ),
                ),
            ),
            'disconnect' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/disconnect',
                    'defaults' => array(
                        'controller' => 'Pizza\Controller\Index',
                        'action' => 'disconnect',
                    ),
                ),
            ),
            'zfcadmin' => array(
                'options' => array(
                    'route' => '/backend',
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'adminpizza' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/adminpizza',
                            'defaults' => array(
                                'controller' => 'Pizza\Controller\Editcarte',
                                'action' => 'admincartepizzas',
                            ),
                        ),
                    ),
                    'addpizza' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/editcarte',
                            'defaults' => array(
                                'controller' => 'Pizza\Controller\Editcarte',
                                'action' => 'index',
                            ),
                        ),
                    ),
                    'editpizza' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '/editpizza[/:id]',
                            'defaults' => array(
                                'controller' => 'Pizza\Controller\Editcarte',
                                'action' => 'editpizza',
                            ),
                        ),
                    ),
                    'gestioncommandes' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/gestioncommandes',
                            'defaults' => array(
                                'controller' => 'Pizza\Controller\Gestioncommandes',
                                'action' => 'index',
                            ),
                        ),
                    ),
                    'deletepizza' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '/deletepizza[/:id]',
                            'defaults' => array(
                                'controller' => 'Pizza\Controller\Ajax',
                                'action' => 'deletepizza',
                            ),
                        ),
                    ),
                    'setpizofday' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '/setpizofday[/:id]',
                            'defaults' => array(
                                'controller' => 'Pizza\Controller\Ajax',
                                'action' => 'setpizofday',
                            ),
                        ),
                    ),
                    'setaumenu' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '/setaumenu[/:id]',
                            'defaults' => array(
                                'controller' => 'Pizza\Controller\Ajax',
                                'action' => 'setaumenu',
                            ),
                        ),
                    ),
                    'unsetmenu' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '/unsetmenu[/:id]',
                            'defaults' => array(
                                'controller' => 'Pizza\Controller\Ajax',
                                'action' => 'unsetmenu',
                            ),
                        ),
                    ),
                    'editlocalisation' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/editlocalisation',
                            'defaults' => array(
                                'controller' => 'Pizza\Controller\Admincommandes',
                                'action' => 'editlocalisation',
                            ),
                        ),
                    ),
                ),
            ),
            //controller Membre
            'userdetail' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/detail',
                    'defaults' => array(
                        'controller' => 'Pizza/Controller/Membre',
                        'action' => 'detail',
                    ),
                ),
            ),
            'connect' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/connect',
                    'defaults' => array(
                        'controller' => 'Pizza\Controller\Log',
                        'action' => 'connect',
                    ),
                ),
            ),
            'register' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/register',
                    'defaults' => array(
                        'controller' => 'Pizza\Controller\Log',
                        'action' => 'adduser',
                    ),
                ),
            ),
            'edituser' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/edituser',
                    'defaults' => array(
                        'controller' => 'Pizza\Controller\Log',
                        'action' => 'edituser',
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'factories' => array(
            'Pizza\Controller\Index' => 'Pizza\Factory\IndexControllerFactory',
            'Pizza\Controller\Editcarte' => 'Pizza\Factory\EditcarteControllerFactory',
            'Pizza\Controller\Gestioncommandes' => 'Pizza\Factory\GestioncommandesControllerFactory',
            'Pizza\Controller\Membre' => 'Pizza\Factory\MembreControllerFactory',
            'Pizza\Controller\Log' => 'Pizza\Factory\LogControllerFactory',
            'Pizza\Controller\Ajax' => 'Pizza\Factory\AjaxControllerFactory',
            'Pizza\Controller\Admincommandes' => 'Pizza\Factory\AdmincommandesControllerFactory',
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            //'module/controller/action'
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
            'pizza/index/detailpizzamenu' => __DIR__ . '/../view/pizza/index/pizza_au_menu.phtml',            
            'pizza/index/pizofday' => __DIR__ . '/../view/pizza/index/pizofday.phtml',
            'pizza/ajax/index' => __DIR__ . '/../view/pizza/index/pizofday.phtml',
            'pizza/index/cartepizzas' => __DIR__ . '/../view/pizza/index/pizza_au_menu.phtml',
            'pizza/index/chat' => __DIR__ . '/../view/pizza/index/chat.phtml',
            'pizza/index/disconnect' => __DIR__ . '/../view/pizza/index/pizofday.phtml',
            'pizza/index/localisation' => __DIR__ . '/../view/pizza/index/localisation.phtml',
            'pizza/log/connect' => __DIR__ . '/../view/pizza/index/connect.phtml',
            'pizza/log/adduser' => __DIR__ . '/../view/pizza/index/register.phtml',
            'pizza/log/edituser' => __DIR__ . '/../view/pizza/index/register.phtml',
            'pizza/membre/detail' => __DIR__ . '/../view/pizza/index/detail.phtml',
            'pizza/editcarte/index' => __DIR__ . '/../view/pizza/index/editcarte.phtml',
            'pizza/editcarte/editpizza' => __DIR__ . '/../view/pizza/index/editcarte.phtml',
            'pizza/editcarte/admincartepizzas' => __DIR__ . '/../view/pizza/index/adminpizza.phtml',
            'pizza/admincommandes/editlocalisation' => __DIR__ . '/../view/pizza/index/editlocalisation.phtml',
            'pizza/gestioncommandes/index' => __DIR__ . '/../view/pizza/index/gestioncommandes.phtml',
        ),
        'template_path_stack' => array(
            'pizza' => __DIR__ . '/../view',
        ),        'strategies' => array(
            'ViewJsonStrategy',
        ),   ),
'translator' => array(
    'locale' => 'es_ES',
    'translation_file_patterns' => array(
        array(
            'type'     => 'gettext',
            'base_dir' => __DIR__ . '/../language',
            'pattern'  => '%s.mo',
            'text_domain' => __NAMESPACE__,
        ),
    ),
), 
    
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity',
                )
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver',
                )
            )
        )
    ),
);
