USE nursery;

CREATE TABLE department (DID varchar(5) PRIMARY KEY,Dname char(10));

CREATE TABLE employee (EID varchar(5) PRIMARY KEY,Name char(20),Phno int,Address varchar(20),Salary int,DID varchar(5),passwd varchar(20),CONSTRAINT DID FOREIGN KEY(DID) REFERENCES department(DID) ON DELETE CASCADE ON UPDATE CASCADE);

CREATE TABLE customer (CID varchar(5) PRIMARY KEY,Name char(20),Phno int,Address varchar(20),EID varchar(5),CONSTRAINT EID FOREIGN KEY(EID) REFERENCES employee(EID) ON DELETE CASCADE ON UPDATE CASCADE);

CREATE TABLE plant (PID varchar(5) PRIMARY KEY,Name char(20),ScName char(30),Colour char(10),Dateofsowing date,Cost int,Stage char(10),Qty int,Image text);

CREATE TABLE transaction (TID varchar(5),CID varchar(5), PID varchar(5),Dateoftrans timestamp,Qty int,Amount int,PRIMARY KEY (TID,CID,PID), CONSTRAINT CID FOREIGN KEY(CID) REFERENCES customer(CID) ON UPDATE CASCADE ON DELETE CASCADE, CONSTRAINT PID FOREIGN KEY(PID) REFERENCES plant(PID) ON UPDATE CASCADE ON DELETE CASCADE);

delimiter $$
 CREATE TRIGGER foo_bar11 BEFORE UPDATE ON plant
     FOR EACH ROW
     BEGIN
     IF NEW.Cost < 0 THEN
     SET NEW.Cost = 30;
     END IF;
     END;$$
delimiter ;

delimiter $$
 CREATE TRIGGER foo_bar22 BEFORE INSERT ON plant
     FOR EACH ROW
     BEGIN
     IF NEW.Cost < 0 THEN
     SET NEW.Cost = 30;
     END IF;
     END;$$
delimiter ;
