/*create db name as ucam*/ 
CREATE TABLE students (
  id int(11) PRIMARY KEY NOT NULL,
  sid tinytext NOT NULL,
  sname varchar(255) NOT NULL,
  dept varchar(255) NOT NULL,
  gender tinyint(1) NOT NULL,
  email tinytext NOT NULL,
  pwd longtext NOT NULL
)