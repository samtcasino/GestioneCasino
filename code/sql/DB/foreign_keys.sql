ALTER TABLE game
ADD FOREIGN KEY (room) REFERENCES room(location);

ALTER TABLE game_media
ADD FOREIGN KEY (game_name) REFERENCES game(name);

ALTER TABLE game_media
ADD FOREIGN KEY (media_url) REFERENCES media(url);

ALTER TABLE media
ADD FOREIGN KEY (type) REFERENCES media_type(name);

ALTER TABLE promotion_media
ADD FOREIGN KEY (promotion_id) REFERENCES promotion(id);

ALTER TABLE promotion_media
ADD FOREIGN KEY (media_url) REFERENCES media(url);

ALTER TABLE promotion_user
ADD FOREIGN KEY (user_type) REFERENCES user(type);

ALTER TABLE promotion_user
ADD FOREIGN KEY (promotion_id) REFERENCES promotion(id);

ALTER TABLE room_media
ADD FOREIGN KEY (room_location) REFERENCES room(location);

ALTER TABLE room_media
ADD FOREIGN KEY (media_url) REFERENCES media(url);

ALTER TABLE user
ADD FOREIGN KEY (gender) REFERENCES gender(name);

ALTER TABLE user
ADD FOREIGN KEY (type) REFERENCES user_type(name);