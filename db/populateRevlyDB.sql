-- Inserisci utente 1

use revly_db;

INSERT INTO users (email, username, name, surname, password, biography, img, isCompany, notifyLikes, notifyComments, notifyTags, notifyFollows) VALUES
('andrea.cavalli@email.com', 'andrea.c', 'Andrea', 'Cavalli', '$2y$10$PekGuqyHgx4hi/JXlybscuqmeYLeGx1exTxIsWGWnbodkzpqMec..', 'Ingegnere civile appassionato di trekking', 'default-image.png', 0, 1, 0, 1, 0),
('anna.monti@email.com', 'anna.monti', 'Anna', 'Monti', '$2y$10$eWps9IiAfD1K5BW3TZdSmuR1fi0R4aUf9T2m3cILAlyUfIfFvAJ6m', 'Ingegnere software appassionata di viaggi', '6.jpg', 0, 1, 0, 1, 1),
('elena.monti@email.com', 'elena.m', 'Elena', 'Monti', '$2y$10$Xg2LrADwc36HNOfeJYajle8nojn1yz8LHEd2yPveHMrxlkAIjnW3O', 'Insegnante di lingue straniere e appassionata di yoga', 'default-image.png', 0, 1, 1, 1, 1),
('eleonora.rossi@email.com', 'eleo_rossi', 'Eleonora', 'Rossi', '$2y$10$enQH2h8/i83CPehWOKudNez1rvOeZK.ZTOIKisyT2O8k/aLXpUAWa', 'Studiosa di letteratura e appassionata di cinema', 'default-image.png', 0, 0, 1, 1, 0),
('enoteca.galli@email.com', 'enoteca_galli', 'Enoteca Galli', '', '$2y$10$BMk/26lxa.LRKvNjI2a7QO6QIrpjMwJrHKWH0.PfvxFUO4wHdfCuS', 'Passione in ogni bottiglia, esperienza in ogni sorso', '7.jpg', 1, 1, 1, 0, 1),
('from.gamer@email.com', 'fromGamer', 'FromGamer', '', '$2y$10$5x71kHkPTNCEmOEPaexV2uNozBNJnYyuHByaZEWR6fXc2Hg6XmSVe', 'Negozio online di videogiochi e giochi da tavolo', '12.jpg', 1, 1, 1, 0, 0),
('giovanni.baldi@email.com', 'giovanni.b', 'Giovanni', 'Baldi', '$2y$10$gjCJioWynRHnDOyxzP9iHejShX6Bj2kHeaeI4SfKJiKGSnQLmSyGm', 'Appassionato di musica classica e tecnologia', 'default-image.png', 0, 0, 1, 1, 0),
('giuseppe.verdi@email.com', 'peppev', 'Giuseppe', 'Verdi', '$2y$10$AGwkLo3hAbXvjkBo3ueIuu7OPtOVrm7HNM5HEJPLx4UaC7GvumldS', 'Musicista e appassionato di opera', 'default-image.png', 0, 0, 1, 1, 1),
('kebab.station@email.com', 'Kebab_Stazione', 'Kebab la Stazione', '', '$2y$10$9YO/8M9iRw1XfVThuQH0SumdgHZrExfWXk67loBKxoAaTCKe7gh7.', 'Negozio di veri kebab e falafel alla stazione', '1.jpeg', 1, 1, 1, 1, 1),
('marco.guidi@email.com', 'marco_guidi_parrucchieri', 'Marco Guidi Parrucchieri', '', '$2y$10$qwE1EFB/fw20Cl0fhGbUJesplBXHbcvLtTtTC35V5c14NArlCi6Ae', 'Tagliamo il passato, coloriamo il presente, stiliamo il futuro', 'default-image.png', 1, 0, 1, 1, 1),
('mario.rossi@email.com', 'mario123', 'Mario', 'Rossi', '$2y$10$n/5KiW64NasQh25e7gaho.GYiy2vj5gfOR36gwu9wcgVB1pyTuGlW', 'Appassionato di tecnologia e sport', 'default-image.png', 0, 1, 1, 0, 1),
('sara.verdi@email.com', 'sara.v', 'Sara', 'Verdi', '$2y$10$wOH4ErzfGPLgTYwzT1UYeON5isNgVz/sU4vB3B4HINMtpnfEOUd/m', 'Appassionata di moda e arte contemporanea', 'default-image.png', 0, 1, 0, 0, 1),
('silvia.moro@email.com', 'silvia_m', 'Silvia', 'Moro', '$2y$10$NA16FjeCTHagv/uhSLyEzO4ki3WXLGCfp4G8hoV2AkU6xZn3dd.Dm', 'Designer di moda e amante degli animali', 'default-image.png', 0, 0, 0, 1, 1),
('simona.rossi@email.com', 'simona_r', 'Simona', 'Rossi', '$2y$10$5BqcO2p4/2.KOdPxlUxp0uloHL94Anxn1ElNf3YLb.4X/3ch1uk2S', 'Appassionata di letteratura russa e scienze politiche', '11.jpg', 0, 1, 1, 0, 1),
('trattoria.salvatore@email.com', 'TrattoriaDaSalvatore', 'Trattoria da Salvatore', '', '$2y$10$0ka5UiRLLXi8wL/Kpw4tmenzGkq64rSE/f3NVYuIsika./IN2HeSG', 'Siamo una trattoria nel mezzo di un paesaggio mozzafiato', 'default-image.png', 1, 1, 0, 1, 0);

