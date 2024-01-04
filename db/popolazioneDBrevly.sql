-- Inserisci utente 1
INSERT INTO USERS (email, username, name, surname, password, biography, img, isCompany, notifyLikes, notifyComments, notifyTags, notifyFollows)
VALUES ('mario.rossi@email.com', 'mario123', 'Mario', 'Rossi', 'password123', 'Appassionato di tecnologia e sport', 'mario.jpg', 0, 1, 1, 0, 1);

-- Inserisci utente 2
INSERT INTO USERS (email, username, name, surname, password, biography, img, isCompany, notifyLikes, notifyComments, notifyTags, notifyFollows)
VALUES ('trattoriaSalvatore@email.com', 'TrattoriaDaSalvatore', 'Trattoria da Salvatore', '', 'securepass', 'Siamo una trattoria nel mezzo di un paesaggio mozzafiato', 'trattoria.jpg', 1, 1, 0, 1, 0);

-- Inserisci utente 3
INSERT INTO USERS (email, username, name, surname, password, biography, img, isCompany, notifyLikes, notifyComments, notifyTags, notifyFollows)
VALUES ('giuseppe.verdi@email.com', 'peppev', 'Giuseppe', 'Verdi', 'hashedpass', 'Musicista e appassionato di opera', 'giuseppe.jpg', 0, 0, 1, 1, 1);

-- Inserisci utente 4
INSERT INTO USERS (email, username, name, surname, password, biography, img, isCompany, notifyLikes, notifyComments, notifyTags, notifyFollows)
VALUES ('anna.monti@email.com', 'anna.monti', 'Anna', 'Monti', 'password456', 'Ingegnere software appassionata di viaggi', 'anna.jpg', 0, 1, 0, 1, 1);

-- Inserisci utente 5
INSERT INTO USERS (email, username, name, surname, password, biography, img, isCompany, notifyLikes, notifyComments, notifyTags, notifyFollows)
VALUES ('enoteca.galli@email.com', 'enoteca_galli', 'Enoteca Galli', '', 'strongpass', 'Passione in ogni bottiglia, esperienza in ogni sorso', 'enoteca_galli.jpg', 1, 1, 1, 0, 1);

-- Inserisci utente 6
INSERT INTO USERS (email, username, name, surname, password, biography, img, isCompany, notifyLikes, notifyComments, notifyTags, notifyFollows)
VALUES ('eleonora.rossi@email.com', 'eleo_rossi', 'Eleonora', 'Rossi', 'securepwd', 'Studiosa di letteratura e appassionata di cinema', 'eleonora.jpg', 0, 0, 1, 1, 0);

-- Inserisci utente 7
INSERT INTO USERS (email, username, name, surname, password, biography, img, isCompany, notifyLikes, notifyComments, notifyTags, notifyFollows)
VALUES ('marco.guidi@email.com', 'marco_guidi_parrucchieri', 'Marco Guidi Parrucchieri', '', 'mypassword', 'Tagliamo il passato, coloriamo il presente, stiliamo il futuro', 'marco_guidi.jpg', 1, 0, 1, 1, 1);

-- Inserisci utente 8
INSERT INTO USERS (email, username, name, surname, password, biography, img, isCompany, notifyLikes, notifyComments, notifyTags, notifyFollows)
VALUES ('sara.verdi@email.com', 'sara.v', 'Sara', 'Verdi', 'secure123', 'Appassionata di moda e arte contemporanea', 'sara.jpg', 0, 1, 0, 0, 1);

-- Inserisci utente 9
INSERT INTO USERS (email, username, name, surname, password, biography, img, isCompany, notifyLikes, notifyComments, notifyTags, notifyFollows)
VALUES ('from.gamer@email.com', 'fromGamer', 'FromGamer', '', 'mypassword123', 'Negozio di videogiochi e giochi da tavolo', 'from_gamer.jpg', 1, 1, 1, 0, 0);

-- Inserisci utente 10
INSERT INTO USERS (email, username, name, surname, password, biography, img, isCompany, notifyLikes, notifyComments, notifyTags, notifyFollows)
VALUES ('elena.monti@email.com', 'elena.m', 'Elena', 'Monti', 'pass1234', 'Insegnante di lingue straniere e appassionata di yoga', 'elena.jpg', 0, 1, 1, 1, 1);

