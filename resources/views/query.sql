create database sigie
default character set utf8
default collate utf8_general_ci;

create table instituicao(
	id_instituicao int not null auto_increment,
    nome_instituicao varchar(100),
    cnpj_instituicao int(14),
    status_instituicao char(1),
    primary key(id_instituicao)
) default charset = utf8;

create table cursos(
	id_cursos int not null auto_increment,
    nome_cursos varchar(100),
    duracao_cursos int(1),
    status_cursos char(1),
    id_instituicao int,
    primary key(id_cursos),
    foreign key(id_instituicao) references instituicao(id_instituicao)
) default charset = utf8;

create table alunos(
	id_alunos int not null auto_increment,
    nome_alunos varchar(100),
    cpf_alunos int(11),
    data_nascimento_alunos date,
    email_alunos varchar(100),
    celular_alunos int(11),
    endereco_alunos varchar(100),
    numero_endereco_alunos int(7),
    bairro_alunos varchar(100),
    cidade_alunos varchar(50),
    uf_alunos char(2),
    status_alunos char(1),
    id_cursos int,
    primary key(id_alunos),
    foreign key(id_cursos) references cursos(id_cursos)
) default charset = utf8;