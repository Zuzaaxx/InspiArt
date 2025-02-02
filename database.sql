CREATE SEQUENCE users_details_id_seq as integer;
ALTER SEQUENCE users_details_id_seq OWNER TO admin;

CREATE SEQUENCE users_id_seq as integer;
ALTER SEQUENCE users_id_seq OWNER TO admin;

CREATE SEQUENCE categories_id_seq as integer;
ALTER SEQUENCE categories_id_seq OWNER TO admin;

CREATE SEQUENCE idea_id_seq as integer;
ALTER SEQUENCE idea_id_seq OWNER TO admin;

--------------------------------------------------------
--  DDL for Table USERS_DETAILS (1:1 with USERS)
--------------------------------------------------------
CREATE TABLE users_details (
                               id INTEGER DEFAULT nextval('users_details_id_seq') PRIMARY KEY,
                               name VARCHAR(100) NOT NULL,
                               email VARCHAR(100) NOT NULL UNIQUE,
                               profile_picture VARCHAR(255)
);

alter table users_details owner to admin;

ALTER SEQUENCE users_details_id_seq OWNED BY users_details.id;

--------------------------------------------------------
--  DDL for Table USERS (1:1 with USERS_DETAILS)
--------------------------------------------------------
CREATE TABLE users (
                       id INTEGER DEFAULT nextval('users_id_seq') PRIMARY KEY,
                       username VARCHAR(50) NOT NULL UNIQUE,
                       password VARCHAR(255) NOT NULL,
                       enabled BOOLEAN DEFAULT TRUE,
                       salt VARCHAR(255),
                       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                       user_details_id INTEGER UNIQUE, -- Relacja 1:1
                       FOREIGN KEY (user_details_id) REFERENCES users_details(id)
                           ON DELETE CASCADE
                           ON UPDATE CASCADE
);

alter table users owner to admin;

ALTER SEQUENCE users_id_seq OWNED BY users.id;

--------------------------------------------------------
--  DDL for Table CATEGORIES (1:N with IDEA)
--------------------------------------------------------
CREATE TABLE categories (
                            id INTEGER DEFAULT nextval('categories_id_seq') PRIMARY KEY,
                            category_name VARCHAR(50) NOT NULL UNIQUE
);

alter table categories owner to admin;

ALTER SEQUENCE categories_id_seq OWNED BY categories.id;

--------------------------------------------------------
--  DDL for Table IDEA (1:N with CATEGORIES, 1:N with USERS_GALLERY)
--------------------------------------------------------
CREATE TABLE idea (
                      id INTEGER DEFAULT nextval('idea_id_seq') PRIMARY KEY,
                      name_path VARCHAR(255) NOT NULL,
                      alternative_text VARCHAR(255),
                      category_id INTEGER NOT NULL, -- Relacja 1:N z kategoriami
                      FOREIGN KEY (category_id) REFERENCES categories(id)
                          ON DELETE SET NULL
                          ON UPDATE CASCADE
);

alter table idea owner to admin;

ALTER SEQUENCE idea_id_seq OWNED BY idea.id;

--------------------------------------------------------
--  DDL for Table USERS_GALLERY (1:N with USERS, 1:N with IDEA)
--------------------------------------------------------
CREATE TABLE users_gallery (
                               user_id INTEGER NOT NULL, -- Relacja 1:N z users
                               idea_id INTEGER NOT NULL, -- Relacja 1:N z idea
                               title VARCHAR(100),
                               description VARCHAR(255),
                               path VARCHAR(255),
                               date VARCHAR(20),
                               PRIMARY KEY (user_id, idea_id), -- Unikalność wpisów dla użytkownika i pomysłu
                               FOREIGN KEY (user_id) REFERENCES users(id)
                                   ON DELETE CASCADE
                                   ON UPDATE CASCADE,
                               FOREIGN KEY (idea_id) REFERENCES idea(id)
                                   ON DELETE CASCADE
                                   ON UPDATE CASCADE
);

alter table users_gallery owner to admin;

--------------------------------------------------------
--  DDL for Table USERS_FAVOURITES (1:N with USERS, 1:N with IDEA)
--------------------------------------------------------
CREATE TABLE users_favourites (
                                  user_id INTEGER NOT NULL, -- Relacja 1:N z users
                                  idea_id INTEGER NOT NULL, -- Relacja 1:N z idea
                                  PRIMARY KEY (user_id, idea_id), -- Unikalność ulubionych wpisów
                                  FOREIGN KEY (user_id) REFERENCES users(id)
                                      ON DELETE CASCADE
                                      ON UPDATE CASCADE,
                                  FOREIGN KEY (idea_id) REFERENCES idea(id)
                                      ON DELETE CASCADE
                                      ON UPDATE CASCADE
);

alter table users_favourites owner to admin;

--------------------------------------------------------
--  Insert Sample Data
--------------------------------------------------------

-- USERS_DETAILS
INSERT INTO users_details (name, email, profile_picture)
VALUES
    ('Zuzanna', 'zuzi@pk.edu.pl', NULL),
    ('Admin', 'admin@pk.edu.pl', NULL);

-- USERS
INSERT INTO users (username, password, enabled, salt, created_at, user_details_id)
VALUES
    ('zuzi', 'hashed_password_1', false, 'random_salt', '2025-01-30 16:41:12', 1),
    ('admin', 'hashed_password_2', false, 'random_salt', '2025-01-29 13:24:10', 2);

-- CATEGORIES
INSERT INTO categories (category_name) VALUES
                                           ('description'),
                                           ('simple_drawing'),
                                           ('scribble_art');

-- IDEA
INSERT INTO idea (name_path, alternative_text, category_id)
VALUES
    ('jellyfish', 'meduza', 1),
    ('horse', 'konik', 1),
    ('tree', 'drzewo', 1),
    ('public/img/ideas/simple_drawing_1', 'house', 2),
    ('public/img/ideas/simple_drawing_2', 'fish', 2),
    ('public/img/ideas/simple_drawing_3', 'unicorn', 2),
    ('public/img/ideas/scribble_art_1', null, 3),
    ('public/img/ideas/scribble_art_2', null, 3),
    ('public/img/ideas/scribble_art_3', null, 3);

-- USERS_GALLERY
INSERT INTO users_gallery (user_id, idea_id, title, description, path, date)
VALUES (1, 6, 'sunny unicorn', 'colored pencils', 'public/uploads/unicorn', '2025-01-31 19:21:00');

-- USERS_FAVOURITES
INSERT INTO users_favourites (user_id, idea_id)
VALUES (1, 1);

SELECT setval('users_details_id_seq', (SELECT MAX(id) FROM users_details), true);
SELECT setval('users_id_seq', (SELECT MAX(id) FROM users), true);
SELECT setval('categories_id_seq', (SELECT MAX(id) FROM categories), true);
SELECT setval('idea_id_seq', (SELECT MAX(id) FROM idea), true);
