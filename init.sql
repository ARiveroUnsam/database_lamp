CREATE TABLE IF NOT EXISTS `Consultorios` (
  `especialidad` varchar(20) NOT NULL,
  `consultorio` varchar(20) NOT NULL,
  `doctor` varchar(20) NOT NULL,
  PRIMARY KEY (especialidad)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `Pacientes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `dni` int NOT NULL,
  `edad` int NOT NULL,
  `historia_clinica` int NOT NULL,
  `especialidad` varchar(20) NOT NULL,
  PRIMARY KEY (id, dni, especialidad),
  FOREIGN KEY (especialidad) REFERENCES Consultorios (especialidad)
) ENGINE=InnoDB;

INSERT INTO Consultorios (especialidad, consultorio, doctor) VALUES
('Medico Clinico', 'Consultorio 12', 'Dr. Herrera'),
('Traumatologia',  'Consultorio 15', 'Dr. Guzman' ),
('Oftalmologia',   'Consultorio 17', 'Dr. Leiva'  );

INSERT INTO Pacientes (nombre, apellido, dni, edad, historia_clinica, especialidad) VALUES
('Juan',    'Lopez', '37468592', '45', '352694', 'Traumatologia' ),
('Laura',   'Peña',  '40798636', '30', '745564', 'Oftalmologia'  ),
('Raul',    'Sena',  '43025655', '26', '884655', 'Medico Clinico'),
('Maria',   'Cruz',  '47489512', '17', '568745', 'Medico Clinico'),
('Nicolas', 'Perez', '39505694', '56', '123589', 'Traumatologia' );


