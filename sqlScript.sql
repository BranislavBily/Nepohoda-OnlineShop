
CREATE TABLE Users (
	id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    user_type VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL
);

CREATE TABLE Products (
	id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name_of_product VARCHAR(100) NOT NULL UNIQUE,
    product_type VARCHAR(100) NOT NULL,
    category VARCHAR(100) NOT NULL,
    cost DECIMAL(10, 2) NOT NULL
);

INSERT INTO Users (id, username, email, user_type, password) VALUES (11,'Branislav','branislav.bily@gmail.com','admin','63a9f0ea7bb98050796b649e85481845'),
																	(42,'HitAndQuit','placeAndErase@gmail.com','user','77eefcb7836f3280a3dc89e99bacd6f0'),
																	(44,'Groot','imgroot@gmail.com','admin','84e11c11731848d144cb8496fe0f9b46'),
                                                                    (45,'Fero','ferobero@gmail.com','user','6462ba8a7ab6bbbd32fef9d7c4a19e2f'),
                                                                    (46,'hacker12','hackujemPrePeniaze@azet.sk','user','3e3868b8fe67d3a1d1656f43fb3d236d'),
                                                                    (47,'CrackujemVoVolnomCase','PMCracks@azet.sk','user','0ff0a8c7ef23f97394684db437776b9b');
                                                                    
INSERT INTO Products(id, name_of_product,product_type,category, cost) VALUES (16,'ASUS ROG STRIX X470-I GAMING','hardware','Mother Board',190.00), 
																			  (17,'Xiaomi Redmi 4X LTE 32 GB Gold','hardware','Smartphone',139.00),
                                                                              (18,'Xiaomi Redmi Note 4 LTE 32 GB Black','hardware','Smartphone',154.00),
                                                                              (19,'ASUS Zenfone Zoom S Black','hardware','Smartphone',213.00),
                                                                              (20,'HUAWEI P20 Lite Midnight Black','hardware','Smartphone',358.00),
                                                                              (21,'HUAWEI Y7 Prime (2018) Blue','hardware','Smartphone',188.00),
                                                                              (22,'ASUS ZenBook Flip UX360UAK-DQ417T Black Metal','hardware','Ultrabook',779.00),
                                                                              (23,'65 Samsung UE65MU6172','hardware','Television',869.00),
                                                                              (24,'Samsung 860 EVO 250 GB','hardware','SSD',81.00),
                                                                              (25,'24 Samsung C24F390FHU','hardware','Monitor',150.00),
                                                                              (26,'ASUS ROG STRIX GL503VM-FY014T Black Metal','hardware','Notebook',1359.00),
                                                                              (27,'iPhone X 256 GB Space Grey','hardware','Smartphone',1319.00),
                                                                              (28,'iPhone 8 64 GB Crimson Red','hardware','Smartphone',799.00),
                                                                              (29,'iPhone 7 32 GB Black','hardware','Smartphone',599.00),
                                                                              (30,'Samsung Galaxy S8 Black','hardware','Smartphone',698.00),
                                                                              (31,'iPhone 8 Plus 64 GB Red','hardware','Smartphone',909.00),
                                                                              (32,'Apple AirPods','hardware','Headphones',194.00),
                                                                              (33,'Deus Ex: Mankind Divided Collectors Edition - Xbox One','software','Game',50.00),
                                                                              (34,'Titanfall 2 - Xbox One DIGITAL','software','Game',22.00),
                                                                              (35,'FIFA 16 - PS4','software','Game',11.00),
                                                                              (36,'Call Of Duty: Advanced Warfare - PS4','software','Game',20.00),
                                                                              (37,'Microsoft Office 2016 Home and Business SK','software','Office pack',249.00),
                                                                              (38,'Microsoft Office 2016 Home and Student SK','software','Office pack',153.00),
                                                                              (39,'Microsoft Office 2016 Home and Student','software','Office pack',153.00),
                                                                              (40,'Microsoft Office 365 Business','software','Office pack',135.00),
                                                                              (41,'Microsoft Office 2016 Home and Business','software','Office pack',249.00),
                                                                              (42,'NVIDIA SHIELD TV (2017)','hardware','Gaming Console',232.00),
                                                                              (43,'HP NVIDIA Graphics PLUS Quadro P5000 16 GB','hardware','Graphics Card',2139.00),
                                                                              (44,'HP NVIDIA GeForce GT 730 2 GB','hardware','Graphics Card',75.00),
                                                                              (45,'MSI GeForce GTX 1070 Ti GAMING 8G','hardware','Graphics Card',563.00),
                                                                              (46,'ASUS CERBERUS GeForce GTX 1050TI O4G','hardware','Graphics Card',190.00),
                                                                              (47,'GIGABYTE GeForce GTX 1070 G1 Gaming','hardware','Graphics Card',507.00),
                                                                              (48,'MSI GeForce GTX 1060 GAMING X 6G','hardware','Graphics Card',384.00),
                                                                              (49,'SAPPHIRE PULSE Radeon RX 580 OC 8G','hardware','Graphics Card',364.00),
                                                                              (50,'SAPPHIRE PULSE Radeon RX Vega 56 8G HBM2','hardware','Graphics Card',686.00),
                                                                              (51,'SAPPHIRE NITRO+ Radeon RX 580 OC 8G','hardware','Graphics Card',374.00),
                                                                              (52,'SAPPHIRE NITRO+ Radeon RX Vega 64 8 G HBM2','hardware','Graphics Card',713.00),
                                                                              (53,'Intel Core i7-8700K','hardware','CPU',368.00),
                                                                              (54,'Intel Core i5-8400','hardware','CPU',194.00),
                                                                              (55,'Intel Core i5-8600K','hardware','CPU',255.00),
                                                                              (56,'Intel Core i7-8700','hardware','CPU',328.00),
                                                                              (57,'Xbox One X','hardware','Gaming Console',489.00),
                                                                              (58,'Xbox One Wireless Controller Combat Tech','hardware','Gaming Controller',57.00),
                                                                              (60,'Sony PS4 Dualshock 4 V2 - Magma Red','hardware','Gaming Controller',53.00),
                                                                              (61,'Kingston SO-DIMM 8 GB DDR4 2400 MHz CL17','hardware','RAM',81.00),
                                                                              (62,'HyperX 16GB KIT DDR4 3200MHz CL16 Predator Series','hardware','RAM',228.00),
                                                                              (63,'Kingston SO-DIMM 8GB DDR3L 1600MHz CL11 Dual Voltage','hardware','RAM',66.00),
                                                                              (64,'HyperX 8GB KIT DDR4 2133MHz CL14 Fury Black Series','hardware','RAM',97.00),
                                                                              (65,'Samsung 860 EVO 500 GB','hardware','SSD disc',123.00),
                                                                              (67,'WD Blue 1TB','hardware','HDD disc',42.00),
                                                                              (68,'PS4 - 500 GB Slim','hardware','Gaming Console',271.00),
                                                                              (69,'AMD RYZEN 7 2700X','hardware','CPU',336.00),
                                                                              (70,'AMD RYZEN 5 2600X','hardware','CPU',223.00),
                                                                              (71,'AMD Ryzen 3 2200G','hardware','CPU',103.00),
                                                                              (72,'AMD Ryzen 5 2400G','hardware','CPU',155.00);

SELECT * FROM Products;
SELECT * FROM Users;



