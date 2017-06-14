Installation
============
1. Please have a fresh ubuntu (14.04 LTS preferable) env and run the `install.sh` script inside the projet root. You can access the API services via `127.0.0.1:8000` URI.
2. Run `crontab -e` in the console and append the line `55 23 * * * /<path-to-project-root>/daily_backup_db.sh >/dev/null 2>&1` into it,save and close it so that the databse will be backed up every day at 23:55 to the location `/opt/backups/database`

API Documentation
=================

Please find the documentation [here](https://github.com/ssrpsathira/PetStock/blob/master/APIdocs.md).
