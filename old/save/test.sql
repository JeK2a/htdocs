IF (0=0)
THEN


SET @price_list := "spb";
SET @user_id := NEW.`last_price_corrector_id`;
SET @product_id := OLD.`productID`;
IF (NEW.`Price` != OLD.`Price`)
THEN
SET @price_type := "Price";
SET @price_old := OLD.`Price`;
SET @price_new := NEW.`Price`;
SET @price_formula := NEW.`price_p`;
insert into tdf_asyst.a_my_price_changes
(`date`,`product_id`,`price_type`, `price_formula`, `price_old`,`price_new`,`price_list`,`user_id`)
values
(NOW(),@product_id,@price_type,@price_formula,@price_old,@price_new,@price_list,@user_id);
END IF;


IF (NEW.`Price1` != OLD.`Price1`)
THEN
SET @price_type := "Price1";
SET @price_old := OLD.`Price1`;
SET @price_new := NEW.`Price1`;
SET @price_formula := NEW.`price1_p`;
insert into tdf_asyst.a_my_price_changes
(`date`,`product_id`,`price_type`,`price_formula`,`price_old`,`price_new`,`price_list`,`user_id`)
values
(NOW(),@product_id,@price_type,@price_formula,@price_old,@price_new,@price_list,@user_id);
END IF;


IF (NEW.`Price2` != OLD.`Price2`)
THEN
SET @price_type := "Price2";
SET @price_old := OLD.`Price2`;
SET @price_new := NEW.`Price2`;
SET @price_formula := NEW.`price2_p`;
insert into tdf_asyst.a_my_price_changes
(`date`,`product_id`,`price_type`,`price_formula`,`price_old`,`price_new`,`price_list`,`user_id`)
values
(NOW(),@product_id,@price_type,@price_formula,@price_old,@price_new,@price_list,@user_id);
SET NEW.is_new_price_tag = 1;
END IF;


IF (NEW.`Price3` != OLD.`Price3`)
THEN
SET @price_type := "Price3";
SET @price_old := OLD.`Price3`;
SET @price_new := NEW.`Price3`;
SET @price_formula := NEW.`price3_p`;
insert into tdf_asyst.a_my_price_changes
(`date`,`product_id`,`price_type`,`price_formula`,`price_old`,`price_new`,`price_list`,`user_id`)
values
(NOW(),@product_id,@price_type,@price_formula,@price_old,@price_new,@price_list,@user_id);
END IF;

IF (NEW.`Price4` != OLD.`Price4`)
THEN
SET @price_type := "Price4";
SET @price_old := OLD.`Price4`;
SET @price_new := NEW.`Price4`;
SET @price_formula := NEW.`price4_p`;
insert into tdf_asyst.a_my_price_changes
(`date`,`product_id`,`price_type`,`price_formula`,`price_old`,`price_new`,`price_list`,`user_id`)
values
(NOW(),@product_id,@price_type,@price_formula,@price_old,@price_new,@price_list,@user_id);
END IF;

IF (NEW.`Price5` != OLD.`Price5`)
THEN
SET @price_type := "Price5";
SET @price_old := OLD.`Price5`;
SET @price_new := NEW.`Price5`;
SET @price_formula := NEW.`price5_p`;
insert into tdf_asyst.a_my_price_changes
(`date`,`product_id`,`price_type`, `price_formula`, `price_old`,`price_new`,`price_list`,`user_id`)
values
(NOW(),@product_id,@price_type,@price_formula,@price_old,@price_new,@price_list,@user_id);
END IF;

IF (NEW.`Price6` != OLD.`Price6`)
THEN
SET @price_type := "Price6";
SET @price_old := OLD.`Price6`;
SET @price_new := NEW.`Price6`;
SET @price_formula := NEW.`price6_p`;
INSERT INTO tdf_asyst.a_my_price_changes
(`date`,`product_id`,`price_type`,`price_formula`,`price_old`,`price_new`,`price_list`,`user_id`)
values
(NOW(),@product_id,@price_type,@price_formula,@price_old,@price_new,@price_list,@user_id);
END IF;