-- Inserisci utente 11
INSERT INTO USERS (email, username, name, surname, password, biography, img, isCompany, notifyLikes, notifyComments, notifyTags, notifyFollows)
VALUES ('giovanni.baldi@email.com', 'giovanni.b', 'Giovanni', 'Baldi', 'securepass', 'Appassionato di musica classica e tecnologia', 'giovanni.jpg', 0, 0, 1, 1, 0);

-- Inserisci utente 12
INSERT INTO USERS (email, username, name, surname, password, biography, img, isCompany, notifyLikes, notifyComments, notifyTags, notifyFollows)
VALUES ('silvia.moro@email.com', 'silvia_m', 'Silvia', 'Moro', 'password5678', 'Designer di moda e amante degli animali', 'silvia.jpg', 0, 0, 0, 1, 1);

-- Inserisci utente 13
INSERT INTO USERS (email, username, name, surname, password, biography, img, isCompany, notifyLikes, notifyComments, notifyTags, notifyFollows)
VALUES ('andrea.cavalli@email.com', 'andrea.c', 'Andrea', 'Cavalli', 'myp@ssword', 'Ingegnere civile appassionato di trekking', 'andrea.jpg', 0, 1, 0, 1, 0);

-- Inserisci utente 14
INSERT INTO USERS (email, username, name, surname, password, biography, img, isCompany, notifyLikes, notifyComments, notifyTags, notifyFollows)
VALUES ('simona.rossi@email.com', 'simona_r', 'Simona', 'Rossi', 'secure_pwd', 'Appassionata di letteratura russa e scienze politiche', 'simona.jpg', 0, 1, 1, 0, 1);

-- Inserisci utente 15
INSERT INTO USERS (email, username, name, surname, password, biography, img, isCompany, notifyLikes, notifyComments, notifyTags, notifyFollows)
VALUES ('kebab.station@email.com', 'Kebab_Stazione', 'Kebab la Stazione', '', 'kebabONE', 'Negozio di veri kebab e falafel alla stazione', 'kabab_stazione.jpg', 1, 1, 1, 1, 1);


-- Ricerche

-- Utente 1 (Mario Rossi) ha cercato altri 3 profili
INSERT INTO RECENT_SEARCHES (searched_email, user_email, date_time)
VALUES ('trattoriaSalvatore@email.com', 'mario.rossi@email.com', NOW()),
       ('giuseppe.verdi@email.com', 'mario.rossi@email.com', NOW()),
       ('anna.monti@email.com', 'mario.rossi@email.com', NOW());

-- Utente 2 (Trattoria da Salvatore) ha cercato altri 3 profili
INSERT INTO RECENT_SEARCHES (searched_email, user_email, date_time)
VALUES ('mario.rossi@email.com', 'trattoriaSalvatore@email.com', NOW()),
       ('giuseppe.verdi@email.com', 'trattoriaSalvatore@email.com', NOW()),
       ('anna.monti@email.com', 'trattoriaSalvatore@email.com', NOW());

-- Utente 3 (Giuseppe Verdi) ha cercato altri 3 profili
INSERT INTO RECENT_SEARCHES (searched_email, user_email, date_time)
VALUES ('mario.rossi@email.com', 'giuseppe.verdi@email.com', NOW()),
       ('trattoriaSalvatore@email.com', 'giuseppe.verdi@email.com', NOW()),
       ('anna.monti@email.com', 'giuseppe.verdi@email.com', NOW());

-- Utente 4 (Anna Monti) ha cercato altri 3 profili
INSERT INTO RECENT_SEARCHES (searched_email, user_email, date_time)
VALUES ('mario.rossi@email.com', 'anna.monti@email.com', NOW()),
       ('trattoriaSalvatore@email.com', 'anna.monti@email.com', NOW()),
       ('giuseppe.verdi@email.com', 'anna.monti@email.com', NOW());

