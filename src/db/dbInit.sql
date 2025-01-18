FLUSH PRIVILEGES;
CREATE USER IF NOT EXISTS 'admin'@'%' IDENTIFIED BY 'admin';
GRANT SELECT, INSERT, DELETE, UPDATE ON `tennis_db`.* TO 'admin'@'%';

CREATE TABLE `cart` (
  `idcustomer` int NOT NULL,
  `idproduct` int NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `category` (
  `idcategory` int NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `credit_card` (
  `idcreditcard` int NOT NULL,
  `number` varchar(50) NOT NULL,
  `expire` varchar(50) NOT NULL,
  `cvv` varchar(50) NOT NULL,
  `holder` varchar(50) NOT NULL,
  `idcustomer` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `customer` (
  `idcustomer` int NOT NULL,
  `seller` tinyint(1) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `customer_order` (
  `idorder` int NOT NULL,
  `idcustomer` int NOT NULL,
  `idpersonaldata` int NOT NULL,
  `idcreditcard` int NOT NULL,
  `idstatus` int NOT NULL,
  `date` varchar(50) NOT NULL,
  `totalprice` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `notification` (
  `idnotification` int NOT NULL,
  `date` date NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `title` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `idcustomer` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `personal_data` (
  `idpersonaldata` int NOT NULL,
  `country` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `cap` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `idcustomer` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `product` (
  `idproduct` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `price` int NOT NULL,
  `idcategory` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `review` (
  `idcustomer` int NOT NULL,
  `idproduct` int NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `rating` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `status` (
  `idstatus` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `cart`
  ADD PRIMARY KEY (`idcustomer`,`idproduct`),
  ADD KEY `idproduct_cart` (`idproduct`);

ALTER TABLE `category`
  ADD PRIMARY KEY (`idcategory`);

ALTER TABLE `credit_card`
  ADD PRIMARY KEY (`idcreditcard`),
  ADD UNIQUE KEY `number_cc` (`number`),
  ADD KEY `idcustomer_cc` (`idcustomer`);

ALTER TABLE `customer`
  ADD PRIMARY KEY (`idcustomer`);

ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`idorder`),
  ADD KEY `idcustomer_o` (`idcustomer`),
  ADD KEY `idpersonaldata_o` (`idpersonaldata`),
  ADD KEY `idcreditcard_o` (`idcreditcard`),
  ADD KEY `idstatus_o` (`idstatus`);

ALTER TABLE `notification`
  ADD PRIMARY KEY (`idnotification`),
  ADD KEY `idcustomer` (`idcustomer`);

ALTER TABLE `personal_data`
  ADD PRIMARY KEY (`idpersonaldata`),
  ADD UNIQUE KEY `idcustomer_pd` (`idcustomer`) USING BTREE;

ALTER TABLE `product`
  ADD PRIMARY KEY (`idproduct`),
  ADD KEY `idcategory` (`idcategory`);

ALTER TABLE `review`
  ADD PRIMARY KEY (`idcustomer`,`idproduct`),
  ADD KEY `idproduct_rw` (`idproduct`);

ALTER TABLE `status`
  ADD PRIMARY KEY (`idstatus`);


ALTER TABLE `category`
  MODIFY `idcategory` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `credit_card`
  MODIFY `idcreditcard` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `customer`
  MODIFY `idcustomer` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `customer_order`
  MODIFY `idorder` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `notification`
  MODIFY `idnotification` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `personal_data`
  MODIFY `idpersonaldata` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `product`
  MODIFY `idproduct` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `status`
  MODIFY `idstatus` int NOT NULL AUTO_INCREMENT;


ALTER TABLE `cart`
  ADD CONSTRAINT `idcustomer_cart` FOREIGN KEY (`idcustomer`) REFERENCES `customer` (`idcustomer`),
  ADD CONSTRAINT `idproduct_cart` FOREIGN KEY (`idproduct`) REFERENCES `product` (`idproduct`);

ALTER TABLE `credit_card`
  ADD CONSTRAINT `idcustomer_cc` FOREIGN KEY (`idcustomer`) REFERENCES `customer` (`idcustomer`);

ALTER TABLE `customer_order`
  ADD CONSTRAINT `idcreditcard_o` FOREIGN KEY (`idcreditcard`) REFERENCES `credit_card` (`idcreditcard`),
  ADD CONSTRAINT `idcustomer_o` FOREIGN KEY (`idcustomer`) REFERENCES `customer` (`idcustomer`),
  ADD CONSTRAINT `idpersonaldata_o` FOREIGN KEY (`idpersonaldata`) REFERENCES `personal_data` (`idpersonaldata`),
  ADD CONSTRAINT `idstatus_o` FOREIGN KEY (`idstatus`) REFERENCES `status` (`idstatus`);

ALTER TABLE `notification`
  ADD CONSTRAINT `idcustomer` FOREIGN KEY (`idcustomer`) REFERENCES `customer` (`idcustomer`);

ALTER TABLE `personal_data`
  ADD CONSTRAINT `idcustomer_pd` FOREIGN KEY (`idcustomer`) REFERENCES `customer` (`idcustomer`);

ALTER TABLE `product`
  ADD CONSTRAINT `idcategory` FOREIGN KEY (`idcategory`) REFERENCES `category` (`idcategory`);

ALTER TABLE `review`
  ADD CONSTRAINT `idcustomer_rw` FOREIGN KEY (`idcustomer`) REFERENCES `customer` (`idcustomer`),
  ADD CONSTRAINT `idproduct_rw` FOREIGN KEY (`idproduct`) REFERENCES `product` (`idproduct`);
COMMIT;