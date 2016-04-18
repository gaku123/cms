create table user(
  id integer auto_increment,
  user_name varchar(20) not null,
  password varchar(255) not null,
  delete_flag tinyint(1) zerofill not null default 0,
  updated_at datetime,
  created_at datetime,
  primary key(id),
  unique key user_name_index(user_name)
);

create table blog(
  id integer auto_increment,
  blog_url varchar(4095) not null,
  blog_title varchar(255) not null,
  delete_flag tinyint(1) zerofill not null default 0,
  updated_at datetime,
  created_at datetime,
  primary key(id)
);

create table owner(
  id integer auto_increment,
  user_id integer,
  blog_id integer,
  delete_flag tinyint(1) zerofill not null default 0,
  updated_at datetime,
  created_at datetime,
  primary key(id, user_id, blog_id)
);

create table entry(
  id integer auto_increment,
  user_id integer,
  blog_id integer,
  title varchar(255) not null,
  body text not null,
  delete_flag tinyint(1) zerofill not null default 0,
  updated_at datetime,
  created_at datetime,
  primary key(id),
  index blog_id_index(blog_id)
);

alter table owner add foreign key (user_id) references user(id);
alter table owner add foreign key (blog_id) references user(id);
alter table entry add foreign key (user_id) references user(id);
alter table entry add foreign key (blog_id) references user(id);

insert into user ( user_name,password,updated_at,created_at )
            values ( 'admin','admin',now(),now() );
insert into blog ( blog_url,blog_title,updated_at,created_at )
            values ( '192.168.10.105','爽コード',now(),now() );
insert into owner ( user_id,blog_id,updated_at,created_at )
            values ( (select id from user where user_name = 'admin'),(select id from blog where blog_url = '192.168.10.105'),now(),now());
insert into entry ( user_id,blog_id,title,body,updated_at,created_at )
            values ( (select id from user where user_name = 'admin'),(select id from blog where blog_url = '192.168.10.105'),'こんにちは','ようこそ！',now(),now());

