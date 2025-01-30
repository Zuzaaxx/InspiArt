DROP TABLE IF EXISTS users CASCADE;

DROP SEQUENCE IF EXISTS users_id_seq;

CREATE SEQUENCE users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

CREATE TABLE users
(
    id       integer DEFAULT nextval('users_id_seq'::regclass) NOT NULL PRIMARY KEY,
    name     varchar(100) NOT NULL,
    surname  varchar(100) NOT NULL,
    username varchar(255) NOT NULL UNIQUE,
    password varchar(255) NOT NULL
);

ALTER SEQUENCE users_id_seq OWNED BY users.id;

INSERT INTO users (name, surname, username, password)
VALUES
    ('Zuzanna', 'Kacprzak', 'zuzi', 'hashed_password_1'),
    ('John', 'Snow', 'jsnow@gmail.com', 'hashed_password_2');

SELECT setval('users_id_seq', (SELECT MAX(id) FROM users), true);

SELECT * FROM users;