-- Utente 5 (Enoteca Galli) ha cercato altri 3 profili
INSERT INTO RECENT_SEARCHES (searched_email, user_email, date_time)
VALUES ('eleonora.rossi@email.com', 'enoteca.galli@email.com', NOW()),
       ('marco.guidi@email.com', 'enoteca.galli@email.com', NOW()),
       ('sara.verdi@email.com', 'enoteca.galli@email.com', NOW());

-- Utente 6 (Eleonora Rossi) ha cercato altri 3 profili
INSERT INTO RECENT_SEARCHES (searched_email, user_email, date_time)
VALUES ('enoteca.galli@email.com', 'eleonora.rossi@email.com', NOW()),
       ('marco.guidi@email.com', 'eleonora.rossi@email.com', NOW()),
       ('sara.verdi@email.com', 'eleonora.rossi@email.com', NOW());

-- Utente 7 (Marco Guidi Parrucchieri) ha cercato altri 3 profili
INSERT INTO RECENT_SEARCHES (searched_email, user_email, date_time)
VALUES ('enoteca.galli@email.com', 'marco.guidi@email.com', NOW()),
       ('eleonora.rossi@email.com', 'marco.guidi@email.com', NOW()),
       ('sara.verdi@email.com', 'marco.guidi@email.com', NOW());

-- Utente 8 (Sara Verdi) ha cercato altri 3 profili
INSERT INTO RECENT_SEARCHES (searched_email, user_email, date_time)
VALUES ('enoteca.galli@email.com', 'sara.verdi@email.com', NOW()),
       ('eleonora.rossi@email.com', 'sara.verdi@email.com', NOW()),
       ('marco.guidi@email.com', 'sara.verdi@email.com', NOW());

-- Utente 9 (FromGamer) ha cercato altri 3 profili
INSERT INTO RECENT_SEARCHES (searched_email, user_email, date_time)
VALUES ('eleonora.rossi@email.com', 'from.gamer@email.com', NOW()),
       ('marco.guidi@email.com', 'from.gamer@email.com', NOW()),
       ('sara.verdi@email.com', 'from.gamer@email.com', NOW());

-- Utente 10 (Elena Monti) ha cercato altri 3 profili
INSERT INTO RECENT_SEARCHES (searched_email, user_email, date_time)
VALUES ('enoteca.galli@email.com', 'elena.monti@email.com', NOW()),
       ('eleonora.rossi@email.com', 'elena.monti@email.com', NOW()),
       ('marco.guidi@email.com', 'elena.monti@email.com', NOW());

-- Utente 11 (Giovanni Baldi) ha cercato altri 3 profili
INSERT INTO RECENT_SEARCHES (searched_email, user_email, date_time)
VALUES ('enoteca.galli@email.com', 'giovanni.baldi@email.com', NOW()),
       ('eleonora.rossi@email.com', 'giovanni.baldi@email.com', NOW()),
       ('sara.verdi@email.com', 'giovanni.baldi@email.com', NOW());

-- Utente 12 (Silvia Moro) ha cercato altri 3 profili
INSERT INTO RECENT_SEARCHES (searched_email, user_email, date_time)
VALUES ('enoteca.galli@email.com', 'silvia.moro@email.com', NOW()),
       ('eleonora.rossi@email.com', 'silvia.moro@email.com', NOW()),
       ('marco.guidi@email.com', 'silvia.moro@email.com', NOW());

-- Utente 13 (Andrea Cavalli) ha cercato altri 3 profili
INSERT INTO RECENT_SEARCHES (searched_email, user_email, date_time)
VALUES ('enoteca.galli@email.com', 'andrea.cavalli@email.com', NOW()),
       ('eleonora.rossi@email.com', 'andrea.cavalli@email.com', NOW()),
       ('marco.guidi@email.com', 'andrea.cavalli@email.com', NOW());

-- Utente 14 (Simona Rossi) ha cercato altri 3 profili
INSERT INTO RECENT_SEARCHES (searched_email, user_email, date_time)
VALUES ('enoteca.galli@email.com', 'simona.rossi@email.com', NOW()),
       ('eleonora.rossi@email.com', 'simona.rossi@email.com', NOW()),
       ('marco.guidi@email.com', 'simona.rossi@email.com', NOW());

