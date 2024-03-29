<style>
/* body {
  font-family: "Lato", sans-serif;
} */

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  right: 0;
  background-color: rgba(17,12,17,0.8);
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
  margin-top: 75px;
  color: white;
}

.sidenav a {
  padding: 8px 8px 8px 16px;
  text-decoration: none;
  font-size: 16px;
  color: white;
  display: block;
  /* transition: 0.3s; */
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  left: 0;
  font-size: 26px;
  margin-left: 10px;
}

.sidenav .clearbtn {
  position: absolute;
  top: 0;
  right: 0;
  font-size: 22px;
  margin-right: 10px;
  color: white;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

.notification {
  cursor:pointer;
  color: white;
  text-decoration: none;
  padding: 8px 12px;
  position: relative;
  display: inline-block;
}


.notification .badge {
  position: absolute;
  top: -5px;
  right: -5px;
  border-radius: 100%;
  background: #398ad7;
  color: white;
}

</style>
</head>
<body>

<div id="mySidenav" class="sidenav">
  
</div>



<script>
$(document).ready(getNotif());

setInterval(getNotif, 5000);

function getNotif() {
  $.getJSON( "/RealHack-webapp-master/php/getnotification.php", function( data ) {
      var sidebtns = '<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a><a href="javascript:void(0)" class="clearbtn" onclick="clearNav()">Clear</a>';
      var dataArr = data === null ? [] : data.map(data => `<p>${data.notification}</p>`)
        var countNotification = dataArr.length ;
        $('.sidenav').html([sidebtns,...dataArr]);
        if (countNotification != 0) {
          $('.badge').html(countNotification);
        }       
    });
}

function openNav() {
  document.getElementById("mySidenav").style.width = "400px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

function clearNav() {
  $.post( "/RealHack-webapp-master/php/clearnotification.php");
  $('.sidenav').html('<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a><a href="javascript:void(0)" class="clearbtn" onclick="clearNav()">Clear</a></div>');
  $('.badge').hide()
}
</script>