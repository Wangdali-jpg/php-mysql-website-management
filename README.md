# php-mysql-website-management
Based on php and mysql, manage the data in mysql on browsers, including register, update, search, delete. 
基于PHP和Mysql，通过浏览器管理Mysql中的数据，功能包括增加，修改，查询和删除（增删查改）。
***
## 修改记录
2020/5/10   
删掉了其他四个文件夹，只保留了user_management文件夹，不影响该文件夹中程序的使用。其他文件夹中的程序的框架和功能完全相同，可以由这个修改得到。
***

## 需要的环境和依赖
* Windows 10
* PHP（php-8.0.3-Win32-vs16-x64）
* Mysql（mysql-8.0.23-winx64）
* Appache（httpd-2.4.46-o111k-x64-vc15）
* phpMyAdmin（phpMyAdmin-5.1.0-all-languages）
以上所需要的软件已经在environment文件夹中给出，具体的安装方式请自行搜索。

## 需要提前建立数据库
* 需要提前建立一个数据库，对于初次使用者，建议直接使用提供的数据库。
* **强调：提供的数据库的各项字段已经清空，在开始使用之前，必须根据字段的数据类型和外键限制填充。**
* 使用phpMyAdmin导入数据库之前需要先创建一个同名的数据库。
* zuoyemanagement.sql文件即为提供的数据库

## PHP程序
* 首先修改initial_interface文件夹下的db_config.php文件，其中的“HOST”为主机，如果是本地访问的话，不需要修改，“USER”为数据库的用户名，“PASS为”数据库的密码，“DBNAME”为数据库的名字。如果使用提供的数据库，则不用进行修改。
* 将initial_interface，user_management，basic_information_management，supervise_basic_information_management，supervise_management五个文件夹放在PHP的项目文件夹中（在安装PHP的时候会进行设置），必须确保他们处于同一个路径下。
* 在浏览器中输入inital_interface里面的login.php的路径，回车，即进入到整个系统的入口，在该登陆界面，**用户ID和密码分别为在数据库的user_info表中的user_id和username**。
* 该程序为对不同的表进行的“增删查改”功能的重复。

2021/5/10
