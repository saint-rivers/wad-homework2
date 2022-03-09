#!/bin/bash

# Prepare variables
TABLE=$1
SQL_EXISTS=$(printf 'SHOW TABLES LIKE "%s"' "$TABLE")
SQL_IS_EMPTY=$(printf 'SELECT 1 FROM %s LIMIT 1' "$TABLE")

# Credentials
USERNAME=dayan
PASSWORD=$2
DATABASE=rupp

# echo "Checking if table <$TABLE> exists ..."

# # Check if table exists
# if [[ $(mysql -u $USERNAME -p "$PASSWORD" -e "$SQL_EXISTS" "$DATABASE") ]]; then
#     echo "Table exists ..."

#     # Check if table has records
#     if [[ $(mysql -u $USERNAME -p "$PASSWORD" -e "$SQL_IS_EMPTY" "$DATABASE") ]]; then
#         echo "Table has records ..."
#     else
#         echo "Table is empty ..."
#     fi
# else
#     echo "Table not exists ..."
#     # source ./scripts/createTables.sql

    
#     echo "Creating tables"
# fi
mysql -u $USERNAME -p "$PASSWORD" rupp < ./scripts/initDatabase.sql