-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2022 at 05:05 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_daksh`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `Area_id` int(11) NOT NULL,
  `Area_name` varchar(45) NOT NULL,
  `city_city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`Area_id`, `Area_name`, `city_city_id`) VALUES
(1, 'amraiwadi', 1),
(2, 'vastral', 2),
(3, 'bapunagar', 3),
(4, 'Danilimda', 4);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `Customer_cus_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `Customer_cus_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `cart_has_product`
--

CREATE TABLE `cart_has_product` (
  `cart_cart_id` int(11) NOT NULL,
  `Product_product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart_has_product`
--

INSERT INTO `cart_has_product` (`cart_cart_id`, `Product_product_id`, `qty`) VALUES
(1, 1, 1),
(2, 8, 3),
(3, 6, 1),
(4, 5, 3),
(5, 9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) DEFAULT NULL,
  `item_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `item_type`) VALUES
(1, 'Sweet Things', 'NO-VEGAN '),
(2, 'Savoury Things', 'NO-VEGAN'),
(3, 'Desserts', 'DESSERTS');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(45) DEFAULT NULL,
  `State_State_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`, `State_State_id`) VALUES
(1, 'ahmedabad', 1),
(2, 'gandhinagar', 1),
(3, 'surat', 1),
(4, 'rajkot', 1),
(5, 'bhavanagar', 1);

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `complaint_id` int(11) NOT NULL,
  `com_description` varchar(500) DEFAULT NULL,
  `com_response` varchar(500) DEFAULT NULL,
  `Customer_cus_id` int(11) NOT NULL,
  `User_user_Id` int(11) NOT NULL,
  `Product_product_id` int(11) NOT NULL,
  `date_of_complaint` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`complaint_id`, `com_description`, `com_response`, `Customer_cus_id`, `User_user_Id`, `Product_product_id`, `date_of_complaint`) VALUES
(1, 'salt was less in malai kofta so we have to add extra salt in it to enhence its taste then also malai kofta has no satisfactory taste.', 'ok sir, we are very sorry for your inconvenience we will take action regarding your complain about malai kofta.', 1, 1, 5, '2022-01-08'),
(2, 'Fried rice was very bad and overcooked and quantity of fried rice was not upto the rate so its not value for money.', 'ok sir we will take care about overcooked fried rice and we will increase quantity of the fried rice at same price .', 2, 2, 7, '2022-01-16'),
(3, 'Garlic chapati in chapati basket has not any type of garlic taste flavour it was like normal tawa chapati . So dont give garlic name to simple tawa chapati.', 'Sorry for your incovenience but we are not selling simple tawa chapati under the name of garlic chapati it was garlic chapati while preparing garlic chapati chef adds garlic paste into it .We will take appropriate action for your complain.', 3, 2, 6, '2022-01-17'),
(4, 'Hakka noodles was like stale food so we are disappointed about your food items .', 'Sorry sir for your inconvenince , we are  using fresh material to cook the food we are very concern about expiry date of raw materials but we are extremely sorry about noodles we will refund your money.', 4, 1, 8, '2022-01-18'),
(6, 'Veg burger was not upto our expectation because burger contains very few vegtables and it was full of different sauces like pizza sauce and mayonese', 'ok sir we will add more vegtables to veg burger and we add sauce to improve the taste if you dont like then we will add one more variety in veg burger which will contain less sauce and more vegtables.', 6, 3, 9, '2022-02-06'),
(7, 'Simple tea has no taste it feels like drinking tea in unhygenic vendor.', 'Sorry for tea we will improve the taste of the tea.', 0, 4, 1, '2022-02-09'),
(8, 'Quantity of chicken in nonveg biryani was less we are expecting more piece for satisfaction.', 'Ok sir we will include more piece in the biryani.', 8, 5, 3, '2022-02-09'),
(9, 'There wascold water in finger bowl .We did not expect this type of mistake from you people.', 'Sorry sir we will take care about warmness of finger bowl and we will not make this mistake again.', 9, 7, 0, '2022-02-10'),
(10, 'Macroni pasta was over spicy and due to over spice we did not eat it.', 'Ok sir we will add less spice into it.', 10, 4, 10, '2022-02-11');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(11) NOT NULL,
  `cus_name` varchar(45) NOT NULL,
  `cus_email` varchar(45) DEFAULT NULL,
  `cus_mo_no` varchar(12) NOT NULL,
  `otp` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `cus_name`, `cus_email`, `cus_mo_no`, `otp`) VALUES
(1, 'Elon Musk', 'patelranveer16@gmail.com', '9054871413', 12345),
(2, 'Jefz bezoz', 'ranveer@gmail.com', '9998529013', 0),
(3, 'Harshad Maheta', 'daksh@gmail.com', '744485551', 0),
(4, 'Salmon Bhoi', 'kishan@gmail.com', '744485001', 0),
(5, 'Dheeru bhai Ambani', 'ambani@gmail.com', '8527419630', 0),
(6, 'Naim Shaikh', 'dakshpokar02@gmail.com', '8527419630', 15073);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_note` varchar(500) NOT NULL,
  `Customer_cus_id` int(11) NOT NULL,
  `Product_product_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `feedback_note`, `Customer_cus_id`, `Product_product_id`, `date`) VALUES
(2, 'All over food and service was good but tandoori chapati of chapati basket was not soft . so improve the quality of that.', 2, 6, '2022-01-28'),
(3, 'Few chienese items like hakka noodles and noodles were not satisfactory.', 3, 8, '2022-01-29'),
(4, 'Custurd apple ice cream was amazing.', 4, 12, '2022-01-30'),
(5, '8 cheeze pizza with extra layer was awesome!!!!.', 5, 19, '2022-01-30'),
(7, 'Hara bhara kabab was very tasty and chrunchy thats why we had ordered it twice.', 7, 20, '2022-01-31'),
(8, 'Water shots was too spicy and enable to eat and rest of the item was good.', 8, 21, '2022-02-01'),
(9, 'omlet burger was not good . it was like eating simple veg burger and rest of the items was good.', 9, 31, '2022-02-06'),
(10, 'Risshole was very tasty, i just loved it and other snacks like potato chili twister was good.', 10, 35, '2022-02-12');

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `offer_id` int(11) NOT NULL,
  `offer_start_date` date NOT NULL,
  `offer_end_date` date NOT NULL,
  `status` tinyint(2) NOT NULL,
  `offer_price` int(6) NOT NULL,
  `offer_name` varchar(45) DEFAULT NULL,
  `discount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`offer_id`, `offer_start_date`, `offer_end_date`, `status`, `offer_price`, `offer_name`, `discount`) VALUES
