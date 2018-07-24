SELECT name
FROM category
WHERE
  NOT id IN (SELECT parent_category_id
             FROM category);