-- Ricerche

-- Utente 1 (Mario Rossi) ha cercato altri 3 profili
INSERT INTO RECENT_SEARCHES (searched_email, user_email, date_time)
VALUES ('trattoria.salvatore@email.com', 'mario.rossi@email.com', NOW()),
       ('giuseppe.verdi@email.com', 'mario.rossi@email.com', NOW()),
       ('anna.monti@email.com', 'mario.rossi@email.com', NOW());

-- Utente 2 (Trattoria da Salvatore) ha cercato altri 3 profili
INSERT INTO RECENT_SEARCHES (searched_email, user_email, date_time)
VALUES ('mario.rossi@email.com', 'trattoria.salvatore@email.com', NOW()),
       ('giuseppe.verdi@email.com', 'trattoria.salvatore@email.com', NOW()),
       ('anna.monti@email.com', 'trattoria.salvatore@email.com', NOW());

-- Utente 3 (Giuseppe Verdi) ha cercato altri 3 profili
INSERT INTO RECENT_SEARCHES (searched_email, user_email, date_time)
VALUES ('mario.rossi@email.com', 'giuseppe.verdi@email.com', NOW()),
       ('trattoria.salvatore@email.com', 'giuseppe.verdi@email.com', NOW()),
       ('anna.monti@email.com', 'giuseppe.verdi@email.com', NOW());

