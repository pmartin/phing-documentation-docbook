
# Example of Apache Configuration (dev) #
    
    <VirtualHost *:80>
        ServerName phingdoc
        DocumentRoot /home/user/developpement/phing-documentation-docbook/website/www
        <Directory /home/user/developpement/phing-documentation-docbook/website/www>
                Options Indexes FollowSymLinks
                AllowOverride All
                Order allow,deny
                allow from all
                
                <IfModule mod_rewrite.c>
                    Options -MultiViews
                    RewriteEngine On
                    RewriteCond %{REQUEST_FILENAME} !-f
                    RewriteRule ^ index.php [L]
                </IfModule>
                
                php_value phar.readonly Off
                php_value phar.require_hash Off
                php_value detect_unicode Off
                php_value suhosin.executor.include.whitelist phar
                
        </Directory>
        ErrorLog /var/log/apache2/error.log
        LogLevel warn
        CustomLog /var/log/apache2/access.log combined
    </VirtualHost>

