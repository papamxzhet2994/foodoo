create table foodoo.promotions
(
    id          bigint unsigned auto_increment
        primary key,
    name        varchar(255)         not null,
    description varchar(255)         not null,
    image       varchar(255)         not null,
    promocode   varchar(255)         not null,
    discount    int                  not null,
    start_date  date                 not null,
    end_date    date                 not null,
    is_active   tinyint(1) default 1 not null,
    shop_id     bigint unsigned      not null,
    created_at  timestamp            null,
    updated_at  timestamp            null,
    constraint promotions_shop_id_foreign
        foreign key (shop_id) references foodoo.shops (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

