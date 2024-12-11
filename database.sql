create table clients (
    id_client int AUTO_INCREMENT primary key ,
    nom_client varchar(100) not null,
    email varchar(150) unique not null,
    telephone varchar(20),
);
create table activites (
    id_activites int AUTO_INCREMENT primary key,
    nom_activite varchar(100) not null,
    description text ,
    type_activites varchar(50),
    prix decimal(10,2) not null ,
    date_disponible date ,
    places_disponible int not null
);
create table reservation (
    id_reservation int AUTO_INCREMENT primary key ,
    id_client int not null,
    id_activite int not null,
    date_reservation date not null ,
    nombre_personnes int not null,
    statut_reservation varchar(50) dafault 'confirmée',
    FOREING key (id_client) references clients(id_client),
    FOREING key (id_activite) references activites(id_activites)
)
ALTER TABLE reservation
MODIFY statut_reservation ENUM('attente', 'confirmée', 'annulée') DEFAULT 'confirmée';

INSERT INTO Réservations (id_client, id_activité, date_reservation)
VALUES (1, 2, '2024-12-01');

INSERT into clients (nom_client,email,telephone,date_inscription)
VALUES('yacine','yacinemarzou@gamil.com',0617151277,2024-12-11);

select  email,telephone from clients

update clients
set email ='yaciiinne@gmail.com'
where id_client=1;

delete from clients 
where id_client=1;
