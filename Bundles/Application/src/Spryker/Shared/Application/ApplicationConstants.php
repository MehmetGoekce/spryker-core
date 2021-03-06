<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Shared\Application;

use Spryker\Shared\Kernel\KernelConstants;

/**
 * Declares global environment configuration keys. Do not use it for other class constants.
 */
interface ApplicationConstants
{
    const COUCHBASE_BUCKET_PREFIX = 'COUCHBASE_BUCKET_PREFIX';
    const DISPLAY_ERRORS = 'DISPLAY_ERRORS';

    const ENABLE_APPLICATION_DEBUG = 'ENABLE_APPLICATION_DEBUG';
    const ENABLE_WEB_PROFILER = 'ENABLE_WEB_PROFILER';

    const SHOW_SYMFONY_TOOLBAR = 'SHOW_SYMFONY_TOOLBAR'; // Deprecated: Will be removed with the next major.
    const STORE_PREFIX = 'STORE_PREFIX';
    const BACKTRACE_USER_PATH = 'BACKTRACE_USER_PATH';

    /**
     * @deprecated Use `TwigConstants::YVES_THEME` instead
     */
    const YVES_THEME = 'YVES_THEME';

    /**
     * Specification:
     * - If option set to true, the application will check if the request is secure and not excluded from https.
     * - If request is not secure and not excluded from https, the application will return a redirect response.
     * - If request is secure and page is excluded from https, the application will allow http.
     *
     * @api
     */
    const YVES_SSL_ENABLED = 'YVES_SSL_ENABLED';

    /**
     * Specification:
     * - An array of HTTPS Excluded resources when ssl is enabled.
     * - Example: `['route-name-a' => '/url-a', 'route-name-b' => '/url-b']`
     *
     * @api
     */
    const YVES_SSL_EXCLUDED = 'YVES_SSL_EXCLUDED';

    /**
     * Specification:
     * - IP address (or range) of your proxy.
     * - Example: `['192.0.0.1', '10.0.0.0/8']`.
     *
     * @api
     */
    const YVES_TRUSTED_PROXIES = 'YVES_TRUSTED_PROXIES';

    /**
     * Specification:
     * - List of trusted hosts managed by regexp.
     *
     * @api
     */
    const YVES_TRUSTED_HOSTS = 'YVES_TRUSTED_HOSTS';

    const YVES_HTTP_STRICT_TRANSPORT_SECURITY_ENABLED = 'YVES_HTTP_STRICT_TRANSPORT_SECURITY_ENABLED';
    const YVES_HTTP_STRICT_TRANSPORT_SECURITY_CONFIG = 'YVES_HTTP_STRICT_TRANSPORT_SECURITY_CONFIG';

    /**
     * @deprecated Use only `YVES_SSL_ENABLED` in combination with `YVES_SSL_EXCLUDED`. If `YVES_SSL_EXCLUDED` is empty the page is complete ssl enabled then.
     */
    const YVES_COMPLETE_SSL_ENABLED = 'YVES_COMPLETE_SSL_ENABLED';

    const YVES_COOKIE_VISITOR_ID_NAME = 'YVES_COOKIE_VISITOR_ID_NAME';
    const YVES_COOKIE_VISITOR_ID_VALID_FOR = 'YVES_COOKIE_VISITOR_ID_VALID_FOR';
    const YVES_COOKIE_DEVICE_ID_NAME = 'YVES_COOKIE_DEVICE_ID_NAME';
    const YVES_COOKIE_DEVICE_ID_VALID_FOR = 'YVES_COOKIE_DEVICE_ID_VALID_FOR';

    const YVES_AUTH_SETTINGS = 'YVES_AUTH_SETTINGS';

    /**
     * @deprecated Use `Spryker\Shared\Kernel\KernelConstants::PROJECT_NAMESPACES` instead
     */
    const PROJECT_NAMESPACES = KernelConstants::PROJECT_NAMESPACES;

    /**
     * @deprecated Use `Spryker\Shared\Kernel\KernelConstants::CORE_NAMESPACES` instead
     */
    const CORE_NAMESPACES = KernelConstants::CORE_NAMESPACES;

    /**
     * @deprecated Use `Spryker\Shared\Search\SearchConstants::ELASTICA_PARAMETER__HOST` instead
     */
    const ELASTICA_PARAMETER__HOST = 'ELASTICA_PARAMETER__HOST';

    /**
     * @deprecated Use `Spryker\Shared\Search\SearchConstants::ELASTICA_PARAMETER__PORT` instead
     */
    const ELASTICA_PARAMETER__PORT = 'ELASTICA_PARAMETER__PORT';

    /**
     * @deprecated Use `Spryker\Shared\Search\SearchConstants::ELASTICA_PARAMETER__TRANSPORT` instead
     */
    const ELASTICA_PARAMETER__TRANSPORT = 'ELASTICA_PARAMETER__TRANSPORT';

    /**
     * @deprecated Use `Spryker\Shared\Search\SearchConstants::ELASTICA_PARAMETER__INDEX_NAME` instead
     */
    const ELASTICA_PARAMETER__INDEX_NAME = 'ELASTICA_PARAMETER__INDEX_NAME';

