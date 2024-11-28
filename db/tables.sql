create table admin(
    admin_id varchar(50) primary key,
    admin_pwd varchar(50) not null
);

insert into admin values('admin','admin');

create table customer(
    username varchar(50) primary key,
    password varchar(50) not null,
    fullname varchar(100) not null,
    address varchar(100) not null,
    email varchar(100) not null,
    phone varchar(10) not null,
    status int default 0
);

create table services(
    service_id int auto_increment primary key,
    service_name varchar(50) not null
);

insert into services(service_name) values('Air Conditioning'),('Brakes Repair'),('Cambelt Repairs'),('Car Wash'),('Clutches Repair'),
('Exhausts Repair'),('Steering Repair'),('Full Car Service'),('Crash Repair'),('Car Mot'),('Oil Change'),('Engine Repair'),
('Wheel Alignment'),('Cooling System Repair'),('Battery Replacement'),('Car Suspension'),('Gear Box Repair'),('Body Painting'),('Tyre Puncture Repair'),
('Car Body Detailing'),('Full System Repair');

create table mechanic(
    username varchar(50) primary key,
    password varchar(50) not null,
    service_center_name varchar(100) not null,
    mechanic_fullname varchar(100) not null,
    address varchar(100) not null,
    email varchar(100) not null,
    phone varchar(10) not null,
    latitude float,
    longitude float,
    status int default 0
);

insert into mechanic values('mycar','mycar','My Cars','Amitabh Bacchan','Wakad Pune 57','mycars@gmail.com','9823374979',6.109870, 102.195860, 0),
('tulsi','tulsi77','Tulsi Service Center','Narendra Modi','MIDC Bhosari Pune','tulsi.customer@gmail.com','9822290095',18.643299, 73.832748, 0),
('sky80','sky80','Sky Moto Workshop','Amit Shah','Akurdi Pune 35','skymoto.customer@gmail.com','8380044444',18.639540, 73.769740, 0),
('jai88','jai88','Jai Hind Motors','Jotika Malkani','Jai Hind Pimpri Pune 17','jaimotors@gmail.com','8989090906',18.613990,73.801760,0),
('joy66','joy66','Joy Motors','Anirudhha Deshpande','Savarkar Bhavan Pradhikaran Pune 44','joyforyou@gmail.com','7890078900',18.647840,73.77627,0);

create table request(
    request_id int auto_increment primary key,
    request_date timestamp default current_timestamp,
    cust_username varchar(50) references customer(username),
    mechanic_username varchar(50) references mechanic(username),
    distance float,
    status varchar(20) default 'Pending'
);

create table feedback(
    feedback_id int auto_increment primary key,
    feedback_date date,
    cust_userid varchar(50) references customer(username),
    mechanic_userid varchar(50) references mechanic(username),
    feedback_msg text
);

create table bill(
    bill_no int auto_increment primary key,
    bill_date date,
    request_id int references request(request_id),
    vehicle_no varchar(20),
    bill_amt int,
    card_no varchar(20) default null,
    bank_name varchar(50) default null,
    bill_status varchar(30) default 'Pending'   
);

create table bill_services(
    bill_no int references bill(bill_no),
    service_id int references services(service_id)
);

create table contact(
    id int auto_increment primary key,
    name varchar(100) not null,
    email varchar(100) not null,
    message varchar(500) not null
);