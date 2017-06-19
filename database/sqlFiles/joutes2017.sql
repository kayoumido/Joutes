-- Empty the current database's tables and reset autoincrement to 1
/*
SET FOREIGN_KEY_CHECKS = 0;

DELIMITER $$
CREATE PROCEDURE clearDb()
  BEGIN
    DECLARE oneTable CHAR(100);
    DECLARE finished INT DEFAULT 0;
    DECLARE allTables CURSOR FOR SELECT table_name
                                 FROM information_schema.tables
                                 WHERE table_schema = (SELECT DATABASE());
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET finished = 1;
    OPEN allTables;
    get_table: LOOP
      FETCH allTables
      INTO oneTable;
      IF finished = 1
      THEN
        LEAVE get_table;
      END IF;
      SET @qry1 := concat('delete from ', oneTable);
      PREPARE stmt FROM @qry1;
      EXECUTE stmt;
      SET @qry1 := concat('ALTER TABLE ', oneTable, ' auto_increment=1');
      PREPARE stmt FROM @qry1;
      EXECUTE stmt;
    END LOOP get_table;
    CLOSE allTables;
  END;
$$
CALL clearDb();
DROP PROCEDURE clearDb;

SET FOREIGN_KEY_CHECKS = 1;*/

-- ========================================== Data ==============================================

--
--  Insert Data in events
--

INSERT INTO joutes.events (NAME) VALUES ('joutes 2017');

--
--  Insert Data in sports
--

INSERT INTO sports (NAME, description) VALUES ('Beach Volley', '4-4 mixte');

--
--  Insert Data in courts
--

INSERT INTO courts (NAME, sport_id, acronym) VALUES ('Lac', 1, 'LAC'), ('Montagne', 1, 'MONT');

--
--  Insert Data in tournaments
--

INSERT INTO tournaments (NAME, start_date, event_id, sport_id) VALUES ('BeachVolley', '2017-06-27', 1, 1);

--
--  Insert Data in gameTypes
--

INSERT INTO gameTypes (gameTypeDescription) VALUES ('Modalités de jeu');

--
--  Insert Data in poolModes
--

INSERT INTO poolModes (modeDescription, planningAlgorithm)
VALUES ('Matches simples', 1), ('Aller-retour', 2), ('Elimination directe', 3);

--
--  Insert Data in participants
--

INSERT INTO participants (first_name, last_name)
VALUES ("Ahmed", "Casey"), ("Chester", "Day"), ("Riley", "Garrison"), ("Duncan", "Roy"), ("Remedios", "Black"),
  ("Mark", "Molina"), ("Dana", "Justice"), ("Linus", "Leon"), ("Cairo", "Farmer"), ("Nyssa", "Gallagher");
INSERT INTO participants (first_name, last_name)
VALUES ("Allegra", "Waller"), ("Emery", "Copeland"), ("Illana", "Mcgowan"), ("Magee", "Bauer"), ("Patricia", "Briggs"),
  ("Samuel", "Meyers"), ("Nelle", "Holcomb"), ("Shay", "David"), ("Kai", "Quinn"), ("Brendan", "Macdonald");
INSERT INTO participants (first_name, last_name)
VALUES ("Justin", "Jones"), ("Erich", "Shepherd"), ("Joseph", "Compton"), ("Moses", "Pope"), ("Hedley", "Thornton"),
  ("Deborah", "Wells"), ("Kay", "Ortega"), ("Dorothy", "Johnston"), ("Irene", "Alston"), ("Doris", "Baird");
INSERT INTO participants (first_name, last_name)
VALUES ("Zorita", "Ellis"), ("Yen", "Hale"), ("Madison", "Marshall"), ("Angela", "Perry"), ("Michael", "Woodard"),
  ("Karyn", "Riddle"), ("Carol", "Lang"), ("Malik", "Padilla"), ("Maxine", "Rowland"), ("Halee", "Larson");
INSERT INTO participants (first_name, last_name)
VALUES ("Tatyana", "Rosario"), ("Latifah", "Jenkins"), ("Wynne", "Rowland"), ("Nola", "Adkins"),
  ("Nicole", "Wilkerson"), ("Sybil", "Murray"), ("Cadman", "Evans"), ("Xenos", "Kramer"), ("Illana", "Riley"),
  ("Evan", "Logan");
