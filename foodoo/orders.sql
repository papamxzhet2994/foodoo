create table foodoo.orders
(
    id         bigint unsigned auto_increment
        primary key,
    user_id    bigint unsigned not null,
    name       varchar(255)    not null,
    email      varchar(255)    not null,
    address    varchar(255)    not null,
    phone      varchar(255)    not null,
    created_at timestamp       null,
    updated_at timestamp       null
)
    collate = utf8mb4_unicode_ci;

