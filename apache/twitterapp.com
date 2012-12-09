<VirtualHost *:80>
	DocumentRoot /var/www/twitter_mobile_app/application/public
	ServerName twitterapp.com
</VirtualHost>
