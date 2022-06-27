#!/bin/bash

which nordvpn > /dev/null 2>&1
if [[ $? -eq 0 ]]; then
    echo "[+] Nordvpn Installed"
else
    echo "[-] Nordvpn not installed. "
    echo "[!] RUN 'sudo bash install-nordvpn.sh' for install nordvpn in linux"
    exit 1
fi


RANDOMPORT=$(shuf -i 2000-65000 -n 1)
RUNSERVER="127.0.0.1:$RANDOMPORT"
echo "[!] Initalizing nordvpn ..."
login=$(nordvpn account)
status=$(nordvpn status)
countries=$(echo -n $(nordvpn countries | grep -oP '\K\S+'))
echo $countries | sed "s| |\n|g" > storage/countries.txt
echo $login  > storage/login.txt
echo $status > storage/status.txt
cat storage/banner.txt
echo 
echo "----------------------------------------------"
echo 
echo 
echo "[!] Welcome to NordVPN Web Client"
echo "[!] Local server running in : http://$RUNSERVER "
php -S $RUNSERVER -t src/ &
xdg-open "http://$RUNSERVER"
