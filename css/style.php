<?php
	header("Content-type: text/css");
?>

body {
	font-family: "Exo 2", sans-serif;
	background-color: rgb(35,35,35);
	color: white;
}

.navbar-brand {
	margin-left: 20px;
	font-size: 35px;
	font-weight: bold;
}

.navbar-nav {
	margin-right: 20px;
}

.input-group-search {
	color: white;
}

.input-group {
	width: 50%;
	color: white;
}

.wrapper {
	position: relative;
	margin: 0 auto;
	text-align: center;
	padding: 60px 20px;
}

.card {
text-align: left;
display: inline-flex;
align-items: center;
justify-content: center;
position: relative;
max-width: 250px;
width: 100%;
height: 350px;
padding: 20px;
box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.3);
background-size: cover;
cursor: pointer;
margin: 0 3em 3em 3em;
}
.card:before {
content: '';
display: block;
height: 100%;
width: 100%;
position: absolute;
background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.75) 100%);
}
.card .card_content {
	position: absolute;
	left: 30px;
	z-index: 1;
	bottom: 20px
}



#blur.active {
	filter: blur(20px);
	pointer-events: none;
	user-select: none;
}

#popup {
	position: fixed;
	top: 40%;
	left: 50%;
	transform: translate(-50%, -50%);
	width: 800px;
	padding: 30px;
	box-shadow: 0 5px 30px rgba(0,0,0,.30);
	background: #222;
	border-radius: 20px;
	visibility: hidden;
	opacity: 0;
	transition: 0.5s;
	z-index: 5;
}

#popup.active {
	visibility: visible;
	opacity: 1;
	transition: 0.5s;
}

#popup_img {
	float: left;
	width: 240px;
}

#popup .popup_content {
	float: left;
	width: 500px;
}

#popup_title {
	margin-left: 40px;
	margin-right: 10px;
	color: #FFE66F;
	float: left;
	font-size: 30px;
	font-weight: bold;
}

#popup_year {
	margin-top: 15px;
	margin-right: 10px;
	float: left;
	font-size: 15px;
	font-weight: bold;
}

#popup_time {
	margin-top: 15px;
	margin-right: 10px;
	float: left;
	font-size: 15px;
	font-weight: bold;
}

#popup_genres {
	margin-top: 15px;
	margin-right: 10px;
	font-size: 15px;
	font-weight: bold;
}

#popup_casts {
	margin-left: 40px;
	margin-right: 10px;
	font-size: 15px;
	color: white;
}


#popup_directors {
	margin-top: 20px;
	margin-left: 40px;
	margin-right: 10px;
	font-size: 15px;
	color: white;
}

#popup_stars {
	margin-left: 30px;
}

#popup_delete_btn a{
	position: absolute;
	bottom: 20px;
	right: 180px;
	text-decoration: none;
	color: black;
	background-color: white;
	border-radius: 5px;
	width: 60px;
	text-align: center;
}

#popup_edit_btn a{
	position: absolute;
	bottom: 20px;
	right: 100px;
	text-decoration: none;
	color: black;
	background-color: white;
	border-radius: 5px;
	width: 60px;
	text-align: center;
}

#popup_close_btn a{
	position: absolute;
	bottom: 20px;
	right: 20px;
	text-decoration: none;
	color: black;
	background-color: white;
	border-radius: 5px;
	width: 60px;
	text-align: center;
}

.popup_content span{
	font-weight: bold;
	font-size: 20px;
}

#search-category {
	visibility: hidden;
	display: none;
}

div.stars {
  width: 270px;
  display: inline-block;
}
 
input.star { display: none; }
 
label.star {
  float: right;
  padding: 10px;
  font-size: 36px;
  color: #444;
  transition: all .2s;
}
 
input.star:checked ~ label.star:before {
  content: '\f005';
  color: #FD4;
  transition: all .25s;
}
 
input.star-5:checked ~ label.star:before {
  color: #FE7;
  text-shadow: 0 0 20px #952;
}
 
input.star-1:checked ~ label.star:before { color: #F62; }
 
label.star:hover { transform: rotate(-15deg) scale(1.3);}
 
label.star:before {
  content: '\f006';
  font-family: FontAwesome;
}

.nav-item a{
	font-size: 20px;
}

#search-field {
	height: 40px;
	width: 30%;
}

#search-btn {
	font-size: 1em;
}

.input-group-append{
	width: 10%;
}


.insert-movie {
	position: fixed;
	bottom: 50px;
	right: 50px;
	justify-content: right;
	font-size: 60px;
}

.insert-movie-btn {

	padding: 15px 15px;
	border-radius: 10%;
	background-color: white;
	box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
	color: black;
	transition: all .35s;
}

.insert-movie-btn:hover {
	text-decoration: none;
	background-color: black;
	color: white;
}

.notfind {
	display: flex;
	justify-content: center;
	padding: 10px;
	font-size: 40px;
}