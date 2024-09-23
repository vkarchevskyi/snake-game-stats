# Snake Game Statistics

Ranking table for snake game.

### Deployment

- Create .env file
```shell
cp .env.example .env
```

- Configure .env file
```
APP_ENV=production
APP_DEBUG=false
APP_URL=your-website-url

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db
DB_USERNAME=user
DB_PASSWORD=password
```

- Run the following commands
```shell
php artisan key:generate
php artisan migrate --force
php artisan optimize
npm run build
```