-- Utente 4 (Anna Monti) ha cercato altri 3 profili
INSERT INTO RECENT_SEARCHES (searched_email, user_email, date_time)
VALUES ('mario.rossi@email.com', 'anna.monti@email.com', NOW()),
       ('trattoria.salvatore@email.com', 'anna.monti@email.com', NOW()),
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
INSERT INTO `follow` (`follower_email`, `user_email`) VALUES
('andrea.cavalli@email.com', 'kebab.station@email.com'),
('anna.monti@email.com', 'andrea.cavalli@email.com'),
('anna.monti@email.com', 'elena.monti@email.com'),
('anna.monti@email.com', 'eleonora.rossi@email.com'),
('anna.monti@email.com', 'enoteca.galli@email.com'),
('anna.monti@email.com', 'from.gamer@email.com'),
('anna.monti@email.com', 'giovanni.baldi@email.com'),
('anna.monti@email.com', 'giuseppe.verdi@email.com'),
('anna.monti@email.com', 'kebab.station@email.com'),
('anna.monti@email.com', 'marco.guidi@email.com'),
('anna.monti@email.com', 'mario.rossi@email.com'),
('anna.monti@email.com', 'sara.verdi@email.com'),
('anna.monti@email.com', 'silvia.moro@email.com'),
('anna.monti@email.com', 'simona.rossi@email.com'),
('anna.monti@email.com', 'trattoria.salvatore@email.com'),
('elena.monti@email.com', 'from.gamer@email.com'),
('eleonora.rossi@email.com', 'andrea.cavalli@email.com'),
('eleonora.rossi@email.com', 'anna.monti@email.com'),
('eleonora.rossi@email.com', 'elena.monti@email.com'),
('eleonora.rossi@email.com', 'enoteca.galli@email.com'),
('eleonora.rossi@email.com', 'from.gamer@email.com'),
('eleonora.rossi@email.com', 'giovanni.baldi@email.com'),
('eleonora.rossi@email.com', 'giuseppe.verdi@email.com'),
('eleonora.rossi@email.com', 'kebab.station@email.com'),
('eleonora.rossi@email.com', 'marco.guidi@email.com'),
('eleonora.rossi@email.com', 'mario.rossi@email.com'),
('eleonora.rossi@email.com', 'sara.verdi@email.com'),
('eleonora.rossi@email.com', 'silvia.moro@email.com'),
('eleonora.rossi@email.com', 'simona.rossi@email.com'),
('eleonora.rossi@email.com', 'trattoria.salvatore@email.com'),
('enoteca.galli@email.com', 'andrea.cavalli@email.com'),
('enoteca.galli@email.com', 'anna.monti@email.com'),
('enoteca.galli@email.com', 'elena.monti@email.com'),
('enoteca.galli@email.com', 'eleonora.rossi@email.com'),
('enoteca.galli@email.com', 'from.gamer@email.com'),
('enoteca.galli@email.com', 'giovanni.baldi@email.com'),
('enoteca.galli@email.com', 'giuseppe.verdi@email.com'),
('enoteca.galli@email.com', 'kebab.station@email.com'),
('enoteca.galli@email.com', 'marco.guidi@email.com'),
('enoteca.galli@email.com', 'mario.rossi@email.com'),
('enoteca.galli@email.com', 'sara.verdi@email.com'),
('enoteca.galli@email.com', 'silvia.moro@email.com'),
('enoteca.galli@email.com', 'simona.rossi@email.com'),
('from.gamer@email.com', 'andrea.cavalli@email.com'),
('from.gamer@email.com', 'anna.monti@email.com'),
('giovanni.baldi@email.com', 'eleonora.rossi@email.com'),
('giovanni.baldi@email.com', 'kebab.station@email.com'),
('giovanni.baldi@email.com', 'silvia.moro@email.com'),
('giuseppe.verdi@email.com', 'anna.monti@email.com'),
('giuseppe.verdi@email.com', 'marco.guidi@email.com'),
('giuseppe.verdi@email.com', 'mario.rossi@email.com'),
('giuseppe.verdi@email.com', 'trattoria.salvatore@email.com'),
('kebab.station@email.com', 'andrea.cavalli@email.com'),
('kebab.station@email.com', 'anna.monti@email.com'),
('kebab.station@email.com', 'enoteca.galli@email.com'),
('marco.guidi@email.com', 'andrea.cavalli@email.com'),
('marco.guidi@email.com', 'anna.monti@email.com'),
('marco.guidi@email.com', 'elena.monti@email.com'),
('marco.guidi@email.com', 'eleonora.rossi@email.com'),
('marco.guidi@email.com', 'enoteca.galli@email.com'),
('marco.guidi@email.com', 'from.gamer@email.com'),
('marco.guidi@email.com', 'giuseppe.verdi@email.com'),
('marco.guidi@email.com', 'kebab.station@email.com'),
('marco.guidi@email.com', 'mario.rossi@email.com'),
('marco.guidi@email.com', 'sara.verdi@email.com'),
('marco.guidi@email.com', 'silvia.moro@email.com'),
('marco.guidi@email.com', 'simona.rossi@email.com'),
('marco.guidi@email.com', 'trattoria.salvatore@email.com'),
('mario.rossi@email.com', 'anna.monti@email.com'),
('mario.rossi@email.com', 'giuseppe.verdi@email.com'),
('mario.rossi@email.com', 'trattoria.salvatore@email.com'),
('sara.verdi@email.com', 'eleonora.rossi@email.com'),
('sara.verdi@email.com', 'enoteca.galli@email.com'),
('sara.verdi@email.com', 'from.gamer@email.com'),
('sara.verdi@email.com', 'giovanni.baldi@email.com'),
('sara.verdi@email.com', 'giuseppe.verdi@email.com'),
('sara.verdi@email.com', 'kebab.station@email.com'),
('sara.verdi@email.com', 'marco.guidi@email.com'),
('silvia.moro@email.com', 'eleonora.rossi@email.com'),
('simona.rossi@email.com', 'eleonora.rossi@email.com'),
('simona.rossi@email.com', 'from.gamer@email.com'),
('simona.rossi@email.com', 'kebab.station@email.com'),
('simona.rossi@email.com', 'silvia.moro@email.com'),
('trattoria.salvatore@email.com', 'andrea.cavalli@email.com'),
('trattoria.salvatore@email.com', 'anna.monti@email.com'),
('trattoria.salvatore@email.com', 'elena.monti@email.com'),
('trattoria.salvatore@email.com', 'eleonora.rossi@email.com'),
('trattoria.salvatore@email.com', 'enoteca.galli@email.com'),
('trattoria.salvatore@email.com', 'from.gamer@email.com'),
('trattoria.salvatore@email.com', 'giovanni.baldi@email.com'),
('trattoria.salvatore@email.com', 'giuseppe.verdi@email.com'),
('trattoria.salvatore@email.com', 'kebab.station@email.com'),
('trattoria.salvatore@email.com', 'mario.rossi@email.com'),
('trattoria.salvatore@email.com', 'sara.verdi@email.com'),
('trattoria.salvatore@email.com', 'silvia.moro@email.com'),
('trattoria.salvatore@email.com', 'simona.rossi@email.com');


