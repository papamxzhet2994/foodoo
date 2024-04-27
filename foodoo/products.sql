create table foodoo.products
(
    id          bigint unsigned auto_increment
        primary key,
    image       varchar(255)    null,
    name        varchar(255)    not null,
    weight      varchar(255)    null,
    description text            null,
    price       decimal(8, 2)   not null,
    shop_id     bigint unsigned not null,
    category_id bigint unsigned not null,
    created_at  timestamp       null,
    updated_at  timestamp       null,
    constraint products_category_id_foreign
        foreign key (category_id) references foodoo.categories (id)
            on delete cascade,
    constraint products_shop_id_foreign
        foreign key (shop_id) references foodoo.shops (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