-- Utente 15 (Kebab la Stazione) ha cercato altri 3 profili
INSERT INTO RECENT_SEARCHES (searched_email, user_email, date_time)
VALUES ('enoteca.galli@email.com', 'kebab.station@email.com', NOW()),
       ('eleonora.rossi@email.com', 'kebab.station@email.com', NOW()),
       ('marco.guidi@email.com', 'kebab.station@email.com', NOW());


-- Follower

-- Utente 1 (Mario Rossi) seguito da 6 persone
INSERT INTO FOLLOW (follower_email, user_email)
VALUES ('trattoriaSalvatore@email.com', 'mario.rossi@email.com'),
       ('giuseppe.verdi@email.com', 'mario.rossi@email.com'),
       ('anna.monti@email.com', 'mario.rossi@email.com'),
       ('enoteca.galli@email.com', 'mario.rossi@email.com'),
       ('eleonora.rossi@email.com', 'mario.rossi@email.com'),
       ('marco.guidi@email.com', 'mario.rossi@email.com');

-- Utente 2 (Trattoria da Salvatore) seguito da 5 persone
INSERT INTO FOLLOW (follower_email, user_email)
VALUES ('mario.rossi@email.com', 'trattoriaSalvatore@email.com'),
       ('giuseppe.verdi@email.com', 'trattoriaSalvatore@email.com'),
       ('anna.monti@email.com', 'trattoriaSalvatore@email.com'),
       ('eleonora.rossi@email.com', 'trattoriaSalvatore@email.com'),
       ('marco.guidi@email.com', 'trattoriaSalvatore@email.com');

-- Utente 3 (Giuseppe Verdi) seguito da 7 persone
INSERT INTO FOLLOW (follower_email, user_email)
VALUES ('mario.rossi@email.com', 'giuseppe.verdi@email.com'),
       ('trattoriaSalvatore@email.com', 'giuseppe.verdi@email.com'),
       ('anna.monti@email.com', 'giuseppe.verdi@email.com'),
       ('eleonora.rossi@email.com', 'giuseppe.verdi@email.com'),
       ('marco.guidi@email.com', 'giuseppe.verdi@email.com'),
       ('enoteca.galli@email.com', 'giuseppe.verdi@email.com'),
       ('sara.verdi@email.com', 'giuseppe.verdi@email.com');

-- Utente 4 (Anna Monti) seguito da 6 persone
INSERT INTO FOLLOW (follower_email, user_email)
VALUES ('mario.rossi@email.com', 'anna.monti@email.com'),
       ('trattoriaSalvatore@email.com', 'anna.monti@email.com'),
       ('giuseppe.verdi@email.com', 'anna.monti@email.com'),
       ('enoteca.galli@email.com', 'anna.monti@email.com'),
       ('eleonora.rossi@email.com', 'anna.monti@email.com'),
       ('marco.guidi@email.com', 'anna.monti@email.com');

-- Utente 5 (Enoteca Galli) seguito da 5 persone
INSERT INTO FOLLOW (follower_email, user_email)
VALUES ('eleonora.rossi@email.com', 'enoteca.galli@email.com'),
       ('marco.guidi@email.com', 'enoteca.galli@email.com'),
       ('sara.verdi@email.com', 'enoteca.galli@email.com'),
       ('trattoriaSalvatore@email.com', 'enoteca.galli@email.com'),
       ('anna.monti@email.com', 'enoteca.galli@email.com');

-- Utente 6 (Eleonora Rossi) seguito da 7 persone
INSERT INTO FOLLOW (follower_email, user_email)
VALUES ('enoteca.galli@email.com', 'eleonora.rossi@email.com'),
       ('marco.guidi@email.com', 'eleonora.rossi@email.com'),
       ('sara.verdi@email.com', 'eleonora.rossi@email.com'),
       ('trattoriaSalvatore@email.com', 'eleonora.rossi@email.com'),
       ('anna.monti@email.com', 'eleonora.rossi@email.com'),
       ('giovanni.baldi@email.com', 'eleonora.rossi@email.com'),
       ('silvia.moro@email.com', 'eleonora.rossi@email.com');

