
-- drops the database ,beware

-- DROP DATABASE forum ;

CREATE DATABASE forum; 

USE forum;

CREATE TABLE `users` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `username` varchar(255) NOT NULL,
 `email` varchar(255) NOT NULL,
 `password` text NOT NULL,
 `upvotes` int(11) NOT NULL,
 PRIMARY KEY (`id`)
);

CREATE TABLE `questions` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `user_id` int(11) DEFAULT NULL,
 `what` text,
 `kabhi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`),
 KEY `user_id` (`user_id`),
 CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
);

CREATE TABLE `answers` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `user_id` int(11) DEFAULT NULL,
 `question_id` int(11) DEFAULT NULL,
 `what` text,
 `upvotes` int(11) DEFAULT NULL,
 `kabhi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`),
 KEY `question_id` (`question_id`),
 KEY `user_id` (`user_id`),
 CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
 CONSTRAINT `quesions_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`)
);

CREATE TABLE `upvote_audit` (
 `answer_id` int(11) NOT NULL DEFAULT '0',
 `user_id` int(11) NOT NULL DEFAULT '0',
 PRIMARY KEY (`answer_id`,`user_id`),
 KEY `user_id` (`user_id`),
 CONSTRAINT `upvote_audit_ibfk_1` FOREIGN KEY (`answer_id`) REFERENCES `answers` (`id`),
 CONSTRAINT `upvote_audit_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
);

-- Tables data init
-- users

INSERT INTO `users` (`id`, `username`, `email`, `password`, `upvotes`) VALUES
(1, 'jigar_wala', 'jigar.wala@forum.xyz', 'ne uh4ihncorn43uc8reucmjrnf84c8hr48m8rhjmshcnrs', 15),
(2, 'chaitya62', 'chaitya.shah@forum.xyz', 'rehregr5b656bdtybr6ybetr7b6y', 100);

-- quesions

INSERT INTO `questions` (`id`, `user_id`, `what`, `kabhi`) VALUES
(1, 1, 'what is angularJS ?', '2017-10-18 08:44:25'),
(2, 2, 'wubba luba dub dub', '2017-10-18 08:44:25');

-- answers

INSERT INTO `answers` (`id`, `user_id`, `question_id`, `what`, `upvotes`, `kabhi`) VALUES
(1, 2, 1, 'angularJS is JS framework for frontend,\r\nthe project is maintained by google ,\r\nversions of angularJS include 1.x , 2.x , 4.x !!\r\nyes  it skipped the version 3 for odd reason', NULL, '2017-10-18 08:47:12'),
(2, 1, 2, 'is this related to the forum !\r\ni know you are rick and morty fan !\r\nbut man @-@\r\n\r\n', NULL, '2017-10-18 08:48:28');

-- upvote_audit

INSERT INTO `upvote_audit` (`answer_id`, `user_id`) VALUES
(1, 2),
(2, 1);