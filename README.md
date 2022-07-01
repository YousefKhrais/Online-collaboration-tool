# Online Collaboration Tool

A web-based education tool that aims to make learning programming more interactive between teachers and students

## Team

- 120181450 - Yousef Khrais
- 120180349 - Muhammed Al-khatib
- 120192379 - Nadeem Alsammak
- 120180372 - Yousef Almashharawi

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

Migrate the database schema

```
php artisan migrate --seed
```

Start the laravel server

```
php artisan serve --host 0.0.0.0 --port 8000
```
