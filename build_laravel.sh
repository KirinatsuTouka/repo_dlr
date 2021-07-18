#!/bin/bash
PROGNAME=$(basename $0)

usage() {
    echo "Usage: $PROGNAME [OPTIONS]"
    echo "OPTIONS:"
    echo " -h, --help  :Usage表示"
    echo " -b, --build :再度ビルドして立ち上げる"
}

for OPT in "$@"
do
    case $OPT in
        -h | --help)
            FLG_H=1
            ;;
        -b | --build)
            FLG_B=1
            ;;
        *)
            echo "$PROGNAME: illegal option -- '$(echo $1 | sed 's/^-*//')'" 1>&2
            exit 1
            ;;
    esac
done

if [ "$FLG_H" ] ; then
    usage
    exit 1
fi

RUNNING_DOCKER=$(docker-compose ps | grep Up | wc -l)

if [ $RUNNING_DOCKER -gt 0 ] ; then
    docker-compose down
fi

RUNNING_DOCKER=$(docker-compose ps | grep Up | wc -l)

if [ $RUNNING_DOCKER -eq 0 ] ; then
    if [ "$FLG_B" ] ; then
        # docker-compose up -d --build
        docker-compose up -d --build
    else
        docker-compose up -d
    fi
    docker-compose exec app composer install
    docker-compose exec app php artisan key:generate
    docker-compose exec app php artisan migrate
    exit 0

else
  echo "error:running dockers couldn't down"
  exit 1
fi


