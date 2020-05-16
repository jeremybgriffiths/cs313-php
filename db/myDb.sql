-- Clean up
DROP TABLE IF EXISTS Checkout;
DROP TABLE IF EXISTS Users;
DROP TABLE IF EXISTS Books;

-- Setup tables
CREATE TABLE Books (
    id SERIAL PRIMARY KEY,
    title VARCHAR(256) NOT NULL,
    author VARCHAR(256) NOT NULL,
    genre VARCHAR(256)
);

CREATE TABLE Users (
    id SERIAL PRIMARY KEY,
    username VARCHAR(256) NOT NULL UNIQUE,
    userpassword VARCHAR(256) NOT NULL,
    isadmin BOOLEAN NOT NULL
);

CREATE TABLE Checkout (
    id SERIAL PRIMARY KEY,
    bookid INT NOT NULL REFERENCES Books(id),
    userid INT NOT NULL REFERENCES Users(id),
    checkout_date DATE,
    checkin_date DATE,
    fine INT
);