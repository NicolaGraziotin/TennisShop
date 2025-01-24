INSERT INTO `category` (`idcategory`, `name`) VALUES
(1, 'Racchette'),
(2, 'Palline'),
(3, 'Abbigliamento'),
(4, 'Scarpe'),
(5, 'Accessori'),
(6, 'Borse da tennis');

INSERT INTO `product` (`idproduct`, `name`, `description`, `price`, `idcategory`, `stock`, `image`) VALUES

(null, 'Wilson Pro Staff', 'Racchetta professionale', 250, 1, 10, 'assets/products/wilsonprostaff.webp'),
(null, 'Babolat Pure Drive', 'Racchetta per potenza', 220, 1, 10, 'assets/products/babolatpuredrive.webp'),
(null, 'Head Radical MP', 'Racchetta versatile', 210, 1, 10, 'assets/products/headradical.webp'),

(null, 'Wilson US Open', 'Palline ufficiali US Open', 10, 2, 10, 'assets/products/wilsonball.webp'),
(null, 'Babolat Gold', 'Palline per superfici dure', 8, 2, 10, 'assets/products/babolatball.webp'),
(null, 'Head Tour', 'Palline da competizione', 9, 2, 10, 'assets/products/headball.webp'),

(null, 'Nike Court Polo', 'Polo traspirante', 60, 3, 10, 'assets/products/nikepolo.webp'),
(null, 'Adidas Match Skirt', 'Gonna da tennis', 50, 3, 10, 'assets/products/adidasskirt.webp'),
(null, 'Lacoste Tennis Shorts', 'Shorts eleganti', 70, 3, 10, 'assets/products/lacosteshort.webp'),

(null, 'Nike Air Zoom Vapor', 'Scarpe leggere e veloci', 140, 4, 10, 'assets/products/nikezoom.webp'),
(null, 'Adidas Barricade', 'Scarpe resistenti', 130, 4, 10, 'assets/products/adidasbarricade.webp'),
(null, 'Asics Gel Resolution', 'Scarpe per supporto', 120, 4, 10, 'assets/products/asicsgel.webp'),

(null, 'Polsini Nike', 'Polsini assorbenti', 15, 5, 10, 'assets/products/polsininike.webp'),
(null, 'Babolat Overgrip', 'Grip per racchette', 12, 5, 10, 'assets/products/babolatovergrip.webp'),
(null, 'Cappellino Adidas', 'Cappellino per sole', 25, 5, 10, 'assets/products/adidascap.webp'),

(null, 'Wilson Super Tour', 'Borsa capiente per 12 racchette', 150, 6, 10, 'assets/products/wilsonbag.webp'),
(null, 'Babolat Pure Aero Bag', 'Borsa leggera e resistente', 130, 6, 10, 'assets/products/babolatbag.webp'),
(null, 'Head Djokovic Bag', 'Borsa ufficiale di Djokovic', 170, 6, 10, 'assets/products/headbag.webp');

/*passwords: admin, nicola, fra, matti*/
INSERT INTO `customer` (`idcustomer`, `seller`, `email`, `password`, `name`, `surname`) VALUES
(1, 1, 'admin@email', '$2y$10$lVS0qggIoxy4GnDf5NgfROMmF6NKu8uw4L/RcCW3.6Vm1lrbiG2k6', 'Admin', 'Admin'),
(2, 0, 'nicola@email', '$2y$10$rZQF9GR6n.Gt54XdV.MFF.Fc10CaFcp72Tgu0CAK3TAsj35nDcX6y', 'Nicola', 'Graziotin'),
(3, 0, 'fra@email', '$2y$10$AIHb5HwZZ/GuBNd3TcFMN.abGHIlBGiJtpHrBtqdAUXdY9KzeSlbq', 'Francesco', 'Marcatelli'),
(4, 0, 'mattia@email', '$2y$10$r695aTRwikXy7gltQmUT6e1QL9eOnvarljCKVSpIQUtFeKIkj6AJq', 'Mattia', 'Galli'); 

INSERT INTO `personal_data` (`idpersonaldata`, `country`, `state`, `city`, `address`, `cap`, `phone`, `idcustomer`) VALUES
(1, '', '', '', '', '', '', 1),
(2, 'Italia', 'Veneto', 'Vicenza', 'Via delle Rose 1', '36100', '1234567890', 2),
(3, 'Italia', 'Veneto', 'Vicenza', 'Via delle Rose 2', '36100', '1234567890', 3),
(4, 'Italia', 'Veneto', 'Vicenza', 'Via delle Rose 3', '36100', '1234567890', 4);

INSERT INTO `status` (`idstatus`,`name`,`description`) VALUES 
(1, 'Approvato', 'ordine approvato in fase di elaborazione'),
(2, 'Spedito', 'ordine spedito dal magazzino'),
(3, 'In consegna', 'ordine in consegna presso il destinatario'),
(4, 'Consegnato', 'ordine consegnato al destinatario con successo');

INSERT INTO `shipping` (`idshipping`,`name`,`fee`,`active`) VALUES 
(1, 'DHL', 5, True),
(2, 'UPS', 10, False),
(3, 'BRT', 7, False);