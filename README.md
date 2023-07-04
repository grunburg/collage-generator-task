# Collage Generator

A collage generation test task for Biļešu Paradīze utilizing Laravel framework and [Intervention](https://image.intervention.io/v2) image handling library.

![Preview](https://i.ibb.co/mqsLGtk/collage-generator-preview.gif)

## Technologies & Tools Used 🛠️

#### App
- Laravel (Easy backend set-up, provides necessary project toolset to quickly kickstart an application)
- Inertia / Vue (A single-page wrapper based that utilizes Laravel for server-side routing and controllers)

#### Packages
- [Intervention](https://image.intervention.io/v2) (PHP image handling and manipulation library)

#### Tools
- Docker / Sail 🐳
- PHPStorm

## Requirements
- [Docker](https://www.docker.com/) 🐳
- [Node](https://nodejs.org/) & NPM

## Installation
1. Go to your preferred project directory and clone this repository & navigate to it.
```bash
git clone https://github.com/grunburg/collage-generator-task.git && cd collage-generator-task
```

2. Copy .env.example file as .env 
```bash
cp .env.example .env
```

3. Spin up a temporary docker container to install necessary dependencies.
```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```

4. Bring up the application containers.
```bash
./vendor/bin/sail up -d
```

5. Create a symbolic link between the public and storage disk.
```bash
./vendor/bin/sail artisan storage:link
```

6. Install all front-end dependencies and then build the assets.
```bash
npm install
npm run build
```

7. Generate a new Laravel app key and run the migrations.
```bash
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate
```

8. Seed the database with pre-loaded posters.
```bash
./vendor/bin/sail artisan db:seed
```

9. Looks like you're done, now go to [localhost:8000](http://localhost:8000) and generate some of those collages. 🚀

## Additonal Notes 🗒️
As the job offer I'm aiming for is full-stack developer, I went a bit above & beyond with the given task – also developing a UI where it is possible to select specific images to generate a poster collage.
Thus providing also some front-end skills using Vue framework.

Also, if improved upon, we could utilize Inertia file uploads – to upload new posters, improve the error handling on front-end &
image generation could be done within a Job and send events via sockets (e.g. [Pusher](https://pusher.com/)) services.
