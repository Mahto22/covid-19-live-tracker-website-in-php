<style type="text/css">

html{
	scroll-behavior: scroll;
}

*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;

	font-family: 'Muli', sans-serif;
}
.row{
	margin-left: 0 !important;
	margin-right: 0 !important;
}
.nav_style{
	background-color: #a29bfe !important;
}
.nav_style a{
color: white;
}

/*///////// main header ///////*/

.main_header{
	height: 450px;
	width: 100%;
}
.rightside h1{
font-size: 3rem;
}
.corona_rotate img{
	border:0px;
	border-radius: 50%;
animation: gocorona 3s linear infinite;
}
@keyframes gocorona {
	0%{transform: rotate(0);}
	100%{transform: rotate(360deg);}
}

.leftside img{
	animation: global 5s linear infinite;
}
@keyframes global{
	0%{transform: scale(.75);}
	20%{transform: scale(1);}
	40%{transform: scale(.75);}
	60%{transform: scale(1);}
	80%{transform: scale(.75);}
	100%{transform: scale(.75);}
}

/*corona updates*/
.corona_update{
	margin: 0 0 30px 0;
}
.corona_update h3{
	color: #ff7675;
}
.corona_update h1{
	font-size: 2rem;
	text-align: center;
}

/* about section*/
.sub_section{
	background-color: #fbfafd;
}

/* footer*/
.footer_style{

background-color: #a29bfe !important;

}

.footer_style p{
	margin-bottom: 0 !important;
}

/*for top cursor*/
#myBtn{
	display: none;
	position: fixed;
	bottom: 30px;
	right: 40px;
	z-index: 99;
	border: none;
	outline: none;
	background-color: #00A8FF;
	color: white;
	cursor: pointer;
	padding: 10px;
	border-radius: 10px;
}
#myBtn:hover{
background: #606060;
}

/* responsive */



@media(max-width: 780px){
	.main_header {
		height: 700px;
		text-align: center;
	}
	.main_header h1{
		text-align: center;
		padding: 0;
		width: 100%;
		font-size: 34px;
	}

.count_style{
	display: inline !important ;
}
.count_style{
	text-align: center;
}
.about_res{
	margin-left: 0 !important;
}

}


.navbar-toggler {
    padding: .25rem .75rem;
    font-size: 1.25rem;
    line-height: 1;
     background-color: blue; 
    border: 0px solid black;
    border-radius: .25rem;
}

.blinking{
    animation:blinkingText 1.2s infinite;
}
@keyframes blinkingText{
    0%{     color: green;    }
    49%{    color: yellow; }
    60%{    color: red; }
    99%{    color:purple;  }
    100%{   color: blue;    }
}
     
</style>