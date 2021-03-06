truncate table `machines`;
delete from fos_user;
update architectures set machinesnum = 0;
update cities set usernum = 0;
update classes set machinesnum = 0;
update countries set machinesnum = 0;
update cpus set machinesnum = 0;
update distributions set machinesnum = 0;
update kernels set machinesnum = 0;
update purposes set machinesnum = 0;
ALTER TABLE `fos_user` AUTO_INCREMENT=0;
ALTER TABLE `mail` AUTO_INCREMENT=0;
ALTER TABLE `privacy` AUTO_INCREMENT=0;
ALTER TABLE `user_profile` AUTO_INCREMENT=0;





DROP TABLE IF EXISTS `dublicates1`;
CREATE TABLE `dublicates1` (
	`f_key` INT(11) NULL DEFAULT NULL,
	`email` VARCHAR(255) NULL DEFAULT NULL,
	`state` INT(11) NULL DEFAULT NULL
)
ENGINE=InnoDB;

DROP TABLE IF EXISTS `dublicates2`;
CREATE TABLE `dublicates2` (
	`f_key` INT(11) NULL DEFAULT NULL
)
ENGINE=InnoDB;

insert into dublicates1 SELECT users.f_key, users.email, users.state
FROM users
INNER JOIN (
  SELECT email
  FROM users
  GROUP BY email
  HAVING count(email) > 1
) dupes ON users.email = dupes.email
ORDER BY users.email, users.f_key DESC;

insert into dublicates2 (SELECT f_key
  FROM users
  GROUP BY email
  HAVING count(email) > 1
  order by email
);

select d.*, m.f_key from dublicates1 d
left join machines m on (
m.owner = d.f_key
);

delete from persons where f_key in (SELECT f_key FROM dublicates2);
delete from machines where owner in (SELECT f_key FROM dublicates2);
delete from users where f_key in (SELECT f_key FROM dublicates2);
