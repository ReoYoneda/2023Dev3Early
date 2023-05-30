UPDATE evaluation SET
    evaluation_trp =
        CASE evaluation_id
            WHEN 1 THEN                  10
            WHEN 2 THEN             3949827
            WHEN 3 THEN         56180000000
            WHEN 4 THEN      12098765011947
            WHEN 5 THEN 2450000000000000000
        END,
    evaluation_receivednum =
        CASE evaluation_id
            WHEN 1 THEN  10
            WHEN 2 THEN  20
            WHEN 3 THEN  30
            WHEN 4 THEN  40
            WHEN 5 THEN  50
        END,
    evaluation_receivedvalue = 
        CASE evaluation_id
            WHEN 1 THEN  30
            WHEN 2 THEN  70
            WHEN 3 THEN 110
            WHEN 4 THEN 150
            WHEN 5 THEN 200
        END,
    evaluation_sentnum = 
        CASE evaluation_id
            WHEN 1 THEN  10
            WHEN 2 THEN  20
            WHEN 3 THEN  30
            WHEN 4 THEN  40
            WHEN 5 THEN  50
        END,
    evaluation_sentvalue = 
        CASE evaluation_id
            WHEN 1 THEN  50
            WHEN 2 THEN  90
            WHEN 3 THEN 130
            WHEN 4 THEN 160
            WHEN 5 THEN 180
        END
    WHERE evaluation_id BETWEEN 1 AND 5;