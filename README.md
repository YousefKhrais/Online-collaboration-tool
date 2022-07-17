# Online Collaboration Tool

A web-based education tool that aims to make learning programming more interactive between teachers and students

## Installation Steps:

Clone installation GIT repository on the master host

```
git clone https://github.com/YousefKhrais/Online-collaboration-tool
```

Install npm packages

```
npm install

npm run dev
```

Install laravel packages

```
copmoser install
```

Copy .env file & create app key

```
cp .env.example .env

php artisan key:generate
```

Migrate the database schema

```
php artisan migrate --seed
```

Start the laravel server

```
php artisan serve --host 0.0.0.0 --port 8000
```
