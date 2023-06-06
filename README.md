# jackEDS
Welcome to use JackEDS！The software is compact, flexible, simple and practical. Can be used for exposure platforms, blogs, article management, and enterprise CMS, supporting secondary development. Under the GPL agreement, you can also delete the copyright of the HTML page at will without any responsibility.
From: https://github.com/FromAmericanJack/jackEDS  



## How to use it? 
0: Installation environment: 

	PHP >= 5.6.0
	PDO PHP Extension
	MBstring PHP Extension

<<<<<<< HEAD
## Installation environment
PHP >= 5.6.0
PDO PHP Extension
MBstring PHP Extension

## How to use it?
=======
>>>>>>> master
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

2: Create the corresponding language pack in the directory 'application/jackadmin/lang', such as' cn. php ',' jp. php '. This pack for admin.

3: Create the corresponding language pack in the directory 'application/jackindex/lang', such as' cn. php ',' jp. php '. This pack for index.

## More information:
This program is developed based on thinkphp5.1. For more advanced configuration details, please refer to the official manual, refer to: https://www.kancloud.cn/manual/thinkphp5_1/353946

## Digression:

#### Why develop this simple software?

At present, there are more and more rogue companies engaging in patent and software copyright infringement, which has seriously affected the development of open-source software. 

Some companies even promote free use, allowing everyone to use them first and then start using patent or copyright litigation to earn high profits. For example: Eolas, MPHJ, Uniloc,and so on from the United States. Even accurately collect user privacy information through program backdoors or feature codes, such as MetInfo, DEDECMS, Visual China, Tubao and so on from China.

When we face such an unjust society, just people should not stand idly by, but should show courage to fight against it. The law is not omnipotent. 

As a computer student and a person with a sense of justice, what should I personally do? So I created this simple software, hoping to use it to expose such events and also to arouse people with conscience and a sense of justice to change this society and make it better together.I hope to publish this software to expose relevant information about those who have lost their conscience, lawyers, and even businesses, so that everyone can stay away from harm and punish those who are evil.

I am not a wealthy person and have not established my own official website. If you feel that you can support me, you can choose to donate or contact Er Kai. Having sufficient funds, it is still a distant goal to establish a website, improve the entire system, and even establish a dedicated 'anti patent copyright' rogue fund.

Finally, thank you in advance for your support! Also thank you for Github's platform!
