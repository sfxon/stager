#!/bin/bash

pwd

if test -f ./update-running.php; then
  echo "Es ist ein Fehler aufgetreten: "
  echo "Update ist als laufend markiert und wird deswegen nicht noch einmal gestartet."
  exit 1
fi

if test -f ./update-start.php; then
  echo "Start Vorgang"
  rm ./update-start.php
else
  echo "Es ist ein Fehler aufgetreten: "
  echo "update-start ist nicht gesetzt. Vorgang wird deswegen nicht gestartet."
  exit 1
fi

destination=$(php ./get-dst-path.x)
source=$(php ./get-src-path.x)

if [[ $destination == error* ]]; then
  echo "Es ist ein Fehler aufgetreten: "
  echo $destination
  exit 1
fi

php ./start.x

if [[ $source == error* ]]; then
  echo "Es ist ein Fehler aufgetreten: "
  echo $source
  exit 1
fi

echo $destination
rm -Rf $destination

echo $source

rsync -r --exclude=$destination $source $destination

rm ./update-running.php

php ./end.x