IF((NEW.`discount` > 99) OR (NEW.`discount` < 0))
THEN
SET NEW.`discount` = 0;
END IF;

IF NEW.`discount` <> OLD.`discount` THEN
	INSERT INTO `tdf_products_logs`
    	(`id_log_field`,
         `productID`,
         `old_value`,
         `new_value`,
         `user_id`,
		 `region`)
        VALUES (6,
                NEW.`productID`,
                OLD.`discount`,
                NEW.`discount`,
                NEW.`last_price_corrector_id`,
                'spb');
END IF;

END IF


IF (0=0)
THEN

SET @sp_completion_date = NEW.sp_completion_date;
SET @sp_disabled = NEW.sp_disabled;
SET @sp_is_payed = NEW.sp_is_payed;
SET @sp_is_unloaded = NEW.sp_is_unloaded;
SET @result_week = WEEK(DATE_ADD(NEW.sp_completion_date, INTERVAL 9 DAY));
SET @result_year = YEAR(DATE_ADD(NEW.sp_completion_date, INTERVAL 9 DAY));
SET @gain = (NEW.`total_gain` - NEW.`total_expense`);

UPDATE


SELECT *
FROM
INNER JOIN a_my_invoices as inv
ON NEW.id = inv. AND NEW.year = inv.year AND inv.type = 1


FROM a_my_invoices as inv
WHERE NEW.id = inv. AND NEW.year = inv.year AND inv.type = 2




// a_1c_requests_head

IF (0=0)
THEN

SET @sp_completion_date = NEW.sp_completion_date;
SET @sp_disabled = NEW.sp_disabled;
SET @sp_is_payed = NEW.sp_is_payed;
SET @sp_is_unloaded = NEW.sp_is_unloaded;
SET @result_week = WEEK(DATE_ADD(NEW.sp_completion_date, INTERVAL 9 DAY));
SET @result_year = YEAR(DATE_ADD(NEW.sp_completion_date, INTERVAL 9 DAY));
SET @gain = (NEW.`total_gain` - NEW.`total_expense`);

UPDATE a_my_invoices AS inv
SET payment_date = @sp_completion_date,
    fact_payment_date = @sp_completion_date,
    disabled = @sp_disabled,
    payed = @sp_is_payed,
    unloaded = @sp_is_unloaded,
    result_week = @result_week,
    result_year = @result_year,
    gain = @gain
WHERE
  NEW.id = inv.id AND
  NEW.year = YEAR(inv.date) AND
  inv.type = 1;

END IF;


// a_1c_sales_head

IF (0=0)
THEN

SET @sp_completion_date = NEW.sp_completion_date;
SET @sp_disabled = NEW.sp_disabled;
SET @sp_is_payed = NEW.sp_is_payed;
SET @sp_is_unloaded = NEW.sp_is_unloaded;
SET @result_week = WEEK(DATE_ADD(NEW.sp_completion_date, INTERVAL 9 DAY));
SET @result_year = YEAR(DATE_ADD(NEW.sp_completion_date, INTERVAL 9 DAY));
SET @gain = (NEW.`total_gain` - NEW.`total_expense`);

UPDATE a_my_invoices AS inv
SET payment_date = @sp_completion_date,
    fact_payment_date = @sp_completion_date,
    disabled = @sp_disabled,
    payed = @sp_is_payed,
    unloaded = @sp_is_unloaded,
    result_week = @result_week,
    result_year = @result_year,
    gain = @gain
WHERE
  NEW.id = inv.id AND
  NEW.year = YEAR(inv.date) AND
  inv.type = 2;

END IF;






SELECT *
FROM a_1c_requests_head AS req
INNER JOIN a_my_invoices as inv
ON req.id = inv.id AND
   req.year = YEAR(inv.date) AND
   inv.type = 1


