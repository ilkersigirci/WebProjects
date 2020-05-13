# XAMPP

XAMPP Control Panel'i yonetici olarak ac
Servisleri stopla
Sol tarafta windows sistem servisi olarak yukleme tikine tikla

443 u vmware dinliyor hatasi

Open the XAMPP Control Panel
Click the ‘Config’ button next to the Apache module and select the ‘Apache (httpd-ssl.conf)‘ option
A text edit box will pop up with the contents of httpd-ssl.conf
Find the line with Listen 443
Change 443 to some other open port – like 4430
Do a search/replace in the file for all the references to 443 and change them to 4430 (should be like 3-4 of them)
save and exit the editor
Start Apache

Eger port 80 mesgul ise
config httpd.conf
Listen 80 i degistir(mesela 8080)
Browserden localhost:8080 e gir

# Php path
Add C:\xampp\php to system variable

# Navicat

Connection->MySQL
herhangi bir connection name yaz
localhost
xampp mysql portu(default 3306)

# YII2

## yii2 basic

main default page -> http://localhost/yii2/basic/web/

config'e gel web.php den;
'cookieValidationKey' => '', doldur

#### For Ubuntu

tar.gz dosyasini /var/html/yii2 nun icine at
sudo tar xf yii2....tar yap



### yii2 basic virtual host

C:/xampp/htdocs/yiisite/basic/config/web.php and uncomment urlmanager part

C:\xampp\apache\conf\extra\httpd-vhosts.conf  and add
<VirtualHost 127.0.0.1:80>
 DocumentRoot "C:/xampp/htdocs/yiisite/basic/web/"
 ServerName yiisite
</VirtualHost>

C:\Windows\System32\drivers\etc\hosts and add
127.0.0.1 yii2

.htaccess file'i C:\xampp\htdocs\yii2\basic\web 'e kopyala

Restart Apache

http://yii2  or yii2  or yii2/

Live Server Ayarlari
http://yii2/
http://127.0.0.1:5500/



## yii2 advanced

winrardan cikarmada sikinti cikarsa winrari admin olarak acip yap
rename advanced->yii2
C:xampp/htdocs icine kopyala yii2 
php.exe yi bulabilmek icin iki secenek var:
1)init.bati degistir   PHP_COMMAND=C:\xampp\php\php.exe
2)Environment Variable path e ekle   C:\xampp\php\php.exe

http://localhost/yii2/frontend/web/index.php


### yii2 advanced installation with composer on Windows

Environment Variable path e ekle   C:\xampp\php\php.exe
https://getcomposer.org/download/
Composer-Setup.exe indir ve kur
cmd'yi yonetici calistir sonra composer yazip calisip calismadigini test et
cd C:\xampp\htdocs
composer create-project --prefer-dist yiisoft/yii2-app-advanced advanced
cd C:\xampp\htdocs\advanced
php init
Development
Create a new database and adjust the components['db'] configuration in common/config/main-local.php accordingly
php yii migrate
phpmyadminle db'e bak user table'i gelmis mi diye.
http://localhost/advanced/frontend/web/


### Frontend ile Backend URL baglama (Ayni zamanda prettier de yapiyor)    ****

https://github.com/mickgeek/yii2-advanced-one-domain-config


### yii2 advanced prettier url

common/config/main.php ya da main-local.php   => ikisi de oluyor

return icine components arrayinin icine ekle
'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],

### yii2 advanced virtual host 

Sikinti olursa siteye bak
https://www.yiiframework.com/wiki/755/how-to-hide-frontendweb-in-url-addresses-on-apache

C:\xampp\apache\conf\extra\httpd-vhosts.conf  and add
<VirtualHost 127.0.0.1:80>
 DocumentRoot "C:/xampp/htdocs/yii2/advanced/frontend/web"
 ServerName yii2f
</VirtualHost>
C:\xampp\apache\conf\extra\httpd-vhosts.conf  and add
<VirtualHost 127.0.0.1:80>
 DocumentRoot "C:/xampp/htdocs/yii2/advanced/backend/web"
 ServerName yii2b
</VirtualHost>

C:\Windows\System32\drivers\etc\hosts and add
127.0.0.1 yii2f
127.0.0.1 yii2b

Root .htaccess file'i C:\xampp\htdocs\yii2\advanced\ 'e kopyala
Web .htaccess file'i C:\xampp\htdocs\yii2\advanced\backend\web 'e kopyala
Web .htaccess file'i C:\xampp\htdocs\yii2\advanced\frontend\web 'e kopyala
Restart Apache

http://yii2f  or yii2f  or yii2f/

Live Server Ayarlari
http://yii2f/
http://127.0.0.1:5500/

### yii2 advanced AdminLTE kurulumu

https://github.com/dmstr/yii2-adminlte-asset        -> AdminLTE location
https://www.youtube.com/watch?v=11Chbt_kxNk&t=201s  -> How to

composer.json require'a "dmstr/yii2-adminlte-asset": "2.*" ekle
cmd'yi admin ac ve composer update yap
backend/config/main.php'de componentin icine alt kodu ekle
'view' => [
            'theme' => [
                'pathMap' => [
                   '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
                ],
            ],
       ],


## VsCode Liver server extension ayarlari

http kismi onemli
http://localhost/
http://127.0.0.1:5500/