(1, '2022-01-14', '2022-02-14', 0, 349, 'winter vacations festival discount', 5),
(2, '2022-03-09', '2022-03-25', 0, 290, 'Holi celebration and Spring season offer', 10),
(3, '2022-04-01', '2022-05-15', 1, 549, 'Summer vacation offers', 7),
(4, '2022-06-01', '2022-07-14', 1, 349, 'Monsoon masala offer', 4),
(5, '2022-07-20', '2022-08-05', 1, 299, 'id-ul-fitr festival offer', 10),
(6, '2022-08-20', '2022-09-05', 0, 399, 'Ganesh chaturthi offer', 8),
(7, '2022-10-01', '2022-10-14', 0, 199, 'Navratri offer', 10),
(8, '2022-10-15', '2022-11-15', 0, 249, 'super diwali offer', 14),
(9, '2022-11-20', '2022-11-30', 1, 149, 'special winter offer started', 7);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_type` tinyint(4) NOT NULL,
  `order_date` date NOT NULL,
  `order_status` tinyint(1) NOT NULL,
  `pay_type` tinyint(4) DEFAULT NULL,
  `order_description` varchar(500) DEFAULT NULL,
  `total_amt` float NOT NULL,
  `discount` float NOT NULL,
  `net_amt` float DEFAULT NULL,
  `Customer_cus_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_type`, `order_date`, `order_status`, `pay_type`, `order_description`, `total_amt`, `discount`, `net_amt`, `Customer_cus_id`) VALUES
(1, 1, '2022-01-31', 1, NULL, 'one banana bread and one fresh fruit salad.', 530, 0, 530, 1),
(2, 2, '2022-02-01', 1, NULL, 'Two caramal pan cakes and one french apple.', 870, 0, 870, 2),
(3, 3, '2022-02-02', 0, NULL, 'Four burgers and two ice cream and seven cold drinks.', 2220, 0, 2220, 3),
(4, 4, '2022-01-03', 1, NULL, 'One dips blatter.', 480, 0, 480, 4),
(5, 5, '2022-02-01', 0, NULL, 'Two avocado toast and spegetti bologness.', 1080, 0, 1080, 5),
(6, 6, '2022-01-02', 0, NULL, 'Three meditarrrean bruschettas and two mousse au chocolate.', 1310, 0, 1310, 6);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `Order_order_id` int(11) NOT NULL,
  `Product_product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`Order_order_id`, `Product_product_id`, `qty`, `price`) VALUES
