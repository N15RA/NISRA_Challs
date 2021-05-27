#!/bin/bash
service mysql restart
service apache2 restart

mysql -uroot < /init.sql

if [ ! -f \'/init.sql\' ]; then
	rm -rf /init.sql
fi
mysql -uroot -e"UPDATE mysql.user SET Host='%' WHERE Host='localhost' AND User='flaguser';"
mysql -uroot -e"UPDATE mysql.db SET Host='%' WHERE Host='localhost' AND User='flaguser';"
mysql -uroot -e"FLUSH PRIVILEGES;"

tail -f /dev/null