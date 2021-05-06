
manlan@manlan-7 /A/p/W/la802 (laravel-admin2)> php artisan enlightn
______      ___       __    __
/ ____/___  / (_)___ _/ /_  / /_____
/ __/ / __ |/ / / __  / __ |/ __/ __ |
/ /___/ / / / / / /_/ / / / / /_/ / / /
/_____/_/ /_/_/_/\__, /_/ /_/\__/_/ /_/
/____/


Please wait while Enlightn scans your code base...

|------------------------------------------
| Running Performance Checks
|------------------------------------------

Check 1/64: Your application has the Composer autoloader optimization configured in production. Not Applicable

Check 2/64: A proper cache driver is configured. Passed

Check 3/64: Your application caches compiled assets for improved performance. Not Applicable

Check 4/64: Aggregation is done at the database query level rather than at the Laravel Collection level. Passed

Check 5/64: Application config caching is configured properly. Failed
Your app config is cached in a local environment. This is not recommended for development because as you change your config files, the changes will not be reflected unless you clear the cache.
Documentation URL: https://www.laravel-enlightn.com/docs/performance/config-caching-analyzer.html

Check 6/64: Your application does not use the debug log level in production. Passed

Check 7/64: Dev dependencies are not installed in production. Passed

Check 8/64: Your application does not contain env function calls outside of your config files. Passed

Check 9/64: Your application uses Horizon when using the Redis queue driver. Not Applicable

Check 10/64: Your application minifies assets in production. Passed

Check 11/64: MySQL is configured properly on single server setups. Failed
When MySQL is running on the same server as your app, it is recommended to use unix sockets instead of TCP ports to improve performance by upto 50% (Percona benchmark).
At config/database.php: line(s): 54.
Documentation URL: https://www.laravel-enlightn.com/docs/performance/mysql-single-server-analyzer.html

Check 12/64: OPcache is enabled. Passed

Check 13/64: A proper queue driver is configured. Failed
Your queue driver is set to sync. This means that all jobs, mails, notifications and event listeners will be processed immediately in a synchronous manner. These time consuming tasks will slow down web requests and this driver is not suitable for production environments. Even for local development, it is recommended to use other drivers in order to accurately simulate production behaviour.
At config/queue.php: line(s): 16.
Documentation URL: https://www.laravel-enlightn.com/docs/performance/queue-driver-analyzer.html

Check 14/64: Application route caching is configured properly. Passed

Check 15/64: A proper session driver is configured. Exception
Target class [NewsController] does not exist.
Documentation URL: https://www.laravel-enlightn.com/docs/performance/session-driver-analyzer.html

Check 16/64: Your application does not use locks on your default cache store. Not Applicable

Check 17/64: Your application does not contain unused global HTTP middleware. Failed
Your application contains global middleware that is not currently being used. It is recommended to remove these middleware from your Kernel class to enhance performance slightly. Your unused middleware include: [TrustProxies]
Documentation URL: https://www.laravel-enlightn.com/docs/performance/unused-global-middleware-analyzer.html

Check 18/64: View caching is configured properly. Passed

|------------------------------------------
| Running Reliability Checks
|------------------------------------------

Check 19/64: Cache prefix is set to avoid collisions with other apps. Failed
Your cache prefix is too generic and may result in collisions with other apps that share the same cache servers. In general, this should be fixed if you set a non-generic app name in your .env file.
At config/cache.php: line(s): 104.
Documentation URL: https://www.laravel-enlightn.com/docs/reliability/cache-prefix-analyzer.html

Check 20/64: Your application cache is working. Passed

Check 21/64: Your application's composer.json file is valid. Passed

Check 22/64: Your application defines custom error page views. Exception
Target class [NewsController] does not exist.
Documentation URL: https://www.laravel-enlightn.com/docs/reliability/custom-error-page-analyzer.html

Check 23/64: Database is accessible. Passed

Check 24/64: Your application does not contain any dead or unreachable code. Passed

Check 25/64: Your storage and cache directories are writable. Passed

Check 26/64: All env variables used in your .env file are defined in your .env.example file. Passed

Check 27/64: A .env file exists for your application. Passed

Check 28/64: All env variables defined in your example file are set in your .env file. Passed

Check 29/64: Your application only uses iterable types in foreach loops. Passed

Check 30/64: Your application does not contain invalid function calls. Passed

Check 31/64: Your application does not contain invalid imports. Passed

Check 32/64: Your application does not contain invalid method calls. Failed
Your application seems to contain invalid method calls to methods that either do not exist or do not match the method signature or scope.
At app/Admin/Controllers/ExampleController.php: line(s): 43.
Documentation URL: https://www.laravel-enlightn.com/docs/reliability/invalid-method-call-analyzer.html

Check 33/64: Your application does not contain invalid method overrides. Passed

Check 34/64: Your application does not use invalid offsets. Passed

