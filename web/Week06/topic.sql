CREATE TABLE topic (
    id SERIAL PRIMARY KEY NOT NULL,
    name VARCHAR(40) NOT NULL
);

INSERT INTO topic (name) VALUES ('Faith');
INSERT INTO topic (name) VALUES ('Sacrifice');
INSERT INTO topic (name) VALUES ('Charity');

CREATE TABLE scripture_topic (
    scriptureId int NOT NULL REFERENCES scripture(id),
    topicId int NOT NULL REFERENCES topic(id)
);