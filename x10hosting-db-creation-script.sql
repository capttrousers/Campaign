
USE skipduck_campaign;
CREATE TABLE mail 
(
	registered          ENUM('Yes', 'No')         NOT NULL,
    voter_id            INT          PRIMARY KEY     AUTO_INCREMENT,
    first_name          VARCHAR(25)  NOT NULL,
    middle_names        VARCHAR(25),
    last_name           VARCHAR(25)  NOT NULL,
    loc_street          VARCHAR(25),
    loc_city            VARCHAR(25),
    loc_state           CHAR(2),
    loc_zip             INT(9),
    email               VARCHAR(50),
    phone               VARCHAR(16),
    birthday            DATE
);

CREATE TABLE donations
(
    voter_id            INT         NOT NULL,
    donation_id         INT         PRIMARY KEY      AUTO_INCREMENT,
    donation_date       DATE        NOT NULL,
    donation_amount     DECIMAL(9,2)         NOT NULL,
    payment_type        ENUM('CASH', 'CHECK', 'VISA', 'MC', 'AMEX', 'DISC', 'PAYPAL')    NOT NULL,
    messages_notes      VARCHAR(100),
    CONSTRAINT donator
     FOREIGN KEY (voter_id) REFERENCES mail (voter_id) 
);

CREATE TABLE staff 
(
    staff_id            INT         PRIMARY KEY     AUTO_INCREMENT,
    first_name          VARCHAR(25) NOT NULL,
    middle_names        VARCHAR(25),
    last_name           VARCHAR(25) NOT NULL,
    loc_street          VARCHAR(25),
    loc_city            VARCHAR(25),
    loc_state           CHAR(2),
    loc_zip             INT(9),
    email               VARCHAR(100) NOT NULL,    
    phone               VARCHAR(16) NOT NULL,
    birthday            DATE,
    login               VARCHAR(20) NOT NULL,
    pw                  VARCHAR(60) NOT NULL,
);
