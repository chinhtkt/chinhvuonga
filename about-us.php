<?php require_once __DIR__. "/autoload/autoload.php"; ?>
 <?php  require_once __DIR__. "/layouts/Header.php"; ?>

                    <div class="col-md-9 bor">
                        <section class="box-main1">
                            <h3 class="title-main"><a href="">Contact us though</a> </h3>
                            
                           <head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>



.fa-facebook {
  background: #3B5998;
  color: white;
  padding: 20px;
  margin: 5px 2px;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
  padding: 20px;
  margin: 5px 2px;
}

.fa-google {
  background: #dd4b39;
  color: white;
   padding: 20px;
  margin: 5px 2px;
}


.fa-instagram {
  background: #125688;
  color: white;
   padding: 20px;
  margin: 5px 2px;
}



</style>
</head>
<body>
    <br>
    <br>



<!-- Add font awesome icons -->
<a href="#" class="fa fa-facebook"></a>
<a href="#" class="fa fa-twitter"></a>
<a href="#" class="fa fa-google"></a>
<a href="#" class="fa fa-instagram"></a>
      
</body>

                           
                            </div>
                        </section>
                    </div>
                </div>

</div>

                </div>
                <div class="container-pluid" >
                    <section id="footer" style="background-color:#000000">
                        <div class="container">
                            <div class="col-md-3" id="shareicon" style="background-color:#000000">
                                <ul>
                                

                            </div>
                            <div class="col-md-8" id="title-block">
                                <div class="pull-left">
                                </div>
                                <div class="pull-right">
                                </div>

                                
                            </div>
                        </div>
                    </section>
                    <section id="footer-button">
                        <div class="container-pluid">
                            
                                </div>
                                
                            </div>
                        </div>
                    </section>
                    <section id="ft-bottom">
                        <p class="text-center"> @Copyright 2019:This is Footer  ... !!! </p>
                    </section>
                </div>
            </div>
        </div>
        </div>      
        </div>
        <script  src="<?php echo base_url() ?>/frontend/js/slick.min.js"> </script>
    </body>
</html>
<script type ="text/javascript">
$(function() {
    $hideitem = $(".hideitem");
    $itemproduct = $(".item-product");
    $itemproduct.hover(function(){
        $(this).children("hideitem").show(100);

    },function(){
        $hideitem.hide(500);
    })
})




$(function(){
    $updatecart = $(".updatecart");
    $updatecart.click(function(e){
        e.preventDefault();
        $qty = $(this).parents("tr").find("#qty").val();

        $key = $(this).attr("data-key");
        $.ajax ({
            url: 'cap-nhat-gio-hang.php',
            type: 'GET',
            data:{'qty':$qty,'key':$key},
            success:function(data)
            {
                if(data == 1)
                {
                    alert("Updated");
                    location.href='gio-hang.php'
                }
            }
        });
            

            
    })
})
</script>

                