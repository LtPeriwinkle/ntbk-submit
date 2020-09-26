#!/bin/bash
inotifywait -m /data/send/ | while read name; do
  if [[ $name == *"CLOSE_WRITE"* ]]; then
    name=${name:30}
    file="/data/send/${name}"
    body=$(<"$file")
    if [[ $name == *"low"* ]]; then
      #email if low urgency
      echo $body | msmtp "replace with email"
    elif [[ $name == *"med"* ]]; then
      #text if medium urgency
      echo $body | msmtp "replace with email to text address"
    elif [[ $name == *"hi"* ]]; then
      #dm if high urgency
      ./bot.py $file
    fi
  fi
done
