# gestion-conges-contrats

Simple application pour gerer les conges et les contrats de votre entreprise.

## Installation

1. Cloner le repertoire sur GitHub


git clone https://github.com/FRANCK-DEMAFO/gestion-conges-contrats.git

2. Installer la base de donnees

La base de donner se trouve dans `config/schema/gestion_conges_contrats.sql`. Creer une base de donner dans DBMS (Database Management System) et utilise ce shema.

## Configurations 

Les Configurations se font dans le dossier  `config`. 

 Editer `config/db_config.php` pour configurer la connection a la base de donnees.

## Run

serveur php: localhost:8090
```
Dans le navigateur entrer `localhost:8090` suivie du nom du dossier.

## Exemple

- Cloner le repertoire de  Github:

git clone https://github.com/FRANCK-DEMAFO/gestion-conges-contrats.git


- Creer la base de donner et importer le shema:
```bash
mysql > creer la base de donnees gestion-conges-contrats;
mysql > source config/schema/gestion_conges_contrats.sql;
```
- Editer la configuration de la base de donnees `config/db_config.php`:
```php
 [
    'host' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => '',
],
```

- pour le serveur:

serveur php: localhost:8090

- Ouvre ton navigateur et tape: `localhost:8090/gestion-conges-contrats` .
