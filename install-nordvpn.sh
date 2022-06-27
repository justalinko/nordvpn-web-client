#!/bin/bash

## EASY INSTALL NORDVPN
## SCRIPT BY JUSTALINKO

debRepos="https://repo.nordvpn.com/deb/nordvpn/debian/pool/main/nordvpn-release_1.0.0_all.deb"
rpmRepos="https://repo.nordvpn.com/yum/nordvpn/centos/noarch/Packages/n/nordvpn-release-1.0.0-1.noarch.rpm"

menginstall() {

    if [[ $1 == "deb" ]]; then
        echo "[!] DOWNLOADING REPOSITORIES ... "
        wget $debRepos
        echo "[!] INSTALLING REPOSITORIES ... "
        sudo dpkg -i nordvpn-release_1.0.0_all.deb
        echo "[!] INSTALLING NORDVPN ..."
        sudo apt-get update -y
        sudo apt-get install nordvpn -y

    elif [[ $1 == "rpm" ]]; then

        echo "[!] DOWNLOADING REPOSITORIES ... "
        wget $rpmRepos
        echo "[!] INSTALLING REPOSITORIES ... "
        sudo rpm -i nordvpn-release-1.0.0-1.noarch.rpm
        echo "[!] INSTALLING NORDVPN ..."
        echo "[+] Do manual installation with your package manager"
        echo "[!] For example : yum install nordvpn / dnf install nordvpn"
    else
        echo "[!] ERROR: INVALID ARGUMENT"
        echo "[!] USAGE: ./$0 [deb|rpm]"
    fi
}

checkInstall() {

    which nordvpn >/dev/null 2>&1
    if [[ $? == 0 ]]; then
        connectMenu
    else
        echo "[!] NORDVPN NOT INSTALLED"
        menginstall $1
    fi
}

connectMenu() {
    if [[ $(nordvpn status) =~ "Disconnected" ]]; then
        echo "[+] NORDVPN READY TO CONNECT , SELECT COUNTRY !"
        nordvpn countries
        echo ""
        echo -n "Connect to country >> "; read country
        nordvpn c $country
    else
        echo "[!] CURRENT CONNECTION STATUS: "
        nordvpn status
        echo "[?] Do you wanna disconnect to vpn?"; read -p "[y/n] >> " disconnect
        if [[ $disconnect == "y" ]]; then
            nordvpn disconnect
        fi
    fi
}

checkInstall $1