-- Utente 7 (Marco Guidi Parrucchieri) seguito da 5 persone
INSERT INTO FOLLOW (follower_email, user_email)
VALUES ('enoteca.galli@email.com', 'marco.guidi@email.com'),
       ('eleonora.rossi@email.com', 'marco.guidi@email.com'),
       ('sara.verdi@email.com', 'marco.guidi@email.com'),
       ('giuseppe.verdi@email.com', 'marco.guidi@email.com'),
       ('anna.monti@email.com', 'marco.guidi@email.com');

-- Utente 8 (Sara Verdi) seguito da 6 persone
INSERT INTO FOLLOW (follower_email, user_email)
VALUES ('enoteca.galli@email.com', 'sara.verdi@email.com'),
       ('eleonora.rossi@email.com', 'sara.verdi@email.com'),
       ('marco.guidi@email.com', 'sara.verdi@email.com'),
       ('trattoriaSalvatore@email.com', 'sara.verdi@email.com'),
       ('anna.monti@email.com', 'sara.verdi@email.com');

-- Utente 9 (FromGamer) seguito da 7 persone
INSERT INTO FOLLOW (follower_email, user_email)
VALUES ('eleonora.rossi@email.com', 'from.gamer@email.com'),
       ('marco.guidi@email.com', 'from.gamer@email.com'),
       ('sara.verdi@email.com', 'from.gamer@email.com'),
       ('trattoriaSalvatore@email.com', 'from.gamer@email.com'),
       ('anna.monti@email.com', 'from.gamer@email.com'),
       ('enoteca.galli@email.com', 'from.gamer@email.com'),
       ('elena.monti@email.com', 'from.gamer@email.com');

-- Utente 10 (Elena Monti) seguito da 5 persone
INSERT INTO FOLLOW (follower_email, user_email)
VALUES ('enoteca.galli@email.com', 'elena.monti@email.com'),
       ('eleonora.rossi@email.com', 'elena.monti@email.com'),
       ('marco.guidi@email.com', 'elena.monti@email.com'),
       ('trattoriaSalvatore@email.com', 'elena.monti@email.com'),
       ('anna.monti@email.com', 'elena.monti@email.com');

-- Utente 11 (Giovanni Baldi) seguito da 6 persone
INSERT INTO FOLLOW (follower_email, user_email)
VALUES ('enoteca.galli@email.com', 'giovanni.baldi@email.com'),
       ('eleonora.rossi@email.com', 'giovanni.baldi@email.com'),
       ('sara.verdi@email.com', 'giovanni.baldi@email.com'),
       ('trattoriaSalvatore@email.com', 'giovanni.baldi@email.com'),
       ('anna.monti@email.com', 'giovanni.baldi@email.com');

-- Utente 12 (Silvia Moro) seguito da 7 persone
INSERT INTO FOLLOW (follower_email, user_email)
VALUES ('enoteca.galli@email.com', 'silvia.moro@email.com'),
       ('eleonora.rossi@email.com', 'silvia.moro@email.com'),
       ('marco.guidi@email.com', 'silvia.moro@email.com'),
       ('trattoriaSalvatore@email.com', 'silvia.moro@email.com'),
       ('anna.monti@email.com', 'silvia.moro@email.com'),
       ('giovanni.baldi@email.com', 'silvia.moro@email.com'),
       ('simona.rossi@email.com', 'silvia.moro@email.com');

-- Utente 13 (Andrea Cavalli) seguito da 5 persone
INSERT INTO FOLLOW (follower_email, user_email)
VALUES ('enoteca.galli@email.com', 'andrea.cavalli@email.com'),
       ('eleonora.rossi@email.com', 'andrea.cavalli@email.com'),
       ('marco.guidi@email.com', 'andrea.cavalli@email.com'),
       ('trattoriaSalvatore@email.com', 'andrea.cavalli@email.com'),
       ('anna.monti@email.com', 'andrea.cavalli@email.com');

-- Utente 14 (Simona Rossi) seguito da 6 persone
INSERT INTO FOLLOW (follower_email, user_email)
VALUES ('enoteca.galli@email.com', 'simona.rossi@email.com'),
       ('eleonora.rossi@email.com', 'simona.rossi@email.com'),
       ('marco.guidi@email.com', 'simona.rossi@email.com'),
       ('trattoriaSalvatore@email.com', 'simona.rossi@email.com'),
       ('anna.monti@email.com', 'simona.rossi@email.com');

