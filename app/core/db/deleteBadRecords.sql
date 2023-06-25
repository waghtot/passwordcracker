USE `INTENTLY`;
DROP procedure IF EXISTS `deleteBadRecords`;

USE `INTENTLY`;
DROP procedure IF EXISTS `INTENTLY`.`deleteBadRecords`;
;

DELIMITER $$
USE `INTENTLY`$$
CREATE DEFINER=`mysql_user`@`%` PROCEDURE `deleteBadRecords`(
IN inCase INT
)
proc: BEGIN
SET SQL_SAFE_UPDATES = 0;
if inCase is null or length(inCase) = 0
	then
		select
			'6001' as 'code',
           'can not be empty' as 'message';
		leave proc;
end if;

delete from INTENTLY.checked_user_password where `case` = inCase and `status`= 0;

select 
	'6000' as 'code',
    'Success' as 'message';
	
    
END$$

DELIMITER ;
;

