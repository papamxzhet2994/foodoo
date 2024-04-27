create table foodoo.dishes
(
    id                  bigint unsigned auto_increment
        primary key,
    image               varchar(255)    null,
    name                varchar(255)    not null,
    weight              varchar(255)    null,
    description         text            null,
    price               decimal(8, 2)   not null,
    restaurant_id       bigint unsigned not null,
    restaurant_category bigint unsigned not null,
    created_at          timestamp       null,
    updated_at          timestamp       null,
    constraint dishes_restaurant_category_foreign
        foreign key (restaurant_category) references foodoo.restaurant_categories (id)
            on delete cascade,
    constraint dishes_restaurant_id_foreign
        foreign key (restaurant_id) references foodoo.restaurants (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;

