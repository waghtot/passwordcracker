USE `INTENTLY`;
DROP procedure IF EXISTS `insertCheckedPassword`;

USE `INTENTLY`;
DROP procedure IF EXISTS `INTENTLY`.`insertCheckedPassword`;
;

DELIMITER $$
USE `INTENTLY`$$
CREATE DEFINER=`mysql_user`@`%` PROCEDURE `insertCheckedPassword`(
IN inPassword varchar(255),
IN inCase INT,
IN inStatus INT
)
proc: BEGIN
declare PID int default 0;
select id into PID from INTENTLY.checked_user_password where `password` = inPassword;
if PID != 0
	then
		select
			'6003' as 'code',
            'entry exists' as 'message';
            leave proc;
	else
		insert into INTENTLY.checked_user_password(`password`, `case`, `status`)
		values (inPassword, inCase, inStatus);
        
        select
			'6000' as 'code',
            'success' as 'message';
end if;


END$$

DELIMITER ;
;

