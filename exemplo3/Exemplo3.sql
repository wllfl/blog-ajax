/* Cria o banco blog */
CREATE DATABASE blog;

/* Tabela de Estados */
CREATE TABLE tab_uf (id INTEGER DEFAULT nextval('tab_uf_id_seq'::regclass) NOT NULL, descricao CHARACTER VARYING(50), PRIMARY KEY (id));
INSERT INTO tab_uf (descricao) VALUES ('São Paulo');
INSERT INTO tab_uf (descricao) VALUES ('Rio de Janeiro');
INSERT INTO tab_uf (descricao) VALUES ('Minas Gerais');

/* Tabela de Cidades */
CREATE TABLE tab_cidade (id INTEGER DEFAULT nextval('tab_cidade_id_seq'::regclass) NOT NULL, descricao CHARACTER VARYING(50), id_uf BIGINT, PRIMARY KEY (id));
INSERT INTO tab_cidade (descricao, id_uf) VALUES ('Osasco', 1);
INSERT INTO tab_cidade (descricao, id_uf) VALUES ('Sorocaba', 1);
INSERT INTO tab_cidade (descricao, id_uf) VALUES ('Campinas', 1);
INSERT INTO tab_cidade (descricao, id_uf) VALUES ('Volta Redonda', 2);
INSERT INTO tab_cidade (descricao, id_uf) VALUES ('Duque de Caxias', 2);
INSERT INTO tab_cidade (descricao, id_uf) VALUES ('Macaé', 2);
INSERT INTO tab_cidade (descricao, id_uf) VALUES ('Belo Horizonte', 3);
INSERT INTO tab_cidade (descricao, id_uf) VALUES ('Juiz de Fora', 3);
INSERT INTO tab_cidade (descricao, id_uf) VALUES ('Poços de Caldas', 3);