-- Utente 15 (Kebab la Stazione) seguito da 7 persone
INSERT INTO FOLLOW (follower_email, user_email)
VALUES ('eleonora.rossi@email.com', 'kebab.station@email.com'),
       ('marco.guidi@email.com', 'kebab.station@email.com'),
       ('sara.verdi@email.com', 'kebab.station@email.com'),
       ('trattoriaSalvatore@email.com', 'kebab.station@email.com'),
       ('anna.monti@email.com', 'kebab.station@email.com'),
       ('giovanni.baldi@email.com', 'kebab.station@email.com'),
       ('simona.rossi@email.com', 'kebab.station@email.com');


-- Prodotti taggabili per Kebab la Stazione (Utente 15)
INSERT INTO TAGGABLE (name, country, city, address, company_email)
VALUES ('Kebab Misto Deluxe', 'Italy', 'Rome', 'Via Roma, 123', 'kebab.station@email.com');

INSERT INTO TAGGABLE (name, country, city, address, company_email)
VALUES ('Falafel Wrap Vegano', 'Italy', 'Rome', 'Via Roma, 123', 'kebab.station@email.com');

INSERT INTO TAGGABLE (name, country, city, address, company_email)
VALUES ('Hummus Plate Mediterraneo', 'Italy', 'Rome', 'Via Roma, 123', 'kebab.station@email.com');

INSERT INTO TAGGABLE (name, country, city, address, company_email)
VALUES ('Chicken Shawarma Piccante', 'Italy', 'Rome', 'Via Roma, 123', 'kebab.station@email.com');

INSERT INTO TAGGABLE (name, country, city, address, company_email)
VALUES ('Baklava Dolce', 'Italy', 'Rome', 'Via Roma, 123', 'kebab.station@email.com');

-- Prodotti taggabili per FromGamer (Utente 9)
INSERT INTO TAGGABLE (name, country, city, address, company_email)
VALUES ('PlayStation 5', 'Italy', 'Milan', 'Via Cesare Battisti, 456', 'from.gamer@email.com');

INSERT INTO TAGGABLE (name, country, city, address, company_email)
VALUES ('Settlers of Catan', 'Italy', 'Milan', 'Via Cesare Battisti, 456', 'from.gamer@email.com');

INSERT INTO TAGGABLE (name, country, city, address, company_email)
VALUES ('Nintendo Switch Lite', 'Italy', 'Milan', 'Via Cesare Battisti, 456', 'from.gamer@email.com');

INSERT INTO TAGGABLE (name, country, city, address, company_email)
VALUES ('Dungeons & Dragons Starter Set Edizione Limitata', 'Italy', 'Milan', 'Via Cesare Battisti, 456', 'from.gamer@email.com');

INSERT INTO TAGGABLE (name, country, city, address, company_email)
VALUES ('Xbox Series X Bundle con Giochi', 'Italy', 'Milan', 'Via Cesare Battisti, 456', 'from.gamer@email.com');

-- Prodotti taggabili per Marco Guidi Parrucchieri (Utente 7)
INSERT INTO TAGGABLE (name, country, city, address, company_email)
VALUES ('Taglio di Capelli alla Moda', 'Italy', 'Florence', 'Via della Bellezza, 789', 'marco.guidi@email.com');

INSERT INTO TAGGABLE (name, country, city, address, company_email)
VALUES ('Colore Capelli Elegante', 'Italy', 'Florence', 'Via della Bellezza, 789', 'marco.guidi@email.com');

INSERT INTO TAGGABLE (name, country, city, address, company_email)
VALUES ('Trattamento alla Cheratina Professionale', 'Italy', 'Florence', 'Via della Bellezza, 789', 'marco.guidi@email.com');

INSERT INTO TAGGABLE (name, country, city, address, company_email)
VALUES ('Acconciatura Sposa Personalizzata', 'Italy', 'Florence', 'Via della Bellezza, 789', 'marco.guidi@email.com');

