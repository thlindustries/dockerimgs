CREATE DATABASE IF NOT EXISTS kabum;
USE kabum;

CREATE TABLE `kabum`.`users` ( 
  `id` INT NOT NULL AUTO_INCREMENT , 
  `name` VARCHAR(255) NOT NULL , 
  `email` VARCHAR(255) NOT NULL , 
  `password` VARCHAR(255) NOT NULL , 
  `CREATED_AT` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
  `UPDATED_AT` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, 
  PRIMARY KEY (`id`), 
  UNIQUE (`email`)
);

INSERT INTO `users`(`name`, `email`, `password`) 
VALUES ("Thiago Lorente Kraetzer","thiago.kraetzer@kabum.com.br","kabum123");

INSERT INTO `users`(`name`, `email`, `password`) 
VALUES ("William Lorente Kraetzer","william.kraetzer@kabum.com.br","kabum123");

INSERT INTO `users`(`name`, `email`, `password`) 
VALUES ("Eu Lorente Kraetzer","eu.kraetzer@kabum.com.br","kabum123");

INSERT INTO `users`(`name`, `email`, `password`) 
VALUES ("Voce Lorente Kraetzer","voce.kraetzer@kabum.com.br","kabum123");

INSERT INTO `users`(`name`, `email`, `password`) 
VALUES ("Jhon Doe","jhon.doe@kabum.com.br","kabum123");
