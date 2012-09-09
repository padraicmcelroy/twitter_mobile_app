<VirtualHost *:80>
	DocumentRoot /www/workshop4/application/public
	ServerName workshop4.com
</VirtualHost>
