create table foodoo.shops
(
    id          bigint unsigned auto_increment
        primary key,
    name        varchar(255) not null,
    rating      varchar(255) not null,
    image       varchar(255) not null,
    description varchar(255) not null,
    type        varchar(255) not null,
    created_at  timestamp    null,
    updated_at  timestamp    null
)
    collate = utf8mb4_unicode_ci;

