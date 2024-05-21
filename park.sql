create database park;
use park;
create table tickets (
	name			char(32)	character set utf8,
	kidEnter		int(3),
	adultEnter		int(3),
	kidBIG3			int(3),
	adultBIG3		int(3),
	kidFree			int(3),
	adultFree		int(3),
	kidYear 		int(3),
	adultYear		int(3),
	sum				int(10)
);

describe tickets;