-- Prodotti taggabili per Kebab la Stazione (Utente 15)
INSERT INTO TAGGABLE (name, address, company_email)
VALUES ('Kebab Misto Deluxe', 'Via Stazione 21, Turin', 'kebab.station@email.com');

INSERT INTO TAGGABLE (name, address, company_email)
VALUES ('Falafel Wrap Vegano', 'Via Stazione 21, Turin', 'kebab.station@email.com');

INSERT INTO TAGGABLE (name, address, company_email)
VALUES ('Hummus Plate Mediterraneo', 'Via Stazione 21, Turin', 'kebab.station@email.com');

INSERT INTO TAGGABLE (name, address, company_email)
VALUES ('Chicken Shawarma Piccante', 'Via Stazione 21, Turin', 'kebab.station@email.com');

INSERT INTO TAGGABLE (name, address, company_email)
VALUES ('Baklava Dolce', 'Via Stazione 21, Turin', 'kebab.station@email.com');

INSERT INTO TAGGABLE (name, address, company_email)
VALUES ('Kebab la Stazione', 'Via Stazione 21, Turin', 'kebab.station@email.com');

-- Prodotti taggabili per FromGamer (Utente 9)
INSERT INTO TAGGABLE (name, company_email)
VALUES ('PlayStation 5', 'from.gamer@email.com');

INSERT INTO TAGGABLE (name, company_email)
VALUES ('Settlers of Catan', 'from.gamer@email.com');

INSERT INTO TAGGABLE (name, company_email)
VALUES ('Nintendo Switch Lite', 'from.gamer@email.com');

INSERT INTO TAGGABLE (name, company_email)
VALUES ('Dungeons & Dragons Starter Set Edizione Limitata', 'from.gamer@email.com');

