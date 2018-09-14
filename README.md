### Bluz
Data collection and reporting

## Installation
1. Pull from gitlab
2. chmod -R 777 /storage
3. Create the db table
4. Fill out the .env file with your values
5. Run php artisan migrate
6. npm install

## Groups Information
* Db tables have a data_ prefix.
* Group labels should be groupx where x is the groups id from the groups table.
* Entry route should be in gx_entry where x is the groups id.

# Add a new group
1. Enter the group information from the Groups Administration section
2. ...