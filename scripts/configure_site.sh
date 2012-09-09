#!/bin/bash
# This script gets the web app ready for usage without any mucking about with config and whatnot. Be sure to run it as "sudo" though, to ensure it will work.

#Copy the apache config into the right directory
cp ../apache/workshop3.com /etc/apache2/sites-enabled/

#Restart apache so it will work
/etc/init.d/apache2 restart

#Change the hosts file
(echo "127.0.0.1	workshop3.com
127.0.0.1	localhost") > /etc/hosts


