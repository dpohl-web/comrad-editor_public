For wordpress htaccess Blocking use this:

RewriteCond %{REQUEST_URI} !^/wp-content/plugins/questform/pdf_create/

in

# BEGIN WordPress
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_URI} !^/wp-content/plugins/questform/pdf_create/generated_pdfs/
RewriteRule . /index.php [L]
</IfModule>

# END WordPress


#############################################################
php exec must be enabled
#############################################################
for debuggin use this file:

<?php
error_reporting(E_ALL); ini_set('display_errors', 1);
exec('wkhtmltopdf http://google.com file.pdf 2>&1');