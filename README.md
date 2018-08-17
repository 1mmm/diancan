# diancan
This backstage provide three tables.<br>
backstage address is http://39.107.93.96/
## User table
###login.php
login.php is called by users who have registed before.<br>
You need to post/get id and pwd to backstage and the backstage will send you a json data include error code and token(you don't need to know what it is).<br>
example:<br>
if you print this to you browser.<br>
http://39.107.93.96/login.php?id=1mmm&pwd=7539100<br>
you will get backstage reply <br>
{"errno":0,"token":"MW1tbQ=="}<br>
if your id is not exist，you will recive a reply like this:<br>
{"errno":1,"token":0}<br>
But if your password is incorrect ,you will recive a reply below:<br>
{"errno":2,"token":0}<br>

