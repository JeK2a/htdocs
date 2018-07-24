SELECT name
FROM category
WHERE
  id IN (SELECT parent_category_id
         FROM category
         GROUP BY parent_category_id HAVING count(*) < 4);