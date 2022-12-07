<template>
   <div class="login">
    <h1>Welocme Clinic-care</h1>
    <form >
  <div class="form-group"> 
    <label for="inputEmail4" >Email</label>
    <input type="email"  id="inputEmail4">
  </div>
  <div class="form-group">
    <label for="inputPassword4" >Password</label>
    <input type="password"  id="inputPassword4">
  </div>
<div class="form-group">
    <input type="checkbox"  id="check">
    <label for="check" >Remember Me</label>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary">Log in</button>
  </div>
</form>
</div> 

</template>

<script>

export default{
  name: "LogIn",
 
};
</script>

<style scoped>

.login{
    
    width: 360px;
    height: min-content;
    padding: 20px;
    border-radius: 12px;
    background: rgb(255, 181, 22);
    text-align: center;
}
.login h1{
    font-size: 30px;
    margin-bottom: 20px;
}
.login form .form-group{
    margin-bottom: 12px;
}
</style>

