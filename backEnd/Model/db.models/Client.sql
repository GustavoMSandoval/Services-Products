CREATE table Clients (
    client_id varchar(36) NOT NULL DEFAULT(UUID()),
    client_image varchar(255) not null,
    client_name varchar(255) not null,
    client_email varchar(255) not null UNIQUE,
    client_password varchar(255) not null,
    client_phoneNumber varchar(11) not null,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (client_id)
);