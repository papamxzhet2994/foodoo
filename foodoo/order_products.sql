create table foodoo.order_products
(
    id          bigint unsigned auto_increment
        primary key,
    user_id     bigint unsigned not null,
    order_id    bigint unsigned not null,
    product_id  bigint unsigned not null,
    name        varchar(255)    not null,
    price       decimal(10, 2)  not null,
    quantity    int             not null,
    total_price decimal(10, 2)  not null,
    created_at  timestamp       null,
    updated_at  timestamp       null,
    constraint order_products_order_id_foreign
        foreign key (order_id) references foodoo.orders (id)
            on delete cascade,
    constraint order_products_product_id_foreign
        foreign key (product_id) references foodoo.products (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

