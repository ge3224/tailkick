#!/bin/sh

dir="$1"
chsum1=`tar -cf - $dir | md5sum  | awk '{print $1}'`
chsum2=$chsum1

echo -e "\033[0m\nWaiting for changes...\n"

while true
do
    sleep 2
    chsum2=`tar -cf - $dir | md5sum  | awk '{print $1}'`

    if [ $chsum1 != $chsum2 ]; then
      echo -e "\033[0;32mChanges detected $(date)."
      echo -e "\033[0;33mCopying updated theme to WordPress."
      eval rm -rdf ./wp_docker/wp-content/themes/tailkick 
      eval cp -rdf ./tailkick/ ./wp_docker/wp-content/themes/tailkick
      echo -e "\033[0m\nWaiting for changes...\n"
    fi

    chsum1=$chsum2
done

