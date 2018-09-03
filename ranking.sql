##Obtiene el ranking de todos los usuarios
SELECT id, name, score, @curRank := @curRank + 1 AS rank
FROM users u,
     (SELECT @curRank := 0) r
ORDER BY score DESC;

##Obtiene el ranking de un usuario especifico
SELECT id, name, score, rank
FROM (SELECT id, name, score, @curRank := @curRank + 1 AS rank
      FROM users u,
           (SELECT @curRank := 0) r
      ORDER BY score DESC) ranking
WHERE id = 8;