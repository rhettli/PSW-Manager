
## 这是一个使用aardio桌面开发工具开发的记录帐号密码的工具.使用命令行来查看密码、新建密码、修改密码，完全 开源

包括服务端（php）&客户端(aardio)
 
为什么不推荐浏览器记录密码

1..浏览器记录密码》浏览器开发人员铁定可以看到你的密文，真心不安全，虽说浏览器开发者不会动你的帐号，但是能确保在被诱惑的情况下也能洁身自好吗。
2.换个电脑还需要下载浏览器，动不动几十MB.





## 工具操作全部使用命令行模式


>ls   #查看所前十个帐号信息

>ls -n20  #查看前20哥帐号信息

> ls -tgit  #搜索标题含有git的的帐号信息

>show -i2   #显示序号为2的帐号的详细信息包括密码。

>new -t美团 -r这是一个美团帐号信息      #新建一个帐号信息，标题为“美团”，备注为“这是一个美团帐号信息”

---此时进入编辑模式，同下方的修改模式---



>mdf -i2    #修改id为2的帐号信息，此时进入修改模式

---修改模式下：----

>t  1   15212278912>a331012    # 此时修改当前帐号的第一行信息，帐号为：15212278912，密码：a331012

>t  2   meituan>ameituan    # 此时修改当前帐号的第一行信息，帐号为：meituan，密码：ameituan

>detail    #显示当前修改的帐号详情

>post  #提交当前编辑的数据到服务器中

>exit   #退出修改模式




>exit   #退出程序

----

Welcome to the PSW-Manager wiki!

Here is introduce of PSW Manager! Pay attention please!

Double click bin file which named Psw manager and then ,you will see the program runing like this.

![](https://raw.githubusercontent.com/rhettli/PSW-Manager/master/pic/0.png)

### 使用ls列出前10个帐号信息。
![](https://raw.githubusercontent.com/rhettli/PSW-Manager/master/pic/1.png)

![](https://raw.githubusercontent.com/rhettli/PSW-Manager/master/pic/2.png)

### 显示详情
![](https://raw.githubusercontent.com/rhettli/PSW-Manager/master/pic/3.png)

### 进入修改编辑模式
![](https://raw.githubusercontent.com/rhettli/PSW-Manager/master/pic/4.png)


PS：这个软件完全免费，但是前提需要一个自己的服务器，安装数据库（mysql）来记录管理自己的帐号密码（已经全部加密，服务端拿到数据也没用）防抓包（数据传输也采用加密方式）
