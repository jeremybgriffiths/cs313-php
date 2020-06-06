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
    checkin_date DATE
);

-- Insert test data
INSERT INTO Users(username, userpassword, isadmin) VALUES('admin', crypt('admin', gen_salt('bf', 8)), TRUE);
INSERT INTO Users(username, userpassword, isadmin) VALUES('librarian1', crypt('librarian1', gen_salt('bf', 8)), TRUE);
INSERT INTO Users(username, userpassword, isadmin) VALUES('librarian2', crypt('librarian2', gen_salt('bf', 8)), TRUE);
INSERT INTO Users(username, userpassword, isadmin) VALUES('patron1', crypt('patron1', gen_salt('bf', 8)), FALSE);
INSERT INTO Users(username, userpassword, isadmin) VALUES('patron2', crypt('patron2', gen_salt('bf', 8)), FALSE);

INSERT INTO Books(title, author, genre) VALUES('The Hobbit', 'Tolkien, J.R.R.', 'Fantasy');
INSERT INTO Books(title, author, genre) VALUES('The Lord of the Rings: Fellowship of the Ring', 'Tolkien, J.R.R.', 'Fantasy');
INSERT INTO Books(title, author, genre) VALUES('The Lord of the Rings: The Two Towers', 'Tolkien, J.R.R.', 'Fantasy');
INSERT INTO Books(title, author, genre) VALUES('The Lord of the Rings: Return of the King', 'Tolkien, J.R.R.', 'Fantasy');
INSERT INTO Books(title, author, genre) VALUES('A Tale of Two Cities', 'Dickens, Charles', 'Historical Fiction');
INSERT INTO Books(title, author, genre) VALUES('And Then There Were None', 'Christie, Agatha', 'Mystery');
INSERT INTO Books(title, author, genre) VALUES('Alice''s Adventures in Wonderland', 'Carroll, Lewis', 'Fantasy');
INSERT INTO Books(title, author, genre) VALUES('The Da Vinci Code', 'Brown, Dan', 'Mystery');
INSERT INTO Books(title, author, genre) VALUES('The Catcher in the Rye', 'Salinger, J.D.', 'Young Adult Fiction');