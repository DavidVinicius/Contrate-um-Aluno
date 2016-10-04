use tcc;

alter table aluno drop column experiencias; #criar tabela experiencias
alter table aluno drop column formacao;		#criar tabela formacoes
alter table aluno drop column telefone;		#criar tabela telefones
alter table aluno drop column endereco;		#criar tabela endereços

alter table aluno drop column codExperiencia;

select * from aluno;
describe aluno;
describe enderecos;
describe formacoes;
describe telefones;

create table enderecos
(
	idEndereco int not null primary key auto_increment,
    numero varchar(10) not null,
    rua varchar(50) not null,
    bairro varchar(30) not null,
    cidade varchar(30) not null,
    estado char(2) not null,
    cep char(9) not null,
    complemento varchar(40),
    codAluno int not null,
    constraint fk_enderecos_aluno foreign key(codAluno) references aluno(idAluno)
);

create table telefones
(
	idTelefone int not null primary key auto_increment,
    telefone varchar(17) not null,
    tipo varchar(20),
    codAluno int not null,
    constraint fk_telefones_aluno foreign key(codAluno) references aluno(idAluno)
);

create table formacoes
(
	idFormacao int not null primary key auto_increment,
    anoConclusao date not null,
    curso varchar(30) not null,
    instituicao varchar(40) not null,
    codAluno int not null,
    constraint fk_formacoes_aluno foreign key(codAluno) references aluno(idAluno)
);

drop table experiencias;

create table experiencias
(
	idExperiencia int not null primary key auto_increment,
    descricao varchar(255) not null,
    dataInicio date not null,
    dataSaida date,
    cargo varchar(30),
    codAluno int not null,
    constraint fk_experiencias_aluno foreign key(codAluno) references aluno(idAluno)
);