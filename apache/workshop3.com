<VirtualHost *:80>
	DocumentRoot /www/workshop3/application/public
	ServerName workshop3.com
</VirtualHost>
