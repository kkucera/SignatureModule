<?php
return array(

    'tokens' => array(

    ),

    'asset_manager' => array(
        'resolver_configs' => array(
            'paths' => array(
                __DIR__ . '/../public',
            ),
        ),
    ),

    'controllers' => array(
        'invokables' => array(
            'ZendSkeletonModule\Controller\Skeleton' => 'ZendSkeletonModule\Controller\SkeletonController',
            'DeskModule\Controller\Console' => 'DeskModule\Controller\ConsoleController'
        ),
    ),

    'router' => array(
        'routes' => array(
            'signature-module' => array(
                'type'    => 'Literal',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/module-specific-root',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        '__NAMESPACE__' => 'ZendSkeletonModule\Controller',
                        'controller'    => 'Skeleton',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    // This route is a sane default when developing a module;
                    // as you solidify the routes for your module, however,
                    // you may want to remove it and replace it with more
                    // specific routes.
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),

//    'view_manager' => array(
//        'template_path_stack' => array(
//            'ZendSkeletonModule' => __DIR__ . '/../view',
//        ),
//    ),
//
//    'DoctrineConnectorInitializer' => array(
//        'DeskModule\DoctrineConnector\MasterSlaveAwareInterface' => 'desk_master_slave',
//        'DeskModule\DoctrineConnector\App\MasterSlaveAwareInterface' => 'desk_app_master_slave',
//    ),
//
//    'di' => array(
//        'instance' => array(
//            'preference' => array(
//                'Zend\EventManager\SharedEventManagerInterface' => 'Zend\EventManager\SharedEventManager', // TODO Use factory to get shared instance.
//            ),
//        ),
//    ),
//
//    'service_manager' => array(
//        'invokables' => array(
//
//            // Register the following services so that they do not fall back to DI. DI will doubly register event listeners.
//            'DeskModule\Company\Company' => 'DeskModule\Company\Company',
//            'DeskModule\Map\Company' => 'DeskModule\Map\Company',
//            'DeskModule\Client\Company\Company' => 'DeskModule\Client\Company\Company',
//
//            'DeskModule\Customer\Customer' => 'DeskModule\Customer\Customer',
//            'DeskModule\Map\Customer' => 'DeskModule\Map\Customer',
//            'DeskModule\Client\Customer\Customer' => 'DeskModule\Client\Customer\Customer',
//
//            'DeskModule\Client\Customer\Response\Validator' => 'DeskModule\Client\Customer\Response\Validator',
//
//            'DeskModule\Queue\Service' => 'DeskModule\Queue\Service',
//        ),
//    ),
//
//    'factories' => array(
//
//        'EMRCore\DoctrineConnector\DoctrineConnectorFactory' => array(
//            'registry' => array(
//                'desk_app_master_slave' => array(
//                    'adapter' => 'DOCTRINE_DESK_APP_ADAPTER',
//                    'params' => array(
//                        'wrapperClass' => 'DOCTRINE_DESK_APP_CONNECTION_WRAPPER',
//                        'driver' => 'DOCTRINE_DESK_APP_DRIVER',
//                        'driverOptions' => array(
//                            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'", // To support transport of special characters.
//                            PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,  //Fix issue with connection to single or multi tenant
//                        ),
//                        'master' => array(
//                            'host' => 'DESK_APP_WRITER_HOST',
//                            'port' => 'DESK_APP_WRITER_PORT',
//                            'user' => 'DESK_APP_WRITER_USERNAME',
//                            'password' => 'DESK_APP_WRITER_PASSWORD',
//                            'dbname' => 'DESK_APP_WRITER_SCHEMA',
//                        ),
//                        'slaves' => array(
//                            'a' => array(
//                                'host' => 'DESK_APP_READER_HOST',
//                                'port' => 'DESK_APP_READER_PORT',
//                                'user' => 'DESK_APP_READER_USERNAME',
//                                'password' => 'DESK_APP_READER_PASSWORD',
//                                'dbname' => 'DESK_APP_READER_SCHEMA',
//                            ),
//                        ),
//                        'model_dir' => 'DOCTRINE_DESK_APP_MODEL_DIR',
//                        'proxy_dir' => 'DOCTRINE_DESK_APP_PROXY_DIR',
//                        'cache' => array(
//                            'query' => null,
//                            'result' => null,
//                            'metadata' => array(
//                                'driver' => 'CACHE_DRIVER_DOCTRINE_DESK_APP_METADATA',
//                                'params' => array(
//                                    'servers' => array(
//                                        'a' => 'CACHE_DOCTRINE_DESK_APP_METADATA',
//                                    ),
//                                ),
//                            ),
//                        ),
//                    ),
//                ),
//                'desk_master_slave' => array(
//                    'adapter' => 'DOCTRINE_DESK_ADAPTER',
//                    'params' => array(
//                        'wrapperClass' => 'DOCTRINE_DESK_CONNECTION_WRAPPER',
//                        'driver' => 'DOCTRINE_DESK_DRIVER',
//                        'driverOptions' => array(
//                            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'", // To support transport of special characters.
//                            PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,  //Fix issue with connection to single or multi tenant
//                        ),
//                        'master' => array(
//                            'host' => 'DB_DESK_WRITER_HOST',
//                            'port' => 'DB_DESK_WRITER_PORT',
//                            'user' => 'DB_DESK_WRITER_USERNAME',
//                            'password' => 'DB_DESK_WRITER_PASSWORD',
//                            'dbname' => 'DB_DESK_WRITER_SCHEMA',
//                        ),
//                        'slaves' => array(
//                            'a' => array(
//                                'host' => 'DB_DESK_READER_HOST',
//                                'port' => 'DB_DESK_READER_PORT',
//                                'user' => 'DB_DESK_READER_USERNAME',
//                                'password' => 'DB_DESK_READER_PASSWORD',
//                                'dbname' => 'DB_DESK_READER_SCHEMA',
//                            ),
//                        ),
//                        'model_dir' => 'DOCTRINE_DESK_MODEL_DIR',
//                        'proxy_dir' => 'DOCTRINE_DESK_PROXY_DIR',
//                        'cache' => array(
//                            'query' => null,
//                            'result' => null,
//                            'metadata' => array(
//                                'driver' => 'CACHE_DRIVER_DOCTRINE_DESK_METADATA',
//                                'params' => array(
//                                    'servers' => array(
//                                        'a' => 'CACHE_DOCTRINE_DESK_METADATA',
//                                    ),
//                                ),
//                            ),
//                        ),
//                    ),
//                ),
//            ),
//        ),
//    ),
);