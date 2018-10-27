create database phone;
use phone;

create table `admin`(
adminId  int primary key NOT NULL,
userName nvarchar(100)  NOT NULL,
password nvarchar(100)  NOT NULL
);


create table users(
userId      int primary key NOT NULL,
userName    nvarchar(255) NOT NULL,
password    nvarchar(255) NOT NULL,
name        nvarchar(255) NOT NULL,
sex         nvarchar(10)  NOT NULL,
birth       date          NOT NULL,
address     nvarchar(255) NOT NULL,
telephone   int NOT NULL,
email       nvarchar(255) NOT NULL
);

 

create table supplier(
supplierId   int primary key NOT NULL,
supplierName nvarchar(255) NOT NULL,
address      nvarchar(255) NOT NULL
);



create table product(
productId    int primary key  NOT NULL,
supplierId   int 		      NOT NULL,
productName  nvarchar(255)    NOT NULL,
os           nvarchar(255)    NOT NULL,
cpu          nvarchar(30)     NOT NULL,
ram          nvarchar(30)     NOT NULL,
rom          nvarchar(30)     NOT NULL,
size         float 			  NOT NULL,
screen       int              NOT NULL,
color 	     nvarchar(30) 	  NOT NULL,
weight       float     	      NOT NULL,
battery      int 			  NOT NULL,
warranty     nvarchar(30)     NOT NULL,  
quantity     int 			  NOT NULL, 
foreign key(supplierId) references supplier(supplierId)
);


create table  images(
imageId    int primary key  NOT NULL,
productId  int              NOT NULL,
url        nvarchar(255)    NOT NULL,
foreign key(productId) references product(productId)
);


create table price(
priceId       int primary key NOT NULL,
productId     int  NOT NULL,
price         int  NOT NULL,
dateStart     date NOT NULL,
dateFinish    date NOT NULL,
foreign key(productId) references product(productId)
);



create table `order`(
orderId   int primary key NOT NULL,
userId    int NOT NULL,
status    int NOT NULL,
date      datetime NOT NULL,
foreign key(userId) references users(userId)
); 


create table orderDetail(
orderDetailId  int primary key NOT NULL,
orderId        int NOT NULL,
productId      int NOT NULL,
quantity       int NOT NULL,
foreign key(orderId) references userOrder(orderId),
foreign key(productId) references product(productId)
);


create table xuathang(
xhId        int primary key NOT NULL,
productId   int NOT NULL,
quantity    int NOT NULL,
date        datetime NOT NULL,
foreign key(productId) references product(productId)
);


create table nhaphang(
nhId        int primary key NOT NULL,
productId   int NOT NULL,
quantity    int NOT NULL,
date        datetime NOT NULL,
price       int NOT NULL,
foreign key(productId) references product(productId)
);