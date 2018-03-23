DROP TABLE TeamStats;
DROP TABLE Players;
DROP TABLE Coaches;
DROP TABLE Managers;
DROP TABLE HomeTeamAddresses;
DROP TABLE GameLocations;
DROP TABLE TicketPrices;
DROP TABLE Tickets;
DROP TABLE Games;
DROP TABLE Hats;
DROP TABLE Jerseys;
DROP TABLE Teams;
DROP TABLE Venues;

Create TABLE Venues
(address varchar(255),
venueName varchar(255),
PRIMARY KEY (address));

CREATE TABLE Teams
(teamName varchar(255),
city varchar(255),
address  varchar(255) NOT NULL,
PRIMARY KEY (teamName, city),
FOREIGN KEY (address) references Venues(address)
);

CREATE TABLE TeamStats
(address varchar(255),
wins int,
losses int,
PRIMARY KEY (address),
FOREIGN KEY (address) references Venues(address)
);

CREATE TABLE Players
(playerId int,
playerNumber int,
name varchar(255) NOT NULL,
assists int,
goals int,
wins int,
losses int,
salary int,
beginDate Date,
endDate Date,
teamName varchar(255),
city varchar(255),
PRIMARY KEY (playerId),
FOREIGN KEY (teamName, city) references Teams(teamName, city)
    ON DELETE SET NULL,
UNIQUE(teamName, playerNumber),
CHECK (salary >= 0)
);


Create TABLE Coaches
(name varchar(255) NOT NULL,
coachId int,
salary int,
beginDate Date,
endDate Date,
teamName varchar(255),
city varchar(255),
PRIMARY KEY(coachId),
FOREIGN KEY(teamName, city) references Teams(teamName, city)
    ON DELETE SET NULL
    );

Create TABLE Managers
(name varchar(255) NOT NULL,
managerId int,
salary int,
beginDate Date,
endDate Date,
teamName varchar(255),
city varchar(255),
PRIMARY KEY(managerId),
FOREIGN KEY(teamName, city) references Teams(teamName, city)
ON DELETE SET NULL
    );

Create TABLE HomeTeamAddresses
(homeTeam varchar(255),
address varchar(255),
PRIMARY KEY(address),
FOREIGN KEY(address) references Venues(address)
    ON DELETE SET NULL
    );


Create TABLE Games
(homeTeam varchar(255) NOT NULL,
homeCity varchar(255) NOT NULL,
homeScore int,
gameId int,
startTime Date,
awayTeam varchar(255) NOT NULL,
awayCity varchar(255) NOT NULL,
awayScore int,
PRIMARY KEY (gameId),
FOREIGN KEY(homeTeam, homeCity) references Teams(teamName, city),
FOREIGN KEY(awayTeam, awayCity) references Teams(teamName, city)
    );


Create TABLE GameLocations
(gameId int,
address varchar(255) NOT NULL,
PRIMARY KEY (gameId),
FOREIGN KEY (address) references Venues(address));

Create TABLE TicketPrices
(address varchar(255),
seat int,
price int,
PRIMARY KEY (address, seat),
FOREIGN KEY (address) references Venues(address)
    ON DELETE CASCADE
    );

Create TABLE Tickets
(gameId int,
seat int NOT NULL,
ticket int,
PRIMARY KEY (gameId, ticket),
FOREIGN KEY (gameId) references Games(gameId)
    ON DELETE CASCADE);


Create TABLE Hats
(serialNumber int,
price int,
teamName varchar(255),
city varchar(255),
PRIMARY KEY(serialNumber),
FOREIGN KEY(teamName, city) references Teams(teamName, city)
    ON DELETE CASCADE
    );

Create TABLE Jerseys
(serialNumber int,
price int,
playerNumber int,
jerseySize char(1),
teamName varchar(255),
city varchar(255),
PRIMARY KEY(serialNumber),
FOREIGN KEY(teamName, city) references Teams(teamName, city)
    ON DELETE CASCADE,
UNIQUE(teamName, playerNumber));

insert into Venues
values ('800 Griffiths Way, Vancouver, BC V6B 6G1', 'Rogers Arena');

insert into Venues
values ('300 – 10214 104 Ave NW, Edmonton, AB T5J 0H6', 'Rogers Place');

