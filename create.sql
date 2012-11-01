create table Game
(
	id integer PRIMARY KEY,
	homeTeamId integer,
	awayTeamId integer,
	startTime varchar(100),
	endTime varchar(100)
);

create table Play
(
	id integer PRIMARY KEY,
	gameId integer,
	quarter integer,
	clock varchar(100),
	description text
);

create table Player
(
	name varchar(100) PRIMARY KEY,
	teamId integer,
	number integer,
	position varchar(10),
	weight integer,
	year varchar(10),
	background text
);

create table Position
(
	name varchar(100) PRIMARY KEY,
	abbreviation varchar(10),
	description text
);

create table Team
(
	id integer PRIMARY KEY,
	name varchar(100)
);

create table Term
(
	id integer PRIMARY KEY,
	name varchar(100),
	type varchar(100),
	description text
);

