CREATE TABLE `login_info` (
    `Admin_ID` int(255) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `Fname` varchar(70),
    `Username` varchar(32) UNIQUE,
    `Password` varchar(64)
);

INSERT INTO `login_info` VALUES ('1', 'Test Admin', 'admin', '1234');