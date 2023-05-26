# jackEDS
Welcome to use JackEDS！ The software is compact, flexible, simple and practical. Can be used for exposure platforms, blogs, article management, and enterprise CMS, supporting secondary development. Under the GPL agreement, you can also delete the copyright of the HTML page at will without any responsibility.
Url: https://github.com/AmerianJake/jackEDS


## Installation environment:
	PHP >= 5.6.0
	PDO PHP Extension
	MBstring PHP Extension

## How to use it?
1: Upload all files to your website root and set website running directory to '/public';

2: Import the 'data/jack.sql' file into your database and set '/config/database.php' to connect to the database;

3: Set pseudo static (based on thinkphp):

	location / {
	if (!-e $request_filename) {
		rewrite ^(.*)$ /index.php? s=/$1 last;
		break;
		}
	}

4: Modify public/jackadmin.php at the backend entrance and modify the file name.

5: Default backend address: 'your website/jackadmin.php'
Default account: 'admin' 
Default password: 'admin'
Please make your own modifications after logging in.

## How to change language?
1: Edit '/config/app.php' -> line 46
   'default_lang'           => 'en', //default en,you can amend like 'cn','jp' and so on;

2: Create the corresponding language pack in the directory 'jackadmin/lang', such as' cn. php ',' jp. php '. This pack for admin.

3: Create the corresponding language pack in the directory 'index/lang', such as' cn. php ',' jp. php '. This pack for index.

### More information:
This program is developed based on thinkphp5.1. For more advanced configuration details, please refer to the official manual, refer to: https://www.kancloud.cn/manual/thinkphp5_1/353946
