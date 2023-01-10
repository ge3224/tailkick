#!/bin/sh

dir="$1"
chsum1=`tar -cf - $dir | md5sum  | awk '{print $1}'`
chsum2=$chsum1

echo "Waiting for changes..."

while true
do
    sleep 3
    chsum2=`tar -cf - $dir | md5sum  | awk '{print $1}'`

    if [ $chsum1 != $chsum2 ]; then
      echo "Changes detected. Copying updated theme to WordPress."
      eval rm -rdf ./wp_docker/wp-content/themes/tailkick 
      eval cp -rdf ./tailkick/ ./wp_docker/wp-content/themes/tailkick
      echo "Waiting for changes..."
    fi

    chsum1=$chsum2
done

