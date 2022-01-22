# stager
Tool, to automatically rebuild staging environments in a own folder and with own database.

## Installation
Install into a folder of your php project/server.
Enable sh file as executable script.
Add sh file to crontab, set it, to be run every minute, or in a useful interval.

## How it works
1. Start setup

2. Login

3. Update

* Subfolder will be deleted
* Folder will be copied to subfolder
* Rewrites configuration
* Copies database.