INSERT INTO TAGGABLE (name, country, city, address, company_email)
VALUES ('Barba alla Moda con Styling', 'Italy', 'Florence', 'Via della Bellezza, 789', 'marco.guidi@email.com');

-- Prodotti taggabili per Enoteca Galli (Utente 5)
INSERT INTO TAGGABLE (name, country, city, address, company_email)
VALUES ('Barolo Riserva 2015', 'Italy', 'Turin', 'Via Po, 123', 'enoteca.galli@email.com');

INSERT INTO TAGGABLE (name, country, city, address, company_email)
VALUES ('Chianti Classico Gran Selezione', 'Italy', 'Turin', 'Via Po, 123', 'enoteca.galli@email.com');

INSERT INTO TAGGABLE (name, country, city, address, company_email)
VALUES ('Amarone della Valpolicella Riserva', 'Italy', 'Turin', 'Via Po, 123', 'enoteca.galli@email.com');

INSERT INTO TAGGABLE (name, country, city, address, company_email)
VALUES ('Prosecco Superiore Extra Dry', 'Italy', 'Turin', 'Via Po, 123', 'enoteca.galli@email.com');

INSERT INTO TAGGABLE (name, country, city, address, company_email)
VALUES ('Brunello di Montalcino Riserva', 'Italy', 'Turin', 'Via Po, 123', 'enoteca.galli@email.com');

-- Prodotti taggabili per Trattoria da Salvatore (Utente 2)
INSERT INTO TAGGABLE (name, country, city, address, company_email)
VALUES ('Spaghetti alla Carbonara', 'Italy', 'Naples', 'Via Toledo, 123', 'trattoriaSalvatore@email.com');

INSERT INTO TAGGABLE (name, country, city, address, company_email)
VALUES ('Pizza Napoli Margherita', 'Italy', 'Naples', 'Via Toledo, 123', 'trattoriaSalvatore@email.com');

INSERT INTO TAGGABLE (name, country, city, address, company_email)
VALUES ('Linguine alle Vongole Fresche', 'Italy', 'Naples', 'Via Toledo, 123', 'trattoriaSalvatore@email.com');

INSERT INTO TAGGABLE (name, country, city, address, company_email)
VALUES ('Tiramisu Tradizionale', 'Italy', 'Naples', 'Via Toledo, 123', 'trattoriaSalvatore@email.com');

INSERT INTO TAGGABLE (name, country, city, address, company_email)
VALUES ('Cannoli Siciliani con Ricotta', 'Italy', 'Naples', 'Via Toledo, 123', 'trattoriaSalvatore@email.com');


-- Notification type

INSERT INTO NOTIFICATION_TYPE(message)
VALUES ('USER started following you'),
	   ('USER liked your post'),
	   ('USER commented on your post'),
	   ('USER tagged you');

-- Company Account Request

-- Azienda 2 (Trattoria da Salvatore) richiede un account il 2024-01-05 alle 14:30
INSERT INTO COMPANY_ACCOUNT_REQUEST (company_email, date_time)
VALUES ('trattoriaSalvatore@email.com', '2023-01-05 14:30:00');

-- Azienda 5 (Enoteca Galli) richiede un account il 2024-01-10 alle 10:45
INSERT INTO COMPANY_ACCOUNT_REQUEST (company_email, date_time)
VALUES ('enoteca.galli@email.com', '2023-01-10 10:45:00');

-- Azienda 7 (Marco Guidi Parrucchieri) richiede un account il 2024-01-15 alle 16:20
INSERT INTO COMPANY_ACCOUNT_REQUEST (company_email, date_time)
VALUES ('marco.guidi@email.com', '2023-01-15 16:20:00');

-- Azienda 9 (FromGamer) richiede un account il 2024-01-20 alle 11:10
INSERT INTO COMPANY_ACCOUNT_REQUEST (company_email, date_time)
VALUES ('from.gamer@email.com', '2023-01-20 11:10:00');

-- Azienda 15 (Kebab la Stazione) richiede un account il 2024-01-25 alle 13:45
INSERT INTO COMPANY_ACCOUNT_REQUEST (company_email, date_time)
VALUES ('kebab.station@email.com', '2023-01-25 13:45:00');
