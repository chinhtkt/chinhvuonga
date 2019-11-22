</div>

                </div>
                <div class="container-pluid" >
                    <section id="footer" style="background-color:#000000">
                        <div class="container">
                            <div class="col-md-3" id="shareicon" style="background-color:#000000">
                                <ul>
                                    <li>
                                        <a href="https://www.facebook.com/chinh.nguyen.5817"><i class="fa fa-facebook "></i></a>
                                    </li>
                                    <li>
                                        <a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a href=""><i class="fa fa-google-plus"></i></a>
                                    </li>
                                    <li>
                                        <a href=""><i class="fa fa-youtube"></i></a>
                                    </li>
                                </ul>

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
