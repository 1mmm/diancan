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
{"errno":0,"token":"MW1tbQ==","level":"1","lastname":"chen","FirstName":"hhhongkai","Age":"100"}<br><br>
http://39.107.93.96/login.php?id=1mm&pwd=7539100<br>
if your id is not exist，you will recive a reply like this:<br>
{"errno":1,"token":0}<br><br>
http://39.107.93.96/login.php?id=1mmm&pwd=2333333<br>
But if your password is incorrect ,you will recive a reply below:<br>
{"errno":2,"token":0}<br>
### registor.php
registor.php is called by users who wants to register a account of this app.<br>
You need to post/get nichen('id' of login.php),code('pwd' of login.php),and some private information such as age,lastname and firstname.After all,you should give the user's level an inition data.<br>
example:<br>
http://39.107.93.96/registor.php?type=1&nichen=1mmm&code=7539100&lastname=chen&firstname=hongkai&age=100&level=1<br>
The url above shows that you wants to registe an account named 1mmm with password 7539100 which is owned by chen hongkai.<br>
I also provide you another method to update the user tabel,example:<br>
http://39.107.93.96/registor.php?type=2&nichen=1mmm&lastname=chen&firstname=hongkai&age=100<br>
The url above shows that you wants to update an account named 1mmm which is owned by chen hongkai who's age is 100.<br>
## Menu table 
### cdata.php
cdata.php is just for menu.<br>
It has four uses.<br>
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
## Order table
### data.php
data.php has two methods.<br>
The first is insert new order.<br>
example:<br>
http://39.107.93.96/data.php?status=1&uid=2&menu=4&tim=122&num=1<br>
uid is the user's id in user table.menu is the dish id in Menu table.time is the start of waiting time.num is the number of this dish which the customer have ordered. <br>
The second method is for pay and show.<br>
http://39.107.93.96/data.php?status=2<br>
Using the url above you can get all of the orders as a json array.<br>
Such as below:<br>
{"errno":0,"data":[{"id":"3","uid":"2","menu":"3","time":"122","num":"2"},{"id":"4","uid":"2","menu":"4","time":"122","num":"1"},{"id":"5","uid":"2","menu":"4","time":"122","num":"1"}]}<br>


# How to use php in android(java)
first of all import okhttp<br>
Then（login.php 's example)<br>
 ```
    public String base_url="http://39.107.93.96/";
    public static final MediaType JSON = MediaType.parse("application/json; charset=utf-8");
    public class erro {
        private int errno;
        private String token;
        erro(int errno,String token){
            this.errno = errno;
            this.token = token;
        }
    }
    new Thread()
                {
                    @Override
                     public void run() {
                        try {
                            FormBody.Builder pa=new  FormBody.Builder();
                            pa.add("id",ans.getText().toString());
                            pa.add("pwd",code.getText().toString());
                            tt=post(pa,"login.php");
                            Gson gson = new Gson();
                            int er = gson.fromJson(tt,erro.class).errno;
                            token1=gson.fromJson(tt,erro.class).token;
                            if (er==0)
                            {
                                user=ans.getText().toString();
                                hand.sendEmptyMessage(0);//成功登陆
                            }
                            else if (er==1) hand.sendEmptyMessage(1);
                            else if (er==2) hand.sendEmptyMessage(2);
                            else if (er==3) hand.sendEmptyMessage(3);
                        }
                        catch (Exception e)
                        {
                            hand.sendEmptyMessage(2);
                        }
                    }
                }.start();
    private final OkHttpClient client = new OkHttpClient();
        String post(FormBody.Builder pa,String UR) throws Exception {
        Request request = new Request.Builder()
                .url(base_url+UR)
                .post(pa.build())
                .build();
        Response response = client.newCall(request).execute();
        if (!response.isSuccessful()) throw new IOException("Unexpected code " + response);
        else {
            return response.body().string();
        }
    }
```





