# Copyright (c) Zarema Khalilova, 2015
#
# Licensed under The MIT License
# MIT License (http://www.opensource.org/licenses/mit-license.php)

CREATE TABLE  tenants (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  domain varchar(255) NOT NULL,
  client_name varchar(45) NOT NULL
  PRIMARY KEY (id),
  UNIQUE KEY Domain (domain)
);