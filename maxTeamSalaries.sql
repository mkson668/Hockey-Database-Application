SELECT max(teamSalary) 
FROM	
	(SELECT avg(salary) as teamSalary
	FROM Players 
	GROUP BY teamName);

