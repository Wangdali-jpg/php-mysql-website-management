# php-mysql-website-management
Based on php and mysql, manage the data in mysql on browsers, including register, update, search, delete. 
基于PHP和Mysql，通过浏览器管理Mysql中的数据，功能包括增加，修改，查询和删除（增删查改）。

## 需要的环境和依赖
* Windows 10
* PHP（php-8.0.3-Win32-vs16-x64）
* Mysql（mysql-8.0.23-winx64）
* Appache（httpd-2.4.46-o111k-x64-vc15）
* phpMyAdmin（phpMyAdmin-5.1.0-all-languages）
以上所需要的软件已经在environment文件夹中给出，具体的安装方式请自行搜索。

## 需要提前建立数据库
* 需要提前建立一个数据库，对于初次使用者，建议直接使用提供的数据库。
* 提供的数据库的各项字段已经清空，需要根据字段的数据类型和外键限制填充。
* 使用phpMyAdmin导入数据库之前需要先创建一个同名的数据库。
* zuoyemanagement.sql文件即为提供的数据库

## PHP程序
