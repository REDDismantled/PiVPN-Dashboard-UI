#!/usr/bin/env bash
INDEX="/etc/openvpn/easy-rsa/pki/index.txt"
if [ ! -f "${INDEX}" ]; then
        echo "The file: $INDEX was not found!"
        exit 1
fi

printf ": NOTE : The first entry should always be your valid server!\n"
printf "\n"
printf "::: Certificate Status List :::\n"
{
printf "Status  \t  Name  \t  Expiration\n"

while read -r line || [ -n "$line" ]; do
    STATUS=$(echo "$line" | awk '{print $1}')
    NAME=$(echo "$line" | awk -FCN= '{print $2}')
    EXPD=$(echo "$line" | awk '{if (length($2) == 15) print $2; else print "20"$2}' | cut -b 1-8 | date +"%b %d %Y" -f -)

    if [ "${STATUS}" == "V" ]; then
        printf "Valid  \t  %s  \t  %s\\n" "$NAME" "$EXPD"
    elif [ "${STATUS}" == "R" ]; then
        printf "Revoked  \t  %s  \t  %s\\n" "$NAME" "$EXPD"
    else
        printf "Unknown  \t  %s  \t  %s\\n" "$NAME" "$EXPD"
    fi

done <${INDEX}
printf "\\n"
} | column -t -s $'\t'