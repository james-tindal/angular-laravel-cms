
file=".ebextensions/1-env-vars.config"
password=$(openssl rand -hex 20)

echo "
option_settings:
  aws:elasticbeanstalk:application:environment:
    APP_ENV: production
    APP_DEBUG: true
    API_PREFIX: api
    APP_KEY: $(openssl rand -hex 20)
    DB_PASSWORD: $password" \
> $file

eb init
eb create -db -db.engine mysql -db.user ebroot -db.pass $password
eb deploy