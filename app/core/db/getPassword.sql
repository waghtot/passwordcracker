USE `INTENTLY`;
DROP procedure IF EXISTS `getPassword`;

USE `INTENTLY`;
DROP procedure IF EXISTS `INTENTLY`.`getPassword`;
;

DELIMITER $$
USE `INTENTLY`$$
CREATE DEFINER=`mysql_user`@`%` PROCEDURE `getPassword`(
IN inPassword varchar(255)
)
proc: BEGIN
declare UID int default 0;
if inPassword is null or length(inPassword) = 0
	then
		select
			'6001' as 'code',
           'can not be empty' as 'message';
		leave proc;
end if;
select
	user_id into UID
from not_so_smart_users
where `password` = inPassword;

if UID != 0
	then
		select 
			6000 as 'code',
            UID as 'message';
	else
		select
			'6002' as 'code',
           'User not found' as 'message';
end if;

	
END$$

DELIMITER ;
;

