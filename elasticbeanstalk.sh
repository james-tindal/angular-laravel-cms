
file=".ebextensions/1-env-vars.config"

echo "
option_settings:
  aws:elasticbeanstalk:application:environment:
    APP_ENV: production
    APP_DEBUG: true
    API_PREFIX: api
    APP_KEY: $(openssl rand -base64 24)
    DB_PASSWORD: $(openssl rand -base64 24)" \
> $file

