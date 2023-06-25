USE `INTENTLY`;
DROP procedure IF EXISTS `checkStatus`;

USE `INTENTLY`;
DROP procedure IF EXISTS `INTENTLY`.`checkStatus`;
;

DELIMITER $$
USE `INTENTLY`$$
CREATE DEFINER=`mysql_user`@`%` PROCEDURE `checkStatus`(
IN inCase INT
)
proc: BEGIN

if inCase is null or length(inCase) = 0
	then
		select
			'6001' as 'code',
           'can not be empty' as 'message';
		leave proc;
end if;

select 
	'6000' as 'code',
    'Success' as 'message',
	count(*) as 'done'
from INTENTLY.checked_user_password
where `case` = inCase
and `status` = 1;
	
    
END$$

DELIMITER ;
;