INSERT INTO TAGGABLE (name, company_email)
VALUES ('Xbox Series X Bundle con Giochi', 'from.gamer@email.com');

INSERT INTO TAGGABLE (name, address, company_email)
VALUES ('FromGamer', 'Via Cesare Battisti, 456', 'from.gamer@email.com');

-- Prodotti taggabili per Marco Guidi Parrucchieri (Utente 7)
INSERT INTO TAGGABLE (name, address, company_email)
VALUES ('Taglio di Capelli alla Moda', 'Via della Bellezza 62, Rome', 'marco.guidi@email.com');

INSERT INTO TAGGABLE (name, address, company_email)
VALUES ('Colore Capelli Elegante', 'Via della Bellezza 62, Rome', 'marco.guidi@email.com');

INSERT INTO TAGGABLE (name, address, company_email)
VALUES ('Trattamento alla Cheratina Professionale', 'Via della Bellezza 62, Rome', 'marco.guidi@email.com');

INSERT INTO TAGGABLE (name, address, company_email)
VALUES ('Acconciatura Sposa Personalizzata', 'Via della Bellezza 62, Rome', 'marco.guidi@email.com');

INSERT INTO TAGGABLE (name, address, company_email)
VALUES ('Barba alla Moda con Styling', 'Via della Bellezza 62, Rome', 'marco.guidi@email.com');

INSERT INTO TAGGABLE (name, address, company_email)
VALUES ('Marco Guidi Parrucchieri', 'Via della Bellezza 62, Rome', 'marco.guidi@email.com');

-- Prodotti taggabili per Enoteca Galli (Utente 5)
INSERT INTO TAGGABLE (name, address, company_email)
VALUES ('Barolo Riserva 2015', 'Via Po 474, Bologna', 'enoteca.galli@email.com');

INSERT INTO TAGGABLE (name, address, company_email)
VALUES ('Chianti Classico Gran Selezione', 'Via Po 474, Bologna', 'enoteca.galli@email.com');

INSERT INTO TAGGABLE (name, address, company_email)
VALUES ('Amarone della Valpolicella Riserva', 'Via Po 474, Bologna', 'enoteca.galli@email.com');

INSERT INTO TAGGABLE (name, address, company_email)
VALUES ('Prosecco Superiore Extra Dry', 'Via Po 474, Bologna', 'enoteca.galli@email.com');

INSERT INTO TAGGABLE (name, address, company_email)
VALUES ('Brunello di Montalcino Riserva', 'Via Po 474, Bologna', 'enoteca.galli@email.com');

INSERT INTO TAGGABLE (name, address, company_email)
VALUES ('Enoteca Galli', 'Via Po 474, Bologna', 'enoteca.galli@email.com');

-- Prodotti taggabili per Trattoria da Salvatore (Utente 2)
INSERT INTO TAGGABLE (name, address, company_email)
VALUES ('Spaghetti alla Carbonara', 'Via Toledo 19, Naples', 'trattoria.salvatore@email.com');

INSERT INTO TAGGABLE (name, address, company_email)
VALUES ('Pizza Napoli Margherita', 'Via Toledo 19, Naples', 'trattoria.salvatore@email.com');

INSERT INTO TAGGABLE (name, address, company_email)
VALUES ('Linguine alle Vongole Fresche', 'Via Toledo 19, Naples', 'trattoria.salvatore@email.com');

INSERT INTO TAGGABLE (name, address, company_email)
VALUES ('Tiramisu Tradizionale', 'Via Toledo 19, Naples', 'trattoria.salvatore@email.com');

INSERT INTO TAGGABLE (name, address, company_email)
VALUES ('Cannoli Siciliani con Ricotta', 'Via Toledo 19, Naples', 'trattoria.salvatore@email.com');

INSERT INTO TAGGABLE (name, address, company_email)
VALUES ('Trattoria da Salvatore', 'Via Toledo 19, Naples', 'trattoria.salvatore@email.com');

