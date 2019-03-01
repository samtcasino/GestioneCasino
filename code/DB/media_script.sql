CREATE TABLE `media` (
  `url` varchar(255),
  `game_name` varchar(45),
  `room_location` varchar(45),
  `type` varchar(45),
  PRIMARY KEY (`url`, `game_name`, `room_location`)
);

ALTER TABLE `media` ADD FOREIGN KEY (`game_name`) REFERENCES cashyland.game (`name`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE media ADD FOREIGN KEY (`room_location`) REFERENCES cashyland.room (`location`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE media ADD FOREIGN KEY (`type`) REFERENCES cashyland.type (`name`) ON DELETE CASCADE ON UPDATE CASCADE;
