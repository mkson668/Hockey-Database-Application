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
