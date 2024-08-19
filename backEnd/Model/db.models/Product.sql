CREATE table Products (
    product_id varchar(36) NOT NULL DEFAULT(UUID()),
    client_product_id(36) FOREIGN KEY REFERENCES client_id(client_product_idproduct_id),
    product_image varchar(255) not null,
    product_name varchar(255) not null,
    product_description varchar(255) not null,
    product_price float(6) not null,
    product_dt_announcement TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(product_id)
);