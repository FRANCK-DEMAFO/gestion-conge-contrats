
gestion conges contrats app
cc'est une simple application pour le management des contrats, congés et permissions.

Installation
Cloner le repertoire 
git clone https://github.com/SilverD3/projet-final.git
Installer la base de données
config->schema->schema/gestion_conges_contrats.sql. creer la base de données et importer le fichier gestion_conges_contrats.sql.

Configurations

php -Server localhost:8090
entrer localhost:8090 dans le navigateur suivie du nom du dossier.

Exemple
Cloner le repertoire:
git clone https://github.com/SilverD3/projet-final.git
après l'import vous entrer dans config a la racine du projet 
'DataSource' => [
   'dbHost' => 'localhost',
    'dbName' => 'gestion_conges_contrats',
    'dbUsername' => 'root',
    'dbUserpassword' => '',
],
Start the server:
php -S localhost:8090
ouvre ton dossier en utilisant localhost:8090 dans la bar de recherche.
