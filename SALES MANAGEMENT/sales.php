<?php
$con = new mysqli("localhost","root","","SALES");
if ($con) {
    echo "connection successsful";
}

$database = $con->query("CREATE DATABASE if not exists SALES");
if ($database) {
    echo "<p>database created</p>";
}

$table = $con->query("CREATE TABLE if not exists PRODUCT
(ID int(90)not null primary key auto_increment,
PRODUCT_NAME varchar(120)not null,
PRODUCT_BRAND varchar(120)not null,
PERCENTAGE_DISCOUNT varchar(120)not null,
COST_PRICE varchar(120)not null,
PRODUCT_CATEGORY varchar(120)not null,
PRODUCT_DESCRIPTION varchar(120)not null,
OPENING_STOCKS varchar(120)not null,
STOCK_QUANTITY varchar(120)not null,
DISCOUNT_PRICE varchar(120)not null,
SELLING_PRICE varchar(120)not null,
PRODUCT_IMAGE varchar(120)not null,
DATE varchar(120)not null,
TIME varchar(120)not null)ENGINE=innoDB");

if ($table) {
    echo "<p>table created successfully</p>";
}else{
    echo "<p>table not created</p>";
}


$tb = $con->query("CREATE TABLE if not exists sales_registration
(ID int(90)not null primary key auto_increment,
PRODUCT_ID varchar(120)not null,
PRODUCT_NAME varchar(120)not null,
COST_PRICE varchar(120)not null,
SELLING_PRICE varchar(120)not null,
TOTAL_AMOUNT varchar(120)not null,
AMOUNT_PAID varchar(120)not null,
QUANTITY_OF_PRODUCT_BOUGHT varchar(120)not null,
BALANCE varchar(120)not null,
STATUS_OF_PRODUCT varchar(120)not null,
SOLD_BY varchar(120)not null,
SOLD_BY_ID varchar(120)not null,
CUSTOM_NAME varchar(120)not null,
PHONE_NUMBER varchar(120)not null,
DATE varchar(120)not null,
TIME varchar(120)not null)ENGINE=innoDB");

if ($tb) {
    echo "<p>2nd table created successfully</p>";
}else{
    echo "<p>2nd table not created</p>";
}

$tab = $con->query("CREATE TABLE if not exists registration_tb
(ID int(90)not null primary key auto_increment,
FULLNAME varchar(120)not null,
GENDER varchar(120)not null,
EMAIL_ADDRESS varchar(120)not null,
PASSWORD varchar(120)not null,
PHONE_NUMBER varchar(120)not null,
DATE varchar(120)not null,
TIME varchar(120)not null)ENGINE=innoDB");

if ($tab) {
    echo "<p>3rd table created successfully</p>";
}else {
    echo "<p>3rd table not created</p>";
}


$t = $con->query("CREATE TABLE if not exists admin_registration_tb
(ID int(90)not null primary key auto_increment,
FULLNAME varchar(120)not null,
GENDER varchar(120)not null,
EMAIL_ADDRESS varchar(120)not null,
PASSWORD varchar(120)not null,
PHONE_NUMBER varchar(120)not null,
DATE varchar(120)not null,
TIME varchar(120)not null)ENGINE=innoDB");

if ($t) {
    echo "<p>4th table created successfully</p>";
}else {
    echo "<p>4th table not created</p>";
}


$tbl = $con->query("CREATE TABLE if not exists transactions
(ID int(90)not null primary key auto_increment,
PRODUCT_ID varchar(120)not null,
PRODUCT_NAME varchar(120)not null,
TOTAL_AMOUNT varchar(120)not null,
AMOUNT_PAID varchar(120)not null,
QUANTITY_OF_PRODUCT_REMAINING varchar(120)not null,
QUANTITY_OF_PRODUCT_BOUGHT varchar(120)not null,
STATUS_OF_PRODUCT varchar(120)not null,
SALES_STATUS varchar(120)not null,
DATE varchar(120)not null,
TIME varchar(120)not null)ENGINE=innoDB");

if ($tbl) {
    echo "<p>5th table created successfully</p>";
}else{
    echo "<p>5th table not created</p>";
}

?>