SELECT t.teamName, t.city
FROM Teams t
WHERE NOT EXISTS 
	((SELECT v.address
	FROM Venues v)
	MINUS
		(SELECT venueAddress 
		FROM teamsAndVenuesPlayed p
		WHERE t.teamName = p.teamName AND t.city = p.teamCity)); 