-- Notification type

INSERT INTO NOTIFICATION_TYPE(message)
VALUES ('USER started following you'),
	   ('USER liked your post'),
	   ('USER commented on your post'),
	   ('USER tagged you');

-- Company Account Request

-- Azienda 2 (Trattoria da Salvatore) richiede un account il 2024-01-05 alle 14:30
INSERT INTO COMPANY_ACCOUNT_REQUEST (company_email, date_time, name, address)
VALUES ('trattoria.salvatore@email.com', '2023-01-05 14:30:00', 'Trattoria da Salvatore', 'Via Toledo 19, Naples');

-- Azienda 5 (Enoteca Galli) richiede un account il 2024-01-10 alle 10:45
INSERT INTO COMPANY_ACCOUNT_REQUEST (company_email, date_time, name, address)
VALUES ('enoteca.galli@email.com', '2023-01-10 10:45:00', 'Enoteca Galli', 'Via Po 474, Bologna');

-- Azienda 7 (Marco Guidi Parrucchieri) richiede un account il 2024-01-15 alle 16:20
INSERT INTO COMPANY_ACCOUNT_REQUEST (company_email, date_time, name, address)
VALUES ('marco.guidi@email.com', '2023-01-15 16:20:00', 'Marco Guidi Parrucchieri', 'Via della Bellezza 62, Rome');

-- Azienda 9 (FromGamer) richiede un account il 2024-01-20 alle 11:10
INSERT INTO COMPANY_ACCOUNT_REQUEST (company_email, date_time, name, address)
VALUES ('from.gamer@email.com', '2023-01-20 11:10:00', 'From Gamer', 'Via Cesare Battisti, 456');

-- Azienda 15 (Kebab la Stazione) richiede un account il 2024-01-25 alle 13:45
INSERT INTO COMPANY_ACCOUNT_REQUEST (company_email, date_time, name, address)
VALUES ('kebab.station@email.com', '2023-01-25 13:45:00', 'Kebab la Stazione', 'Via Stazione 21, Turin');

INSERT INTO post (id, img, evaluation, subject, description, date_time, id_taggable, author_email) VALUES
(1, '1.jpg', 4, NULL, 'Se vuoi provare un ottimo kebab, passa qui da noi!', '2024-02-07 12:56:47', 1, 'kebab.station@email.com'),
(2, '2.jpg', 5, NULL, 'Un gustoso Falafel Wrap Vegano ti sta aspettando ', '2024-02-07 12:58:33', 2, 'kebab.station@email.com'),
(3, '3.jpg', 4, NULL, 'Ho recentemente optato per una piega presso Marco Guidi Parrucchieri e sono rimasta estremamente soddisfatta dell esperienza. L atmosfera del salone era rilassante, e il personale si è dimostrato competente e professionale. La mia parrucchiera ha manifestato una conoscenza approfondita delle ultime tendenze e tecniche di styling. In conclusione, Marco Guidi Parrucchieri ha confermato la sua reputazione per la qualità del servizio, e non vedo l ora di prenotare la prossima piega!', '2024-02-07 13:11:22', 14, 'anna.monti@email.com'),
(7, '4.jpg', 4, 'Mojito fatto in casa', 'Un ottimo mojito fatto in casa, vi lascio la ricetta qui sotto se voelte provarlo.\r\n\r\nPer preparare il mojito iniziate versando in un bicchiere da long drink (tumbler alto) le foglie di menta e lo zucchero di canna; servendovi di un pestello schiacciatele contro il lato del bicchiere così da sprigionare l’aroma della menta. Aggiungete il succo di lime (circa 1/5 della bibita) e pestate ancora per qualche secondo, poi riempite il bicchiere di ghiaccio (a cubetti o tritato), aggiungete il rum, l’angostura e in ultimo uno spruzzo di acqua gassata (o soda); mescolate in modo circolare e servite decorando con un rametto di menta.', '2024-02-07 13:21:17', NULL, 'andrea.cavalli@email.com'),
(8, '5.jpg', 4, NULL, 'Un ottimo vino. Consigliato per una buona mangiata in compagnia', '2024-02-07 13:25:30', 19, 'enoteca.galli@email.com'),
(9, '8.jpg', 5, NULL, 'Un buonissimo vino preso dai miei amici dell enoteca Galli', '2024-02-07 13:33:27', 20, 'andrea.cavalli@email.com'),
(10, '9.jpg', 5, NULL, 'vieni in negozio e compra la tua PS5', '2024-02-07 15:50:55', 7, 'from.gamer@email.com'),
(11, '10.jpg', 5, NULL, 'Esperienza straordinaria con Nintendo Switch!', '2024-02-07 15:56:34', 9, 'simona.rossi@email.com');


