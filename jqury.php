<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script>
  $(document).ready(function(){
    $(document).on('click','.reister',function()
     {
     var namel = $('#lastn').val();
     var namef= $("#firstn").val(); 
     var email= $("#email").val();
     var password= $("#password").val();
     var passwordc= $("#passwordc").val();
     var gender=$("#gender").val();
        var action='reister';
        $.ajax({
           url:"insert_val.php",
           type:"post",
           data:{namel:namel,namef:namef,email:email,password:password,passwordc:passwordc,action:action,gender:gender},
           success:function(data)
           {
           	$('#text_r').html(data);
           }
        });
     });
  });
</script>