create table foodoo.users
(
    id                bigint unsigned auto_increment
        primary key,
    first_name        varchar(255)         not null,
    last_name         varchar(255)         not null,
    email             varchar(255)         not null,
    email_verified_at timestamp            null,
    password          varchar(255)         not null,
    is_admin          tinyint(1) default 0 not null,
    remember_token    varchar(100)         null,
    created_at        timestamp            null,
    updated_at        timestamp            null,
    constraint users_email_unique
        unique (email)
)
    collate = utf8mb4_unicode_ci;