INSERT INTO participants (first_name, last_name)
VALUES ("Risa", "Fuller"), ("Jenette", "Alvarado"), ("Colorado", "Moss"), ("Bree", "Velazquez"), ("Madonna", "Preston"),
  ("Daria", "Pearson"), ("Uta", "Hensley"), ("Paul", "Lambert"), ("Declan", "Ramirez"), ("Davis", "Mcleod");
INSERT INTO participants (first_name, last_name)
VALUES ("Wanda", "Sears"), ("Melvin", "Bowen"), ("Lareina", "Forbes"), ("Dane", "Holland"), ("Norman", "Mcleod"),
  ("Blythe", "Cruz"), ("Jayme", "Gill"), ("Adele", "Warren"), ("Candace", "Valenzuela"), ("Judith", "Blake");

--
--  Insert Data in teams
--

INSERT INTO teams (NAME, tournament_id) VALUES ('Badboys', 1);
INSERT INTO teams (NAME, tournament_id) VALUES ('Super Nanas', 1);
INSERT INTO teams (NAME, tournament_id) VALUES ('CPVN Crew', 1);
INSERT INTO teams (NAME, tournament_id) VALUES ('Magical Girls', 1);
INSERT INTO teams (NAME, tournament_id) VALUES ('OliverTwist', 1);
INSERT INTO teams (NAME, tournament_id) VALUES ('Scarman', 1);
INSERT INTO teams (NAME, tournament_id) VALUES ('Siomer', 1);
INSERT INTO teams (NAME, tournament_id) VALUES ('Salsadi', 1);
INSERT INTO teams (NAME, tournament_id) VALUES ('Monoster', 1);
INSERT INTO teams (NAME, tournament_id) VALUES ('Picalo', 1);
INSERT INTO teams (NAME, tournament_id) VALUES ('Dellit', 1);
INSERT INTO teams (NAME, tournament_id) VALUES ('SuperStar', 1);
INSERT INTO teams (NAME, tournament_id) VALUES ('Masting', 1);
INSERT INTO teams (NAME, tournament_id) VALUES ('Clafier', 1);
INSERT INTO teams (NAME, tournament_id) VALUES ('Robert2Poche', 1);
INSERT INTO teams (NAME, tournament_id) VALUES ('Alexandri', 1);
INSERT INTO teams (NAME, tournament_id) VALUES ('FanGirls', 1);
INSERT INTO teams (NAME, tournament_id) VALUES ('Les Otakus', 1);
INSERT INTO teams (NAME, tournament_id) VALUES ('Gamers', 1);
INSERT INTO teams (NAME, tournament_id) VALUES ('Over2000', 1);
INSERT INTO teams (NAME, tournament_id) VALUES ('Shinigami', 1);
INSERT INTO teams (NAME, tournament_id) VALUES ('Rocketteurs', 1);
INSERT INTO teams (NAME, tournament_id) VALUES ('Gilles & 2Sot-Vetage', 1);
INSERT INTO teams (NAME, tournament_id) VALUES ('Maya Labeille', 1);
INSERT INTO teams (NAME, tournament_id) VALUES ('Taupes ModL', 1);
INSERT INTO teams (NAME, tournament_id) VALUES ('Les Pausés', 1);
INSERT INTO teams (NAME, tournament_id) VALUES ('Absolute Frost', 1);
INSERT INTO teams (NAME, tournament_id) VALUES ('Dark Side', 1);
INSERT INTO teams (NAME, tournament_id) VALUES ('Btooom', 1);
INSERT INTO teams (NAME, tournament_id) VALUES ('Stalgia', 1);
INSERT INTO teams (NAME, tournament_id) VALUES ('Clattonia', 1);
INSERT INTO teams (NAME, tournament_id) VALUES ('Danrell', 1);
INSERT INTO teams (NAME, tournament_id) VALUES ('RunAGround', 1);
INSERT INTO teams (NAME, tournament_id) VALUES ('Believer', 1);
INSERT INTO teams (NAME, tournament_id) VALUES ('Warriors', 1);

--
--  Insert Data in participant_team
--

INSERT INTO participant_team (participant_id, team_id, isCaptain) SELECT
                                                                    id,
                                                                    FLOOR((id + 3) / 4),
                                                                    (id % 4 = 0)
                                                                  FROM participants
                                                                  LIMIT 48;

--
--  Insert Data in contenders
--

-- ================= stage 1 =====================

-- pools id 1-3
INSERT INTO pools (tournament_id, start_time, end_time, poolName, mode_id, gameType_id, poolSize, stage, isFinished)
VALUES
  (1, '09:30', '11:45', 'A', 1, 1, 4, 1, 0),
  (1, '09:30', '11:45', 'B', 1, 1, 4, 1, 0),
  (1, '09:30', '11:45', 'C', 1, 1, 4, 1, 0);

