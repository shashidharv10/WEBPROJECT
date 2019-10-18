USE nursery;

/*INSERT INTO department VALUES("01","Admin");
INSERT INTO department VALUES("02","Sales");
INSERT INTO department VALUES("03","Gardening");

INSERT INTO employee VALUES("01","Mohan Raj",9035487859,"13,Avenue Road",15000,"01","helloworld");
INSERT INTO employee VALUES("02","Mahesh Bhat",998074049,"20,Cunningham Road",10000,"02","helloworld");
INSERT INTO employee VALUES("03","Saroja Devi",968689028,"55,Wilson Garden",15000,"01","helloworld");
INSERT INTO employee VALUES("04","Sara Williams",776019826,"47,Sarjapur Road",10000,"02","helloworld");
INSERT INTO employee VALUES("05","Govinda Patel",988022850,"62,JP Nagar",10000,"02","helloworld");
INSERT INTO employee VALUES("06","Venkatesh Gopal",990151119,"78,Electronic City",8000,"03","helloworld");

INSERT INTO customer VALUES("01","Jayanth Reddy",906647849,"16,Richmond Road","02");
INSERT INTO customer VALUES("02","Ananth Rai",888074059,"24,M.G Road","04");
INSERT INTO customer VALUES("03","Lakshmi Shaw",976789125,"67,Church Street","05");
INSERT INTO customer VALUES("04","Monika Desai",776546676,"54,Banashankari","02");
INSERT INTO customer VALUES("05","Narayan Rao",982314860,"32,Kalyan Nagar","04");
INSERT INTO customer VALUES("06","Ajay Nair",740871219,"11,Rajaji Nagar","04");*/

INSERT INTO plant VALUES ("101","Rose","Rosa","Pink",'2018-10-01',30,"Sapling",250,'pinkrose.jpg');
INSERT INTO plant VALUES ("102","Rose","Rosa","Red",'2018-10-15',50,"Sapling",250,'redrose.jpg');
INSERT INTO plant VALUES ("103","Rose","Rosa","White",'2018-10-15',40,"Sapling",250,'whiterose.jpg');
INSERT INTO plant VALUES ("201","Bougainvillea","Glabra","Pink",'2018-09-25',30,"Plant",250,'pinkbgn.jpg');
INSERT INTO plant VALUES ("202","Bougainvillea","Glabra","Purple",'2018-09-25',30,"Plant",250,'purplebgn.jpg');
INSERT INTO plant VALUES ("301","Hibisucs","Rosa-Sinensis","Crimson",'2018-10-25',25,"Sapling",250,'crimsonhib.jpg');
INSERT INTO plant VALUES ("302","Hibisucs","Rosa-Sinensis","Orange",'2018-10-25',35,"Sapling",250,'orangehib.jpg');
INSERT INTO plant VALUES ("401","Jasmine","Jasminum","White",'2018-9-25',100,"Plant",250,'whitejam.jpg');
INSERT INTO plant VALUES ("501","Daffodil","Narcissus","White",'2018-9-25',100,"Plant",250,'whitedaff.jpg');
INSERT INTO plant VALUES ("502","Daffodil","Narcissus","Yellow",'2018-8-25',100,"Plant",250,'yellowdaff.jpg');
INSERT INTO plant VALUES ("601","Lily","Lilium","White",'2018-10-04',55,"Plant",250,'whitelily.jpg');


/*delimiter //
CREATE procedure UpdInventory(IN ItemID VARCHAR(5),IN addedQty INT)
BEGIN
UPDATE plant SET Qty = Qty + addedQty where PID = ItemID ;
END; //
delimiter ;

delimiter // 
CREATE procedure SubInventoryP(IN ItemId VARCHAR(5),IN removedQty INT)
BEGIN
UPDATE plant SET Qty = Qty - removedQty where PID = ItemId ;
END; //
delimiter ;*/
