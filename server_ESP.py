from flask import Flask, request, jsonify
from datetime import datetime
import json
import os
import socket
import subprocess

count = 0  # Compteur, des clients manquants

client = {"temperature": None, "pression": None, "qualite": None, "temps": None, "ip": None, "mac": None}  # Dictionnaire qui contient les valeurs d'un client
itteration = []  # Dictionnaire qui sera l'itération d'un tableau
Body = []  # Tableau qui contiendra toutes les données
Item = {"items": Body}  # Dictionnaire qui représente l'ensemble de l'API
# ------------------------------------------
listIp = []  # Tableau qui contient la liste de tous les clients
lastClients = []  # Tableau qui contiendra maximum 3 clients.

# ------------------------------------------

app = Flask(__name__)

@app.route('/recuperer_infos', methods=['POST'])
def recuperer_infos():
    if request.method == 'POST':
        global lastClients, count, listIp, client, Body, itteration, Item
        data = request.get_json()  # Récupération de ce qui est envoyé
        maintenant = datetime.now()  # Récupère l'heure
        temps = maintenant.strftime("%Y-%m-%d %H:%M:%S")  # Formate l'heure

        # Traitons la donnée reçue
        temperature = data.get("temperature")
        pression = data.get("pression")
        qualite = data.get("qualite")

        ip = data.get("ip")
        mac = data.get("mac")

        # Si on ne reçoit pas de nouvelle IP
        if ip in listIp:
            # On vérifie dans la liste des 3 derniers clients s'il est dedans
            if ip in lastClients:
                # Si oui, on augmente le compteur
                count += 1
            else:
                # Sinon on ajoute l'ip dans la liste
                lastClients.append(ip)

                # On donne les valeurs au dictionnaire
                client["temperature"] = temperature
                client["pression"] = pression
                client["qualite"] = qualite
                client["ip"] = ip
                client["mac"] = mac
                client["temps"] = temps

                # On rajoute le client dans le tableau itteration qui lui aussi attend 3 éléments
                itteration.append(client)

                # On réinitialise le dictionnaire client
                client = {"temperature": None, "pression": None, "qualite": None, "temps": None, "ip": None, "mac": None}
        else:
            # On vérifie s'il est dans la liste des derniers clients
            if ip in lastClients:
                # On augmente le compteur
                count += 1
            else:
                # On ajoute l'ip dans la liste
                lastClients.append(ip)

                # On remplit le dictionnaire client
                client["temperature"] = temperature
                client["pression"] = pression
                client["qualite"] = qualite
                client["temps"] = temps
                client["ip"] = ip
                client["mac"] = mac

                # On met le dictionnaire client dans itteration
                itteration.append(client)

                # On réinitialise le dictionnaire client
                client = {"temperature": None, "pression": None, "qualite": None, "temps": None, "ip": None, "mac": None}

                # On ajoute l'ip à la liste
            listIp.append(ip)

        # Si la liste des derniers clients contient 3 éléments ou que le compteur est supérieur ou égal à 10
        if len(lastClients) == 4 or count >= 10:
            # On ajoute itteration dans Body
            Body.append(itteration)
            # On met à jour Item
            Item = {"items": Body}

            # Spécifiez le chemin où vous voulez enregistrer le fichier JSON
            file_path = os.path.join(r"C:\Users\amula\Desktop\Alexandre\VSC\Hexagone\Projet groupe\Site-web-symfony\public", "values.json")
            
            # On crée le fichier
            with open(file_path, "w") as f:
                Item_dump = json.dumps(Item)
                f.write(str(Item_dump))
                f.write("\n")

            # On vide tous
            client = {"temperature": None, "pression": None, "qualite": None, "temps": None, "ip": None, "mac": None}
            lastClients = []
            itteration = []
            count = 0
            Item = {"items": Body}

        return "Données reçues avec succès", 200

def get_wifi_ip():
    result = subprocess.run(['ipconfig'], capture_output=True, text=True)
    output = result.stdout

    # Parse the output to find the Wi-Fi IP address
    wifi_ip = None
    lines = output.split('\n')
    for i in range(len(lines)):
        if 'Wi-Fi' in lines[i]:
            for j in range(i, len(lines)):
                if 'IPv4 Address' in lines[j] or 'Adresse IPv4' in lines[j]:
                    wifi_ip = lines[j].split(':')[-1].strip()
                    break
            if wifi_ip:
                break
    return wifi_ip

if __name__ == '__main__':
    local_ip = get_wifi_ip()  # Obtenir l'adresse IP de la carte réseau sans fil Wi-Fi
    if local_ip:
        app.run(host=local_ip, port=8080)
    else:
        print("Impossible de trouver l'adresse IP de la carte réseau sans fil Wi-Fi")