    /**
     * @deprecated Use `Spryker\Shared\Search\SearchConstants::ELASTICA_PARAMETER__AUTH_HEADER` instead
     */
    const ELASTICA_PARAMETER__AUTH_HEADER = 'ELASTICA_PARAMETER__AUTH_HEADER';

    /**
     * @deprecated Use `Spryker\Shared\Search\SearchConstants::ELASTICA_PARAMETER__DOCUMENT_TYPE` instead
     */
    const ELASTICA_PARAMETER__DOCUMENT_TYPE = 'ELASTICA_PARAMETER__DOCUMENT_TYPE';

    /**
     * @deprecated Use `Spryker\Shared\Search\SearchConstants::ELASTICA_PARAMETER__EXTRA` instead
     */
    const ELASTICA_PARAMETER__EXTRA = 'ELASTICA_PARAMETER__EXTRA';

    /**
     * Specification:
     * - Defines a custom configuration for \Elastica\Client.
     * - This configuration is used exclusively when set, e.g. no other Elastica configuration will be used for the client.
     * - @see http://elastica.io/ for details.
     *
     * @api
     */
    const ELASTICA_CLIENT_CONFIGURATION = 'ELASTICA_CLIENT_CONFIGURATION';

    /**
     * Specification:
     * - If option set to true, the application will check if the request is secure and not excluded from https.
     * - If request is not secure and not excluded from https, the application will return a redirect response.
     * - If request is secure and page is excluded from https, the application will allow http.
     *
     * @api
     */
    const ZED_SSL_ENABLED = 'ZED_SSL_ENABLED';

    /**
     * Specification:
     * - An array of HTTPS Excluded module/controller pairs when ssl is enabled.
     * - Example: `['module-a/controller-a', 'module-b/controller-b']`
     *
     * @api
     */
    const ZED_SSL_EXCLUDED = 'ZED_SSL_EXCLUDED';

    /**
     * Specification:
     * - IP address (or range) of your proxy.
     * - Example: `['192.0.0.1', '10.0.0.0/8']`.
     *
     * @api
     */
    const ZED_TRUSTED_PROXIES = 'ZED_TRUSTED_PROXIES';

    /**
     * Specification:
     * - List of trusted hosts managed by regexp.
     *
     * @api
     */
    const ZED_TRUSTED_HOSTS = 'ZED_TRUSTED_HOSTS';

    const ZED_HTTP_STRICT_TRANSPORT_SECURITY_ENABLED = 'ZED_HTTP_STRICT_TRANSPORT_SECURITY_ENABLED';
    const ZED_HTTP_STRICT_TRANSPORT_SECURITY_CONFIG = 'ZED_HTTP_STRICT_TRANSPORT_SECURITY_CONFIG';

    /**
     * RabbitMQ
     *
     * @deprecated use RabbitMQ module constants instead
     */
    /** @deprecated Use queue-adapter specific configuration constants */
    const ZED_RABBITMQ_USERNAME = 'ZED_RABBITMQ_USERNAME';
    /** @deprecated Use queue-adapter specific configuration constants */
    const ZED_RABBITMQ_PASSWORD = 'ZED_RABBITMQ_PASSWORD';
    /** @deprecated Use queue-adapter specific configuration constants */
    const ZED_RABBITMQ_HOST = 'ZED_RABBITMQ_HOST';
    /** @deprecated Use queue-adapter specific configuration constants */
    const ZED_RABBITMQ_PORT = 'ZED_RABBITMQ_PORT';
    /** @deprecated Use queue-adapter specific configuration constants */
    const ZED_RABBITMQ_VHOST = 'ZED_RABBITMQ_VHOST';

    /**
     * Global timezone used to for underlying data, timezones for presentation layer can be changed in stores configuration
     */
    const PROJECT_TIMEZONE = 'PROJECT_TIMEZONE';

    /**
     * @deprecated Use `Spryker\Shared\Kernel\KernelConstants::PROJECT_NAMESPACE` instead
     */
    const PROJECT_NAMESPACE = KernelConstants::PROJECT_NAMESPACE;

    /**
     * Cloud
     */
    /** @deprecated Unused, will be removed with next major release */
    const CLOUD_ENABLED = 'CLOUD_ENABLED';
    /** @deprecated Unused, will be removed with next major release */
    const CLOUD_OBJECT_STORAGE_ENABLED = 'CLOUD_OBJECT_STORAGE_ENABLED';
    /** @deprecated Unused, will be removed with next major release */
    const CLOUD_CDN_ENABLED = 'CLOUD_CDN_ENABLED';
    /** @deprecated Unused, will be removed with next major release */
    const CLOUD_CDN_STATIC_MEDIA_PREFIX = 'CLOUD_CDN_STATIC_MEDIA_PREFIX';
    /** @deprecated Unused, will be removed with next major release */
    const CLOUD_CDN_STATIC_MEDIA_HTTP = 'CLOUD_CDN_STATIC_MEDIA_HTTP';
    /** @deprecated Unused, will be removed with next major release */
    const CLOUD_CDN_STATIC_MEDIA_HTTPS = 'CLOUD_CDN_STATIC_MEDIA_HTTPS';
    /** @deprecated Unused, will be removed with next major release */
    const CLOUD_CDN_PRODUCT_IMAGES_PATH_NAME = 'CLOUD_CDN_PRODUCT_IMAGES';

