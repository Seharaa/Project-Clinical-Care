<template>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Alkalami&family=Nunito&display=swap" rel="stylesheet">
<div id="app">
  <NatBar/>
  <CoverImg/>
  <LogIn/>
</div>
  

</template>



<script>

import NatBar from './components/NatBar.vue'
import CoverImg from './components/CoverImg.vue'
import LogIn from './components/LogIn.vue'



export default{
  name: "App",
  components: {
    NatBar,
    CoverImg,
    LogIn
    
  },
};


</script>


<style>
*{
  font-family: 'Alkalami', serif;

}
.navbar-brand{
  font-size: 20px;
  color: rgb(241, 1, 1);

}
.navbar-brand span{
  color:rgb(2, 69, 255)
}

.nav-item a{
  color: rgb(6, 69, 255);
  font-size: 20px;

}
body{
  background: rgb(250, 211, 84);
}
.section-padding{
  padding: 100px 0;
}
.carousel-item{
  height: 100vh;
  min-height: 300px;

}
  
.carousel-caption{
  margin-bottom: 85px;
  color: rgb(255, 255, 255);
  bottom:220px;
  z-index: 2;
}
.carousel-caption h5{
  font-size: 50px;
  text-transform: uppercase;
  letter-spacing: 2px;
  margin-top: 25px;
}
.carousel-caption p{
  font-size: 25px;
  width: 60%;
  margin: auto;
  line-height: 1.9;

}
.carousel-inner::before{
  content:'';
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  background: rgba(0,0,0,0.7);
  z-index: 1;

  
}



</style>