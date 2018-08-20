create database presshub;
	use presshub;

create table users(
id int primary key not null auto_increment,
username varchar(32) not null,
password varchar(100) not null,
first_name varchar(50) not null,
middle_name varchar(50),
last_name varchar(50) not null,
designation varchar(4) not null,
contact_no varchar(10) not null,
email_addr varchar(30) not null,
date_created datetime default CURRENT_TIMESTAMP(),
date_updated datetime ON UPDATE CURRENT_TIMESTAMP(),
is_admin varchar(1) not null,
is_active varchar(1) not null
);

create table issue(
id int primary key not null auto_increment,
nickname varchar(50) not null,
date_started datetime default  CURRENT_TIMESTAMP,
date_last_updated datetime on update CURRENT_TIMESTAMP,
deadline datetime not null,
date_finished date,
status varchar(3),
is_archived varchar(1) default "N"
);

create table article(
id int primary key not null auto_increment,
date_created datetime default CURRENT_TIMESTAMP(),
date_updated datetime ON UPDATE CURRENT_TIMESTAMP(),
status varchar(3),
title varchar(100) not null,
body varchar(65536),
deadline date,
date_finished date
);

create table comment(
id int primary key not null auto_increment,
user int not null,
comment varchar(65536) not null,
date_created datetime default CURRENT_TIMESTAMP(),
date_updated datetime ON UPDATE CURRENT_TIMESTAMP(),
is_edited varchar(1) default "N",
is_resolved varchar(1) default "N"
);

create table reply(
id int primary key not null auto_increment,
parent int not null,
user int not null,
body varchar(65536) not null,
date_created datetime default CURRENT_TIMESTAMP()
);


create table user_issue(
user int not null,
issue int not null
);

create table user_article(
user int not null,
article int not null
);

create table designation(
id varchar(4),
description varchar(20)
);

create table status(
id varchar(1) not null,
description varchar(20) not null
);