insert into Venues
values ('555 Saddledome Rise SE, Calgary, AB T2G2W1', 'Scotiabank Saddledome');

insert into Venues
values ('345 Graham Avenue, Winnipeg, Manitoba R3C 5S6', 'Bell MTS Place');

insert into Venues
values ('50 Carlton St, Toronto, ON M5B 1J2', 'Air Canada Centre');

insert into Teams
values ('Canucks', 'Vancouver', '800 Griffiths Way, Vancouver, BC V6B 6G1');

insert into Teams
values ('Oilers', 'Edmonton', '300 – 10214 104 Ave NW, Edmonton, AB T5J 0H6');

insert into Teams
values ('Flames', 'Calgary', '555 Saddledome Rise SE, Calgary, AB T2G2W1');

insert into Teams
values ('Jets', 'Winnipeg', '345 Graham Avenue, Winnipeg, Manitoba R3C 5S6');

insert into Teams
values ('Maple Leafs', 'Toronto', '50 Carlton St, Toronto, ON M5B 1J2');

insert into TeamStats
values ('800 Griffiths Way, Vancouver, BC V6B 6G1', '23', '2');

insert into TeamStats
values ('300 – 10214 104 Ave NW, Edmonton, AB T5J 0H6', '14','11');

insert into TeamStats
values ('555 Saddledome Rise SE, Calgary, AB T2G2W1', '16', '10');

insert into TeamStats
values ('345 Graham Avenue, Winnipeg, Manitoba R3C 5S6', '5', '19');

insert into TeamStats
values ('50 Carlton St, Toronto, ON M5B 1J2', '7', '17');

insert into Players
values ( '1', '8','Alex Ovechkin','5','20','16','10', '50000', '2018-01-01', '2019-01-01',
'Flames', 'Calgary');

insert into Players
values ('2', '3', 'Johnny Gaudreau', '10', '6', '8', '14', '40000', '2017-01-01', '2019-01-01',
'Flames', 'Calgary');

insert into Players
values ('3', '6', 'Sean Monahan', '6', '4', '7', '5', '50000', '2018-06-01', '2020-01-01',
'Flames', 'Calgary');

insert into Players
values ('4', '5', 'Matthew Tkachuk', '4','8', '9', '12', '30000', '2017-04-01',
'2019-01-01', 'Flames', 'Calgary');

insert into Players
values ('5', '2', 'Dougie Hamilton', '15', '6', '3', '8', '45000', '2016-04-01',
'2019-01-01', 'Flames', 'Calgary');

insert into Players
values ('6', '22', 'Henrik Sedin', '20', '5', '23', '0', '50000', '2017-01-01',
'2019-01-01', 'Canucks', 'Vancouver');

insert into Players
values ('7', '34', 'Brock Boeser', '32', '5', '12', '17', '43000', '2016-01-01',
'2019-01-01', 'Canucks', 'Vancouver');

insert into Players
values ('8', '27', 'Daniel Sedin', '21',	'28',	'49',	'19', '60000', '2015-08-01',
'2019-01-01', 'Canucks', 'Vancouver');

insert into Players
values ('9', '67', 'Henrik Sedin', '3',	'42',	'45',	'19', '56000', '2017-09-01',
'2019-01-01', 'Canucks', 'Vancouver');

insert into Players
values ('10', '45', 'Bo Horvat', '20', '20', '40',	'4', '47000', '2016-05-01',
'2019-01-01', 'Canucks', 'Vancouver');

insert into Players
values ('11', '97', 'Connor McDavid', '14', '14', '14', '11',  '60000', '2018-01-01',
'2020-01-01',  'Oilers', 'Edmonton');

insert into Players
values ('12', '56', 'Dustin Byfuglien', '36',	'58',	'94',	'22', '62000', '2016-04-01',
'2019-01-01',  'Oilers', 'Edmonton');

insert into Players
values ('13', '45', 'Leon Draisaitl', '23',	'43',	'66',	'5', '56000', '2016-01-01',
'2019-01-01', 'Oilers', 'Edmonton');

insert into Players
values ('14', '37', 'Ryan Nugent Hopkins', '21',	'21',	'42',	'6', '45000', '2017-03-01',
'2019-01-01', 'Oilers', 'Edmonton');

