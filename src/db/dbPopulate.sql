INSERT INTO `category` (`idcategory`, `name`) VALUES
(1, 'Racchette'),
(2, 'Palline'),
(3, 'Abbigliamento'),
(4, 'Scarpe'),
(5, 'Accessori'),
(6, 'Borse da tennis');

INSERT INTO `product` (`idproduct`, `name`, `description`, `price`, `idcategory`) VALUES

(null, 'Wilson Pro Staff', 'Racchetta professionale', 250, 1),
(null, 'Babolat Pure Drive', 'Racchetta per potenza', 220, 1),
(null, 'Head Radical MP', 'Racchetta versatile', 210, 1),

(null, 'Wilson US Open', 'Palline ufficiali US Open', 10, 2),
(null, 'Babolat Gold', 'Palline per superfici dure', 8, 2),
(null, 'Head Tour', 'Palline da competizione', 9, 2),

(null, 'Nike Court Polo', 'Polo traspirante', 60, 3),
(null, 'Adidas Match Skirt', 'Gonna da tennis', 50, 3),
(null, 'Lacoste Tennis Shorts', 'Shorts eleganti', 70, 3),

(null, 'Nike Air Zoom Vapor', 'Scarpe leggere e veloci', 140, 4),
(null, 'Adidas Barricade', 'Scarpe resistenti', 130, 4),
(null, 'Asics Gel Resolution', 'Scarpe per supporto', 120, 4),

(null, 'Polsini Nike', 'Polsini assorbenti', 15, 5),
(null, 'Babolat Overgrip', 'Grip per racchette', 12, 5),
(null, 'Cappellino Adidas', 'Cappellino per sole', 25, 5),

(null, 'Wilson Super Tour', 'Borsa capiente per 12 racchette', 150, 6),
(null, 'Babolat Pure Aero Bag', 'Borsa leggera e resistente', 130, 6),
(null, 'Head Djokovic Bag', 'Borsa ufficiale di Djokovic', 170, 6);

INSERT INTO `customer` (`idcustomer`, `seller`, `email`, `password`, `name`, `surname`) VALUES
(1, 1, 'admin@email', 'aaa', 'Admin', 'Admin'),
(2, 0, 'nicola@email', 'aaa', 'Nicola', 'Graziotin'),
(3, 0, 'fra@email', 'aaa', 'Francesco', 'Marcatelli'),
(4, 0, 'mattia@email', 'aaa', 'Mattia', 'Galli');

INSERT INTO `personal_data` (`idpersonaldata`, `country`, `state`, `city`, `address`, `cap`, `phone`, `idcustomer`) VALUES
(1, '', '', '', '', '', '', 1),
(2, 'Italia', 'Veneto', 'Vicenza', 'Via delle Rose 1', '36100', '1234567890', 2),
(3, 'Italia', 'Veneto', 'Vicenza', 'Via delle Rose 2', '36100', '1234567890', 3),
(4, 'Italia', 'Veneto', 'Vicenza', 'Via delle Rose 3', '36100', '1234567890', 4);