DROP TABLE SeriesVistas;
DROP TABLE FilmesVistos;
DROP TABLE Pessoa;
DROP TABLE TipoFilme;
DROP TABLE Serie;
DROP TABLE Filme;
DROP TABLE Genero;

CREATE TABLE Genero(
	nomeG VARCHAR(80),
	PRIMARY KEY (nomeG));
	
CREATE TABLE Filme(
	nomeF VARCHAR(80),
	classificacao DECIMAL(6,1),
	linkImdb VARCHAR(200),
	idImdb VARCHAR(500),
	ano INTEGER,
	sinopse VARCHAR(1000),
	dataSacado VARCHAR(20),
	PRIMARY KEY(nomeF));
	
CREATE TABLE TipoFilme(
	nomeF VARCHAR(80),
	nomeG VARCHAR(80),
	CONSTRAINT c1 PRIMARY KEY (nomeF,nomeG),
	FOREIGN KEY (nomeF) REFERENCES Filme(nomeF),
	FOREIGN KEY (nomeG) REFERENCES Genero(nomeG));
	
	
CREATE TABLE Serie(
	nomeS VARCHAR(80),
	PRIMARY KEY(nomeS));
	
CREATE TABLE Pessoa(
	nomeP VARCHAR(80),
	PRIMARY KEY (nomeP));
	
CREATE TABLE FilmesVistos(
	nomeP VARCHAR (80),
	nomeF VARCHAR(80),
	visto BOOLEAN DEFAULT 0,
	 CONSTRAINT c2 PRIMARY KEY (nomeP,nomeF),
	FOREIGN KEY (nomeP) REFERENCES Pessoa(nomeP),
	FOREIGN KEY (nomeF) REFERENCES Filme(nomeF));
	
CREATE TABLE SeriesVistas(
	nomeS VARCHAR(80),
	concluido BOOLEAN DEFAULT 0 ,
	PRIMARY KEY (nomeS),
	FOREIGN KEY (nomeS) REFERENCES Serie(nomeS));