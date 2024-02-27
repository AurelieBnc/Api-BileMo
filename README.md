# Api-BileMo
Création d'une Api - projet OCR 

## Installation

### Télécharger le projet et dézipez le
```
https://github.com/AurelieBnc/Api-BileMo/archive/refs/heads/main.zip
```

### Créer un fichier .env.local et recopier les paramètres d'environnement du fichier .env (changer user_db et password_db, database_name, JWT_PASSPHRASE)

```
DATABASE_URL="mysql://changer user_db:password_db@127.0.0.1:3306/database_name?serverVersion=8"
JWT_PASSPHRASE=personnal.passphrase
```

### Déplacer le terminal dans le dossier cloné
```
cd api-bilemo
```

### Taper les commandes suivantes :
```
composer install
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

