uploadvedio.php 

database
CREATE TABLE `videos` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) 

upvd.php
database
CREATE TABLE `video`
(
`v_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`video_name` varchar(255) not null 
)

login database

CREATE TABLE `login_user` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;