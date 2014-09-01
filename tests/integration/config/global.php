<?php
return array(
    'tokens' => array(
        'DOCTRINE_DESK_ADAPTER' => 'EMRCore\DoctrineConnector\Adapter\Adapter',
        'DOCTRINE_DESK_CONNECTION_WRAPPER' => 'EMRCore\DoctrineConnector\AppMasterSlaveConnection',

        'DB_DESK_WRITER_HOST' => 'localhost',
        'DB_DESK_WRITER_PORT' => '3306',
        'DB_DESK_WRITER_USERNAME' => 'root',
        'DB_DESK_WRITER_PASSWORD' => '',
        'DB_DESK_WRITER_SCHEMA' => 'test',
        'DB_DESK_READER_HOST' => 'localhost',
        'DB_DESK_READER_PORT' => '3306',
        'DB_DESK_READER_USERNAME' => 'root',
        'DB_DESK_READER_PASSWORD' => '',
        'DB_DESK_READER_SCHEMA' => 'test',
        'DOCTRINE_DESK_PROXY_DIR' => sys_get_temp_dir(),

        'DESK_SUBDOMAIN' => 'webpt',
        'DESK_USERNAME' => '',
        'DESK_PASSWORD' => '',

        'DESK_APP_WRITER_HOST' => 'localhost',
        'DESK_APP_WRITER_PORT' => '3306',
        'DESK_APP_WRITER_USERNAME' => 'root',
        'DESK_APP_WRITER_PASSWORD' => '',
        'DESK_APP_WRITER_SCHEMA' => 'test',
        'DESK_APP_READER_HOST' => 'localhost',
        'DESK_APP_READER_PORT' => '3306',
        'DESK_APP_READER_USERNAME' => 'root',
        'DESK_APP_READER_PASSWORD' => '',
        'DESK_APP_READER_SCHEMA' => 'test',
        'DOCTRINE_DESK_APP_MODEL_DIR' => __DIR__ . '/../../../vendor/WebPT/EMRModel/config/xml',
        'DOCTRINE_DESK_APP_PROXY_DIR' => '../../../../../data/model/proxies/', // Relative to \EMRCore\DoctrineConnector\Adapter\Adapter
    ),

    'service_manager' => array(
        'invokables' => array(
            'Integration\src\SignatureModule\Company\CompanyDepender' => 'Integration\src\SignatureModule\Company\CompanyDepender',
            'Integration\src\SignatureModule\Customer\CustomerDepender' => 'Integration\src\SignatureModule\Customer\CustomerDepender',
        ),
    ),
);