(1, 1, 1, 280),
(1, 2, 1, 250),
(2, 3, 2, 580),
(2, 4, 1, 290),
(3, 5, 4, 920),
(3, 13, 2, 600),
(3, 14, 7, 700),
(4, 10, 1, 480),
(5, 11, 1, 380),
(5, 12, 2, 700),
(6, 6, 2, 440),
(6, 8, 3, 870);

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `otp_id` int(11) NOT NULL,
  `otp` int(6) NOT NULL,
  `Customer_cus_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(45) NOT NULL,
  `pro_description` varchar(200) NOT NULL,
  `pro_price` varchar(45) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `cat_fk_id` int(11) NOT NULL,
  `Offer_offer_id` int(11) NOT NULL,
  `image_path` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `pro_name`, `pro_description`, `pro_price`, `status`, `cat_fk_id`, `Offer_offer_id`, `image_path`) VALUES
(1, 'Banana Bread', 'Banana cake, coconut sugar, plant based mylk, cinnamon', '280', 1, 1, 0, './images/banana-bread.jpg'),
(2, 'Fresh Fruit Salad', 'Seasonal fresh fruits, fresh orange juice,\r\nlemon & basil\r\n', '250', 1, 1, 0, './images/image.jpg'),
(3, 'Caramel Pancakes', 'Two fluffy pancakes, served with sliced\r\nbananas,caramel', '290', 1, 1, 0, './images/caramel pancake.jpg'),
(4, 'French Apple PIE', 'classic dessert with homemade crust red apples & vanilla\r\npastry cream', '290', 1, 2, 0, './images/applepie.jpg'),
(5, 'Burger', 'Chia seeds, almond mylk, maple syrup,\r\nvanilla, spirulina, fruits & berries', '230', 1, 1, 0, './images/burger.jpg'),
(6, 'Mousse  Au Chocolate', 'French famous chocolate delicacy, for\r\nchocolate lovers only!', '220', 1, 1, 0, './images/chocolatemousse-526482.jpg'),
(7, 'Antipasti Bruschettas', 'Basil & nuts pesto, vegan feta, multigrain bread, served\r\nwith salad\r\n', '290', 1, 2, 0, './images/Antipasti Bruschettas.jpg'),
(8, 'Mediterranean ', 'Cashew cream cheese, fresh tomatoes & multigrain bread,\r\nwith salad\r\n', '290', 1, 2, 0, './images/Mediterranean Bruschettas.jpg'),
(9, 'French Baguette Sandwich', 'A French baguette with fresh ingredients, plain or smoked tofu\r\n', '290', 1, 2, 0, './images/French Baguette Sandwich.jpg'),
(10, 'Dips Platter', 'With pink houmous,cashew cream cheese,feta cheese,veggies & breads\r\n', '480', 1, 2, 0, './images/Dips Platter.jpg'),
(11, 'Spaghetti Bologness', 'Spaghetti topped with\r\nbolognese sauce & basil & French gomashio', '380', 1, 2, 0, './images/Spaghetti Bologness.jpg'),
(12, 'Avocado Toast', 'Avocado, homemade pickles, raw\r\nveggies & multigrain\r\nbread', '350', 1, 2, 0, './images/avocado-toast.jpg'),
(13, 'Ice Cream', 'The best new flavoured ice cream and test of french streat in your mouth', '300', 1, 3, 0, './images/Ice Cream.jpg'),
(14, 'Cold Drinks', 'The best all type of french drinks of all flavours', '100', 1, 3, 0, './images/cold dreanks.jpg'),
(15, 'Chikan Dum Biryani', 'Biryani rice are flavored with spices and are full of aroma', '150', 1, 4, 1, './images/54308405.cms.jpg'),
(18, '', '', '', 0, 0, 0, NULL),
(19, '', '', '', 0, 0, 0, NULL),
(20, '', '', '', 0, 0, 0, NULL),
(21, '', '', '', 0, 0, 0, NULL),
(22, '', '', '', 0, 0, 0, NULL),
(23, 'asd', '', '2', 0, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product12`
--

