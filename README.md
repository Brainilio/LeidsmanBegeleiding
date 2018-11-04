
Voor local use: 

[ Make sure to have composer installed ] 
[ (restmigrations) in migrations zijn deletable migrations ( ik heb alle tables die ik daar heb toegevoegd
gewoon in de normale create_table migrations gemaakt zodat hij alles in 1 x aanmaakt in plaats van in aparte batches ]

- In .env file is het mogelijk om je database naam en wachtwoord aan te passen naar jouw database.

- Php artisan serve runnen

- SQL dump in sql database stoppen of Php artisan migrate runnen om alle batches te migraten 

- Daarna php artisan db:seed runnen in command line om de database te seeden met 2 admins

Voor hosting: 

- Host aanmaken met naam en wachtwoord
- Filezilla inloggen met je host naam en wachtwoord
- SQL database aanmaken in je hosting panel
- SQL file in SQL phpmyadmin uploaden @ hosting panel 
- Heel je app uploaden in zelf aangemaakt folder op je filezilla BEHALVE DE PUBLIC FILE
- Public file in public html folder uploaden
- public/index.php  
 		require __dir__  op line 24 en require once dir op line 38 aanpassen en naar je aangemaakte folder linken.
- in .env file db_database, db_username & db_password aanpassen naar jouw database, username & password op je hosting
server
- symlinkcreate.php aanmaken in je public_html stoppen en dan: 
 <?php symlink('/home/naamdatabase/naamfolder/storage/app/public', '/home/naamdatabase/public_html/storage'); 
- Op je browser zoeken naar /symlink.php en dan heb je je storage folder aangemaakt voor image uploading. 
- Als je deze runt dan verdwijnt hij uit je ftp public_html folder en je hebt volledige access tot alles hierna.



