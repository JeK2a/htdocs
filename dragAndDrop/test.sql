SELECT
  users.`id`,
  users.`email`,
  emails.`email`,
  IF(users.`email` = emails.`email`,1,0) AS `like`
FROM `a_my_users` AS users
INNER JOIN `a_my_users_emails` AS emails
ON users.id = emails.user_id
ORDER BY `like`




UPDATE
  `a_my_users_emails`, `a_my_smtp_config`
SET
  `a_my_users_emails`.`host` = `a_my_smtp_config`.`host`,
  `a_my_users_emails`.`port` = `a_my_smtp_config`.`port`,
  `a_my_users_emails`.`login` = `a_my_smtp_config`.`login`,
  `a_my_users_emails`.`name_from` = `a_my_smtp_config`.`name_from`,
  `a_my_users_emails`.`charset` = `a_my_smtp_config`.`charset`,
  `a_my_users_emails`.`secure` = `a_my_smtp_config`.`secure`
WHERE
  a_my_users_emails.`email` = a_my_smtp_config.`email`;