CREATE TABLE `product12` (
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(45) NOT NULL,
  `pro_description` varchar(200) NOT NULL,
  `pro_price` varchar(45) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `cat_fk_id` int(11) NOT NULL,
  `Offer_offer_id` int(11) NOT NULL,
  `image_path` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product12`
--

INSERT INTO `product12` (`pro_id`, `pro_name`, `pro_description`, `pro_price`, `status`, `cat_fk_id`, `Offer_offer_id`, `image_path`) VALUES
(1, 'Banana Bread', 'Banana cake, coconut sugar, plant based mylk, cinnamon', '280', 0, 1, 0, 'banana_bread'),
(2, 'Fresh Fruit Salad', 'Seasonal fresh fruits, fresh orange juice,\r\nlemon & basil\r\n', '250', 1, 1, 0, 'food2'),
(3, 'Caramel Pancakes', 'Fluffy pancakes, served with sliced\r\nbananas, homemade caramel &\r\ncaramelized nuts ', '290', 1, 1, 0, 'pancakes'),
(4, 'French Apple PIE', 'French classic dessert made with\r\nhomemade crust, red apples & vanilla\r\npastry cream', '290', 0, 1, 0, 'apple'),
(5, 'Burger', 'Chia seeds, almond mylk, maple syrup,\r\nvanilla, spirulina, fruits & berries', '230', 1, 1, 0, 'burger'),
(6, 'Mousse  Au Chocolate', 'French famous chocolate delicacy, for\r\nchocolate lovers only!', '220', 1, 1, 0, 'mousse_au'),
(7, 'Antipasti Bruschettas', 'Basil & nuts pesto, vegan feta, marinated\r\nbell peppers on multigrain bread, served\r\nwith salad\r\n', '290', 0, 2, 0, 'anti'),
(8, 'Mediterranean Bruschettas', 'Cashew cream cheese, fresh tomatoes &\r\nmicro greens on multigrain bread, served\r\nwith salad\r\n', '290', 0, 2, 0, 'mediterial'),
(9, 'French Baguette Sandwich', 'Available only on Tuesday.\r\nA French baguette with daily fresh\r\ningredients, plain or smoked tofu &\r\nhomemade dressing\r\n', '290', 1, 2, 0, 'sandwich'),
(10, 'Dips Platter', 'Platter to share with pink houmous,\r\ncashew cream cheese, golden spread,\r\nvegan feta cheese, raw veggies & breads\r\n', '480', 0, 2, 0, 'dips'),
(11, 'Spaghetti Bologness', 'Spaghetti topped with a vegan\r\nbolognese sauce (soya chunks, carrots,\r\nhomemade tomato sauce, cumin &\r\noregano), fresh basil & French gomashio', '380', 1, 2, 0, 'spagetti'),
(12, 'Avocado Toast', 'Avocado, homemade pickles, raw\r\nveggies & microgreens on multigrain\r\nbread', '350', 1, 2, 0, 'toast'),
(13, 'Ice Cream', '', '300', 1, 3, 0, 'item_2'),
(14, 'Cold Drinks', '', '100', 0, 3, 0, 'item_141'),
(15, 'Pizza', '', '149', 0, 3, 0, NULL),
(16, '', '', '', 0, 0, 0, NULL),
(17, '', '', '', 0, 0, 0, NULL),
(18, '', '', '', 0, 0, 0, NULL),
(19, 'used_quantity', '', '785', 0, 1, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_has_raw_material`
--

CREATE TABLE `product_has_raw_material` (
  `Product_product_id` int(11) NOT NULL,
  `Raw_Material_raw_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchase_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `Supplier_supplier_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_details`
--

CREATE TABLE `purchase_details` (
  `Raw_Material_raw_id` int(11) NOT NULL,
  `Purchase_purchase_id` int(11) NOT NULL,
  `purchase_exp_date` date NOT NULL,
  `qty` int(11) NOT NULL,
  `measure_of_unit` varchar(45) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_payment`
--

CREATE TABLE `purchase_payment` (
  `purchase_pay_id` int(11) NOT NULL,
  `purchase_pay_date` datetime NOT NULL,
  `purchase_pay_method` varchar(45) NOT NULL,
  `purchase_pay_amount` float NOT NULL,
  `Purchase_purchase_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_return`
--

CREATE TABLE `purchase_return` (
  `pur_ret_id` int(11) NOT NULL,
  `pur_ret_date` date NOT NULL,
  `Purchase_purchase_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_return_details`
--

CREATE TABLE `purchase_return_details` (
  `Raw_Material_raw_id` int(11) NOT NULL,
  `Purchase_return_pur_ret_id` int(11) NOT NULL,
  `reasonse` varchar(45) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rating_id` int(11) NOT NULL,
  `rating` float DEFAULT NULL,
  `Customer_cus_id` int(11) NOT NULL,
  `Product_product_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `raw_material`
--

CREATE TABLE `raw_material` (
  `raw_id` int(11) NOT NULL,
  `raw_description` varchar(45) NOT NULL,
  `name_raw_material` varchar(45) NOT NULL,
  `supplier_fk_id` int(5) NOT NULL,
  `Total_quantity` int(5) NOT NULL,
  `used_quantity` int(100) NOT NULL,
  `qty_on_hand` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `raw_material`
--

INSERT INTO `raw_material` (`raw_id`, `raw_description`, `name_raw_material`, `supplier_fk_id`, `Total_quantity`, `used_quantity`, `qty_on_hand`) VALUES
(1, 'organic slices', 'Peanut butter', 0, 80, 45, 35),
(2, 'the nutrituion of multiple grains in one', 'Multygrain bread', 0, 80, 29, 51),
(4, 'fresh tomato', 'fresh tomato', 0, 80, 8, 66),
(5, 'The best cennamon powder', 'cennomon powder', 9, 80, 45, 0),
(6, 'Canadian maple syrups', 'maple syrup', 6, 80, 9, 71),
(8, 'The fresh apple', 'apple', 7, 80, 1, 79),
(9, 'The best vanila pestry cream', 'pestry cream', 8, 80, 9, 71),
(10, 'coconute sugar', 'coconute sugar', 9, 80, 66, 14),
(11, 'Vegan plant milk', 'plant milk', 10, 80, 34, 46),
(12, 'The best black dates', 'black dates', 11, 80, 13, 67),
(13, 'The rosted chocolate beans', 'Chocolate beans', 12, 80, 35, 45),
(14, 'Coconut and Almond', 'Coconut Milk, Almond Milk', 13, 80, 67, 13);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `restaurant_id` int(11) NOT NULL,
  `restaurant_name` varchar(45) NOT NULL,
  `restaurant_address` varchar(200) NOT NULL,
  `restaurant_mo_no` varchar(10) NOT NULL,
  `Area_Area_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`restaurant_id`, `restaurant_name`, `restaurant_address`, `restaurant_mo_no`, `Area_Area_id`) VALUES
(1, 'lamaison organic cafe LLP', 'Ahmedabad', '9054857825', 1);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `State_id` int(11) NOT NULL,
  `state_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`State_id`, `state_name`) VALUES
(1, 'Gujarat');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(45) NOT NULL,
  `supplier_email` varchar(45) NOT NULL,
  `supplier_mo_no` int(10) NOT NULL,
  `Restaurant_restaurant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `supplier_email`, `supplier_mo_no`, `Restaurant_restaurant_id`) VALUES
(1, 'Naim', 'arvindp1223@gmail.com', 1212121211, 1),
(2, 'Narendra', 'narendra@gmail.com', 2147483647, 1),
(3, 'Shardda Kapoor', 'abc@gmail.com', 2147483647, 1),
(4, 'Elon Musk', 'elon@gmail.com', 2147483647, 1),
(5, 'Jezz Bezos', 'jezz@gmail.com', 2147483647, 1),
(6, 'parvesh khan', 'parvesh2322@gmail.com', 2147483647, 1),
(7, 'monty farnandez', 'monty2343@gmail.com', 2147483647, 1),
(8, 'jaykrut patel', 'jaykrut334p@gmail.com', 2147483647, 1),
(9, 'abdulnaim kasim', 'abdul2naim3@gmail.com', 2147483647, 1),
(10, 'rahu rai', 'rahul2311@gmail.com', 2147483647, 1),
(11, 'Salmon Bhai', 'salmon@gmail.com', 2147483647, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `users_id` int(100) NOT NULL,
  `username` varchar(45) NOT NULL,
  `email_id` varchar(45) NOT NULL,
  `user_password` varchar(45) DEFAULT NULL,
  `mobileno` varchar(10) NOT NULL,
  `user_address` varchar(500) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `security_que` varchar(45) NOT NULL,
  `security_ans` varchar(45) NOT NULL,
  `restaurant_restaurant_id` int(11) NOT NULL,
  `Area_Area_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`users_id`, `username`, `email_id`, `user_password`, `mobileno`, `user_address`, `status`, `security_que`, `security_ans`, `restaurant_restaurant_id`, `Area_Area_id`) VALUES
(7, 'admin', 'admin@admin.com', 'password', '7845219630', '', 1, '', '', 0, 4),
(10, 'Harshad Maheta', 'salmon@gmail.com', '12224455', '9998756425', '', 0, '', '', 0, 0),
(17, 'Jezz Bezos', 'jezzgmail.com', 'h', '989758560', '', 1, '', '', 0, 3),
(27, 'dakshsharma', 'fgh@hotmail.com', 'hhhh', '1234567333', '', 0, '', '', 0, 3),
(38, 'Dheeru bhai ambani', 'ambani@gmail.com', 'passwordd', '7894561230', '', 0, '', '', 0, 2),
(39, 'elon musk', 'elon@gmail.com', '15915912', '7879451263', '', 0, '', '', 0, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`Area_id`),
  ADD KEY `fk_Area_city1_idx` (`city_city_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `fk_cart_Customer1_idx` (`Customer_cus_id`);

--
-- Indexes for table `cart_has_product`
--
ALTER TABLE `cart_has_product`
  ADD PRIMARY KEY (`cart_cart_id`,`Product_product_id`),
  ADD KEY `fk_cart_has_Product_Product1_idx` (`Product_product_id`),
  ADD KEY `fk_cart_has_Product_cart1_idx` (`cart_cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`),
  ADD KEY `fk_city_State1_idx` (`State_State_id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`complaint_id`),
  ADD KEY `fk_Complaint_Customer1_idx` (`Customer_cus_id`),
  ADD KEY `fk_Complaint_User1_idx` (`User_user_Id`),
  ADD KEY `fk_Complaint_Product1_idx` (`Product_product_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `fk_Feedback&Rating_Customer1_idx` (`Customer_cus_id`),
  ADD KEY `fk_Feedback_Product1_idx` (`Product_product_id`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`offer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_Order_Customer1_idx` (`Customer_cus_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`Order_order_id`,`Product_product_id`),
  ADD KEY `fk_Order_has_Menu_Product_Order1_idx` (`Order_order_id`),
  ADD KEY `fk_Order_has_Menu_Product_Product1_idx` (`Product_product_id`);

--
-- Indexes for table `otp`
--
ALTER TABLE `otp`
  ADD PRIMARY KEY (`otp_id`),
  ADD KEY `fk_OTP_Customer1_idx` (`Customer_cus_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `fk_Menu_Product_category1_idx` (`cat_fk_id`),
  ADD KEY `fk_Menu_Product_Offer1_idx` (`Offer_offer_id`);

--
-- Indexes for table `product12`
--
ALTER TABLE `product12`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `fk_Menu_Product_category1_idx` (`cat_fk_id`),
  ADD KEY `fk_Menu_Product_Offer1_idx` (`Offer_offer_id`);

--
-- Indexes for table `product_has_raw_material`
--
ALTER TABLE `product_has_raw_material`
  ADD PRIMARY KEY (`Product_product_id`,`Raw_Material_raw_id`),
  ADD KEY `fk_Product_has_Raw_Material_Raw_Material1_idx` (`Raw_Material_raw_id`),
  ADD KEY `fk_Product_has_Raw_Material_Product1_idx` (`Product_product_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `fk_Purchase_Supplier1_idx` (`Supplier_supplier_id`);

--
-- Indexes for table `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD PRIMARY KEY (`Raw_Material_raw_id`,`Purchase_purchase_id`),
  ADD KEY `fk_Raw_Material_has_Purchase_Purchase1_idx` (`Purchase_purchase_id`),
  ADD KEY `fk_Raw_Material_has_Purchase_Raw_Material1_idx` (`Raw_Material_raw_id`);

--
-- Indexes for table `purchase_payment`
--
ALTER TABLE `purchase_payment`
  ADD PRIMARY KEY (`purchase_pay_id`,`Purchase_purchase_id`),
  ADD KEY `fk_Purchase_Payment_Purchase1_idx` (`Purchase_purchase_id`);

--
-- Indexes for table `purchase_return`
--
ALTER TABLE `purchase_return`
  ADD PRIMARY KEY (`pur_ret_id`),
  ADD KEY `fk_Purchase_return_Purchase1_idx` (`Purchase_purchase_id`);

--
-- Indexes for table `purchase_return_details`
--
ALTER TABLE `purchase_return_details`
  ADD PRIMARY KEY (`Raw_Material_raw_id`,`Purchase_return_pur_ret_id`),
  ADD KEY `fk_Raw_Material_has_Purchase_return_Purchase_return1_idx` (`Purchase_return_pur_ret_id`),
  ADD KEY `fk_Raw_Material_has_Purchase_return_Raw_Material1_idx` (`Raw_Material_raw_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `fk_Rating_Customer1_idx` (`Customer_cus_id`),
  ADD KEY `fk_Rating_Product1_idx` (`Product_product_id`);

--
-- Indexes for table `raw_material`
--
ALTER TABLE `raw_material`
  ADD PRIMARY KEY (`raw_id`),
  ADD KEY `supplier_fk_id` (`supplier_fk_id`) USING BTREE;

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`restaurant_id`),
  ADD KEY `fk_restaurant_Area1_idx` (`Area_Area_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`State_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`),
  ADD KEY `fk_Supplier_Restaurant1_idx` (`Restaurant_restaurant_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`users_id`),
  ADD KEY `fk_User_restaurant1_idx` (`restaurant_restaurant_id`),
  ADD KEY `fk_User_Area1_idx` (`Area_Area_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `Area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product12`
--
ALTER TABLE `product12`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `raw_material`
--
ALTER TABLE `raw_material`
  MODIFY `raw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `users_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
