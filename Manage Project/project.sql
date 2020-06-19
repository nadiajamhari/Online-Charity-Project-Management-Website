PROJECT TABLE

CREATE TABLE project( 
  projectID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  userID INT NOT NULL,
  projectName VARCHAR(100) NOT NULL,
  startDate DATE NOT NULL,
  endDate DATE NOT NULL,
  status VARCHAR(50) NOT NULL,
  participantLevel VARCHAR(50) NOT NULL,
  venue VARCHAR(100),
  country VARCHAR(100),
  FOREIGN KEY (userID) REFERENCES profile(userID)
);
OBJECTIVE TABLE
CREATE TABLE objective(
  objectiveID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  projectID INT NOT NULL,
  objective VARCHAR(100) NOT NULL,
  FOREIGN KEY (projectID) REFERENCES project(projectID) on delete cascade
);



List_Committe in Add Project
//need to amend refer by user id 
CREATE TABLE list_committee(
 listID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
 projectID int not null,
name VARCHAR(255) NOT NULL,
 position VARCHAR(100) NOT NULL,
 FOREIGN KEY (projectID) REFERENCES project(projectID)  on delete cascade
);

Agenda activity in Add Project
CREATE TABLE agenda(
 agendaID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
 projectID int not null,
 dateevent Date NOT NULL,
timeevent time not null,
 activity VARCHAR(255) NOT NULL,
 FOREIGN KEY (projectID) REFERENCES project(projectID)  on delete cascade
);


Income Table in addProject
CREATE TABLE income(
 incomeID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
 projectID int not null,
 item VARCHAR(255) NOT NULL,
 amount FLOAT NOT NULL,
 FOREIGN KEY (projectID) REFERENCES project(projectID)  on  delete cascade
);

Expenditure Table in addProject
CREATE TABLE expenditure(
 expenditureID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
 projectID int not null,
 item VARCHAR(255) NOT NULL,
 amount FLOAT NOT NULL,
 FOREIGN KEY (projectID) REFERENCES project(projectID) on DELETE CASCADE 
);

CREATE TABLE total_Income(
 totalID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
 projectID int not null,
 amount FLOAT NOT NULL,
 FOREIGN KEY (projectID) REFERENCES project(projectID)  on  delete cascade
);

CREATE TABLE total_Expenditure(
 totalID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
 projectID int not null,
 amount FLOAT NOT NULL,
 FOREIGN KEY (projectID) REFERENCES project(projectID)  on  delete cascade
);
