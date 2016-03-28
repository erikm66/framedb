$(document).ready(function(){
$("#register").hide();
$("#moduser").hide();
 $("#updateb").hide();
 $("#adduser").hide();
  $("#Error").hide();
  numpaghome=0;
  var location = window.location.href.split("/");
/*loguin = 0;
$(".logueate").click(function(){
  if(loguin==0){
  $("#login").show(1500);
  loguin=1;
  }
  else{
   $("#login").hide(1500); 
   loguin=0;
  }
 

         cabe = "<table><tbody><tr><th>Nombre</th><th>Pass</th><th>Email</th><th>Rol</th></tr>";
    fin = "</tbody></table>";
     for(i=0;i<data.length;i++){ 
    $("#consultar").html("<tr><td>"+data[i].name+"</td><td>"+data[i].pass+"</td><td>"+data[i].email+"</td><td>"+data[i].rol+"</td></tr>"); 
     }
    $("#consultar").html("</tbody></table>").appendTo('#consultar');; 
     
  
});*/
$("#next").click(function(){
  numpaghome=numpaghome+5;
  cargads(numpaghome);
})
$("#back").click(function(){
  if(numpaghome==0){
    alert("Ya estas en la primera pagina");
  }
  else{
  numpaghome=numpaghome-5;
  cargads(numpaghome);
  }
})
$("#actualizar").click(function(){
  $("#updateb").show();
    $("#adduser").hide();
      $("#updateb").dialog();
}
  )
$("#addregistro").click(function(){
  $("#adduser").show();
  $("#updateb").hide();
    $("#adduser").dialog();
})

$("#insertar").click(function(){
  $("#adduser").hide();
nname=$("#nameadd").val();
npass=$("#passadd").val();
nemail=$("#emailadd").val();
nrol=$("#roladd").val();
$.ajax({
    url:'/M-master/dashboard/insert',
    type:'POST',
    data:{rol: nrol,nom: nname,pass: npass, email: nemail},
    success:function(){
carguser();
    }
  })

  })
$("#update").click(function(){
  $("#adduser").hide();
user=$("input[type=checkbox]:checked").val();
nname=$("#nameup").val();
npass=$("#passup").val();
email=$("#emailup").val();
nrol=$("#rolup").val();
$.ajax({
    url:'/M-master/dashboard/updateuser',
    type:'POST',
    data:{idusers: user,nameup: nname,passup: npass, emailup: email,rolup: nrol},
    success:function(){
      $("#updateb").hide();
     carguser();
  }
  });
}
);
$("#eliminar").click(function(){
  users = new Array();
  i=0;
  $("input:checked").each(function() {
  users[i]=$(this).val();
  i++;
  })
$.ajax({
    url:'/M-master/dashboard/deleteuser',
    type:'POST',
    data:{idusers: users},
    success:function(){
   carguser();
  }
  });
}
)

if(location[4]=='dashboard'){
  $(window).load(function test(){
$("#moduser").show();
carguser();
}
)
}



if(location[4]=='home' || location[4]==""){
cargads(numpaghome);
}
$(".registro").click(function(){
  $("#register").show();
  $("#login").hide();
});
$(".form li a").hover(function(){
  color=$(this).css("border-left-color");
  $(this).css("background-color", color);
});
$(".form li a").mouseout(function(){
$(this).css("background-color", "");
  });
$(".form_log").on('submit',function(){
  var postData = $(this).serialize();
  var formURL=$(this).attr("action");
  $.ajax({
  url:formURL,
  data:postData,
  method:'post',
  dataType:'json',
  success:function(output){
     if(output[0]=='incorrect'){
  $("#Error").dialog();
    }
    else{
      console.log(output),
      window.location.href=output.redirect;
    }

  }});
  return false;
  });
$(".icon-home").click(function(){
  window.location.href='/M-master/home';

})
$(".icon-home").hover(function(){
  $('html,body').css('cursor','pointer');
});
$(".icon-home").mouseout(function(){
  $('html,body').css('cursor','');
});
$(".form_reg").on('submit',function(){
  name = $("#nomreg").val();
  pass = $("#passreg").val();
  email = $("#emailreg").val();
  if(name==null){
    alert("Falta el nombre");
  }
  else if(pass==null){
    alert("Falta el pass");
  }
   else if(email==null){
    alert("Falta el email");
  }
  else{
  var postData = $(this).serialize();
  var formURL=$(this).attr("action");
  $.ajax({
  url:formURL,
  data:postData,
  method:'post',
  dataType:'json',
  success:function(output){

      console.log(output),
      window.location.href=output.redirect;
    

  }});
  }
  return false;
  });

 // duplic de passw
  $('#repass').focusout(function(){
    var pass=$('#pass').val();
    var repass=$('#repass').val();
    if(pass!==repass){
      show_mesg('Passwords must be equal');
      }
    })
  }
);

var show_mesg=function(str){
  $('.message').html('<p>'+str+'</p>');
  setTimeout(function(){
    $('.message p').hide();},5000) 
}
  var show_msg_trans=function(str){
    $('.loading').css('visibility', 'visible');
    $('.loading').html('<h2>'+str+'</h2>');
    setTimeout(function(){$('.loading').css('visibility', 'hidden');},5000);
  };

  var loading_trans=function(){
    $('.loading').css('visibility', 'visible');
    setTimeout(function(){$('.loading').css('visibility', 'hidden');},3500);
  };

  function carguser(){
      $.ajax({
  url:'/M-master/dashboard/selectuser',
  type:'POST',
  datatype:'json',
  success:function(respuesta){
    var data = JSON.parse(respuesta);
$("#consultar").html("<table><tbody><tr><th>Nombre</th><th>Pass</th><th>Email</th><th>Rol</th></tr>"); 
    for(i=0;i<data.length;i++){ 
    $("#consultar table").append("<tr><td>"+data[i].name+"</td><td>"+data[i].pass+"</td><td id='email'>"+data[i].email+"</td><td>"+data[i].rol+"</td><td><input type='checkbox' name='user' value='"+data[i].idUsuaris+"'></td></tr>");
     }
 $("#consultar table").append("</tbody></table>").appendTo('#consultar');
  }
  });

  }

  function cargads(numpag){
$.ajax({
  url:'/M-master/home/showads',
  type:'POST',
  datatype:'json',
  data:{npag: numpag},
  success:function(respuesta){
    if(respuesta!=null){
    $("#anuncios").empty();
 var data = JSON.parse(respuesta);
 for(i=0;i<data.length;i++){ 
  $("#anuncios").append("<div id='anuncio"+i+"'><h3>"+data[i].title+"</h3><img alt='IMAGEN ANUNCIO' src='"+data[i].image+"'></img><p>"+data[i].description+"</p></div>");
 }
 }
  }
  })

}