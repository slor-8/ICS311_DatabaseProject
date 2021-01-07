create database HmongClothes;
use HmongClothes;

DROP TABLE IF EXISTS designerComp;
DROP TABLE IF EXISTS seller;
DROP TABLE IF EXISTS product;
DROP TABLE IF EXISTS sells;
DROP TABLE IF EXISTS category;
DROP TABLE IF EXISTS review;

-- designer/comp table --
CREATE TABLE designerComp (
	d_id int,
    d_loc varchar(50),
    d_name varchar(50),
    primary key (d_id)
);

-- input data to table designer --
INSERT INTO designerComp VALUES (1001, 'Bangkok, Thailand', 'Super Sewing');
INSERT INTO designerComp VALUES (1002, 'Hanoi, Vietnam', 'Shining Jewels');
INSERT INTO designerComp VALUES (1003, 'Chiang Mai, Thailand', 'Traditional Cloths');
INSERT INTO designerComp VALUES (1004, 'Phuket, Thailand', 'Phuket Hmong');
INSERT INTO designerComp VALUES (1005, 'Bangkok, Thailand', 'PY Company');
INSERT INTO designerComp VALUES (1006, 'Bangkok, Thailand', 'BH Company');
INSERT INTO designerComp VALUES (1007, 'Phuket, Thailand', 'Sunny Clothes');
INSERT INTO designerComp VALUES (1008, 'Chiang Mai, Thailand', 'Hmong Thai Company');
INSERT INTO designerComp VALUES (1009, 'Hanoi, Vietnam', 'Mai Designs');
INSERT INTO designerComp VALUES (1010, 'Hanoi, Vietnam', 'Beautiful Hmong');
INSERT INTO designerComp VALUES (1011, 'Bangkok, Thailand', 'Rose Designs');
INSERT INTO designerComp VALUES (1012, 'Phuket, Thailand', 'Lily Clothes Company');

-- seller table --
CREATE TABLE seller (
	s_id int,
    s_fname varchar(10),
    s_lname varchar(10),
    s_site varchar(50),
    d_id int,
    primary key (s_id),
    foreign key (d_id) references designerComp(d_id)
);

-- input data to table seller --
INSERT INTO seller VALUES (1, 'Mary', 'Vang', 'facebook.com/profile1000098', 1012);
INSERT INTO seller VALUES (2, 'Susan', 'Vang', 'facebook.com/profile1000003', 1011);
INSERT INTO seller VALUES (3, 'Pa', 'Lee', 'facebook.com/profile1000056', 1003);
INSERT INTO seller VALUES (4, 'Houa', 'Vue', 'facebook.com/profile1000723', 1002);
INSERT INTO seller VALUES (5, 'Stacy', 'Xiong', 'facebook.com/profile1005994', 1001);
INSERT INTO seller VALUES (6, 'Candice', 'Yang', 'facebook.com/profile1000382', 1012);
INSERT INTO seller VALUES (7, 'Jasmin', 'Lee', 'facebook.com/profile1008356', 1008);
INSERT INTO seller VALUES (8, 'Peter', 'Chang', 'facebook.com/profile1009304', 1010);
INSERT INTO seller VALUES (9, 'Fong', 'Yang', 'facebook.com/profile1000033', 1003);
INSERT INTO seller VALUES (10, 'May', 'Vue', 'facebook.com/profile1000812', 1005);
INSERT INTO seller VALUES (11, 'Tou', 'Xiong', 'facebook.com/profile1000009', 1012);
INSERT INTO seller VALUES (12, 'Jerry', 'Chang', 'facebook.com/profile1000251', 1007);

-- category table --
CREATE TABLE category (
	cat_id int,
    cat_style varchar(20),
    cat_color varchar(10),
    cat_sew_technique varchar(20),
    cat_set varchar(30),
    cat_size varchar(20),
    primary key (cat_id)
);

