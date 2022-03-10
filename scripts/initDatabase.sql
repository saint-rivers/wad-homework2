SELECT table_name
FROM information_schema.tables
WHERE table_schema = 'rupp';
SELECT CONCAT('DROP TABLE IF EXISTS `', table_name, '`;')
FROM information_schema.tables
WHERE table_schema = 'rupp';
-- rupp.projects definition
CREATE TABLE `projects` (
    `id` bigint NOT NULL AUTO_INCREMENT,
    `name` varchar(100) NOT NULL,
    `manager` int NOT NULL,
    `description` varchar(255) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 7 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;
-- rupp.users definition
CREATE TABLE `users` (
    `id` int NOT NULL AUTO_INCREMENT,
    `firstname` varchar(100) NOT NULL,
    `lastname` varchar(100) NOT NULL,
    `email` varchar(100) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
    `password` varchar(100) NOT NULL,
    `gender` varchar(7) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `users_UN` (`email`)
) ENGINE = InnoDB AUTO_INCREMENT = 5 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;
-- rupp.tasks definition
CREATE TABLE `tasks` (
    `id` int NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `is_completed` binary(1) NOT NULL DEFAULT '0',
    `project_id` bigint NOT NULL,
    PRIMARY KEY (`id`),
    KEY `project_id` (`project_id`),
    CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 34 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;