SELECT *
FROM a_1c_sales_head AS req
INNER JOIN a_my_invoices as inv
ON req.id = inv.id AND
   req.year = YEAR(inv.date) AND
   inv.type = 2










UPDATE SC_products_price_nsib AS nsib
SET enabled = 0
WHERE in_stock < 1

UPDATE SC_products_price_kazan AS kazan
SET enabled = 0
WHERE in_stock < 1



SELECT MIN()
(
  (sales
    SELECT
      r_ex.client_id,
 	    MIN(r_ex.date) AS date
    FROM a_ex_requests_head as r_ex
    INNER JOIN a_ex_requests_head AS r_1c_earliest
      ON r_ex.client_id = r_1c_earliest.client_id
  ) AS TMP
INNER JOIN a_ex_requests_head AS 1c_req
  ON TMP.client_id = 1c_req.client_id AND
     TMP.date > 1c_req.date
)
GROUP BY










SELECT
    	earliest_sales.client_id,
        earliest_sales.date as first_sale,
    	MIN(date(s_1c.`date`)) as second_sale
    FROM
    (
    	SELECT
    		s_ex.client_id,
    		MIN(date(s_1c_temp.date)) as `date`
		FROM `a_ex_requests_head_b` AS s_ex
		INNER JOIN `a_ex_requests_head_b` AS s_1c_temp
 		ON s_1c_temp.client_id = s_ex.client_id
    	WHERE s_ex.update = 1
        GROUP BY
            s_ex.client_id
    ) AS earliest_sales
    LEFT JOIN `a_ex_requests_head_b` AS s_1c
    ON
    	s_1c.client_id = earliest_sales.client_id AND
    	date(s_1c.date) > earliest_sales.date
    GROUP BY
    	s_1c.client_id





SELECT
    earliest_requests.client_id,
    MIN(date(s_1c.`date`)) as second_requests
FROM
(
 SELECT
 s_ex.client_id,
 MIN(date(s_1c_temp.date)) as `date`
 FROM (
  SELECT
   DISTINCT client_id
  FROM `a_ex_requests_head_b`
  WHERE
   `update` = 1
 ) as s_ex
 INNER JOIN `a_ex_requests_head_b` AS s_1c_temp




SELECT
     earliest_sales.client_id,
    MIN(date(s_1c.`date`)) as second_sale
FROM
(
 SELECT
 s_ex.client_id,
 MIN(date(s_1c_temp.date)) as `date`
 FROM (
  SELECT
   DISTINCT client_id
  FROM `a_ex_requests_head_b`
  WHERE
   `update` = 1
 ) as s_ex
 INNER JOIN `a_ex_requests_head_b` AS s_1c_temp
 ON s_1c_temp.client_id = s_ex.client_id
 GROUP BY
  s_ex.client_id
) AS earliest_sales
LEFT JOIN `a_ex_requests_head_b` AS s_1c
ON
 s_1c.client_id = earliest_sales.client_id AND
 date(s_1c.date) > earliest_sales.date
GROUP BY
 s_1c.client_id




SELECT
    earliest_requests.client_id,
    MIN(date(s_1c.`date`)) as second_requests
FROM
(
 SELECT
 s_ex.client_id,
 MIN(date(s_1c_temp.date)) as `date`
 FROM (
  SELECT
   DISTINCT client_id
  FROM `a_ex_requests_head_b`
  WHERE
   `update` = 1
 ) as s_ex
 INNER JOIN `a_ex_requests_head_b` AS s_1c_temp
 ON s_1c_temp.client_id = s_ex.client_id
 GROUP BY
  s_ex.client_id
) AS earliest_requests
LEFT JOIN `a_ex_requests_head_b` AS s_1c
ON
 s_1c.client_id = earliest_requests.client_id AND
 date(s_1c.date) > earliest_requests.date
GROUP BY
 s_1c.client_id











