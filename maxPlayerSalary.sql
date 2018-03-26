SELECT name
FROM Players
WHERE salary = (SELECT max(salary) from Players);
