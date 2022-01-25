# stager

## Deutsche Anleitung (for an english description, please scroll down the document)
Ein Werkzeug, um Staging Umgebungen automatisch neu aus den Live-Umgebungen zu bauen.
Erstellt die Staging Umgebung in einem Sub-Folder (dev) mit eigener Datenbank.

### Installation
Dateien in einen Ordner auf dem Server kopieren.
Die Datei stager.sh muss als ausführbar markiert werden.
Füge das sh Script zur Crontab hinzu. Richte es so ein, dass es jede Minute einmal läuft, bzw. in einem für dich sinnvollen Intervall.

### Funktionsweise
1. Konfiguration vornehmen

2. Einloggen

3. Aktualisierungsvorgang starten

4. Das Shell Script erkennt den aktivierten Aktualisierungsvorgang, und erstellt die Staging Umgebung neu.

* Unterordner wird gelöscht
* Unterordner wird neu mit Daten aus dem Quellordner erstellt
* Konfigurationsdatei der Anwendung wird neu geschrieben.
* Datenbank wird kopiert.

### Anmerkungen
* Die Shell Scripte funktionierten in meinen Tests nru auf Servern, in denen "richtige" Einträge in der Crontab vorgenommen werden können.
Ich habe jede Menge Versuche mit sehr eingeschränkten V-Servern durchgeführt, auf denen man nicht direkt in die Crontab schreiben kann.
Das sind Hoster, bei denen man die Crontab Einträge oft über ein Admin-Panel konfiguriert.
Sieht so aus, als würden diese Hoster einen Benutzer verwenden, der nicht über die Rechte verfügt, Shell scripte auszuführen.
Es könnte aber auch an anderen merkwürdigen Einstellungen des Server liegen.
Oftmals gab/gibt es dann auch kein Logging für die Crontab Scripte, so dass man sich beim Debuggen so hilflos fühlt,
als wäre man Jack Burton inmitten der 7 chinesischen Hölle der Server-Verwaltung.
Ich denke für diese Server werde ich eine andere Lösung erstellen, die mit Hilfe von ftp/sft Verbindungen die Staging Umgebung erstellt.
Das wird dann aber ein Programm sein, welches auf einem anderen Computer ausgeführt wird, und dadurch natürlich viel langsamer bei diesem Durchgang sein, als eines, dass direkt auf dem Server arbeitet.
Für Maschinen die eine SSH Verbindung zulassen, ist vielleicht auch ein Programm denkbar, dass direkt über SSH Befehle arbeitet.

-----

## English description, (Deutsche Beschreibung siehe oben)
Tool, to automatically rebuild staging environments in a own folder and with own database.

### Installation
Install into a folder of your php project/server.
Enable sh file as executable script.
Add sh file to crontab, set it, to be run every minute, or in a useful interval.

### How it works
1. Start setup

2. Login

3. Update

* Subfolder will be deleted
* Folder will be copied to subfolder
* Rewrites configuration
* Copies database.

### Notes
* The scripts are only working on a server, where you can add a real entry to the crontab.
I had a lot of trials on very restricted virtual servers, where you cannot write the crontab directly.
It seems like these hosters are using a user, that is not allowed to run shell scripts with crontab or some other weird setup. 
As there often is no logging for shell scripts, this kind of stuff is really hard to debug nor examine. 
I think, I will work on a different solution for such servers, with an ftp/sftp connection setup. 
But that requires a third machine and will slow down the process. 
Maybe a good solution can be build with an interactive ssh worker, for machines where at least ssh is possible.