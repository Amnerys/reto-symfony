/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  Monica
 * Created: 13-feb-2022
 */

CREATE DATABASE IF NOT EXISTS symfony_reto;
USE symfony_reto;

CREATE TABLE IF NOT EXISTS suppliers(
id      int(255) auto_increment not null,
name    varchar (100),
email    varchar (255),
phone    varchar (255),
type    varchar (255),
active    varchar(10),
created_at  datetime,
last_updated    datetime,
CONSTRAINT pk_suppliers PRIMARY KEY(id)
) ENGINE=InnoDb;

INSERT INTO suppliers VALUES (NULL,'NH','nh@hotels.es','977252525','hotel','si',CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
INSERT INTO suppliers VALUES (NULL,'Hotel Lauria','lauria@hotels.es','977101010','complemento','no',CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
INSERT INTO suppliers VALUES (NULL,'Vallnord Pal-Arinsal','vpa@esqui.es','930123456','pista','si',CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