INSERT INTO likes (user_email, id_post) VALUES
('andrea.cavalli@email.com', 1),
('anna.monti@email.com', 1),
('kebab.station@email.com', 1),
('andrea.cavalli@email.com', 2),
('anna.monti@email.com', 2),
('from.gamer@email.com', 2),
('kebab.station@email.com', 2),
('simona.rossi@email.com', 2),
('anna.monti@email.com', 3),
('enoteca.galli@email.com', 3),
('andrea.cavalli@email.com', 7),
('anna.monti@email.com', 7),
('enoteca.galli@email.com', 7),
('anna.monti@email.com', 8),
('enoteca.galli@email.com', 8),
('andrea.cavalli@email.com', 9),
('enoteca.galli@email.com', 9),
('from.gamer@email.com', 10),
('simona.rossi@email.com', 10),
('simona.rossi@email.com', 11);


INSERT INTO comments (id, description, date_time, author_email, id_post) VALUES
(1, 'woow, non vedo l ora di provarlo!', '2024-02-07 13:13:23', 'andrea.cavalli@email.com', 2),
(2, 'Grazie mille, a presto ;)', '2024-02-07 13:35:56', 'enoteca.galli@email.com', 9),
(3, 'Affrettatevi, son rimaste solo poche bottiglie!', '2024-02-07 13:37:28', 'enoteca.galli@email.com', 8),
(4, 'Wooow fantastico', '2024-02-07 14:32:10', 'anna.monti@email.com', 7),
(5, 'Qual è il prezzo di vendita?', '2024-02-07 15:57:27', 'simona.rossi@email.com', 10);

