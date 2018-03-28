SELECT min(teamSalary)
FROM    
        (SELECT avg(salary) as teamSalary
        FROM Players 
        GROUP BY teamName);

