presshub
htdocs-presshub folder
-git bash here
--npm install
restart apache
git init
git remote add origin https://github.com/exs-xgg/preshub
git pull origin /master/- pull latest updates from the cloud

htdocs
git clone https://github.com/exs-xgg/presshub
cd presshub - change directory
npm install
git pull - if may changes

apacher config (httpd.conf)
<VirtualHost *:80>
    DocumentRoot C:/xampp/htdocs/presshub/
    
    <Directory C:/xampp/htdocs/presshub/>
            Options Indexes FollowSymLinks MultiViews
            AllowOverride All
            Order allow,deny
            allow from all
            Require all granted
    </Directory>
</VirtualHost>

git status (check status/modifies changes)
git checkout (-b test, test, master) switching branch
--git add .
---git commit -m "asd"
----git checkout master
