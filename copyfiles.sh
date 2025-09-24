#!/bin/bash

# Pfade zu Ordner A und Ordner B als Variablen
folder_a="./dist/questionnaire-form"
folder_b="../wp_plugin/src/js"
folder_css="../wp_plugin/src/css"
assetsquelle="./dist/questionnaire-form/assets"
assetsziel="../wp_plugin/assets"

# Funktion zum Kopieren und Umbenennen der Dateien
copy_and_rename_file() {
    local file="$1"
    local filename="${file##*/}"
    local new_filename=""
    if [[ $filename == "main-es5"* ]]; then
        new_filename="main-es5.js"
    elif [[ $filename == "main-es2015"* ]]; then
        new_filename="main-es2015.js"
    elif [[ $filename == "polyfills-es5"* ]]; then
        new_filename="polyfills-es5.js"
    elif [[ $filename == "polyfills-es2015"* ]]; then
        new_filename="polyfills-es2015.js"
    elif [[ $filename == "runtime-es5"* ]]; then
        new_filename="runtime-es5.js"
    elif [[ $filename == "runtime-es2015"* ]]; then
        new_filename="runtime-es2015.js"
    elif [[ $filename == "scripts"* ]]; then
        new_filename="scripts.js"
    elif [[ $filename == "styles"* ]]; then
        new_filename="styles.css"
    else
        return
    fi

    local destination_folder='';
    if [[ $new_filename == "styles.css" ]]; then
        destination_folder=$folder_css;
    else
        destination_folder=$folder_b;
    fi

    # Überprüfen, ob die Datei in Ordner B bereits existiert
    if [ -e "${destination_folder}/${new_filename}" ]; then
        read -p "Die Datei '${new_filename}' existiert bereits in Ordner B. Möchten Sie sie überschreiben? (j/n): " overwrite
        if [[ $overwrite != "j" && $overwrite != "J" ]]; then
            echo "Kopieren abgebrochen."
            return
        fi
    fi

    # Kopieren und Umbenennen der Datei
    cp "${file}" "${destination_folder}/${new_filename}"
    echo "Die Datei '${filename}' wurde erfolgreich nach '${destination_folder}/${new_filename}' kopiert."
}

# # Schleife über Dateien in Ordner A
# for file in "${folder_a}"/*; do
#     if [ -f "$file" ]; then
#         copy_and_rename_file "$file"
#     fi
# done

# Abfrage, ob Dateien kopiert werden sollen
read -p "Möchten Sie Dateien kopieren? (j/n): " copy
if [[ $copy == "j" || $copy == "J" ]]; then
    for file in "${folder_a}"/*; do
      if [ -f "$file" ]; then
          copy_and_rename_file "$file"
      fi
    done

    # Überprüfen, ob der Quellordner existiert
    if [ ! -d "$assetsquelle" ]; then
      echo "Der Quellordner existiert nicht!"
      exit 1
    fi

    # Überprüfen, ob der Zielordner existiert, falls nicht, erstellen
    if [ ! -d "$assetsziel" ]; then
      echo "Der Zielordner existiert nicht!"
      exit 1
    fi

    # Alle Dateien im Quellordner in den Zielordner kopieren
    cp -a "$assetsquelle"/* "$assetsziel"
    echo "Alle assets kopiert!"
else
    echo "Skript beendet."
fi
