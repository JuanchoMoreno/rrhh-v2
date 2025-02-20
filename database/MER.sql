CREATE DATABASE `MER_RRHH`;
USE `MER_RRHH`;

CREATE TABLE horasExtras_det (
  idhorasExtras_det INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY(idhorasExtras_det)
);

CREATE TABLE empresas (
  idEmpresas INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY(idEmpresas)
);

CREATE TABLE tipo_permisos (
  idTipo_permisos INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY(idTipo_permisos)
);

CREATE TABLE horasExtras_gen (
  idHoras_extras_gen INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY(idHoras_extras_gen)
);

CREATE TABLE usuarios (
  idUsuarios INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Empresas_idEmpresas INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(idUsuarios),
  FOREIGN KEY(Empresas_idEmpresas)
    REFERENCES Empresas(idEmpresas)
);

CREATE TABLE cargos (
  idCargos INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Usuarios_idUsuarios INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(idCargos),
  FOREIGN KEY(Usuarios_idUsuarios)
    REFERENCES Usuarios(idUsuarios)
);

CREATE TABLE permisos (
  idPermisos INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Usuarios_idUsuarios INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(idPermisos),
  FOREIGN KEY(Usuarios_idUsuarios)
    REFERENCES Usuarios(idUsuarios)
);

CREATE TABLE departamentos (
  idDepartamentos INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Usuarios_idUsuarios INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(idDepartamentos),
  FOREIGN KEY(Usuarios_idUsuarios)
    REFERENCES Usuarios(idUsuarios)
);

CREATE TABLE permisos_has_tipo_permisos (
  Permisos_idPermisos INTEGER UNSIGNED NOT NULL,
  Tipo_permisos_idTipo_permisos INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(Permisos_idPermisos, Tipo_permisos_idTipo_permisos),
  FOREIGN KEY(Permisos_idPermisos)
    REFERENCES Permisos(idPermisos),
  FOREIGN KEY(Tipo_permisos_idTipo_permisos)
    REFERENCES Tipo_permisos(idTipo_permisos)
);

CREATE TABLE horasExtras_Gen_has_horasExtras_Det (
  HorasExtras_gen_idHoras_extras_gen INTEGER UNSIGNED NOT NULL,
  horasExtras_det_idhorasExtras_det INTEGER UNSIGNED NOT NULL,
  Usuarios_idUsuarios INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(HorasExtras_gen_idHoras_extras_gen, horasExtras_det_idhorasExtras_det),
  FOREIGN KEY(HorasExtras_gen_idHoras_extras_gen)
    REFERENCES HorasExtras_gen(idHoras_extras_gen),
  FOREIGN KEY(horasExtras_det_idhorasExtras_det)
    REFERENCES horasExtras_det(idhorasExtras_det),
  FOREIGN KEY(Usuarios_idUsuarios)
    REFERENCES Usuarios(idUsuarios)
);

CREATE TABLE Tipo_Documento (
  idTipo_Documento INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Usuarios_idUsuarios INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(idTipo_Documento),
  FOREIGN KEY(Usuarios_idUsuarios)
    REFERENCES Usuarios(idUsuarios)
);

CREATE TABLE Roles (
  idRoles INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Usuarios_idUsuarios INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(idRoles),
  FOREIGN KEY(Usuarios_idUsuarios)
    REFERENCES Usuarios(idUsuarios)
);

CREATE TABLE Clases (
  idClases INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Departamentos_idDepartamentos INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(idClases),
  FOREIGN KEY(Departamentos_idDepartamentos)
    REFERENCES Departamentos(idDepartamentos)
);

CREATE TABLE Centros_costo (
  idCentros_costo INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Clases_idClases INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(idCentros_costo),
  FOREIGN KEY(Clases_idClases)
    REFERENCES Clases(idClases)
);

