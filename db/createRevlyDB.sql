-- *********************************************
-- * SQL MySQL generation                      
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.2              
-- * Generator date: Sep 14 2021
-- * Schema: revly_db/1 
-- ********************************************* 


-- Database Section
-- ________________ 

CREATE DATABASE IF NOT EXISTS revly_db;
USE revly_db;


-- Tables Section
-- _____________ 

CREATE TABLE COMMENTS (
     id INT UNSIGNED NOT NULL AUTO_INCREMENT,
     description TEXT NOT NULL,
     date_time DATETIME NOT NULL,
     author_email VARCHAR(80) NOT NULL,
     id_post INT UNSIGNED NOT NULL,
     constraint ID_COMMENT_ID primary key (id));

CREATE TABLE COMPANY_ACCOUNT_REQUEST (
     company_email VARCHAR(80) NOT NULL,
     date_time DATETIME NOT NULL,
     name VARCHAR(64) NOT NULL,
     address VARCHAR(128) NOT NULL,
     constraint ID_COMPANY_user_REQUEST_ID primary key (company_email, date_time));

create table FOLLOW (
     follower_email varchar(80) not null,
     user_email varchar(80) not null,
     constraint ID_FOLLOW_ID primary key (follower_email, user_email));
	 
create table LIKES (
     user_email varchar(80) not null,
     id_post int unsigned not null,
     constraint ID_POST_ID primary key (id_post, user_email));

create table NOTIFICATION (
     id INT UNSIGNED not null AUTO_INCREMENT,
     date_time datetime not null,
     id_type int unsigned not null,
     notifier_email varchar(80) not null,
     notified_email varchar(80) not null,
	id_post int unsigned,
     constraint ID_NOTIFICATION_ID primary key (id));

create table NOTIFICATION_TYPE (
     id int unsigned not null AUTO_INCREMENT,
     message varchar(100) not null,
     constraint ID_NOTIFICATION_TYPE_ID primary key (id));

create table POST (
     id int unsigned not null AUTO_INCREMENT,
     img varchar(128) not null,
     evaluation tinyint not null,
     subject varchar(100),
     description text not null,
     date_time datetime not null,
     id_taggable int unsigned,
     author_email varchar(80) not null,
     constraint ID_POST_ID primary key (id));

create table RECENT_SEARCHES (
     searched_email varchar(80) not null,
     user_email varchar(80) not null,
     date_time datetime not null,
     constraint ID_RECENT_SEARCHES_ID primary key (user_email, searched_email));

create table TAGGABLE (
     id int unsigned not null AUTO_INCREMENT,
     name varchar(64) not null,
     address varchar(128),
     company_email varchar(80) not null,
     constraint ID_TAGGABLE_ID primary key (id));

create table USERS (
     email varchar(80) not null,
     username varchar(64) not null unique,
     name varchar(64) not null,
     surname varchar(64),
     password varchar(64) not null,
     biography text not null,
     img varchar(128) not null default 'default-image.png',
     isCompany boolean not null,
     notifyLikes boolean not null,
     notifyComments boolean not null,
     notifyTags boolean not null,
     notifyFollows boolean not null,
     constraint ID_USERS_ID primary key (email));


-- Constraints Section
-- ___________________ 

alter table COMMENTS add constraint FKWRITE_FK
     foreign key (author_email)
     references USERS (email);

alter table COMMENTS add constraint FKCONTAIN_FK
     foreign key (id_post)
     references POST (id)
     on delete cascade;

alter table COMPANY_ACCOUNT_REQUEST add constraint FKREQUEST
     foreign key (company_email)
     references USERS (email);

alter table FOLLOW add constraint FKFOLLOWING_FK
     foreign key (user_email)
     references USERS (email);

alter table FOLLOW add constraint FKFOLLOWED
     foreign key (follower_email)
     references USERS (email);

alter table LIKES add constraint FKLIKER
     foreign key (user_email)
     references USERS (email);

alter table LIKES add constraint FKLIKED
     foreign key (id_post)
     references POST (id)
     on delete cascade;

alter table NOTIFICATION add constraint FKSHOW_FK
     foreign key (id_type)
     references NOTIFICATION_TYPE (id);

alter table NOTIFICATION add constraint FKNOTIFIER_FK
     foreign key (notifier_email)
     references USERS (email);

alter table NOTIFICATION add constraint FKNOTIFIED_FK
     foreign key (notified_email)
     references USERS (email);
	 
alter table NOTIFICATION add constraint FKPOST_NOTIFICATION_FK
     foreign key (id_post)
     references POST (id)
     on delete cascade;

alter table NOTIFICATION add constraint POST_NOTIFICATION
     check ((id_type = 1 and id_post is null) or (id_type > 1 and id_post is not null));

alter table POST add constraint FKTAG_FK
     foreign key (id_taggable)
     references TAGGABLE (id);

alter table POST add constraint FKPUBLISH_FK
     foreign key (author_email)
     references USERS (email);
	 
alter table POST add constraint SUBJECT_POST
     check((id_taggable is not null and subject is null) or (id_taggable is null and subject is not null));

alter table RECENT_SEARCHES add constraint FKSEARCHER
     foreign key (user_email)
     references USERS (email);

alter table RECENT_SEARCHES add constraint FKSEARCHED_FK
     foreign key (searched_email)
     references USERS (email);

alter table TAGGABLE add constraint FKPRODUCE_FK
     foreign key (company_email)
     references USERS (email);


-- Index Section
-- _____________ 

create index FKCONTAIN_IND
     on COMMENTS (id_post);

create index FKFOLLOWING_IND
     on FOLLOW (user_email);

create index FKNOTIFIED_IND
     on NOTIFICATION (notified_email);

create index FKTAG_IND
     on POST (id_taggable);

create index FKPUBLISH_IND
     on POST (author_email);

create index FKSEARCHER_IND
     on RECENT_SEARCHES (user_email);

create index FKPRODUCE_IND
     on TAGGABLE (company_email);	 
	 
	 
	 
	 
	 
-- Events
-- ______

DELIMITER //

CREATE EVENT IF NOT EXISTS delete_old_notifications
ON SCHEDULE EVERY 1 DAY
STARTS CURRENT_TIMESTAMP
DO
BEGIN
  DELETE FROM NOTIFICATION
  WHERE date_time < NOW() - INTERVAL 15 DAY;
END //

DELIMITER ;

DELIMITER //

CREATE EVENT IF NOT EXISTS delete_old_recent_searches
ON SCHEDULE EVERY 1 DAY
STARTS CURRENT_TIMESTAMP
DO
BEGIN
  DELETE FROM RECENT_SEARCHES
  WHERE date_time < NOW() - INTERVAL 15 DAY;
END //

DELIMITER ;
