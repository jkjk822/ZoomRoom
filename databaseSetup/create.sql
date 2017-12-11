drop table if exists Event;
drop table if exists UserDepartment;
drop table if exists User;
drop table if exists Room;
drop trigger if exists setEmailDefault;


create table Room (
        roomID varchar(30) PRIMARY KEY COMMENT '"as (concat(building, number))" possible in mysql 5.7',
        building varchar(30) NOT NULL,
        number varchar(30) NOT NULL,
        description varchar(1000),
        type ENUM('Office', 'Classroom', 'Open')
        );
create table User (
        netID varchar(30) PRIMARY KEY,
        firstName varchar(255) NOT NULL,
        lastName varchar(255) NOT NULL,
        email varchar(255) UNIQUE,
        password varchar(255) NOT NULL,
        phone varchar(15),
        office varchar(30),
		FOREIGN KEY(office) REFERENCES Room(roomID) ON DELETE SET NULL
        );
create table UserDepartment (
        user varchar(30),
        department varchar(255),
        PRIMARY KEY(user, department),
		FOREIGN KEY(user) REFERENCES User(netID) ON DELETE CASCADE
        );
create table Event (
		eventID int PRIMARY KEY AUTO_INCREMENT,
		eventName varchar(255) NOT NULL,
		host varchar(30),
		location varchar(30),
		description varchar(4095),
		startTime datetime,
		endTime datetime,
		type ENUM('Class', 'Other') NOT NULL,
		FOREIGN KEY(host) REFERENCES User(netID) ON DELETE SET NULL,
		FOREIGN KEY(location) REFERENCES Room(roomID) ON DELETE SET NULL
		);


delimiter //
create trigger setEmailDefault
before insert on User
for each row
begin
    if new.email is NULL then
        set new.email = concat(new.netID, '@u.rochester.edu');
    end if;
end//
delimiter ;
