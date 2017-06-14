#!/bin/bash

# Database credentials
user="root"
password="password"
host="127.0.0.1"
db_name="pet_stock"

# Other options
backup_path="/opt/backups/database"
date=$(date +"%d-%b-%Y_%H-%M-%S")

# Set default file permissions
umask 177
# Dump database into SQL file
sudo mysqldump --user=$user --password=$password --host=$host $db_name >$backup_path/$db_name-$date.sql