-- contenders are automatic: teams 1-4 -> pool 1, teams 5-8 -> pool 2, thus team X -> pool floor((X+3)/4)
INSERT INTO contenders (pool_id, team_id) SELECT
                                            FLOOR((id + 3) / 4),
                                            id
                                          FROM teams
                                          LIMIT 12;

-- Games
INSERT INTO games (date, start_time, contender1_id, contender2_id, court_id)
VALUES
  ('2017-06-27', '09:30', 1, 2, 1),
  ('2017-06-27', '09:30', 3, 4, 2),
  ('2017-06-27', '10:15', 1, 3, 1),
  ('2017-06-27', '10:15', 2, 4, 2),
  ('2017-06-27', '11:00', 4, 1, 1),
  ('2017-06-27', '11:00', 3, 2, 2),

  ('2017-06-27', '09:45', 5, 6, 1),
  ('2017-06-27', '09:45', 7, 8, 2),
  ('2017-06-27', '10:30', 5, 7, 1),
  ('2017-06-27', '10:30', 6, 8, 2),
  ('2017-06-27', '11:15', 8, 5, 1),
  ('2017-06-27', '11:15', 7, 6, 2),

  ('2017-06-27', '10:00', 9, 10, 1),
  ('2017-06-27', '10:00', 11, 12, 2),
  ('2017-06-27', '10:45', 9, 11, 1),
  ('2017-06-27', '10:45', 10, 12, 2),
  ('2017-06-27', '11:30', 12, 9, 1),
  ('2017-06-27', '11:30', 11, 10, 2);

-- ================= stage 2 =====================

  -- pools id 4-5
INSERT INTO pools (tournament_id, start_time, end_time, poolName, mode_id, gameType_id, poolSize, stage, isFinished)
VALUES
  (1, '11:45', '16:00', 'Winners', 1, 1, 6, 2, 0), (1, '11:45', '16:00', 'Fun', 1, 1, 6, 2, 0);

INSERT INTO contenders (pool_id, rank_in_pool, pool_from_id)
VALUES
  (4, 1, 1),
  (4, 2, 1),
  (4, 1, 2),
  (4, 2, 2),
  (4, 1, 3),
  (4, 2, 3),
  (5, 3, 1),
  (5, 4, 1),
  (5, 3, 2),
  (5, 4, 2),
  (5, 3, 3),
  (5, 4, 3);

-- Games
INSERT INTO games (date, start_time, contender1_id, contender2_id, court_id)
VALUES
  ('2017-06-27', '11:45', 16, 17, 1),
  ('2017-06-27', '12:00', 18, 19, 1),
  ('2017-06-27', '12:15', 20, 21, 1),
  ('2017-06-27', '13:00', 16, 18, 1),
  ('2017-06-27', '13:15', 17, 21, 1),
  ('2017-06-27', '13:30', 19, 20, 1),
  ('2017-06-27', '13:45', 16, 19, 1),
  ('2017-06-27', '14:00', 17, 20, 1),
  ('2017-06-27', '14:15', 18, 21, 1),
  ('2017-06-27', '14:30', 16, 20, 1),
  ('2017-06-27', '14:45', 17, 18, 1),
  ('2017-06-27', '15:00', 19, 21, 1),
  ('2017-06-27', '15:15', 16, 21, 1),
  ('2017-06-27', '15:30', 17, 19, 1),
  ('2017-06-27', '15:45', 18, 20, 1),

  ('2017-06-27', '11:45', 22, 23, 2),
  ('2017-06-27', '12:00', 24, 25, 2),
  ('2017-06-27', '12:15', 26, 27, 2),
  ('2017-06-27', '13:00', 22, 24, 2),
  ('2017-06-27', '13:15', 23, 27, 2),
  ('2017-06-27', '13:30', 25, 26, 2),
  ('2017-06-27', '13:45', 22, 25, 2),
  ('2017-06-27', '14:00', 23, 26, 2),
  ('2017-06-27', '14:15', 24, 27, 2),
  ('2017-06-27', '14:30', 22, 26, 2),
  ('2017-06-27', '14:45', 23, 24, 2),
  ('2017-06-27', '15:00', 25, 27, 2),
  ('2017-06-27', '15:15', 22, 27, 2),
  ('2017-06-27', '15:30', 23, 25, 2),
  ('2017-06-27', '15:45', 24, 26, 2);
