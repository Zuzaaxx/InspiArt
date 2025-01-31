--------------------------------------------------------
--  DDL for Table GALLERY
--------------------------------------------------------

DROP TABLE IF EXISTS "GALLERY" CASCADE;
DROP SEQUENCE IF EXISTS "GALLERY_ID_SEQ";

CREATE SEQUENCE "GALLERY_ID_SEQ"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

CREATE TABLE "GALLERY" (
    "ID" INTEGER DEFAULT nextval('"GALLERY_ID_SEQ"') PRIMARY KEY, 
    "USER_ID" INTEGER REFERENCES "USERS"("USER_ID") ON DELETE CASCADE,
    "IDEA_ID" INTEGER REFERENCES "IDEAS"("ID") ON DELETE CASCADE,
    "TITLE" VARCHAR(100), 
    "DESCRIPTION" VARCHAR(255), 
    "IMAGE_PATH" VARCHAR(255), 
    "DATE_ADDED" VARCHAR(20)
);

ALTER SEQUENCE "GALLERY_ID_SEQ" OWNED BY "GALLERY"."ID";

--------------------------------------------------------
--  DDL for Table CATEGORIES
--------------------------------------------------------

DROP TABLE IF EXISTS "CATEGORIES" CASCADE;
DROP SEQUENCE IF EXISTS "CATEGORIES_ID_SEQ";

CREATE SEQUENCE "CATEGORIES_ID_SEQ"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

CREATE TABLE "CATEGORIES" (
    "ID" INTEGER DEFAULT nextval('"CATEGORIES_ID_SEQ"') PRIMARY KEY, 
    "NAME" VARCHAR(50)
);

ALTER SEQUENCE "CATEGORIES_ID_SEQ" OWNED BY "CATEGORIES"."ID";

--------------------------------------------------------
--  DDL for Table IDEAS
--------------------------------------------------------

DROP TABLE IF EXISTS "IDEAS" CASCADE;
DROP SEQUENCE IF EXISTS "IDEAS_ID_SEQ";

CREATE SEQUENCE "IDEAS_ID_SEQ"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

CREATE TABLE "IDEAS" (
    "ID" INTEGER DEFAULT nextval('"IDEAS_ID_SEQ"') PRIMARY KEY, 
    "NAME_PATH" VARCHAR(255), 
    "ALT_TEXT" VARCHAR(255), 
    "CATEGORY_ID" INTEGER REFERENCES "CATEGORIES"("ID") ON DELETE SET NULL
);

ALTER SEQUENCE "IDEAS_ID_SEQ" OWNED BY "IDEAS"."ID";

--------------------------------------------------------
--  DDL for Table FAVORITES
--------------------------------------------------------

DROP TABLE IF EXISTS "FAVORITES" CASCADE;
DROP SEQUENCE IF EXISTS "FAVORITES_ID_SEQ";

CREATE SEQUENCE "FAVORITES_ID_SEQ"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

CREATE TABLE "FAVORITES" (
    "ID" INTEGER DEFAULT nextval('"FAVORITES_ID_SEQ"') PRIMARY KEY, 
    "USER_ID" INTEGER REFERENCES "USERS"("USER_ID") ON DELETE CASCADE,
    "IDEA_ID" INTEGER REFERENCES "IDEAS"("ID") ON DELETE CASCADE
);

ALTER SEQUENCE "FAVORITES_ID_SEQ" OWNED BY "FAVORITES"."ID";

--------------------------------------------------------
--  DDL for Table USERS
--------------------------------------------------------

DROP TABLE IF EXISTS "USERS" CASCADE;
DROP SEQUENCE IF EXISTS "USERS_ID_SEQ";

CREATE SEQUENCE "USERS_ID_SEQ"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

CREATE TABLE "USERS" (
    "USER_ID" INTEGER DEFAULT nextval('"USERS_ID_SEQ"') PRIMARY KEY, 
    "USERNAME" VARCHAR(50), 
    "FIRST_NAME" VARCHAR(50), 
    "EMAIL" VARCHAR(100), 
    "PASSWORD_HASH" VARCHAR(255), 
    "JOIN_DATE" TIMESTAMP, 
    "PROFILE_PICTURE" VARCHAR(255)
);

ALTER SEQUENCE "USERS_ID_SEQ" OWNED BY "USERS"."USER_ID";

--------------------------------------------------------
--  Insert Data into GALLERY
--------------------------------------------------------

INSERT INTO "GALLERY" ("USER_ID", "IDEA_ID", "TITLE", "DESCRIPTION", "IMAGE_PATH", "DATE_ADDED") 
VALUES (1, 3, 'sunny_unicorn', 'colored pencils', 'public/uploads/unicorn', NULL);

SELECT setval('"GALLERY_ID_SEQ"', (SELECT MAX("ID") FROM "GALLERY"), true);

--------------------------------------------------------
--  Insert Data into CATEGORIES
--------------------------------------------------------

INSERT INTO "CATEGORIES" ("NAME") VALUES ('description'), ('simple_drawing'), ('scribble_art');

SELECT setval('"CATEGORIES_ID_SEQ"', (SELECT MAX("ID") FROM "CATEGORIES"), true);

--------------------------------------------------------
--  Insert Data into IDEAS
--------------------------------------------------------

INSERT INTO "IDEAS" ("NAME_PATH", "ALT_TEXT", "CATEGORY_ID") 
VALUES 
    ('public/img/ideas/simple_drawing_1', 'house', 2),
    ('public/img/ideas/simple_drawing_2', 'fish', 2),
    ('public/img/ideas/simple_drawing_3', 'unicorn', 2),
    ('public/img/ideas/scribble_art_1', NULL, 3),
    ('public/img/ideas/scribble_art_2', NULL, 3),
    ('public/img/ideas/scribble_art_3', NULL, 3),
    ('tree', 'tree', 1),
    ('jellyfish', 'jellyfish', 1),
    ('pony', 'pony', 1);

SELECT setval('"IDEAS_ID_SEQ"', (SELECT MAX("ID") FROM "IDEAS"), true);

--------------------------------------------------------
--  Insert Data into USERS
--------------------------------------------------------

INSERT INTO "USERS" ("USERNAME", "FIRST_NAME", "EMAIL", "PASSWORD_HASH", "JOIN_DATE", "PROFILE_PICTURE") 
VALUES ('zuzi', 'Zuzanna', 'zuzi@pk.edu.pl', 'hashed_password_1', '2025-01-30 16:41:12', NULL);

SELECT setval('"USERS_ID_SEQ"', (SELECT MAX("USER_ID") FROM "USERS"), true);