    /**
     * Yves host name / domain without scheme and port (e.g. www.de.demoshop.local) (Required)
     *
     * @api
     */
    const HOST_YVES = 'HOST_YVES';

    /**
     * Zed host name / domain without scheme and port (e.g. zed.de.demoshop.local) (Required)
     *
     * @api
     */
    const HOST_ZED = 'APPLICATION:HOST_ZED';

    /**
     * Port definition for Yves with leading colon (e.g. :8080)
     *
     * @api
     */
    const PORT_YVES = 'APPLICATION:PORT_YVES';

    /**
     * Port definition for Zed with leading colon (e.g. :9080)
     *
     * @api
     */
    const PORT_ZED = 'APPLICATION:PORT_ZED';

    /**
     * Secure port definition for Yves with leading colon (e.g. :8443)
     *
     * @api
     */
    const PORT_SSL_YVES = 'APPLICATION:PORT_SSL_YVES';

    /**
     * Secure port definition for Zed with leading colon (e.g. :9443)
     *
     * @api
     */
    const PORT_SSL_ZED = 'APPLICATION:PORT_SSL_ZED';

    /**
     * Base URL for Yves including scheme and port (e.g. http://www.de.demoshop.local:8080)
     *
     * @api
     */
    const BASE_URL_YVES = 'APPLICATION:BASE_URL_YVES';

    /**
     * Base URL for Zed including scheme and port (e.g. http://zed.de.demoshop.local:9080)
     *
     * @api
     */
    const BASE_URL_ZED = 'APPLICATION:BASE_URL_ZED';

    /**
     * Base URL for static assets including scheme and port (e.g. http://static.de.demoshop.local:8080)
     *
     * @api
     */
    const BASE_URL_STATIC_ASSETS = 'APPLICATION:BASE_URL_STATIC_ASSETS';

    /**
     * Base URL for static media including scheme and port (e.g. http://static.de.demoshop.local:8080)
     *
     * @api
     */
    const BASE_URL_STATIC_MEDIA = 'APPLICATION:BASE_URL_STATIC_MEDIA';

    /**
     * Secure base URL for Yves including scheme and port (e.g. https://www.de.demoshop.local:8443)
     *
     * @api
     */
    const BASE_URL_SSL_YVES = 'APPLICATION:BASE_URL_SSL_YVES';

    /**
     * Secure base URL for Zed including scheme and port (e.g. https://www.de.demoshop.local:8443)
     *
     * @api
     */
    const BASE_URL_SSL_ZED = 'APPLICATION:BASE_URL_SSL_ZED';

    /**
     * Secure base URL for static assets including scheme and port (e.g. https://static.de.demoshop.local:8443)
     *
     * @api
     */
    const BASE_URL_SSL_STATIC_ASSETS = 'APPLICATION:BASE_URL_SSL_STATIC_ASSETS';

    /**
     * Secure base URL for static media including scheme and port (e.g. https://static.de.demoshop.local:8443)
     *
     * @api
     */
    const BASE_URL_SSL_STATIC_MEDIA = 'APPLICATION:BASE_URL_SSL_STATIC_MEDIA';

    /** @deprecated Please use ApplicationConstants::HOST_ZED or ApplicationConstants::BASE_URL_ZED instead */
    const HOST_ZED_GUI = 'HOST_ZED_GUI';
    /** @deprecated Please use ApplicationConstants::HOST_ZED or ApplicationConstants::BASE_URL_ZED instead */
    const HOST_ZED_API = 'HOST_ZED_API';
    /** @deprecated Please use ApplicationConstants::BASE_URL_STATIC_ASSETS instead */
    const HOST_STATIC_ASSETS = 'HOST_STATIC_ASSETS';
    /** @deprecated Please use ApplicationConstants::BASE_URL_STATIC_MEDIA instead */
    const HOST_STATIC_MEDIA = 'HOST_STATIC_MEDIA';

    /** @deprecated Please use ApplicationConstants::BASE_URL_SSL_YVES instead */
    const HOST_SSL_YVES = 'HOST_SSL_YVES';
    /** @deprecated Unused, will be removed with next major release */
    const HOST_SSL_ZED_GUI = 'HOST_SSL_ZED_GUI';
    /** @deprecated Unused, will be removed with next major release */
    const HOST_SSL_ZED_API = 'HOST_SSL_ZED_API';
    /** @deprecated Please use ApplicationConstants::BASE_URL_SSL_STATIC_ASSETS instead */
    const HOST_SSL_STATIC_ASSETS = 'HOST_SSL_STATIC_ASSETS';
    /** @deprecated Please use ApplicationConstants::BASE_URL_SSL_STATIC_MEDIA instead */
    const HOST_SSL_STATIC_MEDIA = 'HOST_SSL_STATIC_MEDIA';

    const FORM_FACTORY = 'FORM_FACTORY';
}