INSERT INTO notification (id, date_time, id_type, notifier_email, notified_email, id_post) VALUES
(1, '2024-02-07 12:56:47', 4, 'kebab.station@email.com', 'kebab.station@email.com', 1),
(2, '2024-02-07 12:58:33', 4, 'kebab.station@email.com', 'kebab.station@email.com', 2),
(3, '2024-02-07 12:58:39', 2, 'kebab.station@email.com', 'kebab.station@email.com', 2),
(5, '2024-02-07 13:11:22', 4, 'anna.monti@email.com', 'marco.guidi@email.com', 3),
(6, '2024-02-07 13:11:30', 2, 'anna.monti@email.com', 'anna.monti@email.com', 3),
(7, '2024-02-07 13:11:37', 2, 'anna.monti@email.com', 'kebab.station@email.com', 2),
(8, '2024-02-07 13:12:59', 1, 'andrea.cavalli@email.com', 'kebab.station@email.com', NULL),
(9, '2024-02-07 13:13:02', 2, 'andrea.cavalli@email.com', 'kebab.station@email.com', 2),
(10, '2024-02-07 13:13:04', 2, 'andrea.cavalli@email.com', 'kebab.station@email.com', 1),
(11, '2024-02-07 13:13:23', 3, 'andrea.cavalli@email.com', 'kebab.station@email.com', 2),
(13, '2024-02-07 13:21:35', 2, 'andrea.cavalli@email.com', 'andrea.cavalli@email.com', 7),
(14, '2024-02-07 13:25:30', 4, 'enoteca.galli@email.com', 'enoteca.galli@email.com', 8),
(15, '2024-02-07 13:25:33', 2, 'enoteca.galli@email.com', 'andrea.cavalli@email.com', 7),
(16, '2024-02-07 13:25:35', 2, 'enoteca.galli@email.com', 'anna.monti@email.com', 3),
(17, '2024-02-07 13:25:51', 2, 'enoteca.galli@email.com', 'enoteca.galli@email.com', 8),
(18, '2024-02-07 13:26:31', 1, 'enoteca.galli@email.com', 'kebab.station@email.com', NULL),
(19, '2024-02-07 13:27:02', 1, 'kebab.station@email.com', 'enoteca.galli@email.com', NULL),
(20, '2024-02-07 13:27:12', 1, 'kebab.station@email.com', 'anna.monti@email.com', NULL),
(21, '2024-02-07 13:27:29', 1, 'kebab.station@email.com', 'andrea.cavalli@email.com', NULL),
(22, '2024-02-07 13:28:27', 2, 'kebab.station@email.com', 'kebab.station@email.com', 1),
(23, '2024-02-07 13:33:27', 4, 'andrea.cavalli@email.com', 'enoteca.galli@email.com', 9),
(24, '2024-02-07 13:33:32', 2, 'andrea.cavalli@email.com', 'andrea.cavalli@email.com', 9),
(25, '2024-02-07 13:33:52', 2, 'enoteca.galli@email.com', 'andrea.cavalli@email.com', 9),
(26, '2024-02-07 13:35:56', 3, 'enoteca.galli@email.com', 'andrea.cavalli@email.com', 9),
(27, '2024-02-07 13:37:28', 3, 'enoteca.galli@email.com', 'enoteca.galli@email.com', 8),
(28, '2024-02-07 13:43:00', 1, 'enoteca.galli@email.com', 'marco.guidi@email.com', NULL),
(29, '2024-02-07 14:31:59', 2, 'anna.monti@email.com', 'enoteca.galli@email.com', 8),
(30, '2024-02-07 14:32:10', 3, 'anna.monti@email.com', 'andrea.cavalli@email.com', 7),
(31, '2024-02-07 14:35:07', 2, 'anna.monti@email.com', 'kebab.station@email.com', 1),
(32, '2024-02-07 14:35:10', 2, 'anna.monti@email.com', 'andrea.cavalli@email.com', 7),
(33, '2024-02-07 15:50:55', 4, 'from.gamer@email.com', 'from.gamer@email.com', 10),
(34, '2024-02-07 15:51:11', 1, 'from.gamer@email.com', 'anna.monti@email.com', NULL),
(35, '2024-02-07 15:51:22', 1, 'from.gamer@email.com', 'andrea.cavalli@email.com', NULL),
(36, '2024-02-07 15:51:47', 2, 'from.gamer@email.com', 'from.gamer@email.com', 10),
(37, '2024-02-07 15:52:32', 1, 'simona.rossi@email.com', 'from.gamer@email.com', NULL),
(38, '2024-02-07 15:56:34', 4, 'simona.rossi@email.com', 'from.gamer@email.com', 11),
(39, '2024-02-07 15:56:38', 2, 'simona.rossi@email.com', 'from.gamer@email.com', 10),
(40, '2024-02-07 15:56:40', 2, 'simona.rossi@email.com', 'kebab.station@email.com', 2),
(41, '2024-02-07 15:56:45', 2, 'simona.rossi@email.com', 'simona.rossi@email.com', 11),
(42, '2024-02-07 15:57:27', 3, 'simona.rossi@email.com', 'from.gamer@email.com', 10),
(43, '2024-02-07 16:00:35', 1, 'simona.rossi@email.com', 'eleonora.rossi@email.com', NULL),
(44, '2024-02-07 16:02:58', 2, 'from.gamer@email.com', 'kebab.station@email.com', 2);