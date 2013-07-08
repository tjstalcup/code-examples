CREATE TABLE employee_info (
  id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(64),
    email1 VARCHAR(128),
    email2 VARCHAR(128),
    password VARCHAR(32),
    company_name VARCHAR(128),
    company_phone VARCHAR(20),
    company_address VARCHAR(255),
    job_title VARCHAR(255),
    salary VARCHAR(25),
    permission_level VARCHAR(32),
    is_permission_level_active TINYINT(1) not null DEFAULT 0,
    start_date VARCHAR(11)
);