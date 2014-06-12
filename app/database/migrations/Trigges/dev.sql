/********************* INSERT ******************/

CREATE TRIGGER `dev_ai` AFTER INSERT ON `dev` FOR EACH ROW
BEGIN

DECLARE dev_desc VARCHAR(256);

SELECT GROUP_CONCAT(" ",dev.name)
INTO dev_desc
FROM dev_m2n_group
INNER JOIN dev ON dev_m2n_group.dev_id = dev.id
WHERE dev_m2n_group.group_id = NEW.id
ORDER BY dev.id;

UPDATE dev_group
SET dev_group.desc = dev_desc
WHERE dev_group.id=NEW.id;

END;


/********************* UPDATE ******************/


CREATE TRIGGER `dev_au` AFTER UPDATE ON `dev` FOR EACH ROW
BEGIN

DECLARE dev_desc VARCHAR(256);

SELECT GROUP_CONCAT(" ",dev.name)
INTO dev_desc
FROM dev_m2n_group
INNER JOIN dev ON dev_m2n_group.dev_id = dev.id
WHERE dev_m2n_group.group_id = NEW.id
ORDER BY dev.id;

UPDATE dev_group
SET dev_group.desc = dev_desc
WHERE dev_group.id=NEW.id;

END;
