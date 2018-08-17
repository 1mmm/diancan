# diancan
This backstage provide three tables.<br>
backstage address is http://39.107.93.96/
## User table
### login.php
login.php is called by users who have registed before.<br>
You need to post/get id and pwd to backstage and the backstage will send you a json data include error code and token(you don't need to know what it is).<br>
example:<br>
if you print this to you browser.<br>
http://39.107.93.96/login.php?id=1mmm&pwd=7539100<br>
you will get backstage reply <br>
{"errno":0,"token":"MW1tbQ=="}<br><br>
http://39.107.93.96/login.php?id=1mm&pwd=7539100<br>
if your id is not exist，you will recive a reply like this:<br>
{"errno":1,"token":0}<br><br>
http://39.107.93.96/login.php?id=1mmm&pwd=2333333<br>
But if your password is incorrect ,you will recive a reply below:<br>
{"errno":2,"token":0}<br>
### registor.php
registor.php is called by users who wants to register a account of this app.<br>
You need to post/get nichen('id' of login.php),code('pwd' of login.php),and some private information such as age,lastname and firstname.<br>
example:<br>
http://39.107.93.96/registor.php?nichen=1mmm&code=7539100&lastname=chen&firstname=hongkai&age=100<br>
The url above shows that you wants to registe an account named 1mmm with password 7539100 which is owned by chen hongkai.<br>
## Menu table 
### cdata.php
cdata.php is just for menu.<br>
It have four uses.<br>
#### 1.Insert new dishes information.
You need to post/get the dishes' name,price,some description and the photos of this dishes which is encoded as base64.<br>
example:<br>
http://39.107.93.96/cdata.php?status=1&name=shousiji&price=100&descr=haochi!&img=xxxx<br>
You choose the method 1(status=1) and the name of this dish is shousiji.It's price is 100 and we describe it as haochi!<br>
#### 2.Update one of the old dishes. 
You need to post/get the dishes' name,price,some description and the photos of this dishes which is encoded as base64.<br>
And after all,you should point out the id of this dish which you want to updata.<br>
http://39.107.93.96/cdata.php?status=2&name=shousiji&price=1000&descr=haochi!&img=xxxx&id=1<br>
You see we updata the price from 100 to 1000.And we point out what we updata is the first recording.<br>
#### 3.Delete one of the old dishes. 
you should point out the id of this dish which you want to delete.<br>
http://39.107.93.96/cdata.php?status=3&id=1<br>
We choose the method 3 and we delete the first recording we just insert.<br>
#### 4.Show the whole menu. 
It's funny.<br>
We you insert or update so many recordings.<br>
If you wabt to show the whole menu,what should we do?<br>
http://39.107.93.96/cdata.php?status=4<br>
Just post the status as 4 the backstage will reply you a json array include all dishes.<br>
Such as below:<br>
{"errno":0,"data":[{"id":"2","name":"shousiji","desc":"haochi!","img":"xxxx","price":"100"},{"id":"3","name":"shoussssiji","desc":"haochi!","img":"xxxx","price":"100"},{"id":"4","name":"malazhu","desc":"haochi!","img":"xxxx","price":"10000"}]}<br>
Errno is the error number.And data is the json array.<br>





