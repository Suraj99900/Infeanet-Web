CREATE TABLE app_user (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id VARCHAR(255) NOT NULL UNIQUE,
    staff_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    phone VARCHAR(15) UNIQUE,
    password VARCHAR(255) NOT NULL,
    user_type INT(11) NOT NULL,                     -- 1=Admin, 2=Student

    class_id BIGINT UNSIGNED NULL,                  -- MUST match student_semester.id

    added_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status INT(1) DEFAULT 1,
    deleted INT(1) DEFAULT 0,

    CONSTRAINT fk_class FOREIGN KEY (class_id)
        REFERENCES student_semester(id)
        ON DELETE SET NULL
        ON UPDATE CASCADE
);


-- genrate client ---
CREATE TABLE client_code (
    client_id VARCHAR(255) UNIQUE,
    client_key VARCHAR(255) UNIQUE,
    client_name VARCHAR(255)
);

-- insert client value
insert into client_code (client_id,client_key,client_name) value("99900","6306e34f4877c2ea7e5d3c09f64d732241dba09afb2cffce295479c75d0b2b49","suraj jaiswal");
