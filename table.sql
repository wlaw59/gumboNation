CREATE TABLE user (
user_id VARCHAR(256) NOT NULL PRIMARY KEY,
email VARCHAR(256) NOT NULL,
password VARCHAR(64) NOT NULL,
address(300) Not NULL,
phone (20) Not NULL
);

Create Table payments (
user_id VARCHAR(256) NOT NULL FOREIGN KEY,
price DECIMAL(6,2) NOT NULL
billing_address VARCHAR(100) NOT NULL,
shipping_address VARCHAR(100) NOT NULL,
order_number VARCHAR(300) NOT NULL
);
