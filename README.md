# CRUD de tarefas em PHP



<p align="center">
    <a target="__blank" href="#">
      <img src="https://img.shields.io/badge/status-in%20progress-brightgreen"/>
    </a>  
    <a target="__blank" href="https://opensource.org/licenses/MIT">
      <img src="https://img.shields.io/badge/license-MIT-blue"/>
    </a>
</p>

## About 

CRUD, build with **PHP7, Bootstrap and MySQl.**

## Images


#### Home

<h1 align="center">
  <img src="./images/home.png" alt="home" width="500">
</h1>

#### Criar Tarefa

<h1 align="center">
  <img src="./images/create.png" alt="create" width="500">
</h1>

#### Ver Tarefas

<h1 align="center">
  <img src="./images/read.png" alt="read" width="500">
</h1>

#### Editar Tarefa

<h1 align="center">
  <img src="./images/update.png" alt="update" width="500">
</h1>

## DB

PDO set up **connection.php**.

```sql
create table tb_status(
  id int not null primary key auto_increment,
  status varchar(25) not null
);

insert into tb_status(status)values('pendente');
insert into tb_status(status)values('realizado');

create table tb_tarefas(
  id int not null primary key auto_increment,
  id_status int not null default 1,
  foreign key(id_status) references tb_status(id),
  tarefa text not null,
  data_cadastrado datetime not null default current_timestamp
)
```
