USE skipduck_campaign;

INSERT INTO mail VALUES 
	('Yes', DEFAULT, 'Sam', NULL, 'Osborn', NULL, 'NYC', 'NY', 10111, 'testing@test.com', 8009995555, '1984-03-08'),
    ('No', DEFAULT, 'Fernanda', NULL, 'Hennessey', NULL, 'Washington', 'DC', 20456, 'notareal@emailtest.test', 5551234567, '1990-12-10'),
    ('Yes', DEFAULT, 'William', NULL, 'Hennessey', NULL, 'NYC', 'NY', 10200, 'testagain@test.again', 9229884321, '1985-05-29'),
    ('Yes', DEFAULT, 'Hilary', NULL, 'Osborn', NULL, 'Brooklyn', 'NY', 14302, 'hilarytest@email.test', 8605555555, '1988-08-17');
    
/*      updated staff table - needs new data insert script
INSERT INTO staff VALUES 
	(DEFAULT, 1),
    (DEFAULT, 4);
*/

INSERT INTO donations VALUES
	(4, DEFAULT, CURRENT_DATE(), 100, 'VISA', NULL),
    (1,	DEFAULT, CURRENT_DATE(), 20, 'CASH', NULL),
    (1, DEFAULT, '2015-01-01', 50, 'CASH', NULL),
    (3, DEFAULT, '2014-12-15', 1000, 'PAYPAL', NULL),
    (1, DEFAULT, '2014-10-01', 100, 'VISA', NULL);


