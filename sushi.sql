CREATE TABLE tbendereco (
  idtbendereco INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  tbpessoa_idtbpessoa INTEGER UNSIGNED NOT NULL,
  cep VARCHAR NULL,
  logradouro VARCHAR NULL,
  complemento VARCHAR NULL,
  bairro VARCHAR NULL,
  cidade VARCHAR NULL,
  estado VARCHAR NULL,
  PRIMARY KEY(idtbendereco),
  INDEX tbendereco_FKIndex1(tbpessoa_idtbpessoa)
);

CREATE TABLE tbfone (
  idtbfone INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  tbpessoa_idtbpessoa INTEGER UNSIGNED NOT NULL,
  numero INTEGER UNSIGNED NULL,
  tipo ENUM() NULL,
  PRIMARY KEY(idtbfone),
  INDEX tbfone_FKIndex1(tbpessoa_idtbpessoa)
);

CREATE TABLE tbfuncao (
  idtbfuncao INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  tbpessoa_idtbpessoa INTEGER UNSIGNED NOT NULL,
  descricao VARCHAR NULL,
  PRIMARY KEY(idtbfuncao),
  INDEX tbfuncao_FKIndex1(tbpessoa_idtbpessoa)
);

CREATE TABLE tbmesa (
  idmesa INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  tbsituacaomesa_idtbsituacaomesa INTEGER UNSIGNED NOT NULL,
  descrisao VARCHAR NULL,
  PRIMARY KEY(idmesa),
  INDEX tbmesa_FKIndex1(tbsituacaomesa_idtbsituacaomesa)
);

CREATE TABLE tbpedido (
  idtbpedido INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  tbpessoa_idtbpessoa INTEGER UNSIGNED NOT NULL,
  tbstatus_idtbstatus INTEGER UNSIGNED NOT NULL,
  tbmesa_idmesa INTEGER UNSIGNED NOT NULL,
  tbproduto_idtbproduto INTEGER UNSIGNED NOT NULL,
  descricao VARCHAR NULL,
  quantidade INTEGER UNSIGNED NULL,
  PRIMARY KEY(idtbpedido),
  INDEX tbpedido_FKIndex1(tbproduto_idtbproduto),
  INDEX tbpedido_FKIndex2(tbmesa_idmesa),
  INDEX tbpedido_FKIndex3(tbstatus_idtbstatus),
  INDEX tbpedido_FKIndex4(tbpessoa_idtbpessoa)
);

CREATE TABLE tbpessoa (
  idtbpessoa INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome INTEGER UNSIGNED NULL,
  cpf VARCHAR NULL,
  PRIMARY KEY(idtbpessoa)
);

CREATE TABLE tbproduto (
  idtbproduto INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  descricao VARCHAR NULL,
  valor DECIMAL NULL,
  PRIMARY KEY(idtbproduto)
);

CREATE TABLE tbsituacaomesa (
  idtbsituacaomesa INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  descricao VARCHAR NULL,
  PRIMARY KEY(idtbsituacaomesa)
);

CREATE TABLE tbstatus (
  idtbstatus INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  descricao INTEGER UNSIGNED NULL,
  PRIMARY KEY(idtbstatus)
);

CREATE TABLE tbusuario (
  idtbusuario INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  tbpessoa_idtbpessoa INTEGER UNSIGNED NOT NULL,
  usuario VARCHAR NULL,
  senha VARCHAR NULL,
  PRIMARY KEY(idtbusuario),
  INDEX tbusuario_FKIndex1(tbpessoa_idtbpessoa)
);


