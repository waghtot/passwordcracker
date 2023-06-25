USE `INTENTLY`;
DROP procedure IF EXISTS `getUserId`;

USE `INTENTLY`;
DROP procedure IF EXISTS `INTENTLY`.`getUserId`;
;

DELIMITER $$
USE `INTENTLY`$$
CREATE DEFINER=`mysql_user`@`%` PROCEDURE `getUserId`(
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
from INTENTLY.not_so_smart_users
where `password` = inPassword;

if UID != 0
	then
		select 
			6000 as 'code',
            'Success' as 'message',
            UID;
	else
		select
			'6002' as 'code',
           'User not found' as 'message';
end if;
	
    
END$$

DELIMITER ;
;

