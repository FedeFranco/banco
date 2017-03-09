
drop table if exists usuarios cascade;
create table usuarios (
  id         bigserial   constraint pk_usuarios primary key,
  nombre     varchar(20) not null constraint uq_usuario_unico unique,
  password   varchar(60)    not null
);

drop table if exists cuentas cascade;
create table cuentas (
    id bigserial constraint pk_cuentas primary key,
    num numeric(20) not null,
    fecha_apertura timestamp default current_timestamp,
    usuario_id bigint not null constraint fk_cuentas_usuarios
                                            references usuarios (id)
);

drop table if exists movimientos cascade;
create table movimientos(
    id bigserial constraint pk_movimientos primary key,
    fecha_aparicion timestamptz default current_timestamp,
    concepto text not null,
    importe numeric(8,2) not null,
    cuenta_id bigint not null constraint fk_movimientos_cuentas
                                            references movimientos (id)

);


insert into usuarios (nombre,password) values ('pepi','pepi'), ('juan','juan');
insert into cuentas (usuario_id,num) values (1,23), (1,25), (2,13);
