CREATE TABLE ProductsInfo (
    product_id VARCHAR(36) NOT NULL DEFAULT (UUID()),
    client_product_id VARCHAR(36), 
    product_image VARCHAR(255) NOT NULL,
    product_name VARCHAR(255) NOT NULL,
    product_description VARCHAR(255) NOT NULL,
    product_price FLOAT NOT NULL,
    product_dt_announcement TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (product_id),
    FOREIGN KEY (client_product_id) REFERENCES clientsinfo(client_id)
);
