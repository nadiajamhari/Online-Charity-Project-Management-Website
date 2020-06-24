PROJECT TABLE 
  CREATE TABLE project(    projectID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,   userID INT NOT NULL,   projectName VARCHAR(100) NOT NULL,   startDate DATE NOT NULL,   endDate DATE NOT NULL,   participantLevel VARCHAR(50) NOT NULL,   venue VARCHAR(100),   country VARCHAR(100),   FOREIGN KEY (userID) REFERENCES profile(userID)  on delete cascade 
 
); 
 
ALTER TABLE project AUTO_INCREMENT=3000;   
 
OBJECTIVE TABLE 
CREATE TABLE objective(   objectiveID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,   projectID INT NOT NULL,   objective VARCHAR(100) NOT NULL,   FOREIGN KEY (projectID) REFERENCES project(projectID) on delete cascade 
); 
 List_Committe  
CREATE TABLE list_committee(  listID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,  projectID int not null,  name VARCHAR(255) NOT NULL,  position VARCHAR(100) NOT NULL,  FOREIGN KEY (projectID) REFERENCES project(projectID)  on delete cascade ); 
Agenda activity in Add Project 
CREATE TABLE agenda(  agendaID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,  projectID int not null,  dateevent Date NOT NULL, timeevent time not null,  activity VARCHAR(255) NOT NULL,  FOREIGN KEY (projectID) REFERENCES project(projectID)  on delete cascade ); 
 
Income Table 
CREATE TABLE income(  incomeID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,  projectID int not null,  itemincome VARCHAR(255) NOT NULL,  amountincome FLOAT NOT NULL,  FOREIGN KEY (projectID) REFERENCES project(projectID)  on  delete cascade ); 
 
Expenditure Table  
CREATE TABLE expenditure(  expenditureID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,  projectID int not null,  itemexpenditure VARCHAR(255) NOT NULL,  amountexpenditure  FLOAT NOT NULL,  FOREIGN KEY (projectID) REFERENCES project(projectID) on DELETE CASCADE  ); 
 
 
TABLE TOTAL INCOME 
CREATE TABLE total_Income(  totalIncomeID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,  projectID int not null,  amountincome FLOAT NOT NULL,  FOREIGN KEY (projectID) REFERENCES project(projectID)  on  delete cascade ); 
 
TABLE TOTAL EXPENDITURE 
CREATE TABLE total_Expenditure(  totalExpenditureID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,  projectID int not null,  amountexpenditure FLOAT NOT NULL,  FOREIGN KEY (projectID) REFERENCES project(projectID)  on  delete cascade );

CREATE TABLE committee(   committeeID INT NOT NULL AUTO_INCREMENT PRIMARY KEY, userID int not null, name VARCHAR(250) NOT NULL, age int NOT NULL, noPhone varchar(255) not null, email VARCHAR(250) NOT NULL, address VARCHAR(250) NOT NULL, occupation VARCHAR(250) NOT NULL, 
 
FOREIGN KEY (userID) REFERENCES profile(userID)  on  delete cascade ); Alter Table committee auto_increment = 6000; 
 
 


