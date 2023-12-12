CREATE TABLE Users (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(255),
    lastname VARCHAR(255),
    password VARCHAR(255),
    email VARCHAR(255),
    role VARCHAR(255),
    created_at DATETIME
);

CREATE TABLE Contacts (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    firstname VARCHAR(255),
    lastname VARCHAR(255),
    email VARCHAR(255),
    telephone VARCHAR(255),
    company VARCHAR(255),
    type VARCHAR(255),
    assigned_to INTEGER,
    created_by INTEGER,
    created_at DATETIME,
    updated_at DATETIME,
    FOREIGN KEY (assigned_to) REFERENCES Users(id),
    FOREIGN KEY (created_by) REFERENCES Users(id)
);

CREATE TABLE Notes (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    contact_id INTEGER,
    comment TEXT,
    created_by INTEGER,
    created_at DATETIME,
    FOREIGN KEY (contact_id) REFERENCES Contacts(id),
    FOREIGN KEY (created_by) REFERENCES Users(id)
);

INSERT INTO `contacts` (`id`, `title`, `firstname`, `lastname`, `email`, `telephone`, `company`, `type`, `assigned_to`, `created_by`, `created_at`, `updated_at`) VALUES (NULL, 'Mr.', 'Daney', 'Brown', 'Db@gmail.com', '3333333333', 'Company 2', 'SUPPORT', '1', '1', '2023-12-10 23:44:27', '2023-12-10 23:44:27');
INSERT INTO `users` (`id`, `firstname`, `lastname`, `password`, `email`, `role`, `created_at`) VALUES (NULL, 'calvin', 'stephenson', 'password123', 'calvin@gmail.com', 'Admin', '2023-12-10 23:40:41');
INSERT INTO `contacts` (`id`, `title`, `firstname`, `lastname`, `email`, `telephone`, `company`, `type`, `assigned_to`, `created_by`, `created_at`, `updated_at`) VALUES (NULL, 'Ms.', 'Fran', 'Moreland', 'fran@icould.com', '9123453345', 'Prat and Associates', 'SUPPORT', '1', '1', '2023-12-04 23:47:09', '2023-12-04 23:47:09');
-- INSERT INTO Users (firstname, lastname, password, email, role, created_at) 
-- VALUES ('Admin', 'User', 'hashed_password123', 'admin@project2.com', 'admin', NOW());

-- CREATE USER 'dolphin_crm_user'@'localhost' IDENTIFIED VIA mysql_native_password USING '***';
-- GRANT ALL PRIVILEGES ON *.* TO 'dolphin_crm_user'@'localhost' REQUIRE NONE WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;GRANT ALL PRIVILEGES ON `dolphin\_crm`.* TO 'dolphin_crm_user'@'localhost';