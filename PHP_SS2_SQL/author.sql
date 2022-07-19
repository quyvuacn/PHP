create table  authors (
      authorid int(11) not null AUTO_INCREMENT,
      name varchar(55) not null default '',
      primary key (authorid)
) ENGINE = InnoDB default charset = utf8 AUTO_INCREMENT=5;

insert into authors (authorid, name) values
     (1, 'J.R.R. Tolkien'),
     (2, 'Alex Haley'),
     (3, 'Tom Clancy'),
     (4, 'Isaac Asimov');

create table books (
       bookid int(11) not null AUTO_INCREMENT,
       authorid int(11) not null default '0',
       title varchar(55) not null default '',
       ISBN varchar(25) not null default '',
       pub_year smallint(6) not null default '0',
       available tinyint(4) not null,
       primary key (bookid)
) ENGINE = InnoDB default charset = utf8 AUTO_INCREMENT=19;

INSERT into books(bookid, authorid, title, ISBN, pub_year, available)  values
       (1, 1, 'The Two Towers', '0-261-10236-2', 1954, 1),
       (2, 1, 'The Return of the King', '0-261-10237-0', 1955, 1),
       (3, 2, 'Roots', '0-440-17464-3', 1974, 1),
       (4, 3, 'Rainbow Six', '0-425-17034-9', 1998, 1),
       (5, 3, 'Teeth of the Tiger', '0-399-15079-X', 2003, 1),
       (6, 3, 'Executive Orders', '0-425-15863-2', 1996, 1),
       (7, 1, 'The Hobbit', '0-261-10221-4', 1937, 1),
       (8, 3, 'The Sum of All Fears', '0-425-13354-0',1991, 1),
       (9, 3, 'Red Rabbit', '0-399-14870-1', 2000, 0),
       (10, 4, 'I, Robot', '0-553-29438-5', 1950, 1),
       (11, 4, 'Foundation', 'O-553-80371-9', 1951, 1),
       (12, 4, 'Foundations Edge', '0-553 - 29338-9', 1982, 1),
       (13, 4, 'Foundation and Empire', '0-553-29337-0', 1952, 1),
       (14, 4, 'Exploring the Earth and the Cosmos', '0-517-546671', 1982, 0),
       (15, 4, 'Second Foundation', '0-553-29336-2', 1953, 1),
       (16, 4, 'Forward the Foundation', '0-553-56507-9', 1993, 1),
       (17, 4, 'The Best of Isaac Asimov', '0-449-20829-X', 1973, 1),
       (18, 4, 'Isaac Asimov: Gold', '0-06-055652-8', 1995, 1);