insert into Players
values ('15', '68', 'Milan Lucic', '10',	'24', 	'34',	'11', '64000', '2016-02-01',
'2019-01-01', 'Oilers', 'Edmonton');

insert into Players
values ('16', '46', 'Wayne Gretzky', '2', '2', '5', '15', '40000', '2016-01-01',
'2019-01-01',  'Maple Leafs', 'Toronto');

insert into Players
values ('17', '39', 'Mitchell Marner', '20',	'43',	'63',	'5', '47000', '2015-05-01',
'2019-01-01', 'Maple Leafs', 'Toronto');

insert into Players
values ('18', '84', 'William Nylander',  '16',	'37',	'53',	'19', '38000', '2015-02-01',
'2019-01-01', 'Maple Leafs', 'Toronto');

insert into Players
values ('19', '48', 'James van Riemsdyk', '34',	'17', '51', '1', '32000', '2015-04-01',
'2019-01-10', 'Maple Leafs', 'Toronto');

insert into Players
values ('20', '78', ' Auston Matthews', '29',	'22',	'51',	'24', '61000', '2016-05-01',
'2019-01-01', 'Maple Leafs', 'Toronto');

insert into Players
values ('21', '81', 'Blake Wheeler', '19',	'62',	'81',	'6',  '67000', '2015-03-01',
'2019-01-01',  'Jets', 'Winnipeg');

insert into Players
values ('22', '45', 'Patrik Laine', '43',	'25',	'68',	'9', '55000', '2017-06-01',
'2019-01-01', 'Jets', 'Winnipeg');

insert into Players
values ('23', '77', 'Nikolaj Ehlers', '27',	'28',	'55',	'13', '53000', '2016-08-01',
'2019-01-01', 'Jets', 'Winnipeg');

insert into Players
values ('24', '56', 'Mark Scheifele', '21',	'32',	'53',	'12', '62000', '2016-01-01',
'2019-01-01', 'Jets', 'Winnipeg');

insert into Players
values ('25', '48', 'Kyle Connor', '27',	'19',	'46',	'1', '53000', '2015-09-01',
'2019-01-01', 'Jets', 'Winnipeg');

insert into Coaches
values ('Travis Green', '5', '10000', '2018-01-01', '2019-01-01', 'Canucks', 'Vancouver');

insert into Coaches
values ( 'Todd McLellan', '4', '10000', '2017-01-01', '2020-01-01', 'Oilers', 'Edmonton');

insert into Coaches
values ('Glen Gulutzan', '3', '10000', '2018-01-01', '2019-01-01', 'Flames', 'Calgary');

insert into Coaches
values ( 'Paul Maurice', '2', '20000', '2016-01-01', '2018-01-01', 'Jets', 'Winnipeg');

insert into Coaches
values ('Mike Babcock', '1', '30000', '2017-01-01', '2022-01-01', 'Maple Leafs', 'Toronto');

insert into Managers
values ('Jim Benning', '5', '10000', '2018-01-01', '2019-01-01', 'Canucks', 'Vancouver');

insert into Managers
values ('Peter Chiarelli', '4', '10000', '2017-01-01', '2020-01-01', 'Oilers', 'Edmonton');

insert into Managers
values ('Brad Treliving', '3', '10000', '2018-01-01', '2019-01-01', 'Flames', 'Calgary');

insert into Managers
values ('Kevin Cheveldayoff', '2', '20000', '2016-01-01', '2018-01-01', 'Jets', 'Winnipeg'):

insert into Managers
values ( 'Lou Lamoriello', '1', '30000',  '2017-01-01', '2022-01-01', 'Maple Leafs', 'Toronto');

insert into HomeTeamAddresses
values ( 'Canucks', '800 Griffiths Way, Vancouver, BC V6B 6G1');

insert into HomeTeamAddresses
values ('Oilers', '300 – 10214 104 Ave NW, Edmonton, AB T5J 0H6');

insert into HomeTeamAddresses
values ( 'Flames', '555 Saddledome Rise SE, Calgary, AB T2G2W1');

insert into HomeTeamAddresses
values ('Jets',  '345 Graham Avenue, Winnipeg, Manitoba R3C 5S6');

insert into HomeTeamAddresses
values ('Maple Leafs', '50 Carlton St, Toronto, ON M5B 1J2');
