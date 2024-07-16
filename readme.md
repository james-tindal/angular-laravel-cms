# Laravel Website with Angular CMS

## Live website

Website is live at [angular-laravel-cms.jamestindal.co.uk](https://angular-laravel-cms.jamestindal.co.uk)

You can access the CMS to create, update, delete blog articles at [/admin](https://angular-laravel-cms.jamestindal.co.uk/admin)

Log in with `username: test` `password: p`

## Running the code

To run:
```sh
docker-compose up --build --progress=plain
```

To show error messages in development:
```sh
APP_DEBUG=true docker-compose up --build --progress=plain
```

The Pulumi infrastructure-as-code that's running this on AWS is at [james-tindal/jamestindal.co.uk](https://github.com/james-tindal/jamestindal.co.uk)