Check 35/64: Your application does not access class properties in an invalid manner. Failed
Your application seems to reference class properties that are either undefined or not accessible.
At app/Admin/Controllers/ProductController.php: line(s): 201.
Documentation URL: https://www.laravel-enlightn.com/docs/reliability/invalid-property-access-analyzer.html

Check 36/64: Your application does not use invalid return types. Passed

Check 37/64: Your application is not currently in maintenance mode. Passed

Check 38/64: Your application does not contain missing return statements. Passed

Check 39/64: An appropriate timeout and retry after is set for queues. Passed

Check 40/64: There are no syntax errors in your application code. Passed

Check 41/64: Your application does not rely on undefined constants. Passed

Check 42/64: Your application does not reference undefined variables. Passed

Check 43/64: Your application does not try to unset undefined variables. Passed

Check 44/64: Migrations are up-to date. Passed

|------------------------------------------
| Running Security Checks
|------------------------------------------

Check 45/64: Your application hides technical errors in production. Passed

Check 46/64: Sensitive environment variables are hidden in non-local environments. Passed

Check 47/64: Application key is set. Passed

Check 48/64: Your application includes middleware to protect against CSRF attacks. Exception
Target class [NewsController] does not exist.
Documentation URL: https://www.laravel-enlightn.com/docs/security/csrf-analyzer.html

Check 49/64: Your application encrypts its cookies. Exception
Target class [NewsController] does not exist.
Documentation URL: https://www.laravel-enlightn.com/docs/security/encrypted-cookies-analyzer.html

Check 50/64: Your .env is not publicly accessible. Passed

Check 51/64: Your project files and directories use safe permissions. Failed
Your application's project directory permissions are not setup in a secure manner. This may expose your application to be compromised if another account on the same server is vulnerable. This can be even more dangerous if you used shared hosting. All project directories in Laravel should be setup with a max of 775 permissions and most app files should be provided 664 (except executables such as Artisan or your deployment scripts which should be provided 775 permissions). These are the max level of permissions in order to be secure. Your unsafe files or directories include: [storage], [bootstrap], [bootstrap/cache] and [bootstrap/app.php].
Documentation URL: https://www.laravel-enlightn.com/docs/security/file-permissions-analyzer.html

Check 52/64: Your application does not expose foreign keys for mass assignment. Passed

Check 53/64: Your application does not rely on frontend dependencies with known security issues. Passed

Check 54/64: Your application includes the HSTS header if it is a HTTPS only app. Not Applicable

Check 55/64: Cookies are secured as HttpOnly. Exception
Target class [NewsController] does not exist.
Documentation URL: https://www.laravel-enlightn.com/docs/security/http-only-cookie-analyzer.html

Check 56/64: Your application does not rely on dependencies you are not legally allowed to use. Failed
Your application has a total of 1 package(s) that you may not be legally allowed to use. By default, we assume the MIT, Apache-2.0, ISC, BSD Clause 2 & 3 and LGPL licenses to be legally valid for use for proprietary or commercial applications. However, you are free to change this in the Enlightn config. Unsafe packages include [haruncpi/laravel-log-reader: cc-by-4.0]
Documentation URL: https://www.laravel-enlightn.com/docs/security/license-analyzer.html

Check 57/64: Your application includes login throttling for protection against brute force attacks. Passed

Check 58/64: Your application is not exposed to mass assignment vulnerabilities. Passed

Check 59/64: Your PHP configuration is secure. Failed
Your application does not set secure php.ini configuration values. This may expose your application to security vulnerabilities. Unless there is a very specific use case for your application, it is recommended to set your php.ini configuration as follows: [allow_url_fopen: Off or 0], [expose_php: Off or 0] and [display_startup_errors: Off or 0].
Documentation URL: https://www.laravel-enlightn.com/docs/security/php-ini-analyzer.html

Check 60/64: Your application uses stable versions of dependencies. Passed

Check 61/64: Your application does not un-guard models. Passed

Check 62/64: Dependencies are up-to-date. Passed

Check 63/64: Your application does not rely on backend dependencies with known security issues. Passed

Check 64/64: Your application sets appropriate HTTP headers to protect against XSS attacks. Failed
Your application is not adequately protected from XSS attacks. The Content-Security-Policy is either not set or not set adequately for XSS. It is recommended to set a "script-src" or "default-src" policy directive without "unsafe-eval" or "unsafe-inline".
Documentation URL: https://www.laravel-enlightn.com/docs/security/xss-analyzer.html

Report Card
===========

+----------------+-------------+-------------+-----------+-----------+
| Status         | Performance | Reliability |  Security |     Total |
+----------------+-------------+-------------+-----------+-----------+
| Passed         |    9  (50%) |   22  (85%) | 12  (60%) | 43  (67%) |
| Failed         |    4  (22%) |    3  (12%) |  4  (20%) | 11  (17%) |
| Not Applicable |    4  (22%) |    0   (0%) |  1   (5%) |  5   (8%) |
| Error          |    1   (6%) |    1   (4%) |  3  (15%) |  5   (8%) |
+----------------+-------------+-------------+-----------+-----------+