-- input data to table category --
INSERT INTO category VALUES (2001, "Hmong Green", "green", "Machine Sewn", "set with 2022", "35 inches");
INSERT INTO category VALUES (2002, "Hmong Suav", "white", "Hand Sewn", "set with 2040", "Medium");
INSERT INTO category VALUES (2003, "Hmong White", "white", "Hand Sewn", "seperate", "Large");
INSERT INTO category VALUES (2004, "Traditional", "silver", "Hand Made", "seperate", "25 inches");
INSERT INTO category VALUES (2005, "Hmong Suav", "multicolor", "Hand Sewn", "seperate", "Medium");
INSERT INTO category VALUES (2006, "Hmong Stripe", "purple", "Machine Sewn", "set with 2010", "36 inches");
INSERT INTO category VALUES (2007, "Birds & Flowers", "red", "Hand Sewn", "seperate", "Medium");
INSERT INTO category VALUES (2008, "Hmong Suav", "silver", "Machine Made", "seperate", "regular");
INSERT INTO category VALUES (2009, "Birds", "silver", "Hand Made", "seperate", "regular");
INSERT INTO category VALUES (2010, "Hmong Stripe", "purple", "Machine Sewn", "set with 2006", "32 inches");
INSERT INTO category VALUES (2011, "Hmong Suav", "pink", "Hand Sewn", "seperate", "Medium");
INSERT INTO category VALUES (2012, "Hearts", "silver", "Hand Made", "seperate", "20 inches");

-- product table --
CREATE TABLE product (
	prod_code int,
    prod_price float,
    prod_type varchar(20),
    d_id int,
    cat_id int,
    primary key (prod_code),
    foreign key (d_id) references designerComp (d_id),
    foreign key (cat_id) references category (cat_id)
);

-- input data to table product --
INSERT INTO product VALUES (11001, 30.95, "skirt", 1002, 2003);
INSERT INTO product VALUES (11002, 40.99, "shirt", 1001, 2005);
INSERT INTO product VALUES (11003, 80.95, "necklace", 1011 , 2012);
INSERT INTO product VALUES (11004, 10.64, "earrings", 1007, 2009);
INSERT INTO product VALUES (11005, 25.95, "skirt", 1012, 2001);
INSERT INTO product VALUES (11006, 25.95, "skirt", 1012, 2001);
INSERT INTO product VALUES (11007, 15.18, "belt", 1008, 2010);
INSERT INTO product VALUES (11008, 60.48, "necklace", 1011, 2004);
INSERT INTO product VALUES (11009, 13.58, "earrings", 1010, 2008);
INSERT INTO product VALUES (11010, 10.22, "hat", 1005, 2006);
INSERT INTO product VALUES (11011, 8.95, "undershirt", 1001, 2007);
INSERT INTO product VALUES (11012, 14.85, "belt", 1003, 2002);

-- sells table --
CREATE TABLE sells (
	s_id int,
    prod_code int,
    primary key (s_id, prod_code),
    foreign key (s_id) references seller (s_id),
    foreign key (prod_code) references product (prod_code)
);

-- input data to table sells --
INSERT INTO sells VALUES (4, 11001);
INSERT INTO sells VALUES (5, 11002);
INSERT INTO sells VALUES (2, 11003);
INSERT INTO sells VALUES (12, 11004);
INSERT INTO sells VALUES (6, 11005);
INSERT INTO sells VALUES (11, 11006);
INSERT INTO sells VALUES (7, 11007);
INSERT INTO sells VALUES (2, 11008);
INSERT INTO sells VALUES (8, 11009);
INSERT INTO sells VALUES (10, 11010);
INSERT INTO sells VALUES (5, 11011);
INSERT INTO sells VALUES (9, 11012);

-- review table --
CREATE TABLE review (
	rev_code int,
    rev_name varchar(20),
    rev_rate float,
    s_id int,
    prod_code int,
    primary key (rev_code),
    foreign key (s_id) references seller (s_id),
    foreign key (prod_code) references product (prod_code)
);

-- input data to table review --
INSERT INTO review VALUES (21001, "Camy", 4.5, 5, 11002);
INSERT INTO review VALUES (21002, "Koua", 3.0, 2, 11003);
INSERT INTO review VALUES (21003, "Carrie", 4.5, 7, 11007);
INSERT INTO review VALUES (21004, "Sammy", 2.5, 11, 11006);
INSERT INTO review VALUES (21005, "Pahoua", 2.0, 12, 11004);
INSERT INTO review VALUES (21006, "Katrina", 5.0, 4, 11001);
INSERT INTO review VALUES (21007, "Doua", 4.0, 10, 11010);
INSERT INTO review VALUES (21008, "Kazee", 3.5, 6, 11005);
INSERT INTO review VALUES (21009, "Naomi", 1.0, 4, 11001);
INSERT INTO review VALUES (21010, "Lori", 2.5, 8, 11009);
INSERT INTO review VALUES (21011, "Lee", 4.5, 9, 11012);
INSERT INTO review VALUES (21012, "Yangmi", 3.5, 10, 11010);
