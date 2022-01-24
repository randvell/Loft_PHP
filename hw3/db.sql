create table customers
(
    id          int auto_increment
        primary key,
    email       varchar(50)       not null,
    name        varchar(50)       not null,
    order_count tinyint default 0 not null,
    constraint customers_email_uindex
        unique (email)
);

create table orders
(
    id          int auto_increment
        primary key,
    customer_id int          not null,
    address     varchar(100) not null,
    comment     varchar(200) null,
    phone       varchar(11)  not null,
    constraint CUSTOMER_ID_FK
        foreign key (customer_id) references customers (id)
            on update cascade on delete cascade
);
